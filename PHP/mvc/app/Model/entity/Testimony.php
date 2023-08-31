<?php

namespace App\model\entity;

use WilliamCosta\DatabaseManager\Database;

class Testimony
{
    public int $id;
    public string $name;
    public string $message;
    public string $data;

    public function cadastrar(): bool
    {
        $this->id = (new Database('depoimentos'))->insert([
            'nome' => $this->name,
            'mensagem' => $this->message
        ]);
        
        return true;
    }
}
