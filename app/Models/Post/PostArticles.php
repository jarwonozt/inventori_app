<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RobertSeghedi\News\Models\Category;
use App\Models\User;
use App\Models\Post\PostComment;

class PostArticles extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $guarded = [];

    protected $hidden = ['author_ip', 'author_browser', 'author_os'];

    public function getUser(){
        return $this->belongsTo(User::class, 'author');
    }

    public function getCategory(){
        return $this->belongsTo(Category::class, 'category');
    }

    public function comments(){
        return $this->hasMany(PostComment::class);
    }
}
