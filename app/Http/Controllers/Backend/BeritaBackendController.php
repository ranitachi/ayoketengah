<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Core\Service\BeritaService;
use Auth;
use Validator;

class BeritaBackendController extends Controller
{
    private $beritaService;

    public function __construct()
    {
        $this->beritaService = new BeritaService();
    }

    public function json_berita_paginate($page)
    {
        return $this->beritaService->beritapaginate($page);
    }

    public function index()
    {
        $berita=$this->beritaService->all();
        return view('backend.content.berita.index')
                ->with('berita',$berita);
    }
    public function form($id=-1)
    {
        $berita=array();
        if($id!=-1)
            $berita=$this->beritaService->show($id);
        
        return view('backend.content.berita.form')
                ->with('berita',$berita)
                ->with('id',$id);
    }

    public function proses(Request $request,$id)
    {
        Validator::make($request->all(), [
            'judul' => 'required',
            'status' => 'required',
            'isi' => 'required'
        ])->validate();

        $data=$request->all();
        $data['user']=Auth::user()->name;

        if($id==-1)
        {
            $save = $this->beritaService->simpan($data);
            if($save)
                return redirect()->route('admin-berita.index')->with('pesan','Data Berita Berhasil Disimpan');
            else
                return redirect()->route('admin-berita.index')->with('error','Data Berita Gagal Disimpan');
        }
        else
        {
            $save = $this->beritaService->edit($data,$id);
            if($save)
                return redirect()->route('admin-berita.index')->with('pesan','Data Berita Berhasil Di Edit');
            else
                return redirect()->route('admin-berita.index')->with('error','Data Berita Gagal Di Edit');
        }

        
    }

    public function json_berita($limit=null,$st=null)
    {
        if($st!=null)
        {
            $wh=['status'=>1];
            return $this->beritaService->all($limit,$wh);
        }
        else
        {
            $berita=$this->beritaService->all();
            $data=array();
            $no=1;
            foreach($berita as $idx=>$val)
            {
                $data[$idx][]=$no;
                $data[$idx][]=$val->judul;
                $data[$idx][]=$val->author;
                $data[$idx][]='<span class="label label-primary">'.$val->views.'</span>';
                $data[$idx][]='<div style="width:150px"><i class="icon-calendar"></i>&nbsp;'.date('d/m/Y H:i:s',strtotime($val->created_at)).'</div>';
                $data[$idx][]=($val->status==0 ? '<span class="label label-default">Draft</span>' : ($val->status==1 ? '<span class="label label-success"><i class="icon-checkmark"></i> Publish</span>': '<span class="label label-warning"><i class="icon-blocked"></i> Tidak Publish</span>'));
                $data[$idx][]='<ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a href="'.route('admin-berita.form',$val->id).'"><i class="icon-pencil7"></i> Edit</a></li>
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
        $c=$this->beritaService->hapus($id);
        if($c)
            return redirect()->route('admin-berita.index')->with('pesan','Data Berita Berhasil Di Hapus');
        else
            return redirect()->route('admin-berita.index')->with('error','Data Berita Gagal Di Hapus');
    }

    public function json_addview(Request $request)
    {
        $id=$request->id;
        $berita=$this->beritaService->show($id);
        $berita->views = $berita->views +1;
        $berita->save();
        echo $berita->judul_slug;
    }
}