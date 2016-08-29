<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalleProducto extends Model
{
    protected $table = 'detalleproducto';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['idProducto','idColor','idTalla','peso','precioVenta','precioEnvio','ruta'];

    public function producto()
      {
        //return $this->hasMany('App\Producto', 'id', 'idProducto');
        return $this->belongsTo('App\Producto', 'id', 'idProducto');
      } 

    public function color()
      {
        return $this->hasMany('App\colores', 'idColor', 'idColor');
      }

    public function talla()
      {
        return $this->hasMany('App\tallas', 'idTalla', 'idTalla');
      } 
}
