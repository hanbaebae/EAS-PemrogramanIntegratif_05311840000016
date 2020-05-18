<?php

namespace Core;

class View
{

    /**
     * Render a view file
     *
     * @param string $view  The view file
     *
     * @return void
     */
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = "../app/views/$view";  // relative to Core directory

        if (is_readable($file)) {
            require $file;
        } else {
            echo "$file not found";
        }
    }

    public static function renderTemplate($template, $args = [])
    {
        static $twig = null;
        if ($twig === null) {
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/app/views');
            $twig = new \Twig\Environment($loader);
        }
        
        echo $twig->render($template, $args);
    }

}
