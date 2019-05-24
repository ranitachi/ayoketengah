<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Slider extends Model
{
    use SoftDeletes;
    protected $table='slider';
    protected $fillable=['judul','deskripsi','flag','gambar','created_at','updated_at','deleted_at'];
    
}
