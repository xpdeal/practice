<?php

namespace App\Model\entity;

use PDO;
use WilliamCosta\DatabaseManager\Database;

class Testimony
{
    public int $id;
    public string $name = '';
    public string $message = '';
    public string $data;

    public function cadastrar(): bool
    {
        $this->id = (new Database('depoimentos'))->insert([
            'nome' => $this->name,
            'mensagem' => $this->message
        ]);

        return true;
    }
    public static function getTestimonyById(int $id)
    {
        $stmt = self::getTestimonies('id = ' . $id);
        $testimonyData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$testimonyData) {
            return null;
        }

        $testimony = new self();
        $testimony->id = $testimonyData['id'];
        $testimony->name = $testimonyData['nome']; // Mapeamento manual
        $testimony->message = $testimonyData['mensagem']; // Mapeamento manual

        return $testimony;
    }

    public static function getTestimonies($where = null, $order = null, $limit = null, $fields = '*')
    {
        return (new Database('depoimentos'))->select($where, $order, $limit, $fields);
    }
}
