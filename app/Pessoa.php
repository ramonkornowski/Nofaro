<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pessoa extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome','email','ddd','telefone'];

    protected $dates = ['inserted_at','updated_at','deleted_at'];
}
