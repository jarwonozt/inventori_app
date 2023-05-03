<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RobertSeghedi\News\Models\Article;
use RobertSeghedi\News\Models\Category;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class MetaController extends Controller
{
    public function sitemap(){
        $post = Article::all();
        $categories = Category::all();

        $sitemap = Sitemap::create();
        foreach ($categories as $category) {
            $sitemap->add(Url::create('/'.$category->slug));
        }

        foreach ($post as $post) {
            $sitemap->add(Url::create("/post/{$post->slug}"));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

    }
}
