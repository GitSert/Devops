<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class beer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'nameOfFile', 'typeOfBeer', 'brewery', 'ABV'];
}
