<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class colores extends Model
{
    protected $table = 'colores';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idColor', 'descriColor','RGB',
    ];
}
