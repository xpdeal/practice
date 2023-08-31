<?php

namespace App\controller\Pages;

use App\utils\View;
use App\Controller\Pages\Page;
use App\model\entity\Testimony;

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
    
    public static function actionInsert($request): string
    {
        $postVars = $request->getPostVars();
        $testmony =  new Testimony;
        $testmony->name = $postVars['nome'];
        $testmony->message = $postVars['mensagem'];
        $testmony->cadastrar();
        // $testmony->name = $postVars['nome'];
        return self::actionTestimonies();
    }
}
