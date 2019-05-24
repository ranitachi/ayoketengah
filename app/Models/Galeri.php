<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Galeri extends Model
{
    use SoftDeletes;
    protected $table='galeri';
    protected $fillable=['judul','deskripsi','flag','tag','gambar','views','author_id','kategori','created_at','updated_at','deleted_at'];

    function author()
    {
        return $this->belongsTo('App\Models\Author','author_id');
    }
}
