<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Kategori extends Model
{
    use SoftDeletes;
    protected $table='kategori';
    protected $fillable=['kategori','deskripsi','flag','created_at','updated_at','deleted_at'];
}
