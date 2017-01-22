<?php

namespace Application\Libraries\Database;

use Application\Models\Orders;
use Lustre\Database\Database;
use PDO;

class OrdersDAO extends Database
{
    protected $model;

    public function __construct() {
        parent::__construct();

        $this->model = new Orders();
    }

    public function getAll($table = null, array $where = NULL) {
        $query = $this->pdo->query("
            SELECT ords.id, ords.quantity, ords.order_date, ords.order_amount,
                    ords.product_id, ords.user_id,
                    prod.name as product_name, usr.name as user_name from orders as ords
                    INNER JOIN products as prod ON prod.id = ords.product_id
                    INNER JOIN users as usr ON usr.id = ords.user_id");

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getOrdersWhere($where) {
        $query = $this->pdo->query("
            SELECT ords.id, ords.quantity, ords.order_date, ords.order_amount,
                    ords.product_id, ords.user_id, prod.name as product_name, usr.name as user_name from orders as ords
                    INNER JOIN products as prod ON prod.id = ords.product_id
                    INNER JOIN users as usr ON usr.id = ords.user_id
                    WHERE " . $where
        );

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTodayOrders() {
        return $this->getOrdersWhere("DATE(order_date) = DATE(NOW())");
    }

    public function getLastWeekOrders() {
        return $this->getOrdersWhere("order_date >= curdate() - INTERVAL DAYOFWEEK(curdate())+6 DAY
                    AND order_date < curdate() - INTERVAL DAYOFWEEK(curdate())-1 DAY");
    }
}