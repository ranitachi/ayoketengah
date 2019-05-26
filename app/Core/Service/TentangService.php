<?php

namespace App\Core\Service;


use App\Models\Profil;
use Illuminate\Support\Facades\DB;
use Auth;
class TentangService
{
    public function all()
    {
        $data=Profil::all();
        $d=array();
        foreach($data as $k)
        {
            $d[str_slug($k->kategori)]=$k;
        }

        return $d;
    }
    
    public function all_select()
    {
        $data=Profil::select('id','kategori','kategori_slug','deskripsi','created_at')->get();
        $d=array();
        foreach($data as $k)
        {
            $d[str_slug($k->kategori)]=$k;
        }

        return $d;
    }

    public function byId($id)
    {
        return Profil::find($id);
    }
    
    public function byKategori($kat)
    {
        return Profil::where('kategori_slug',$kat)->first();
    }

    public function simpan($data)
    {
        $new = new Profil;
        $new->kategori =  $data['kategori'];
        $new->kategori_slug =  str_slug($data['kategori']);
        $new->deskripsi =  $data['isi'];
        $new->author_id =  Auth::user()->id;
        // $new->views =  0;
        $new->flag =  1;
        $c=$new->save();
        return $c;
    }
    public function edit($data,$id)
    {
        $new = Profil::find($id);
        $new->kategori =  $data['kategori'];
        $new->kategori_slug =  str_slug($data['kategori']);
        $new->deskripsi =  $data['isi'];
        $new->author_id =  Auth::user()->id;
        // $new->views =  0;
        $new->flag =  1;
        $c=$new->save();
        return $c;
    }

    public function hapus($id)
    {
        return Profil::find($id)->delete();
    }
}