<?php

namespace App\Session\Admin;

class SessionAdmin
{
    private static function initSession()
    {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function Login($obUser)
    {
        self::initSession();
        $_SESSION['admin']['user'] = [
            'id' => $obUser->id,
            'name' => $obUser->name,
            'mail' => $obUser->mail
        ];

        return true;
    }

    public static function isLogged(): bool
    {
        self::initSession();
        return isset($_SESSION['admin']['user']['id']);
    }

    public static function Logout(): bool
    {
        self::initSession();
        unset($_SESSION['admin']['user']);
        return true;
    }
}
