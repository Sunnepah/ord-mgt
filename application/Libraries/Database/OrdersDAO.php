<?php

namespace Application\Libraries\Database;

use Application\Models\Orders;
use Lustre\Database\Database;
use PDO;

class OrdersDAO extends Database
{
    protected $model;

    public function __construct()
    {
        parent::__construct();

        $this->model = new Orders();
    }

    public function getAll($table = null, array $where = NULL)
    {
        $table = is_null($table) ? $this->model->table : $table;

        $query = $this->pdo->prepare("SELECT * FROM {$table}");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}