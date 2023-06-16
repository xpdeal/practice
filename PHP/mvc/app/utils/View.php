<?php

namespace App\utils;


abstract class View
{

    /**
     * Returns the content of the given view if it exists, otherwise an empty string.    *
     * @param string $view The name of the view file.
     * @return string The contents of the view file or an empty string.
     */
    private static function getContentVIew(string $view): string
    {
        $file = __DIR__ . "/../../resources/view/" . $view . ".php";
        return file_exists($file) ? file_get_contents($file) : "";
    }

    /**
     * Renders a string with dynamic content replacing placeholders.
     * @param string $view The name of the view file to be rendered.
     * @param array $vars An associative array with placeholders and their corresponding values.
     * @return string The rendered string with placeholders replaced.
     */
    public static function render(string $view, array $vars = []): string
    {
        $contentView = self::getContentVIew($view);
        $keys = array_keys($vars);

        $keys = array_map(
            function ($item) {
                return "{{" . $item . "}}";
            },
            $keys
        );
        return str_replace($keys, array_values($vars), $contentView);
    }
}
