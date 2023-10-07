<?php

namespace App\Controller\api;


use Exception;

use App\Http\Request;
use App\Model\entity\Testimony;
use App\Controller\api\ApiController;
use WilliamCosta\DatabaseManager\Pagination;

class ApiTestimoniesController extends ApiController
{
    public static function getTestmimonies(Request $request)
    {
        return [
            'depoimentos' => self::getTestimonyItems($request, $obPagination),
            'paginacao' => parent::getPagination($request, $obPagination)
        ];
    }

    private static function getTestimonyItems(Request $request, &$obPagination)
    {
        $itens = [];

        $quantidadeTotal = Testimony::getTestimonies(null, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;
        $queryParams = $request->getQueryParams();
        $paginaAtual = $queryParams['page'] ?? 1;

        //INSTANCIA DE PAGINAÇÂO
        $obPagination = new Pagination($quantidadeTotal, $paginaAtual, 10);

        $results = Testimony::getTestimonies(null, 'id DESC',  $obPagination->getLimit());

        while ($obTestmony = $results->fetchObject(Testimony::class)) {
            //VIEW DE DEPOIMENTOS
            $itens[] =  [
                'id' => (int) $obTestmony->id,
                'name' => $obTestmony->nome,
                'message' => trim($obTestmony->mensagem),
                'date' => $obTestmony->data
            ];
        }
        return $itens;
    }

    public static function getTestmimony(Request $request, $id)
    {   
        if(!is_numeric($id)){
            throw new Exception("o id '" . $id . "' Não é valido", 400);
        }
        $obTestmony = Testimony::getTestimonyById($id);

        if (!$obTestmony instanceof Testimony) {
            throw new Exception("Depoimento " . $id . " Não encontrado", 404);
        }
        return [
            'depoimento' => $obTestmony
            // 'id' => (int) $obTestmony->id,
            // 'name' => $obTestmony->name,
            // 'message' => trim($obTestmony->message),
        ];
    }
}
