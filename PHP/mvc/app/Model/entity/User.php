<?php

namespace App\Model\entity;

use WilliamCosta\DatabaseManager\Database;

class User
{
    public int $id;
    public string $name;
    public string $mail;
    public string $pass;
   
    public static function getUserByEmail($mail)
    {
        return (new Database('user'))->select('mail = "'.$mail.'"')->fetchObject(self::class);
    }
}
