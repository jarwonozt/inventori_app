<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;

class HomeController extends Controller
{
    public function __construct()
    {
        Meta::prependTitle('Home')
                ->setContentType('text/html')
                ->setViewport('width=device-width, initial-scale=1')
                ->setDescription('Jarwonotech adalah layanan web khusus untuk berbagi tutorial trips dan trik seputar laravel')
                ->setKeywords(['jarwonozt', 'jarwonoztech', 'laravel', 'blog'])
                ->setRobots('nofollow,noindex')
                ->addMeta('author', [
                    'content' => 'jarwonozt',
                ]);

        $og = new \Butschster\Head\Packages\Entities\OpenGraphPackage('og_meta');

        $og->setType('website')
            ->setSiteName('Jarwonoztech')
            ->setTitle('Home Page')
            ->setDescription('Jarwonotech adalah layanan web khusus untuk berbagi tutorial trips dan trik seputar laravel')
            ->setUrl(config('app.url'))
            ->setLocale('id_ID')
            ->addImage(asset('frontend').'/assets/images/logo-2.png');

        $og->toHtml();
        Meta::registerPackage($og);

        $card = new \Butschster\Head\Packages\Entities\TwitterCardPackage('twitter_meta');

        $card->setType('summary')
        ->setSite('@jarwonoztech')
        ->setTitle('Jarwonoztech')
        ->setDescription('Jarwonotech adalah layanan web khusus untuk berbagi tutorial trips dan trik seputar laravel')
        ->setCreator('@jarwonoztech')
        ->setImage(asset('frontend').'/assets/images/logo-2.png')
        ->addMeta('image:alt', 'Picture of Jarwonoztech');

        $card->toHtml();
        Meta::registerPackage($card);
    }

    public function index(){

        // dd(PagesController::sliderArticles(4));
        return view('frontend.home', [
            'recent'    => PagesController::recentArticles(4),
            'slider'    => PagesController::sliderArticles(4),
            'headline'  => PagesController::headlineArticles(2),
        ]);
    }


}
