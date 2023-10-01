<?php

namespace App\Model\entity;

use PDO;
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
    
    public function cadastrar(): bool
    {
        $this->id = (new Database('user'))->insert([
            'name' => $this->name,
            'mail' => $this->mail,
            'pass' => $this->pass
        ]);

        return true;
    }
    public static function getUserById(int $id)
    {
        $stmt = self::getUsers('id = ' . $id);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$userData) {
            return null;
        }

        $user = new self();        
        $user->id = $id; // Mapeamento manual
        $user->name = $userData['name']; // Mapeamento manual
        $user->mail = $userData['mail']; // Mapeamento manual
        $user->pass = $userData['pass']; // Mapeamento manual

        return $user;
    }

    public static function getUsers($where = null, $order = null, $limit = null, $fields = '*')
    {
        return (new Database('user'))->select($where, $order, $limit, $fields);
    }
    
    public function atualizar()
    {
        return (new Database('user'))->update('id = '.$this->id, [
            'name' => $this->name,
            'mail' => $this->mail,
            'pass' => $this->pass
        ]);
    }
    
    public function excluir()
    {
        return (new Database('user'))->delete('id = '.$this->id);
    }
}
