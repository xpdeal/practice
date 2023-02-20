<?php
require '../config/main.php';

use ElvisLeite\RecordSetDatabase\Recordset as Rec;

$rs = new Rec(); $sql = "SELECT
e.employee_id AS id,
c.company_name AS company,
e.employee_name AS nome,
e.employee_email AS email,
e.employee_birthdate AS DATA
FROM
employee AS e
INNER JOIN company AS c
ON e.company_id = c.company_id";
?>

<body>

   <div class="d-flex justify-content-center">
      <h1>Teste</h1>
      <h2><?= $rs->getCountRows($sql);?></h1>
   </div>
   <div class="container">
      <form class="form-horizontal" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
         <?php
         if (isset($_POST['submit'])) {
            foreach ($_POST['todelete'] as $item) {
               echo '<div class="alert alert-primary" role="alert">';
               echo "Item delected is $item";
               $dados['employee_name']      = 'Elvis';
               echo '</div>';
               $rs->Delete('employee', "employee_id = $item");
            }
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

               $rs->Execute($sql);

               while ($rs->DataGenerator()) {
               ?>
                  <tr>
                     <td><?= $rs->fld("id"); ?></td>
                     <td><?= $rs->fld("nome"); ?></td>
                     <td><?= $rs->fld("company"); ?></td>
                     <td><?= $rs->fld("email"); ?></td>
                     <td><?= $rs->formFld("DATA"); ?></td>
                     <td>
                        <div class="form-check form-switch">
                           <input type="checkbox" class="form-check-input" name="todelete[]" role="switch" value="<?= $rs->fld("id"); ?>">
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