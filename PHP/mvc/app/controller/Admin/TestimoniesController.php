<?php

namespace App\Controller\Admin;

use App\utils\View;
use App\Http\Request;
use App\Model\entity\Testimony;
use WilliamCosta\DatabaseManager\Pagination;


class TestimoniesController extends Page
{
    public static function actionIndex(Request $request)
    {
        $content = View::render('admin/modules/testimonies/index', [
            'itens' => self::actionTestimonyItems($request, $obPagination),
            'pagination' => parent::getPagination($request, $obPagination)
        ]);

        return parent::getPanel('admin-depoimentos', $content, 'testmonies');
    }

    private static function actionTestimonyItems(Request $request, &$obPagination)
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
            $itens .= View::render('admin/modules/testimonies/item', [
                'id' => $obTestmony->id,
                'name' => $obTestmony->nome,
                'message' => trim($obTestmony->mensagem),
                'date' => date('Y-m-d H:i:s', strtotime($obTestmony->data))
            ]);
        }
        return $itens;
    }

    public static function getTestimony(Request $request): string
    {
        $content = View::render('admin/modules/testimonies/form', [
            'title' => 'Cadastrar Depoimentos',
            'nome' => '',
            'mensagem' => '',
        ]);

        return parent::getPanel('Cadastrar-depoimentos', $content, 'testmonies');
    }

    public static function setTestimony(Request $request): void
    {
        $postVars = $request->getPostVars();
        $obTestmony = new Testimony();
        $obTestmony->name = $postVars['nome'] ?? '';
        $obTestmony->message = $postVars['mensagem'] ?? '';
        $obTestmony->cadastrar();

        $request->getRouter()->redirect('/admin/testimonies/'.$obTestmony->id.'/edit?status=created');
    }

    public static function getEditTestimony(Request $request, int $id): string
    {
        $obTestmonyt = Testimony::getTestimonyById($id);            
        if (!$obTestmonyt instanceof Testimony) {
            $request->getRouter()->redirect('/admin/testmonies');
        }

        $content = View::render('admin/modules/testimonies/form', [
            'title' => 'Editar Depoimentos',
            'nome' => $obTestmonyt->name,
            'mensagem' => $obTestmonyt->message,
        ]);

        return parent::getPanel('Editarar-depoimentos', $content, 'testmonies');
    }
}
