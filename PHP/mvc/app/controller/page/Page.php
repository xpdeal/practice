<?php

namespace App\controller\page;

use App\utils\View;


class Page
{
    /**
     * Returns a rendered page with provided title and content.
     * @param string $title The title of the page.
     * @param string $content The content of the page.
     * @return string The rendered page.
     */
    public static function getPage(string $title, string $content): string
    {
        return View::render("pages/page", [
            "title" => $title,
            "content" => $content
        ]);
    }
}
