<?php

namespace App\Core\Service;


use App\Models\Slider;
use Illuminate\Support\Facades\DB;

class SliderService
{

    public function all($limit=null,$wh=null)
    {
        $slider=Slider::orderBy('created_at','desc')->get();
        
        if($limit!=null)
            $slider=Slider::orderBy('created_at','desc')->limit($limit)->get();
     
        if($wh!=null)
            $slider=Slider::select('id','judul','gambar','kategori','keterangan')->where($wh)->orderBy('created_at','desc')->limit($limit)->get();
            
        return $slider;
    }

    public function show($id){
        $slider = Slider::where('id', $id)->first();
        return $slider;
    }

    public function simpan($data)
    {
        // return $data;
        $new=new Slider;
        $new->judul =  $data['judul'];
        $new->judul_slug =  str_slug($data['judul']);
        $new->gambar =  $data['gambar'];
        $new->flag =  $data['status'];
        $new->deskripsi =  $data['keterangan'];
        $c=$new->save();
        return $c;
    }
    public function edit($data,$id)
    {
        // return $data;
        $new=Slider::find($id);
        $new->judul =  $data['judul'];
        $new->judul_slug =  str_slug($data['judul']);
        $new->gambar =  $data['gambar'];
        $new->flag =  $data['status'];
        $new->deskripsi =  $data['keterangan'];
        $c=$new->save();
        return $c;
    }

    public function hapus($id)
    {
        return Slider::find($id)->delete();
    }
}