<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Core\Service\TentangService;
use Auth;
use Validator;

class TentangBackendController extends Controller
{
    private $tentangService;

    public function __construct()
    {
        $this->tentangService = new TentangService();
    }

    public function index($kat='about-us')
    {
        $kt=tentang();
        $katg=(isset($kt[$kat]) ? $kt[$kat] : 'About US');
        $data=$this->tentangService->byKategori($kat);
        // $det=$data->toArray();
        return view('backend.content.tentang.index')
                ->with('kat',$katg)
                ->with('kat_slug',$kat)
                ->with('data',$data);
    }

    public function form($kat='about-us')
    {
        $kt=tentang();
        $id=-1;
        $katg=(isset($kt[$kat]) ? $kt[$kat] : 'About US');
        $data=$this->tentangService->byKategori($kat);
        
        if($data)
            $id=$data->id;

        return view('backend.content.tentang.form')
                ->with('id',$id)
                ->with('kat',$kat)
                ->with('katg',$katg)
                ->with('data',$data);
    }

    public function proses(Request $request,$kat)
    {
        Validator::make($request->all(), [
                'kategori' => 'required',
                'isi' => 'required',
            ])->validate();

        $data=$request->all();

        $save=$this->tentangService->byKategori($data);
        if(!$save)
        {
            $save = $this->tentangService->simpan($data);
            if($save)
                return redirect('tentang/'.$kat)->with('pesan','Data '.$data['kategori'].' Berhasil Disimpan');
            else
                return redirect('tentang/'.$kat)->with('error','Data '.$data['kategori'].' Gagal Disimpan');
        }
        else
        {
            $save = $this->userService->edit($data,$id);
            if($save)
                return redirect('tentang/'.$kat)->with('pesan','Data '.$data['kategori'].' Berhasil Di Edit');
            else
                return redirect('tentang/'.$kat)->with('error','Data '.$data['kategori'].' Gagal Di Edit');
        }
    }

    public function json_profil($kat='about-us')
    {
        if($kat=='all')
            $data=$this->tentangService->all_select();
        else
            $data=$this->tentangService->byKategori($kat);

        return $data;
    }
}
