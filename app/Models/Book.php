<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    //
    use HasFactory;

    protected $fillable =['title','description','release_year','image','pdf_path','category_id','genre_id','author_id'];
}
