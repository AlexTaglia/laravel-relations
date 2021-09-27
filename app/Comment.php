<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'comment', 
        'article_id'

    ];

    //Nella tabella coomments ho la foreign key
    public function article() {
        return $this->belongsTo(Article::class);
    }
}
