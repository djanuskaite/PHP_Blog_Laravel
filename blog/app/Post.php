<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'category', 'body', 'img']; // jei nebus fillable, neleis irasyti i duombaze
}
