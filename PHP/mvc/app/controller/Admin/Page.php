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
            'link' => URL . '/testmonies'
        ],
        'users' => [
            'label' => 'Usuários',
            'link' => URL . '/user'
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

    public function methodName(Type $args): void
    {
        # code...
    }
}
