    <?php
    require_once '../config/main.php';
    require_once '../config/nav.php';

    use App\Entities\Modelo\Conta\ContaPoupanca;
    use App\Entities\Modelo\Conta\ContaCorrente;
    use App\Entities\Modelo\Conta\Titular;
    use App\Entities\Modelo\CPF;
    use App\Entities\Modelo\Endereco;
    ?>
    <div class="d-flex justify-content-center">
        <h1>Testar</h1>
    </div>
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <form method='post' action="<?= $_SERVER['PHP_SELF'] ?>">
                <div class='form-group'>
                    <?php
                    $conta1 = new ContaCorrente(
                        new Titular(
                            new CPF('123.456.789-10'),
                            'Vinicius Dias',
                            new Endereco('Petrópolis', 'bairro Teste', 'Rua lá', '37')
                        )
                    );
                    $conta1->deposita(500);
                    $conta1->saca(100);

                    $conta = new ContaPoupanca(
                        new Titular(
                            new CPF('123.456.789-10'),
                            'Vinicius Dias',
                            new Endereco('Petrópolis', 'bairro Teste', 'Rua lá', '37')
                        )
                    );
                    $conta->deposita(500);
                    $conta->saca(100);

                    echo "Conta Corrente = ".$conta1->recuperaSaldo()."<br>";
                    echo "Conta Poupança = ".$conta->recuperaSaldo();
                    ?>
                </div>
            </form>
        </div>
    </div>

    </body>
    <?php
    require_once('../config/footer.php');
    ?>