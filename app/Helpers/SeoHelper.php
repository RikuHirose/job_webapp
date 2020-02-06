<?php
namespace App\Helpers;

use SEOMeta;
use OpenGraph;
use Twitter;

class SeoHelper
{

    public function __construct(
    ) {
    }

    public static function setIndexSeo()
    {
        $title       = trans('seo.index.title');

        $description = trans('seo.index.description');

        $keyWords = trans('seo.index.keywords');

        return self::setSeoText($title, $keyWords, $description);
    }

    // job
    public static function setJobShowSeo($model)
    {
        $appName      = config('app.name');
        $title        = $model->title. '  |  ' .trans('seo.users.show.title');
        $description  = $model->description;
        $keyWords     = trans('seo.index.keywords');

        $imageTwitter  = config('app.url').'images/logo-ogp.jpg';
        $imageFacebook = config('app.url').'images/logo-ogp.jpg';

        return self::setSeo($title, $keyWords, $description, $imageFacebook, $imageTwitter);
    }

    // user
    public static function setUserFavoriteSeo()
    {
        $appName      = config('app.name');
        $title        = '気になるした求人一覧  |  ' .trans('seo.users.show.title');
        $description  = trans('seo.index.description');
        $keyWords     = trans('seo.index.keywords');

        $imageTwitter  = config('app.url').'images/logo-ogp.jpg';
        $imageFacebook = config('app.url').'images/logo-ogp.jpg';

        return self::setSeo($title, $keyWords, $description, $imageFacebook, $imageTwitter);
    }

    public static function setUserApplicationSeo()
    {
        $appName      = config('app.name');
        $title        = '応募した求人一覧  |  ' .trans('seo.users.show.title');
        $description  = trans('seo.index.description');
        $keyWords     = trans('seo.index.keywords');

        $imageTwitter  = config('app.url').'images/logo-ogp.jpg';
        $imageFacebook = config('app.url').'images/logo-ogp.jpg';

        return self::setSeo($title, $keyWords, $description, $imageFacebook, $imageTwitter);
    }

    public function setDefaultSeo()
    {
        $appName     = config('app.name');
        $title       = trans('seo.index.title');
        $description = trans('seo.index.description');

        $keyWords        = trans('seo.index.keywords');
        $imageTwitter    = config('app.url').'/images/logo-ogp.jpg';
        $imageFacebook   = config('app.url').'/images/logo-ogp.jpg';
        $twitterCardType = 'summary_large_image';

        empty($twitterCardType) ?: \Twitter::setType($twitterCardType);

        empty($title) ?: \SEOMeta::setTitle($title, false);
        empty($title) ?: \OpenGraph::setTitle($title);
        empty($title) ?: \Twitter::setTitle($title);

        empty($keyWords) ?: \SEOMeta::setKeywords($keyWords);

        empty($description) ?: \SEOMeta::setDescription($description);
        empty($description) ?: \OpenGraph::setDescription($description);
        empty($description) ?: \Twitter::setDescription($description);

        empty($imageFacebook) ?: \OpenGraph::addImage($imageFacebook);
        empty($imageTwitter) ?: \Twitter::setImage($imageTwitter);
    }

    public static function setSeo($title, $keyWords, $description, $imageFacebook, $imageTwitter)
    {
        self::setSeoText($title, $keyWords, $description);
        empty($imageFacebook) ?: \OpenGraph::addImage($imageFacebook);
        empty($imageTwitter) ?: \Twitter::setImage($imageTwitter);
    }

    public static function setSeoText($title, $keyWords, $description)
    {
        empty($title) ?: \SEOMeta::setTitle($title, false);
        empty($title) ?: \OpenGraph::setTitle($title);
        empty($title) ?: \Twitter::setTitle($title);

        empty($keyWords) ?: \SEOMeta::setKeywords($keyWords);

        empty($description) ?: \SEOMeta::setDescription($description);
        empty($description) ?: \OpenGraph::setDescription($description);
        empty($description) ?: \Twitter::setDescription($description);
    }
}
