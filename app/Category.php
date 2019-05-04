<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // (|:
    protected $fillable = [
    	'name',
    	'slug',
    	'body'
    ];

    // |~> Ralaciona las categorias con los post
    public function posts()
    {
    	return $this->hasMany(Post::class);
    }
    // ]>~
}
