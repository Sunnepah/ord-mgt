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

        if(!$this->isValidRequest($this->request)) {
            return (new Response(["message" => "Bad data"], 400))->json();
        }

        $user_id = $this->request->data['user'];
        if (!$this->userDAO->userExist($user_id)) {
            return (new Response(["message" => "User does not exist!"], 400))->json();
        }

        $product = $this->productDAO->findOne($this->request->data['product']);
        if (!isset($product['id'])) {
            return (new Response(["message" => "Product does not exist!"], 400))->json();
        }

        $order = new \stdClass();
        $order->user_id = $user_id;
        $order->product_id = $product['id'];

        $quantity = $this->request->data['quantity'];
        $order->quantity = $quantity;
        $order->order_amount = $quantity * $product['price'];

        $response = $this->orderRepo->create($order);
        if($response == true) {
            return (new Response($response, 201))->json();
        }

        return (new Response($response, 500))->json();
    }

    public function getOne() {
        if (!isset($this->request->query['id']) || empty($this->request->query['id'])) {
            return (new Response(null, 400))->json();
        }

        $response = $this->orderRepo->find($this->request->query['id']);
        if ($response == null) {
            return (new Response(null, 404))->json();
        }

        return (new Response($response, 200))->json();
    }

    public function update() {
        if(!$this->isValidRequest($this->request)) {
            return (new Response(["message" => "Bad data"], 400))->json();
        }

        if (!isset($this->request->query['id']) || empty($this->request->query['id'])) {
            return (new Response(["Message" => "Missing resource orderId"], 400))->json();
        }

        $orderId = $this->request->query['id'];
        $order = $this->orderRepo->find($orderId);
        if (!isset($order['id'])) {
            return (new Response(["message" => "Order does not exist!"], 400))->json();
        }

        $user_id = $this->request->data['user'];
        if (!$this->userDAO->userExist($user_id)) {
            return (new Response(["message" => "User does not exist!"], 400))->json();
        }

        $product = $this->productDAO->findOne($this->request->data['product']);
        if (!isset($product['id'])) {
            return (new Response(["message" => "Product does not exist!"], 400))->json();
        }

        $order = new \stdClass();
        $order->id = $orderId;
        $order->user_id = $user_id;
        $order->product_id = $product['id'];

        $quantity = $this->request->data['quantity'];
        $order->quantity = $quantity;
        $order->order_amount = $quantity * $product['price'];

        $response = $this->orderRepo->update($order);

        return (new Response($response, 200))->json();
    }


    /**
     * @return string
     */
    public function delete() {
        if (!isset($this->request->query['id']) || empty($this->request->query['id'])) {

            return (new Response(null, 400))->json();
        }

        $response = $this->orderRepo->delete($this->request->query['id']);

        return (new Response($response, 200))->json();
    }

    private function getExtraData() {
        $users = $this->userDAO->getAll();
        $products = $this->productDAO->getAll();

        return array($users, $products);
    }

    private function isValidRequest(Request $request) {
        $user = isset($request->data['user']) ? $request->data['user'] : null;
        $product = isset($request->data['product']) ? $request->data['product'] : null;
        $quantity = isset($request->data['quantity']) ? $request->data['quantity'] : null;

        if (!empty($user) && !empty($product) && !empty($quantity)) {
            return true;
        }

        return false;
    }
}