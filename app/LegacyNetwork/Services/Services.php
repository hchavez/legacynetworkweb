<?php

namespace App\LegacyNetwork\Repositories\Services;

use App\LegacyNetwork\Repositories\Contracts\ServicesInterface;
use App\LegacyNetwork\Repositories\Eloquent\Repository;
use Illuminate\Container\Container as App;

abstract class Services implements ServicesInterface
{
    /**
     * @var Repository
     */
    protected $repository;
    /**
     * @var App
     */
    private $app;

    /**
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeRepository();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function makeRepository()
    {
        return $this->repository = $this->app->make($this->repository());
    }

    abstract function repository();

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'))
    {
        return $this->repository->all($columns);
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->repository->paginate($perPage, $columns);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->repository->update($data, $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $relations = [], $columns = array('*'))
    {
        return $this->repository->find($id, $relations, $columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = array('*'))
    {
        return $this->repository->findBy($attribute, $value, $columns);
    }

    public function getBy($attribute, $value, $columns = array('*'))
    {
        return $this->repository->getBy($attribute, $value, $columns);
    }

    public function findByArray($arrayAttributes, $columns = array('*'))
    {
        return $this->repository->findByArray($arrayAttributes, $columns);
    }


    /**
     * @param $arrayAttributes
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findManyByArray($arrayAttributes, $columns = array('*'))
    {
        return $this->repository->findManyByArray($arrayAttributes, $columns);
    }
}