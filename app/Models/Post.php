<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Salah\LaravelCustomFields\Traits\HasCustomFields;

class Post extends Model
{
    use HasCustomFields, HasFactory;

    protected $fillable = ['title', 'content'];
}
