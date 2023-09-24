<?php

namespace App\Controller\Admin;

use App\utils\View;
use App\Http\Request;


class TestimoniesController extends Page
{
    public static function actionIndex(Request $request)
    {        
        $content = View::render('admin/modules/testimonies/index',[]);
        
        return parent::getPanel('admin-depoimentos', $content, 'testmonies');
    }



}