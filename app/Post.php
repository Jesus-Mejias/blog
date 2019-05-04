<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // (|:
    protected $fillable = [
    	'user_id',
    	'category_id',
    	'name',
    	'slug',
    	'excerp',
    	'body',
    	'status',
    	'file'
    ];

    // |~> Relaciona un post con un usuario
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    // |~> Relaciona un post con una categoria
    public function user()
    {
    	return $this->belongsTo(Category::class);
    }

    // |~> Ralaciona los post con los tags
    public function tags()
    {
    	return $this->belongsToMany(Tag::class);
    }
    // ]>~
}
