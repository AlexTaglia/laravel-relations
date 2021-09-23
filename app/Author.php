<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'name', 
        'surname', 
        'email',
    ];

    public function article() {
        return $this->hasMany(Article::class);
    }
}