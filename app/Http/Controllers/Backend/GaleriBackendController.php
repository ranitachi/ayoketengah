<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\Service\GaleriService;
use Auth;
use Validator;
use App\Models\Author;
use App\Models\Kategori;
class GaleriBackendController extends Controller
{
    private $galeriService;

    public function __construct()
    {
        $this->galeriService = new GaleriService();
    }

    public function index()
    {
        $galeri=$this->galeriService->all();
        return view('backend.content.galeri.index')
                ->with('galeri',$galeri);
    }
    public function form($id=-1)
    {
        $galeri=array();
        if($id!=-1)
            $galeri=$this->galeriService->show($id);
        $author=Author::where('flag',1)->orderBy('nama')->get();
        $kategori=Kategori::where('flag',1)->orderBy('kategori')->get();
        return view('backend.content.galeri.form')
                ->with('galeri',$galeri)
                ->with('author',$author)
                ->with('kategori',$kategori)
                ->with('id',$id);
    }

    public function proses(Request $request,$id)
    {
        Validator::make($request->all(), [
            'judul' => 'required',
            'gambar' => 'required',
            'kategori' => 'required',
            'status' => 'required',
            'keterangan' => 'required'
        ])->validate();

        $data=$request->all();
        $data['user']=Auth::user()->name;

        if($id==-1)
        {
            $save = $this->galeriService->simpan($data);
            if($save)
                return redirect()->route('admin-galeri.index')->with('pesan','Data Galeri Berhasil Disimpan');
            else
                return redirect()->route('admin-galeri.index')->with('error','Data Galeri Gagal Disimpan');
        }
        else
        {
            $save = $this->galeriService->edit($data,$id);
            if($save)
                return redirect()->route('admin-galeri.index')->with('pesan','Data Galeri Berhasil Di Edit');
            else
                return redirect()->route('admin-galeri.index')->with('error','Data Galeri Gagal Di Edit');
        }

        
    }

    public function json_galeri($limit=null,$st=null)
    {
        if($st!=null)
        {
            $wh=['status'=>1];
            return $this->galeriService->all($limit,$wh);
        }
        else
        {
            $galeri=$this->galeriService->all();
            $data=array();
            $no=1;
            foreach($galeri as $idx=>$val)
            {
                $data[$idx][]=$no;
                $data[$idx][]='<img src="'.asset($val->gambar).'" style="width:150px;">';
                $data[$idx][]=$val->judul.'<br><br><small>Tags :</small><br>'.$val->kategori;
                $data[$idx][]='<span class="label label-primary">'.$val->views.'</span>';
                $data[$idx][]='<div style="width:150px"><i class="icon-calendar"></i>&nbsp;'.date('d/m/Y H:i:s',strtotime($val->created_at)).'</div>';
                $data[$idx][]=($val->flag==0 ? '<span class="label label-default">Draft</span>' : ($val->flag==1 ? '<span class="label label-success"><i class="icon-checkmark"></i> Publish</span>': '<span class="label label-warning"><i class="icon-blocked"></i> Tidak Publish</span>'));
                $data[$idx][]='<ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="'.route('admin-galeri.form',$val->id).'"><i class="icon-pencil7"></i> Edit</a></li>
                                            <li><a href="javascript:hapus(\''.$val->id.'\')"><i class="icon-trash"></i> Hapus</a></li>
                                        </ul>
                                    </li>
                                </ul>';

                $no++;
            }

            if(count($data)!=0)
            {
                $dt['data']=$data;
                // $dt['status']=true;
            }
            else
            {
                $dt['data']=$data;
                // $dt['status']=false;
            }
            return $dt;
        }
    }

    public function destroy($id)
    {
        $c=$this->galeriService->hapus($id);
        if($c)
            return redirect()->route('admin-galeri.index')->with('pesan','Data Galeri Berhasil Di Hapus');
        else
            return redirect()->route('admin-galeri.index')->with('error','Data Galeri Gagal Di Hapus');
    }
}