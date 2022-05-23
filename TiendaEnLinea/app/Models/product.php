<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
    	'name',
    	'code',
    	'price',
    	'stock',
    	'size',
        'description',
    	'image',
    	'id_category',
    ];

    protected $table = 'products';
}
