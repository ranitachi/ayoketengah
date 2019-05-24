<?php

namespace App\Core\Service;


use App\Models\Kontak;
use Illuminate\Support\Facades\DB;

class KontakService
{
    public function all()
    {
        return Kontak::orderBy('nama')->get();
    }
    public function all_select()
    {
        return Kontak::select('nama','value')->orderBy('nama')->get();
    }

    public function simpan($data)
    {
        foreach($data['value'] as $k=>$v)
        {
            $upd=Kontak::find($k);
            $upd->nama=$data['nama'][$k];
            $upd->value=$v;
            $upd->save();
        }
        return true;
    }

    public function hapus($id)
    {
        return Kontak::find($id)->delete();
    }
}