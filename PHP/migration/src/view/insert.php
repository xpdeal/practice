<?php
require '../config/main.php';

use ElvisLeite\RecordSetDatabase\Recordset as Rec;

$rs = new Rec();
?>

<body>

    <div class="d-flex justify-content-center">
        <h1>Teste</h1>
    </div>
    <div class="container">
        <form class="form-horizontal" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
            <?php
            if (isset($_POST['submit'])) {

                $cod = Rec::setAutoCode("employee_id", "employee");
                $dados['employee_id']   = $cod;
                $dados['company_id']    = 1;
                $dados['employee_name'] = 'Elvis leite';
                $dados['employee_email'] = 'elvis@gmail.com';                
                Rec::Insert($dados, 'employee');
                echo '<div class="alert alert-primary" role="alert">';                
                echo '</div>';
            }

            ?>
            <table class="table table-striped" id="example">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>E-mail</th>
                    <th>BirthDate</th>
                    <th>Action</th>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT
                     e.employee_id AS id,
                     c.company_name AS company,
                     e.employee_name AS nome,
                     e.employee_email AS email,
                     e.employee_birthdate AS DATA
                 FROM
                     employee AS e
                 INNER JOIN company AS c
                 ON e.company_id = c.company_id";

                    Rec::Execute($sql);

                    while (Rec::DataGenerator()) {
                    ?>
                        <tr>
                            <td><?= Rec::fld("id"); ?></td>
                            <td><?= Rec::fld("nome"); ?></td>
                            <td><?= Rec::fld("company"); ?></td>
                            <td><?= Rec::fld("email"); ?></td>
                            <td><?= Rec::formFld("DATA"); ?></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" name="todelete[]" role="switch" value="<?= Rec::fld("id"); ?>">
                                </div>
                            </td>
                        </tr>
                    <?php
                    };
                    ?>
                </tbody>
            </table>
            <div class="container">
                <button type="submit" class="btn btn-danger" name="submit">Deletar</button>
            </div>
        </form>
    </div>
</body>
<?php
require '../config/footer.php';
?>