<?php

namespace Application\Controllers;

use Application\Libraries\Database\OrdersDAO;
use Application\Libraries\Database\ProductsDAO;
use Application\Libraries\Database\UsersDAO;
use Application\Libraries\Utils\ConsoleLogger;
use Application\Repositories\OrderRepository;
use Lustre\Request;
use Lustre\Response;

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
     * Load index html
     */
    public function index() {
        echo file_get_contents(__DIR__ . '/../../web/views/index.html');
    }

    public function getAll() {
        $this->logger->info("Processing request to retrieve all orders");

        $orders = $this->orderRepo->all();

        list($users, $products) = $this->getExtraData();

        $response = [
            'orders'    => $orders,
            'users'     => $users,
            'products'  => $products

        ];

        $this->logger->info("Returning orders response");

        return (new Response($response, 200))->json();
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