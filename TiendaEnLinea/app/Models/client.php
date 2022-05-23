<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;

      protected $fillable = [
    	  'name',
          'lastname',
          'phone',
          'email',
          'street',
          'nint',
          'next',
          'postalcode',
          'colony',
          'estate',
          'city',
          'betwenstreet',
          'reference',
    ];
    protected $table ='clients';
}
