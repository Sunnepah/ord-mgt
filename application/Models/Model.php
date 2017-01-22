<?php

namespace Application\Models;

use Lustre\Database\Database;

abstract class Model
{
    /**
     * @param Database $db
     * @return array
     */
    public function findAll(Database $db) {
        return $db->getAll($this->table);
    }

    /**
     * @param Database $db
     * @param $data
     * @return string
     */
    public function save(Database $db, $data) {
        return $db->insert($this->table, $data);
    }

    /**
     * @param Database $db
     * @param $data
     * @param $id
     * @return bool|\mysqli_result
     */
    public function update(Database $db, $data, $id) {
        return $db->update($this->table, $data, $id);
    }

    public function find(Database $db, $id) {
        return $db->find($this->table, $id);
    }

    public function delete(Database $db, $id) {
        return $db->delete($this->table, $id);
    }
}