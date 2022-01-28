<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    // use HasFactory;
    public $fillable = ['nombre_user', 'correo', 'pass_1', 'pass_2'];
}
