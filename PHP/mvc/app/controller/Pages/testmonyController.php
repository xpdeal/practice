<?php

namespace App\controller\Pages;

use App\utils\View;
use App\Controller\Pages\Page;
use App\model\entity\Testimony;
use WilliamCosta\DatabaseManager\Pagination;

class testmonyController extends Page
{
    /**
     * Renders the home page view with given title and content.
     * @return string the rendered page content
     */
    public static function actionTestimonies($request): string
    {
        $content =  View::render("pages/testimonies", [
            'itens' => self::actionTestimonyItems($request,$obPagination),
            'pagination' => parent::getPagination($request, $obPagination)
        ]);
        return parent::getPage("Testimony", $content);
    }

    public static function actionInsert($request): string
    {
        $postVars = $request->getPostVars();
        $testmony =  new Testimony;
        $testmony->name = $postVars['nome'];
        $testmony->message = $postVars['mensagem'];
        $testmony->cadastrar();
        // $testmony->name = $postVars['nome'];
        return self::actionTestimonies($request);
    }

    private static function actionTestimonyItems($request, &$obPagination)
    {
        $itens = '';
        
        $quantidadeTotal = Testimony::getTestimonies(null, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;
        $queryParams = $request->getQueryParams();
        $paginaAtual = $queryParams['page'] ?? 1;
        
        //INSTANCIA DE PAGINAÇÂO
        $obPagination = new Pagination($quantidadeTotal, $paginaAtual, 2);

        $results = Testimony::getTestimonies(null, 'id DESC',  $obPagination->getLimit());
        
        while ($obTestmony = $results->fetchObject(Testimony::class)) {
            //VIEW DE DEPOIMENTOS
            $itens .= View::render('pages/testimony/item', [
                'name' => $obTestmony->nome,
                'message' => trim($obTestmony->mensagem),
                'date' => date('Y-m-d H:i:s', strtotime($obTestmony->data))
            ]);
        }
        return $itens;
    }
    
    public static function insertTestimony($request)
    {
        //DADOS DO POST
        $postVars = $request->getPostVars();

        //NOVA INSTANCIA DE DEPOIMENTOS
        $obTestmony = new Testimony;
        $obTestmony->name = $postVars['nome'];
        $obTestmony->message = $postVars['mensagem'];
        $obTestmony->cadastrar();

        //RETORNA A PÀGINA DE LÇISTAGEM DE DEPOIMENTOS
        return self::actionTestimonies($request);
    }
}
