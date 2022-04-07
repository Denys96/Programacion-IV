<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nota extends Model
{
    protected $fillable = ['idNota','codigo','nombre','notas1','notas2','notas3','notas4','notas5'];
}
