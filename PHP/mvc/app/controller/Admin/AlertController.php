<?php

namespace App\controller\Admin;

use App\utils\View;

class AlertController
{

    public static function getSucess($message)
    {
        return View::render('admin/alert/status' , [
            'tipo' => 'success',
            'message' => $message
        ]);
    }
    
    public static function getError($message)
    {
        return View::render('admin/alert/status' , [
            'tipo' => 'danger',
            'message' => $message
        ]);
    }
}
