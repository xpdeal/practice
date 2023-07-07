<?php

class Search
{

    /**
     * Esta função cria uma consulta de busca a partir das palavras-chaves de busca e da 
     * configuração de classificação     *
     * @param [type] $search
     * @param [type] $sort
     * @return string
     */
    public function buildQuery($search, $sort)
    {
        $sql = "SELECT * FROM risky_jobs";
        // Extrai as palavras-chaves de busca e as coloca em um array
        $clean = str_replace(',', '', $search);
        $clean = str_replace("'", '', $search);
        $words = explode(' ', $clean);
        $final_search_words = array();

        if (count($words) > 0) {
            foreach ($words as $word) {
                if (!empty($word)) {
                    $final_search_words[] = $word;
                }
            }
        }

        // //Gera uma cláusula WHERE usando todas as palavras-chaves de busca
        $where = array();

        if (count($final_search_words) > 0) {
            foreach ($final_search_words as $word) {
                $where[] = "description LIKE'%" . $word . "%'";
            }
        }
        $clause = implode(' OR ', $where);

        // Adiciona a cláusula WHERE á consulta de busca.                        
        if (!empty($clause)) {
            $sql .= " WHERE $clause";
        }

        //Clasifica a consulta de buscausando a configuração de classificação
        switch ($sort) {
            case 1:
                //Crescente por titulo
                $sql .= " ORDER BY title ASC";
                break;
            case 2:
                //Decrescente por titulo
                $sql .= " ORDER BY title DESC";
                break;
            case 3:
                //Crescente por state
                $sql .= " ORDER BY state ASC";
                break;
            case 4:
                //Decrescente por state
                $sql .= " ORDER BY state DESC";
                break;
            case 5:
                //Crescente por date_posted (Anuncios mais antigos)
                $sql .= " ORDER BY date_posted ASC";
                break;
            case 6:
                //Decrescente por date_posted(Anuncios mais Novos)
                $sql .= " ORDER BY date_posted DESC";
                break;
            default:
                //Sem ordenação fornecida não altera consulta
        }
        return $sql;
    }

    /**
     * Esta função cria links de navegação, com base na página atual
     * e no número de páginas
     * @param [type] $search
     * @param [type] $sort
     * @return string
     */
    public static function generateSortLink($search, $sort)
    {
        $sort_links = '';

        switch ($sort) {
            case 1:
                $sort_links .= '<th><a href="' . $_SERVER['PHP_SELF'] . '?search=' . $search . '&sort=2">Titulo</a></th>';
                $sort_links .= '<th><a href="' . $_SERVER['PHP_SELF'] . '?search=' . $search . '&sort=3">Estado</a></th>';
                $sort_links .= '<th><a href="' . $_SERVER['PHP_SELF'] . '?search=' . $search . '&sort=5">Data</a></th>';
                break;
            case 3:
                $sort_links .= '<th><a href="' . $_SERVER['PHP_SELF'] . '?search=' . $search . '&sort=1">Titulo</a></th>';
                $sort_links .= '<th><a href="' . $_SERVER['PHP_SELF'] . '?search=' . $search . '&sort=4">Estado</a></th>';
                $sort_links .= '<th><a href="' . $_SERVER['PHP_SELF'] . '?search=' . $search . '&sort=5">Data</a></th>';
                break;
            case 5:
                $sort_links .= '<th><a href="' . $_SERVER['PHP_SELF'] . '?search=' . $search . '&sort=1">Titulo</a></th>';
                $sort_links .= '<th><a href="' . $_SERVER['PHP_SELF'] . '?search=' . $search . '&sort=3">Estado</a></th>';
                $sort_links .= '<th><a href="' . $_SERVER['PHP_SELF'] . '?search=' . $search . '&sort=6">Data</a></th>';
                break;
            default:
                $sort_links .= '<th><a href="' . $_SERVER['PHP_SELF'] . '?search=' . $search . '&sort=1">Titulo</a></th>';
                $sort_links .= '<th><a href="' . $_SERVER['PHP_SELF'] . '?search=' . $search . '&sort=3">Estado</a></th>';
                $sort_links .= '<th><a href="' . $_SERVER['PHP_SELF'] . '?search=' . $search . '&sort=5">Data</a></th>';
        }
        return $sort_links;
    }

    /**
     * Esta função 
     *
     * @param [type] $search
     * @param [type] $sort
     * @param [type] $cur_page
     * @param [type] $num_pages
     * @return string
     */
    public static function generatePageLinks($search, $sort, $cur_page, $num_pages)
    {
        $pages_links = '';
        //se esta pagina não for a primeira, gera o link "previous"
        if ($cur_page > 1) {
            $pages_links .= '<td><a href="' . $_SERVER['PHP_SELF'] .
                '?search=' . $search .
                '&sort=' . $sort .
                '&page=' . ($cur_page - 1) . '"><<</a></td>';
                
                echo $pages_links;
        } else {
           echo $pages_links .= '<td><- </td>';
        }

        //faz um loop atravez das páginas, gerando os links com os números das páginas
        for ($i = 1; $i <= $num_pages; $i++) {
            if ($cur_page == $i) {
                $pages_links = "<td>" . $i ."</td>";
            } else {
                $pages_links .= '<td><a href="' . $_SERVER['PHP_SELF'] .
                    '?search=' . $search .
                    '&sort=' . $sort .
                    '&page=' . $i . '">' . $i . '</a></td>';
            }
        }

        //Se a página for a Ultima, gera o link "next"
        if ($cur_page < $num_pages) {
            $pages_links .= '<td><a href="' . $_SERVER['PHP_SELF'] .
                '?search=' . $search .
                '&sort=' . $sort .
                '&page=' . ($cur_page + 1) . '">>></a></td>';
        } else { 
            $pages_links .= '<td> -></td>';
        }

        return $pages_links;
    }
}
