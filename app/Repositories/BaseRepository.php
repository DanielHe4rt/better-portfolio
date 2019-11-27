<?php


namespace App\Repositories;


class BaseRepository
{
    public $model;

    public function findById($id, array $includes = []){
        $model = $this->model->findOrFail($id);
        if(count($includes) > 0){
            $model->load($includes);
        }
        return $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->model->find($id)->delete();
    }

}
