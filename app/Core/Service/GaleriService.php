<?php

namespace App\Core\Service;


use App\Models\Galeri;
use Illuminate\Support\Facades\DB;

class GaleriService
{

    public function all($limit=null,$wh=null)
    {
        $galeri=Galeri::orderBy('created_at','desc')->get();
        
        if($limit!=null)
            $galeri=Galeri::orderBy('created_at','desc')->limit($limit)->get();

        if($wh!=null)
            $galeri=Galeri::where($wh)->orderBy('created_at','desc')->limit($limit)->get();
        
        return $galeri;
    }

    public function show($id){
        $galeri = Galeri::where('id', $id)->first();
        return $galeri;
    }

    public function simpan($data)
    {
        // return $data;
        $new=new Galeri;
        $new->judul =  $data['judul'];
        $new->gambar =  $data['gambar'];
        $new->kategori =  $data['kategori'];
        $new->status =  $data['status'];
        $new->views =  0;
        $new->keterangan =  $data['keterangan'];
        $c=$new->save();
        return $c;
    }
    public function edit($data,$id)
    {
        // return $data;
        $new=Galeri::find($id);
        $new->judul =  $data['judul'];
        $new->gambar =  $data['gambar'];
        $new->kategori =  $data['kategori'];
        $new->status =  $data['status'];
        $new->views =  0;
        $new->keterangan =  $data['keterangan'];
        $c=$new->save();
        return $c;
    }

    public function hapus($id)
    {
        return Galeri::find($id)->delete();
    }
}