<?php

namespace App\Entities\Modelo\Conta;

use App\Entities\Modelo\Pessoa;
use App\Entities\Modelo\CPF;
use App\Entities\Modelo\Endereco;

use App\Entities\Modelo\Autenticavel;

class Titular extends Pessoa implements Autenticavel
{
    private $endereco;

    public function __construct(CPF $cpf, string $nome, Endereco $endereco)
    {
        parent::__construct($nome, $cpf);
        $this->endereco = $endereco;
    }

    public function recuperaEndereco(): Endereco
    {
        return $this->endereco;
    }
    public function podeAutenticar(string $senha): bool
    {
        return $senha === '1234';
    }
}
