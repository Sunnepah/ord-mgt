<?php

namespace Application\Libraries\Database;

use Application\Models\Product;
use Lustre\Database\Database;
use PDO;

class ProductsDAO extends Database
{
    protected $model;

    public function __construct()
    {
        parent::__construct();

        $this->model = new Product();
    }

    public function getAll($table = null, array $where = NULL)
    {
        $table = is_null($table) ? $this->model->table : $table;

        $query = $this->pdo->prepare("SELECT * FROM {$table}");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findOne($id) {
        return $this->find($this->model->table, $id);
    }
}