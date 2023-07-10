<?php
require_once('../config/session.php');
require_once('../model/conf.php');
require_once('../config/menu.php');
if (!isset($_SESSION['user_id'])) {
    echo ('<p class="d-flex justify-content-center bg-success text-light"> Please <a href="mis_login.php"> log in</a> To access this page.</p>');
    exit();
} else {
    echo ('<p class="d-flex justify-content-center bg-success text-light"> You are logged in as ' . $_SESSION['user_name'] . ' <a href="mis_logout.php">Log Out</a></p>');
}

const MM_UPLOADPATH = "__DIR__/.";
function draw_bar_graph($width, $heigth, $data, $max_value, $filename)
{
    //cria a imagem vazia

    $img = imagecreatetruecolor($width, $heigth);
    // Define um fundo branco com texto preto e gráfico cinza
    $bg_color = imagecolorallocate($img, 255, 255, 255); //branco
    $text_color = imagecolorallocate($img, 255, 255, 255); //branco
    $bar_color = imagecolorallocate($img, 0, 0, 0); //preto
    $border_color = imagecolorallocate($img, 192, 192, 192); //cinza claro

    //preenche o fundo

    imagefilledrectangle($img, 0, 0, $width, $heigth, $bg_color);
    //desenhe 
    $bar_width = $width / ((count($data) * 2) + 1);
    for ($i = 0; $i < count($data); $i++) {
        imagefilledrectangle(
            $img,
            ($i * $bar_width * 2) + $bar_width,
            $heigth,
            ($i * $bar_width * 2) + ($bar_width * 2),
            $heigth - (($heigth / $max_value) * $data[$i][1]),
            $bar_color
        );
        imagestringup(
            $img,
            5,
            ($i * $bar_width * 2) + ($bar_width),
            $heigth - 5,
            $data[$i][0],
            $text_color
        );

        // desenhe um retangulo em torno da imagem inteira
        imagerectangle($img, 0, 0, $width - 1, $heigth - 1, $border_color);
        // desenhe a faixa de valores no lado esquerdo do grafico
        for ($i = 0; $i < $max_value; $i++) {
            imagestring($img, 5, 0, $heigth - ($i * ($heigth / $max_value)), $i, $bar_color);
        }

        //escreva a imagem em um arquivo

        imagepng($img, $filename, 5);
        imagedestroy($img);
    }
}
?>

<body>

    <?php
    //Se o usuário jamais responder ao questionario, inserir respostas vazias no banco de dados de

    $sql = "SELECT * FROM mismatch_response WHERE user_id = '" . $_SESSION['user_id'] . "'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) != 0) {

        //Primeiramente, obtém a lista de IDs dos tópicos a partir da resposta da tabela
        $sql = "SELECT mr.response_id, mr.topic_id, mr.response, mt.name as topic_name, mc.name as category_name FROM mismatch_response as mr INNER JOIN mismatch_topic as mt USING(topic_id) 
        INNER JOIN mismatch_category as mc USING(category_id) 
        WHERE mr.user_id =" . $_SESSION['user_id'];
        $result = mysqli_query($con, $sql);

        $user_responses = array();
        while ($row = mysqli_fetch_array($result)) {
            array_push($user_responses, $row);
        }

        //inicia os resultados da buscar
        $mismatch_score = 0;
        $mismatch_user_id = -1;
        $mismatch_topics = array();

        //Faz o loop através da tabela de usuario, comparando as respostas dos outros com a do usu
        $sql = "SELECT user_id FROM mismatch_user WHERE user_id !=" . $_SESSION['user_id'];
        $result = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($result)) {
            // Obtém os dados de resposta do usuario (um par potencial)
            $query = "SELECT response_id, topic_id, response FROM mismatch_response WHERE user_id =" . $row['user_id'];
            $data = mysqli_query($con, $query);
            $mismatch_responses = array();

            while ($row2 = mysqli_fetch_array($data)) {
                array_push($mismatch_responses, $row2);
            }


            // Compara casa resposta e calcula um total de desencontrabilidade
            $score = 0;
            $topics = array();
            $categories = [];
            for ($i = 0; $i < count($user_responses); $i++) {
                if (((int)$user_responses[$i]['response']) + ((int)$mismatch_responses[$i]['response']) == 3) {
                    $score += 1;
                    array_push($topics, $user_responses[$i]['topic_name']);
                    array_push($categories, $user_responses[$i]['category_name']);
                }
            }

            //Verifica se esta pessoa é melhor do que o melhor par até agora
            if ($score > $mismatch_score) {
                //Encontramos um par melhor, atualizar os resultados da busca
                $mismatch_score = $score;
                $mismatch_user_id = $row['user_id'];
                $mismatch_topics = array_slice($topics, 0);
            }
        }

        // Asegura que um par tenha sido encontrado
        if ($mismatch_user_id != -1) {
            $sql = "SELECT user_name, user_firstname, user_lastname, user_city,  user_state, user_picture FROM mismatch_user WHERE user_id = " . $mismatch_user_id;
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) == 1) {
                // A  linha do usuario que formou o par foi encontrada, exibir os dados do usuario
                $row = mysqli_fetch_array($result);
                echo '<div class="d-flex justify-content-center"> <h1>Mismatch</h1></div>';
                echo '<div class="container">';
                echo '<img src="../../image/' . $row['user_picture'] . '" width="100px" alt="' . $row['user_name'] . ' class="img-thumbnail img-responsive">';
                echo '<p><strong>Username:</strong>' . $row['user_name'] . ' <br />';
                echo '<strong>Gender:</strong>' . $row['user_gender'] . ' <br />';
                echo '<strong>Firstname: </strong>' . $row['user_firstname'] . '<br />';
                echo '<strong>Lastname: </strong>' . $row['user_lastname'] . ' <br />';
                echo '<strong>City: </strong> ' . $row['user_city'] . ' <br />';
                echo '<strong>State: </strong>' . $row['user_state'] . ' <br />';
                echo '</p>';
                echo '</div>';

                //Exibe topico com respostas opostas
                echo '<div class="container" style="margin-left: 400px;">';
                echo '<h4>you are mismatched on the following:  ' . count($mismatch_topics) . '    Topics</h4>';
                foreach ($mismatch_topics as $topic) {
                    echo '<strong st>' . $topic . '</strong><br />';
                }
                // Exibe um link para o perfil do usuario que formou o par
                echo '<h4>View <a href="mis_viewprofile.php?id=' . $mismatch_user_id . '">' . $row['firstname'] . '\'s profile</a>.</h4>';
                echo '</div>';

                echo "<hr>";
                echo '<div class="container" style="margin-left: 400px;">';
                echo '<h4>Detalhes das categorias desencontradas: </h4>';
                // draw_bar_graph(480,240, $category_totals, 5, MM_UPLOADPATH0-, 'mysmatgraph.png');                
                //  echo '<img src="'.MM_UPLOADPATH.'mysmatgraph.png">';
                
            }
        }
    } else {
        echo '<div class="d-flex justify-content-center">You must furst <a href="mis_quest.php">answer the questionnaire</a> Before you can' . 'be mismatched.</div>';
    }
    ?>

    <?php
    $category_totals = array(array($mismatch_categories[0], 0));
    foreach ($mismatch_categories as $category) {
        if ($category_totals[count($category_totals) - 1][0] != $category) {
            array_push($category_totals, array($category, 1));
        } else {
            $category_totals[count($category_totals) - 1][1]++;
        }
    }

    ?>
</body>
<?php
require_once('../config/footer.php');
?>