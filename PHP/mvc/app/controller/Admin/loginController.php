<?php

namespace App\controller\Admin;

use App\utils\View;
use App\Model\entity\User;
use App\controller\Admin\Page;
use App\Session\Admin\SessionAdmin;
use App\controller\Admin\AlertController;

class loginController extends Page
{

    public static  function actionLogin($request, $errorMessage = null)
    {
        $status = !is_null($errorMessage) ? AlertController::getError($errorMessage) : '';

        $content = View::render('admin/login', [
            'status' => $status
        ]);

        return parent::getPage('Login', $content);
    }

    public static function actionSetLogin($request)
    {
        $postVars = $request->getPostVars();
        $email = $postVars['mail'] ?? '';
        $pass = $postVars['pass'] ?? '';

        $obUser = User::getUserByEmail($email);
        if (!$obUser instanceof User) {
            return self::actionLogin($request, "Error e-mail ");
        }

        if (!password_verify($pass, $obUser->pass)) {
            return self::actionLogin($request, "Error  password");
        }

        SessionAdmin::Login($obUser);

        $request->getRouter()->redirect('/admin');
    }

    public static function actionSetLogout($request)
    {
        SessionAdmin::Logout();

        $request->getRouter()->redirect('/admin');
    }
}
