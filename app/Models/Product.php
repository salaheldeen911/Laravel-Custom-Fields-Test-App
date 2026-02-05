<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Salah\LaravelCustomFields\Traits\HasCustomFields;

class Product extends Model
{
    use HasCustomFields, HasFactory;

    protected $fillable = ['name', 'price', 'description'];
}
