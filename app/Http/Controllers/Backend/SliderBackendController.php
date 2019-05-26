<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\Service\SliderService;
use Auth;
use Validator;

class SliderBackendController extends Controller
{
    private $sliderService;

    public function __construct()
    {
        $this->sliderService = new SliderService();
    }

    public function index()
    {
        $berita=$this->sliderService->all();
        return view('backend.content.slider.index')
                ->with('berita',$berita);
    }
    public function form($id=-1)
    {
        $berita=array();
        if($id!=-1)
            $berita=$this->sliderService->show($id);
        
        return view('backend.content.slider.form')
                ->with('berita',$berita)
                ->with('id',$id);
    }

    public function proses(Request $request,$id)
    {
        Validator::make($request->all(), [
            'judul' => 'required',
            'gambar' => 'required',
            'status' => 'required',
            'keterangan' => 'required'
        ])->validate();

        $data=$request->all();
        $data['user']=Auth::user()->name;

        if($id==-1)
        {
            $save = $this->sliderService->simpan($data);
            if($save)
                return redirect()->route('admin-slider.index')->with('pesan','Data Slider Berhasil Disimpan');
            else
                return redirect()->route('admin-slider.index')->with('error','Data Slider Gagal Disimpan');
        }
        else
        {
            $save = $this->sliderService->edit($data,$id);
            if($save)
                return redirect()->route('admin-slider.index')->with('pesan','Data Slider Berhasil Di Edit');
            else
                return redirect()->route('admin-slider.index')->with('error','Data Slider Gagal Di Edit');
        }

        
    }

    public function json_slider($limit=null,$st=null)
    {
        if($st!=null)
        {
            $wh=['status'=>1];
            return $this->sliderService->all($limit,$wh);
        }
        else
        {
            $berita=$this->sliderService->all($limit);
            $data=array();
            $no=1;
            foreach($berita as $idx=>$val)
            {
                $data[$idx][]=$no;
                $data[$idx][]='<img src="'.asset($val->gambar).'" style="width:150px;">';
                $data[$idx][]=$val->judul;
                $data[$idx][]='<div style="width:150px"><i class="icon-calendar"></i>&nbsp;'.date('d/m/Y H:i:s',strtotime($val->created_at)).'</div>';
                $data[$idx][]=($val->flag==0 ? '<span class="label label-default">Draft</span>' : ($val->flag==1 ? '<span class="label label-success"><i class="icon-checkmark"></i> Publish</span>': '<span class="label label-warning"><i class="icon-blocked"></i> Tidak Publish</span>'));
                $data[$idx][]='<ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="'.route('admin-slider.form',$val->id).'"><i class="icon-pencil7"></i> Edit</a></li>
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
        $c=$this->sliderService->hapus($id);
        if($c)
            return redirect()->route('admin-slider.index')->with('pesan','Data Slider Berhasil Di Hapus');
        else
            return redirect()->route('admin-slider.index')->with('error','Data Slider Gagal Di Hapus');
    }
}