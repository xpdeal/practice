<?php

namespace App\utils;


class View
{

    /**
     * Returns the content of the given view if it exists, otherwise an empty string.    *
     * @param string $view The name of the view file.
     * @return string The contents of the view file or an empty string.
     */
    private static function getContentVIew(string $view): string
    {
        $file = __DIR__ . "/../../resources/view/" . $view . ".php";
        return file_exists($file) ? file_get_contents($file) : "sss";
    }

    /**
     * Renders a given view and returns its content as a string.
     * @param string $view The name of the view to render.
     * @throws Exception If the view file could not be found.
     * @return string The rendered view content.
     */
    public static function render(string $view): string
    {
        $contentView = self::getContentVIew($view);
        return $contentView;
    }
}
