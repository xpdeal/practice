<?php


namespace App\Controller\api;
use App\Http\Request;

class ApiController
{

    public static function getDetails(Request $request)
    {
        return [
            'nome' => 'API - WDEV',
            'versao' => 'API - WDEV',
            'autor' => 'canalwdev@gmail.com'
        ];
    }
    
    protected static function getPagination(Request $request, $obPagination): mixed
    {
        $queryParams = $request->getQueryParams();
        
        $pages = $obPagination->getPages();
        
        return  [
            'paginaAtual' => isset($queryParams['page']) ? (int) $queryParams['page'] : 1,
            'quantidadePaginas' => !empty($pages) ? count($pages) : 1
        ];
    }
}
