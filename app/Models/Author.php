<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use SoftDeletes;
    protected $table='author';
    protected $fillable=['nama','singkatan','foto','email','alamat','telp','sosmed','biografi','flag','website','created_at','updated_at','deleted_at'];
}
