<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Profil extends Model
{
    use SoftDeletes;
    protected $table='profil';
    protected $fillable=['kategori','deskripsi','flag','author_id','created_at','updated_at','deleted_at'];

    function author()
    {
        return $this->belongsTo('App\Models\Author','author_id');
    }
}
