<?php
require '../config/main.php';

use ElvisLeite\RecordSetDatabase\Recordset as Rec;

$rs = new Rec();

$sql = "SELECT
e.employee_id AS id,
c.company_name AS company,
e.employee_name AS nome,
e.employee_email AS email,
e.employee_birthdate AS DATA
FROM
employee AS e
INNER JOIN company AS c
ON e.company_id = c.company_id
LIMIT 3";
?>

<body>

   <div class="d-flex justify-content-center">
      <h2>Test Execute and DataGenerator </h2>
      <h3><?=$var = $rs->getField("company_id","employee","employee_id = 4");?> </h3>
   </div>
   <div class="container">
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
            $rs->Select("employee","company_id =1","employee_email",3);
           

            while ($rs->DataGenerator()) {
            ?>
               <tr>
                  <td><?= $rs->fld("employee_id"); ?></td>
                  <td><?= $rs->fld("employee_name"); ?></td>
                  <td><?= $rs->fld("company_id"); ?></td>
                  <td><?= $rs->fld("employee_email"); ?></td>
                  <td><?= $rs->formFld("employee_birthdate"); ?></td>
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
      <div class="d-flex justify-content-center">
         <h2>Teste getCountRows</h2>
      </div>

      <div class="conteiner">
         <div class="d-flex justify-content-center">
            <span><?= $rs->getCountRows($sql); ?></span>
            <span><?= $rs->formMonthFld(date("d/m/y")); ?></span>
            <br />
            <span><?=$var = $rs->getField("company_id","employee","employee_id = 4");?></span>
         </div>
      </div>
   </div>
   <div>
  
   </div>

   </div>
</body>
<?php
require '../config/footer.php';
?>