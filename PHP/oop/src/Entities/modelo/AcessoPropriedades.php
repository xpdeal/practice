<?php

namespace App\Entities\Modelo;

trait AcessoPropriedades
{
    public function __get(string $nomeAtributo)
    {
        $metodo = 'recupera' . ucfirst($nomeAtributo);
        return $this->$metodo();
    }

    public function __set($nomeAtributo, $value): void{
        $metodo = 'altera' . ucfirst($nomeAtributo);
        $this->$metodo($value);
    }
}
