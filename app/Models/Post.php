<?php

namespace App\Models;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'user_id', 'category_id', 'comment_count', 'view_count', 'last_comment_user_id', 'order', 'excerpt', 'slug'];
}
