<?php

namespace App\controller\Admin;

use App\utils\View;

class Page
{
    public static function getPage(string $title, string $content): string
    {
        return View::render("admin/page", [
            "title" => $title,           
            "content" => $content,           
        ]);
    }
}
