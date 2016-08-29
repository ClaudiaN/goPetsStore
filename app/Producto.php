<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Producto extends Authenticatable
{
    protected $table = 'productos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion','estado'];

      public function detalleProducto()
      {
        return $this->hasMany('App\Producto', 'id', 'idProducto');
      } 

}
