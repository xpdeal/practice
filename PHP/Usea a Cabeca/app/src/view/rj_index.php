<?php
require_once '../model/conf.php';
require_once('../config/menu.php');
require_once '../model/conf.php';
require_once '../entities/Search.php';
$ob = new Search();
?>

<body>
    <div class="d-flex justify-content-center">
        <h1><strong>Risky</strong> Jobs</h1>
    </div>
    <div class="d-flex justify-content-center">
        <p class="h4">Dangeri Your dream job is out there.<br>
            Do you have the guts to go find it?
        </p>
    </div>

    <div class="d-flex justify-content-center">
        <div class="container">
            <div class="col-md-6 offset-md-3">
                <br />
                <p class="h3 d-flex justify-content-center"><strong>RiskY Jobs - Search</strong></p>
                <form id="form-remove" method="get" action="<?= $_SERVER['PHP_SELF']; ?>" class="row g-3">
                    <div class="d-flex justify-content-center">
                        <div class="col-auto">
                            <label for="search" class="visually-hidden">Find your risky job:</label>
                            <!-- //pattern="[a-zA-Z\s]+$" -->
                            <input type="text" required value="" class="form-control" id="search" name="search"
                                maxlength="30" placeholder="Find jobs">
                        </div>
                        <div class="col-auto">
                            <button type="submit" name="submit" id="enviar" class="btn btn-primary">
                                <ion-icon name="send"></ion-icon> Submit
                            </button>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <table class="table table-striped">
                            <thead>
                                <?php
                                if (isset($_GET['search'])) {
                                    //Obtem a configuração de classificação e as palavras-chaves
                                    //de busca a partir da URL, usando GET
                                    $search = $_GET['search'];
                                    $sort = $_GET['sort'];
                                    
                                    //calcula as informações de paginação
                                    $cur_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $results_per_page = 2;//numero de resultados por pagina
                                    $skip = (($cur_page -1) * $results_per_page);
                                    
                                    //consulta para obter o total de resultados
                                    $sql = $ob->buildQuery($search, $sort);
                                    $result = mysqli_query($con, $sql);
                                    $total = mysqli_num_rows($result);
                                    $num_pages = ceil($total / $results_per_page);
                                    
                                    //Consulta novamente, para obter somente o subconjunto dos resultados
                                    $sql = $sql . " LIMIT $skip, $results_per_page";
                                    $result = mysqli_query($con, $sql);
                                    //  print_r($sql);exit;
                                    $row = array();
                                    if (mysqli_num_rows($result) == 0) {
                                        $men = "No Results";
                                    };
                                    echo " <br />";
                                    echo '<p class="h3 d-flex d-flex justify-content-center" ><strong>Results</strong></p>';
                                    echo '<p class="h3 d-flex d-flex justify-content-center bg-warning" >' . $men . '</p>';
                                    echo "<hr>";
                                    //Gera os cabeçalhos dos links
                                    echo  $header = Search::generateSortLink($search, $sort);                                    
                                    echo "</thead>";
                                    while ($row = mysqli_fetch_array($result)) {
                                ?>
                            <tbody>
                                <tr>
                                    <td><?= $row['title']; ?></td>
                                    <td><?= substr($row['description'], 0, 100); ?>...</td>
                                    <td><?= $row['date_posted']; ?>...</td>
                                </tr>
                            </tbody>
                            <?php
                                    }                                    
                                }
                            ?>
                        </table>
                        <div class="d-flex justify-content-center">
                        <?php
                        if($num_pages >1){
                            echo "<table>";
                            echo "<tr>";
                            echo  Search::generatePageLinks($search, $sort, $cur_page, $num_pages);                                    
                            echo "</tr>";
                            echo "</table>";
                            }
                            // mysqli_close($con);
                        ?>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php
 
require_once('../config/footer.php');
?>