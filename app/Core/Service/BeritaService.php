<?php

namespace App\Core\Service;


use App\Models\Publikasi;
use Illuminate\Support\Facades\DB;

class BeritaService
{

    public function all($limit=null,$wh=null)
    {
        $berita=Publikasi::orderBy('created_at','desc')->get();
        if($limit!=null)
            $berita=Publikasi::orderBy('created_at','desc')->limit($limit)->get();

        if($wh!=null)
            $berita=Publikasi::where($wh)->orderBy('created_at','desc')->limit($limit)->get();

        return $berita;
    }

    public function show($id){
        $berita = Publikasi::where('id', $id)->first();
        return $berita;
    }

    public function simpan($data)
    {
        // return $data;
        $new=new Publikasi;
        $new->judul =  $data['judul'];
        $new->author =  $data['user'];
        $new->judul_slug =  str_slug($data['judul']);
        $new->status =  $data['status'];
        $new->gambar =  $data['gambar'];
        $new->isi =  $data['isi'];
        $c=$new->save();
        return $c;
    }
    public function edit($data,$id)
    {
        // return $data;
        $new=Berita::find($id);
        $new->judul =  $data['judul'];
        $new->author =  $data['user'];
        $new->judul_slug =  str_slug($data['judul']);
        $new->status =  $data['status'];
        $new->gambar =  $data['gambar'];
        $new->isi =  $data['isi'];
        $c=$new->save();
        return $c;
    }

    public function hapus($id)
    {
        return Berita::find($id)->delete();
    }

    public function beritapaginate($page)
    {
        return Berita::paginate($page);
    }
}