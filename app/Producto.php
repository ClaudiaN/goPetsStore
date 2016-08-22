<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Producto extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_producto', 'descripcion','peso', 'medida','estado'];

}
