<?php

namespace Application\Libraries\Database;

use Application\Models\Users;
use Lustre\Database\Database;
use PDO;

class UsersDAO extends Database
{
    protected $model;

    public function __construct()
    {
        parent::__construct();

        $this->model = new Users();
    }

    public function getAll($table = null, array $where = NULL)
    {
        $table = is_null($table) ? $this->model->table : $table;

        $query = $this->pdo->prepare("SELECT * FROM {$table}");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function userExist($id) {
        $result = $this->find($this->model->table, $id);

        return count($result) > 0;
    }
}