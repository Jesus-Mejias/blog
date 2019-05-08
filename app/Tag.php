<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
     // (|:
    protected $fillable = [
    	'name',
    	'slug'
    ];

    // |~> Ralaciona las categorias con los post
    public function posts()
    {
    	return $this->belongsToMany(Post::class);
    }
    // ]>~
}
