<?php
require_once('../config/main.php');
require_once('../config/nav.php');

use App\Entities\Modelo\Conta\ContaPoupanca;
use App\Entities\Modelo\Conta\ContaCorrente;
use App\Entities\Modelo\Conta\Titular;
use App\Entities\Modelo\CPF;
use App\Entities\Modelo\Endereco;
?>
<div class="d-flex justify-content-center">
    <h1>Depositar</h1>
</div>
<div class="container">
    <div class="col-md-6 offset-md-3">
        <form method='post' action="<?= $_SERVER['PHP_SELF'] ?>">
            <div class='form-group'>
                <?php
                if (isset($_POST['submit'])) {
                   
                    $obConta = new ContaPoupanca(
                        new Titular(
                            new CPF('123.456.789-10'),
                            $_POST['nome'],
                            new Endereco('Petrópolis', 'bairro Teste', 'Rua lá', '37')
                        )
                    );

                    
                    $obConta->deposita($_POST['deposito']);
                    
                    $saldo  = $obConta->recuperaSaldo();                    
                    $conta =  $obConta->recuperaNomeTitular();
                    echo "<div class='alert alert-secondary'>";
                    echo "This saldo: $saldo <br/>";
                    echo "Conta :$conta <br/></div>";
                } 
                ?> <label for=''>Conta: </label>
                <input type='number' class='form-control' value='' name='conta' placeholder='Informe sua conta' required>
            </div>
            <div class='form-group'>
                <label for=''>Nome: </label>
                <input type='text' class='form-control' value='' name='nome' placeholder='Informe seu nome' required>
            </div>

            <div class='form-group'>
                <label for=''>Valor </label>
                <input type='text' name='deposito' class='form-control' placeholder='Informe o valor a ser depositado' required>
            </div>

            <div class='form-group mt-3'>
                <button type='submit' name='submit' class='btn btn-success'>Guardar</button>
            </div>
    </div>
    </form>
</div>

</body>
<?php
require_once('../config/footer.php');
?>