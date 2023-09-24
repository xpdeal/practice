<?php

namespace App\Model\entity;

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

    public static function getTestimonies($where = null, $order = null, $limit = null, $fields = '*')
    {
        return (new Database('depoimentos'))->select($where, $order, $limit, $fields);
    }
}
