<?php

namespace App\controller\Admin;

use App\utils\View;
use App\Utils\View as UtilsView;

class Page
{
    private static $modules = [
        'home' => [
            'label' => 'Home',
            'link' => URL . '/admin'
        ],
        'testmonies' => [
            'label' => 'Depoimentos',
            'link' => URL . '/admin/testimonies'
        ],
        'users' => [
            'label' => 'Usuários',
            'link' => URL . '/admin/user'
        ]

    ];
    public static function getPage(string $title, string $content): string
    {
        return View::render("admin/page", [
            "title" => $title,
            "content" => $content,
        ]);
    }

    public static function getPanel(string $title, string $content, string $currentModule): string
    {
        $contentPanel = View::render('admin/panel', [
            'menu' => self::getMenu($currentModule),
            'content' => $content
        ]);
        return self::getPage($title, $contentPanel);
    }

    private static function getMenu(string $currentModule): string
    {
        $links = '';
        foreach (self::$modules as $hash => $module) {
            $links .= View::render('admin/menu/link', [
                'label' => $module['label'],
                'link'  => $module['link'],
                'current' => $hash == $currentModule ? 'text-danger' : ''
            ]);
        }

        return View::render('admin/menu/box', [
            'links' => $links
        ]);
    }

    public static function getPagination($request, $obPagination): string
    {
        $pages = $obPagination->getPages();

        if (count($pages) <= 1) return '';
        
        $links = '';
        
        $url = $request->getRouter()->getCurrentUrl();
        $queryParams = $request->getQueryParams();
        
        foreach ($pages as $page) {

            $queryParams['page'] = $page['page'];

            $link = $url . '?' . http_build_query($queryParams);
            
            $links .= View::render('admin/pagination/link', [
                'page' => $page['page'],
                'link' => $link,
                'active' => $page['current'] ? 'active' : ''
            ]);
        }
        
        return View::render('admin/pagination/box', [
            'links' => $links
        ]);
    }
}
