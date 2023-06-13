<?php

namespace App\controller\page;

use App\utils\View;

class homeController
{
    public static function actionHome()
    {
        return View::render("pages/home");
    }
}
