<?php

namespace Application\Repositories;


use Application\Libraries\Database\OrdersDAO;
use Application\Models\Orders;


class OrderRepository implements Repository
{

    protected $model;
    private $orderDAO;

    /**
     * Repository constructor.
     * @param OrdersDAO $ordersDAO
     */
    public function __construct(OrdersDAO $ordersDAO)
    {
        $this->model = new Orders();
        $this->orderDAO = $ordersDAO;
    }

    /**
     * @return array
     * @internal param array $columns
     */
    public function all() {
        return $this->model->findAll($this->orderDAO);
    }

    /**
     * @param \stdClass $data
     * @return string
     */
    public function create($data) {
        return $this->model->save($this->orderDAO, $data);
    }
}