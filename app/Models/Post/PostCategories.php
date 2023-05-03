<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PostCategories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name', 'slug', 'created_by', 'created_by_ip', 'created_by_browser', 'created_by_os'];

    protected $hidden = ['created_by_ip', 'created_by_browser', 'created_by_os'];

    public function getUser(){
        return $this->belongsTo(User::class, 'created_by');
    }
}
