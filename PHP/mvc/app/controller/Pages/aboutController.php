<?php

namespace App\controller\Pages;

use App\utils\View;
use App\Controller\Pages\Page;
use App\Model\entity\Organization;

class aboutController extends Page
{
    /**
     * Renders the home page view with given title and content.
     * @return string the rendered page content
     */
    public static function actionAbout()
    {
        $org = new Organization();
        $content =  View::render("pages/about", [
            "name" => $org->name,
            "description" => $org->description
        ]);
        return parent::getPage("About", $content);
    }
}
