<?php

namespace Application\Libraries\Database;

use Lustre\Database\Database;
use PDO;

class OrdersDAO extends Database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findUserByCredential($table, $username, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE username=:username AND password=:password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll($table, array $where = NULL)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table} ORDER BY created_date DESC");
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}