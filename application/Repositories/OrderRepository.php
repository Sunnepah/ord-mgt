<?php

namespace Application\Repositories;


use Application\Libraries\Database\OrdersDAO;
use Application\Models\Post;

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
        $this->model = new Post();
        $this->orderDAO = $ordersDAO;
    }

    /**
     * @param array $columns
     * @return array
     */
    public function all($columns = array('*')) {
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