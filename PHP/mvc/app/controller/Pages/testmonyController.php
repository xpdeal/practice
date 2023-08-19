<?php

namespace App\controller\Pages;

use App\utils\View;
use App\Controller\Pages\Page;

class testmonyController extends Page
{
    /**
     * Renders the home page view with given title and content.
     * @return string the rendered page content
     */
    public static function actionTestimonies()
    {
        $content =  View::render("pages/testimonies", [
            
        ]);
        return parent::getPage("Testimony", $content);
    }
}
