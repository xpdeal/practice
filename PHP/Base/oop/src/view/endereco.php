<?php
require_once('../config/main.php');
require_once('../config/nav.php');

use App\Entities\Modelo\Endereco;
use App\Entities\Service\Autenticador;

$autenticar = new Autenticador();

?>
<div class="d-flex justify-content-center">
    <h1>Login</h1>
</div>
<div class="container">
    <div class="col-md-6 offset-md-3">
        <form method='post' action="<?= $_SERVER['PHP_SELF'] ?>">
            <?php
                if (isset($_POST['submit'])) {
                    
                    $umEndereco = new Endereco($_POST["cidade"],$_POST["bairro"],$_POST["rua"],$_POST["numero"]);
                    $cid = $umEndereco->cidade;
                    $rua = $umEndereco->rua = "rua da maame";
                    echo "<div class='alert alert-secondary'>";
                    
                    echo "This address: $umEndereco <br/>";
                    echo " $cid <br/>";
                    echo " $rua <br/></div>";
                }
                ?> 
                <div class='form-group'>
                    <label for=''>Cidade: </label>
                <input type='text' class='form-control' value='' name='cidade' placeholder='Informe sua conta' required>
            </div>
            <div class='form-group'>
                <label for=''>Bairro: </label>
                <input type='text' class='form-control' value='' name='bairro' placeholder='Informe sua senha' required>
            </div>
            <div class='form-group'>
                <label for=''>Rua: </label>
                <input type='text' class='form-control' value='' name='rua' placeholder='Informe sua senha' required>
            </div>
            <div class='form-group'>
                <label for=''>Numero: </label>
                <input type='text' class='form-control' value='' name='numero' placeholder='Informe sua senha' required>
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