<?php


namespace App\Repositories\Place;


use App\Entities\Place\Place;
use App\Repositories\BaseRepository;

class PlaceRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Place();
    }

    public function create(array $data)
    {
        if (isset($data['skills'])) {
            $skills = $data['skills'];
            unset($data['skills']);
        }
        $model = parent::create($data);
        if(isset($data['skills'])){
            $skills ? $model->skills()->sync($skills) : null;
        }
        return $model;
    }

    public function update($id, array $data)
    {
        $skills = false;
        if (isset($data['skills'])) {
            $skills = $data['skills'];
            unset($data['skills']);
        }
        $model = $this->model
            ->find($id);
        $model->update($data);
        foreach($data['translate'] as $translate){
            $model->translation()->find($translate['id'])->update($translate);
        }
        $skills ? $model->skills()->sync($skills) : null;
        return $model;
    }
}
