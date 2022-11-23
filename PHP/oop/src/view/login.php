<?php
require_once('../config/main.php');
require_once('../config/nav.php');

use App\Entities\Modelo\Funcionario\Diretor;
use App\Entities\Modelo\CPF;
use App\Entities\Service\Autenticador;

$autenticar = new Autenticador();

?>
<div class="d-flex justify-content-center">
    <h1>Login</h1>
</div>
<div class="container">
    <div class="col-md-6 offset-md-3">
        <form method='post' action="<?= $_SERVER['PHP_SELF'] ?>">
            <div class='form-group'>
                <?php
                if (isset($_POST['submit'])) {
                    $pass = trim($_POST['pass']);
                    $umDiretor = new Diretor( 
                        $_POST['conta'], 
                        new CPF('123.456.789-10'), 
                        1000                     
                    );
                                        
                    echo "<div class='alert alert-secondary'>";
                    $autenticar->login($umDiretor, $pass);
                    // echo "This saldo: $mesn <br/>";
                    echo "<br/></div>";
                }
                ?> <label for=''>Conta: </label>
                <input type='text' class='form-control' value='' name='conta' placeholder='Informe sua conta' required>
            </div>
            <div class='form-group'>
                <label for=''>Nome: </label>
                <input type='password' class='form-control' value='' name='pass' placeholder='Informe sua senha' required>
            </div>

            <div class='form-group mt-3'>
                <button type='submit' name='submit' class='btn btn-success'>Login</button>
            </div>
    </div>
    </form>
</div>

</body>
<?php
require_once('../config/footer.php');
?>