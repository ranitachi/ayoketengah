<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\Service\KategoriService;
use Auth;
use Validator;

class KategoriBackendController extends Controller
{
    private $kategoriService;

    public function __construct()
    {
        $this->kategoriService = new KategoriService();
    }

    public function index()
    {
        $kategori=$this->kategoriService->all();
        return view('backend.content.kategori.index')
                ->with('galeri',$kategori);
    }
    public function form($id=-1)
    {
        $kategori=array();
        if($id!=-1)
            $kategori=$this->kategoriService->show($id);
        
        return view('backend.content.kategori.form')
                ->with('galeri',$kategori)
                ->with('id',$id);
    }

    public function proses(Request $request,$id)
    {
        Validator::make($request->all(), [
            'kategori' => 'required',
        ])->validate();

        $data=$request->all();
        $data['user']=Auth::user()->name;

        if($id==-1)
        {
            $save = $this->kategoriService->simpan($data);
            if($save)
                return redirect()->route('admin-kategori.index')->with('pesan','Data Kategori Berhasil Disimpan');
            else
                return redirect()->route('admin-kategori.index')->with('error','Data Kategori Gagal Disimpan');
        }
        else
        {
            $save = $this->kategoriService->edit($data,$id);
            if($save)
                return redirect()->route('admin-kategori.index')->with('pesan','Data Kategori Berhasil Di Edit');
            else
                return redirect()->route('admin-kategori.index')->with('error','Data Kategori Gagal Di Edit');
        }

        
    }

    public function json_kategori_by($jenis=null)
    {
        if($jenis==null)
            return [];
        else
            return $this->kategoriService->showkat($jenis);
    }

    public function json_kategori()
    {
        $kategori=$this->kategoriService->all();
        $data=array();
        $no=1;
        foreach($kategori as $idx=>$val)
        {
            $data[$idx][]=$no;
            $data[$idx][]=$val->kategori;
            $data[$idx][]=$val->keterangan;
            $data[$idx][]=($val->status==0 ? '<span class="label label-default">Draft</span>' : ($val->status==1 ? '<span class="label label-success"><i class="icon-checkmark"></i> Publish</span>': '<span class="label label-warning"><i class="icon-blocked"></i> Tidak Publish</span>'));
            $data[$idx][]='<ul class="icons-list">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="'.route('admin-kategori.form',$val->id).'"><i class="icon-pencil7"></i> Edit</a></li>
										<li><a href="'.route('admin-sub-kategori.form',[$val->id,-1]).'"><i class="icon-googleplus5"></i> Tambah Sub Kategori</a></li>
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

    public function destroy($id)
    {
        $c=$this->kategoriService->hapus($id);
        if($c)
            return redirect()->route('admin-kategori.index')->with('pesan','Data Kategori Berhasil Di Hapus');
        else
            return redirect()->route('admin-kategori.index')->with('error','Data Kategori Gagal Di Hapus');
    }

    
}
