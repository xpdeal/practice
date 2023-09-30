<?php

namespace App\Controller\Admin;

use App\controller\Admin\AlertController;
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
            'pagination' => parent::getPagination($request, $obPagination),
            'status' => self::getStatus($request)
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
        $obPagination = new Pagination($quantidadeTotal, $paginaAtual, 10);

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
            'status' => '',
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
        $obTestmony = Testimony::getTestimonyById($id);            
        if (!$obTestmony instanceof Testimony) {
            $request->getRouter()->redirect('/admin/testmonies');
        }

        $content = View::render('admin/modules/testimonies/form', [
            'title' => 'Editar Depoimentos',
            'nome' => $obTestmony->name,
            'mensagem' => $obTestmony->message,
            'status' => self::getStatus($request)
        ]);

        return parent::getPanel('Editarar-depoimentos', $content, 'testmonies');
    }
    
    public static function setEditTestimony(Request $request, int $id): void
    {
        $obTestmony = Testimony::getTestimonyById($id);            
        if (!$obTestmony instanceof Testimony) {
            $request->getRouter()->redirect('/admin/testmonies');
        }
        
        $postVars = $request->getPostvars();       
        $obTestmony->name = $postVars['nome'] ?? $obTestmony->name;
        $obTestmony->message = $postVars['mensagem'] ?? $obTestmony->message;
        $obTestmony->atualizar();
        $request->getRouter()->redirect('/admin/testimonies/'.$obTestmony->id.'/edit?status=updated');
    }
    
    private static function getStatus(Request $request) {
        $queryParams = $request->getQueryParams();
        
        if(!$queryParams['status']){
        return '';
        }
        
        switch ($queryParams['status']) {
            case 'created':
                return AlertController::getSucess('Depoimento Criado com sucesso');
                break;
            case 'updated':
                return AlertController::getSucess('Depoimento Atualizado com sucesso');
                break;
            case 'deleted':
                return AlertController::getSucess('Depoimento excluido com sucesso');
                break;
        }
    }
    
    public static function getDeleteTestimony(Request $request, int $id): string
    {
        $obTestmony = Testimony::getTestimonyById($id);            
        if (!$obTestmony instanceof Testimony) {
            $request->getRouter()->redirect('/admin/testmonies');
        }

        $content = View::render('admin/modules/testimonies/delete', [           
            'nome' => $obTestmony->name,
            'mensagem' => $obTestmony->message,
        ]);

        return parent::getPanel('Excluir-depoimentos', $content, 'testmonies');
    }
    
    public static function setDeleteTestimony(Request $request, int $id): void
    {
        $obTestmony = Testimony::getTestimonyById($id);            
        if (!$obTestmony instanceof Testimony) {
            $request->getRouter()->redirect('/admin/testmonies');
        }
        
        $obTestmony->excluir();
        $request->getRouter()->redirect('/admin/testimonies?status=deleted');
    }
}
