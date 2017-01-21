<?php

namespace Application\Controllers;

use Application\Libraries\Database\OrdersDAO;
use Application\Repositories\OrderRepository;
use Application\TemplateEngine\ViewRender;
use Lustre\Request;

class OrdersController
{
    protected $orderRepo;
    private $request;

    public function __construct() {
        $this->orderRepo = new OrderRepository(new OrdersDAO());
        $this->request = new Request();
    }

    /**
     * Retrieve all orders.
     */
    public function getAll() {
        echo ViewRender::render('index.html');
    }

    public function create() {

    }

    public function getOne() {

    }

    public function update() {
    }

    public function delete() {

    }
}