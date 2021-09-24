<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [
        'title',
        'content',
        'img',
        'author_id'
    ];
    
    // Dove c'è la foreign key "belongsTo"
    public function author() {
        return $this->belongsTo(Author::class);
    }

    public function tag() {
        return $this->belongsToMany(Tag::class);
    }
}
