<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;
    protected $table='team';
    protected $fillable=['nama','email','telp','website','biografi','sosmed','flag','foto','created_at','updated_at','deleted_at'];
}
