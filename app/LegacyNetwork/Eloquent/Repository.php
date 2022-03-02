<?php

namespace App\LegacyNetwork\Repositories\Eloquent;

use App\LegacyNetwork\Repositories\Contracts\RepositoryInterface;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class Repository implements RepositoryInterface
{
    /**
     * @var Builder
     */
    protected $model;
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
        $this->makeModel();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model)
            die("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->model = $model->newQuery()->newModelInstance();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract function model();

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'), $relations = [])
    {
        return $this->model->with($relations)->get($columns);
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model->paginate($perPage, $columns);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute = "id")
    {
        $records = $this->model->where($attribute, '=', $id)->get();
        $returnData = [];
        foreach ($records as $record) {
            foreach ($data as $key => $value) {
                $record->{$key} = $value;
            }

            $record->save();
            $returnData[] = $record;
        }

        if (count($returnData) == 1) {
            return $returnData[0];
        }

        return $returnData;
//        return $this->model->find($id)->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $relations = [], $columns = array('*'))
    {
        return $this->model->with($relations)->find($id, $columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    public function getBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->get($columns);
    }

    /**
     * @param $arrayAttributes
     * @param array $columns
     * @return Model|null|object|static
     */
    public function findByArray($arrayAttributes, $columns = array('*'))
    {
        return $this->model->where($arrayAttributes)->first($columns);
    }

    /**
     * @param $arrayAttributes
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findManyByArray($arrayAttributes, $columns = array('*'))
    {
        return $this->model->where($arrayAttributes)->get($columns);
    }
}