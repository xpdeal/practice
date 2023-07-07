<?php
require_once('../config/main.php');
require_once('../config/nav.php');

use App\Entities\Service\ControladorDeBonificacao;
use App\Entities\Modelo\CPF;
use App\Entities\Modelo\Funcionario\{Diretor, Gerente, Desenvolvedor, EditorVideo};
?>
<div class="d-flex justify-content-center">
    <h1>Bonificações</h1>
</div>
<div class="container">
    <div class="col-md-6 offset-md-3">
        <form method='post' action="<?= $_SERVER['PHP_SELF'] ?>">
            <div class='form-group'>
                <?php

                $umFuncionario = new Desenvolvedor(
                    'Vinicius Dias',
                    new CPF('123.456.789-10'),
                    1000
                );

                $umFuncionario->sobeDeNivel();

                $umaFuncionaria = new Gerente(
                    'Patricia',
                    new CPF('987.654.321-10'),
                    3000
                );

                $umDiretor = new Diretor(
                    'Ana Paula',
                    new CPF('123.951.789-11'),                   
                    5000
                );

                $umEditor = new EditorVideo(
                    'Ana Paula',
                    new CPF('123.951.789-11'),                   
                    5000
                );

                $controlador = new ControladorDeBonificacao();
                $controlador->adicionaBonificacaoDe($umFuncionario);
                $controlador->adicionaBonificacaoDe($umaFuncionaria);
                $controlador->adicionaBonificacaoDe($umDiretor);

                echo $controlador->recuperaTotal();
                ?>
            </div>
        </form>
    </div>

    </body>
    <?php
    require_once('../config/footer.php');
    ?>