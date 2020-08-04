<?php


namespace App\Repositories;


use App\Interfaces\EloquenInterface;

abstract class EloquentRepository implements EloquenInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    /**
     * Set Model
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    /**
     * Get All
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Get By Id
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $result = $this->model->find($id);
        return $result;
    }

    /**
     * Create
     * @param array $data
     * @return mixed
     */
    public function create($data = [])
    {
        return $this->model->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return false|mixed
     */
    public function update($id, $data = [])
    {
        $result = $this->model->find($id);
        if($result) {
            $result->update($data);
            return $result;
        }
        return false;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function delete($id)
    {
        $result = $this->model->find($id);
        if($result) {
            $result->delete();
            return true;
        }
        return false;
    }
}
