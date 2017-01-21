<?php

namespace Application\TemplateEngine;

use Application\Libraries\Helper;
use Twig_Loader_Filesystem;
use Twig_Environment;

class ViewRender
{
    public static function render($viewName, $data = []) {
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../../views/');
        $twig = new Twig_Environment($loader, array(
            'cache' => __DIR__ . '/../../views/cache',
        ));
        $twig = new Twig_Environment($loader, array());

        $data['date_year'] = date("Y");
        $data['csrf_token'] = Helper::csrfToken();

        return $twig->render($viewName . ".php", $data);
    }
}