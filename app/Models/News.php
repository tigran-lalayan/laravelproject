<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news'; // specify the table name, if it's different from the model name
    protected $fillable = ['title', 'cover_image', 'content', 'publishing_date']; // specify which columns can be mass-assigned
    public $timestamps = false; // if you don't have timestamps in your table

}

