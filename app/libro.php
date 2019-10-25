<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class libro extends Model
{
    public $table='libros';
    public $primaryKey='id';
    public $timestamps=true;

}
