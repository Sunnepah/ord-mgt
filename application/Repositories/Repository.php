<?php

namespace Application\Repositories;

interface Repository
{
    /**
     * Return a collection of models
     * @internal param array $columns
     */
    public function all();

    /**
     * Create a new model object
     *
     * @param  \stdClass $data
     * @return mixed
     */
    public function create($data);

    public function update($data, $keyName);

    public function find($id);

    public function delete($id);
}