<?php

namespace App\Core\Service;


use App\Models\Publikasi;
use Illuminate\Support\Facades\DB;

class BeritaService
{

    public function all($limit=null,$wh=null)
    {
        $berita=Publikasi::with('author')->with('kat')->orderBy('created_at','desc')->get();
        if($limit!=null)
            $berita=Publikasi::with('author')->with('kat')->orderBy('created_at','desc')->limit($limit)->get();

        if($wh!=null)
            $berita=Publikasi::where($wh)->with('author')->with('kat')->orderBy('created_at','desc')->limit($limit)->get();

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

        $new->judul = $data['judul'];
        $new->judul_slug = str_slug($data['judul']);
        $new->kategori_id = $data['kategori_id'];
        $new->flag = $data['flag'];
        $new->views = 0;
        $new->tag = '';
        $new->deskripsi = $data['deskripsi'];
        $new->cover = $data['cover'];
        $new->author_id = $data['author_id'];

        $c=$new->save();
        return $c;
    }
    public function edit($data,$id)
    {
        // return $data;
        $new=Publikasi::find($id);
        $new->judul = $data['judul'];
        $new->judul_slug = str_slug($data['judul']);
        $new->kategori_id = $data['kategori_id'];
        $new->flag = $data['flag'];
        $new->views = 0;
        $new->tag = '';
        $new->deskripsi = $data['deskripsi'];
        $new->cover = $data['cover'];
        $new->author_id = $data['author_id'];
        $c=$new->save();
        return $c;
    }

    public function hapus($id)
    {
        return Publikasi::find($id)->delete();
    }

    public function beritapaginate($page)
    {
        return Publikasi::paginate($page);
    }
}