<?php

namespace App\Entities\Modelo;

interface Autenticavel
{
    public function podeAutenticar(string $senha): bool;
}
