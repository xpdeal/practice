<?php

namespace App\controller\page;

use App\utils\View;


abstract class Page
{
    /**
     * Returns the header view as a string.
     * @throws Exception if the header view cannot be rendered.
     * @return string the rendered header view.
     */
    private static function getHeader(): string
    {
        return View::render("pages/header");
    }

    /**
     * Retrieves the footer content as a string.
     * @throws Exception if the footer view cannot be rendered.
     * @return string the rendered footer content as a string.
     */
    private static function getFooter(): string
    {
        return View::render("pages/footer");
    }

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
            "header" => self::getHeader(),
            "content" => $content,
            "footer" => self::getFooter()
        ]);
    }
}
