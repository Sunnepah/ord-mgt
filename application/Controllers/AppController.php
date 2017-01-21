<?php

namespace Application\Controllers;

use Application\TemplateEngine\ViewRender;
use Application\Libraries\Helper;
use Application\Libraries\Utils\ConsoleLogger;

class AppController
{
    private $logger;

    public function __construct()
    {
        $consoleLogger = new ConsoleLogger(basename(__FILE__));
        $this->logger = $consoleLogger->getLogger();
    }

    public function index() {
        $orders = [];
        echo ViewRender::render('index.html', ['csrf_token' => Helper::csrfToken(), "orders" => $orders]);
    }
}