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
     */
    public function all() {
        return $this->orderDAO->getAll($this->model->table);
    }

    public function find($id)
    {
        return $this->model->find($this->orderDAO, $id);
    }

    /**
     * @param \stdClass $data
     * @return string
     */
    public function create($data) {
        return $this->model->save($this->orderDAO, $data);
    }

    /**
     * @param \stdClass $data
     * @param string $keyName
     * @return string
     */
    public function update($data, $keyName = 'id') {
        return $this->model->update($this->orderDAO, $data, $keyName);
    }

    public function delete($id)
    {
        return $this->model->delete($this->orderDAO, $id);
    }
}