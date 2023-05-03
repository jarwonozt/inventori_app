<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post\PostArticles;

class PostComment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = ['text', 'created_by', 'article_id', 'created_by_ip', 'created_by_browser', 'created_by_os'];

    protected $hidden = ['created_by_ip', 'created_by_os', 'created_by_browser'];

    protected $appends = ['article', 'author'];

    public function getUser(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getArticleAttribute(){
        return PostArticles::where('id', $this->article_id)->first();
    }

    public function getAuthorAttribute(){
        return User::where('id', $this->created_by)->first();
    }
}
