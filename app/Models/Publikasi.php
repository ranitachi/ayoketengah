<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Publikasi extends Model
{
    use SoftDeletes;
    protected $table='publikasi';
    protected $fillable=['judul','kategori_id','flag','views','tag','deskripsi','cover','author_id','created_at','updated_at','deleted_at'];

    function author()
    {
        return $this->belongsTo('App\Models\Author','author_id');
    }
    
    function kategori()
    {
        return $this->belongsTo('App\Models\Kategori','kategori_id');
    }
}
