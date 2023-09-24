<?php

namespace App\controller\Admin;

use App\HTTP\Request;
use App\utils\View;

class HomeController extends Page
{
    public static function actionHome(Request $request)
    {
        $content = View::render('admin/modules/home/index',[]);
        
        return parent::getPanel('home-login', $content, 'home');
    }
}
