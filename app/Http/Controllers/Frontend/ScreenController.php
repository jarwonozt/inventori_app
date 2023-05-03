<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;
use Illuminate\Support\Arr;
use RobertSeghedi\News\Models\Article;
use Illuminate\Support\Str;
use RobertSeghedi\News\Models\News;

class ScreenController extends Controller
{
    public function post($slug){
        self::meta($slug);
        News::counter($slug);
        return view('frontend.articles.detail', [
            'data'      => PageController::article($slug),
            'popular'    => PagesController::popularArticle(),
            'recent'    => PagesController::recentArticles(4),

        ]);
    }

    public static function meta($slug){

        $data = PageController::article($slug);

        Meta::prependTitle($data->title)
                ->setContentType('text/html')
                ->setViewport('width=device-width, initial-scale=1')
                ->setDescription(Str::words(html_entity_decode($data->content), 15))
                ->setKeywords(explode(',', $data->tags))
                ->setRobots('nofollow,noindex')
                ->addMeta('author', [
                    'content' => $data->getUser->name,
                ]);

        $og = new \Butschster\Head\Packages\Entities\OpenGraphPackage('og_meta');

        $og->setType('website')
            ->setSiteName('Jarwonoztech')
            ->setTitle($data->title)
            ->setDescription(Str::words(html_entity_decode($data->content), 15))
            ->setUrl(config('app.url').'/post/'.$data->slug)
            ->setLocale('id_ID')
            ->addImage(asset('frontend').'/articles/thumbnail/'.$data->image);

        $og->toHtml();
        Meta::registerPackage($og);

        $card = new \Butschster\Head\Packages\Entities\TwitterCardPackage('twitter_meta');

        $card->setType('summary')
        ->setSite('@jarwonoztech')
        ->setTitle($data->title)
        ->setDescription(Str::words(html_entity_decode($data->content), 15))
        ->setCreator('@jarwonoztech')
        ->setImage(asset('frontend').'/articles/thumbnail/'.$data->image)
        ->addMeta('image:alt', $data->title);

        $card->toHtml();
        Meta::registerPackage($card);
    }
}
