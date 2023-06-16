<?php

namespace App\controller\page;

use App\utils\View;
use App\controller\page\Page;

class homeController extends Page
{
    /**
     * Renders the home page view with given title and content.
     * @return string the rendered page content
     */
    public static function actionHome()
    {
        $content =  View::render("pages/home", [
            "name" => "Elvis",
            "job" => "Dev"
        ]);
        return parent::getPage("Titulo", $content);
    }
}
