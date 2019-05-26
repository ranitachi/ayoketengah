<?php

namespace App\Core\Service;


use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class KategoriService
{

    public function all($limit=null)
    {
        $kategori=Kategori::orderBy('created_at','desc')->get();
        
        if($limit!=null)
            $kategori=Kategori::orderBy('created_at','desc')->limit($limit)->get();
        
        return $kategori;
    }

    public function show($id){
        $kategori = Kategori::where('id', $id)->first();
        return $kategori;
    }
    
    public function showkat($by){
        $kategori = Kategori::select('id','kategori')->where('status',1)->get();
        $kat=array();
        foreach($kategori as $kt)
        {
            $kat[str_slug($kt->kategori)]=$kt;
        }

        if($by=='all')
            return $kat;
        else
            return $kat[$by];
    }

    public function simpan($data)
    {
        // return $data;
        $new=new Kategori;
        $new->kategori =  $data['kategori'];
        $new->flag =  $data['status'];
        $new->deskripsi =  $data['keterangan'];
        $c=$new->save();
        return $c;
    }
    public function edit($data,$id)
    {
        // return $data;
        $new=Kategori::find($id);
        $new->kategori =  $data['kategori'];
        $new->flag =  $data['status'];
        $new->deskripsi =  $data['keterangan'];
        $c=$new->save();
        return $c;
    }

    public function hapus($id)
    {
        return Kategori::find($id)->delete();
    }
}