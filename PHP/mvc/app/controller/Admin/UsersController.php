<?php

namespace App\Controller\Admin;

use App\utils\View;
use App\Http\Request;
use App\Model\entity\User;
use App\controller\Admin\AlertController;
use WilliamCosta\DatabaseManager\Pagination;


class UsersController extends Page
{
    public static function actionIndex(Request $request)
    {
        $content = View::render('admin/modules/users/index', [
            'itens' => self::actionUsersItems($request, $obPagination),
            'pagination' => parent::getPagination($request, $obPagination),
            'status' => self::getStatus($request)
        ]);

        return parent::getPanel('admin-usuariios', $content, 'users');
    }

    private static function actionUsersItems(Request $request, &$obPagination)
    {
        $itens = '';

        $quantidadeTotal = User::getUsers(null, null, null, 'COUNT(*) as qtd')->fetchObject()->qtd;
        $queryParams = $request->getQueryParams();
        $paginaAtual = $queryParams['page'] ?? 1;

        //INSTANCIA DE PAGINAÇÂO
        $obPagination = new Pagination($quantidadeTotal, $paginaAtual, 10);

        $results = User::getUsers(null, 'id DESC',  $obPagination->getLimit());

        while ($obUser = $results->fetchObject(User::class)) {
            //VIEW DE DEPOIMENTOS
            $itens .= View::render('admin/modules/users/item', [
                'id' => $obUser->id,
                'name' => $obUser->name,
                'mail' => trim($obUser->mail),
                
            ]);
        }
        return $itens;
    }

    public static function getUser(Request $request): string
    {
        $content = View::render('admin/modules/users/form', [
            'title' => 'Cadastrar Usuarios',
            'name' => '',
            'mail' => '',
            'status' => self::getStatus($request),
        ]);

        return parent::getPanel('Cadastrar-depoimentos', $content, 'testmonies');
    }

    public static function setUser(Request $request): void
    {
        $postVars = $request->getPostVars();        
        $name = $postVars['name'] ?? '';
        $mail = $postVars['mail'] ?? '';
        $pass = $postVars['pass'] ?? '';
        
        $obUserMail = User::getUserByEmail($mail);            
       
        // if (!$obUserMail instanceof User) {
        //     $request->getRouter()->redirect('/admin/users/new?satatus=duplicated');
        // }
        
        $obUser = new User();
        $obUser->name = $name;
        $obUser->mail = $mail;
        $obUser->pass = password_hash($pass, PASSWORD_DEFAULT);
        $obUser->cadastrar();
        
        $request->getRouter()->redirect('/admin/users/'.$obUser->id.'/edit?status=created');
    }

    public static function getEditUser(Request $request, int $id): string
    {
        $obUser = User::getUserById($id);            
        if (!$obUser instanceof User) {
            $request->getRouter()->redirect('/admin/testmonies');
        }

        $content = View::render('admin/modules/users/form', [
            'title' => 'Editar Usuario',
            'name' => $obUser->name,
            'mail' => $obUser->mail,
            'pass' => password_hash($obUser->pass, PASSWORD_DEFAULT),
            'status' => self::getStatus($request)
        ]);

        return parent::getPanel('Editarar-depoimentos', $content, 'testmonies');
    }
    
    public static function setEditUser(Request $request, int $id): void
    {
        $obUser = User::getUserById($id);            
        if (!$obUser instanceof User) {
            $request->getRouter()->redirect('/admin/users');
        }
        
        $postVars = $request->getPostvars();       
        $obUser->name = $postVars['name'] ?? $obUser->name;
        $obUser->mail = $postVars['mail'] ?? $obUser->mail;
        $obUser->atualizar();
        $request->getRouter()->redirect('/admin/users/'.$obUser->id.'/edit?status=updated');
    }
    
    private static function getStatus(Request $request) {
        $queryParams = $request->getQueryParams();
        
        if(!isset($queryParams['status'])){
        return '';
        }
        
        switch ($queryParams['status']) {
            case 'created':
                return AlertController::getSucess('Usuário Criado com sucesso');
                break;
            case 'updated':
                return AlertController::getSucess('Usuário Atualizado com sucesso');
                break;
            case 'deleted':
                return AlertController::getSucess('Usuário excluido com sucesso');
                break;
            case 'duplicated':
                return AlertController::getError('E-mail já cadastrado');
                break;
        }
    }
    
    public static function getDeleteUser(Request $request, int $id): string
    {
        $obUser = User::getUserById($id);            
        if (!$obUser instanceof User) {
            $request->getRouter()->redirect('/admin/users');
        }

        $content = View::render('admin/modules/users/delete', [           
            'nome' => $obUser->name,
            'mensagem' => $obUser->mail,
        ]);

        return parent::getPanel('Excluir-depoimentos', $content, 'users');
    }
    
    public static function setDeleteUser(Request $request, int $id): void
    {
        $obUser = User::getUserById($id);            
        if (!$obUser instanceof User) {
            $request->getRouter()->redirect('/admin/users');
        }
        
        $obUser->excluir();
        $request->getRouter()->redirect('/admin/users?status=deleted');
    }
}
