<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'category', 'img', 'user_id']; // jei nebus fillable, neleis irasyti i duombaze
}
