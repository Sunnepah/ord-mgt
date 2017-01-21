<?php

namespace Application\Controllers;

use Application\Libraries\Database\OrdersDAO;
use Application\Libraries\Database\ProductsDAO;
use Application\Libraries\Database\UsersDAO;
use Application\Libraries\Utils\ConsoleLogger;
use Application\Models\Product;
use Application\Models\Users;
use Application\Repositories\OrderRepository;
use Application\TemplateEngine\ViewRender;
use Lustre\Request;

class OrdersController
{
    private $request;

    private $logger;
    private $orderRepo;
    private $userDAO;
    private $productDAO;

    public function __construct()
    {
        $this->request = new Request();

        $consoleLogger = new ConsoleLogger(basename(__FILE__));
        $this->logger = $consoleLogger->getLogger();

        $this->orderRepo = new OrderRepository(new OrdersDAO());
        $this->userDAO = new UsersDAO();
        $this->productDAO = new ProductsDAO();
    }

    /**
     * Retrieve all orders.
     */
    public function index() {
        $orders = $this->orderRepo->all();

        list($users, $products) = $this->getExtraData();

        echo ViewRender::render('index', ["orders" => $orders, 'users' => $users, 'products' => $products]);
    }

    public function create() {

    }

    public function getOne() {

    }

    public function update() {
    }

    public function delete() {

    }

    private function getExtraData() {
        $users = $this->userDAO->getAll();
        $products = $this->productDAO->getAll();

        return array($users, $products);
    }
}