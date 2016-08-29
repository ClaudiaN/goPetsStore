<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inventario extends Model
{
    protected $table = 'inventario';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['idDetalleProducto','stock','cantidad_minima','cantidad_maxima'];

    public function detalleProducto()
      {
        return $this->hasMany('App\detalleProducto', 'id', 'idDetalleProducto');
      } 
}
