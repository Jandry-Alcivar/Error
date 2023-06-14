<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipopersona extends Model
{
   protected $table='tipopersonas';
   public $timestamps=false;
   protected $fillable=['tipo'];
}
