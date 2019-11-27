<?php


namespace App\Http\Controllers\Places;


use App\Entities\Place\Place;
use App\Http\BaseController;
use App\Repositories\Place\PlaceRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class PlacesController extends BaseController
{
    use ApiResponse;

    public function __construct(Place $model, PlaceRepository $repository)
    {
        $this->model = $model;
        $this->repository = $repository;
    }

    public function getPlaces(Request $request)
    {
        return $this->success($this->model->all());
    }

    public function postPlace(Request $request)
    {
        $data = $this->repository->create($request->all());
        return $this->success($data);
    }

    public function getPlace(Request $request, int $placeId)
    {
        $includes = $request->input('includes');
        $data = $includes ?
            $this->repository->findById($placeId, $includes) :
            $this->repository->findById($placeId);
        return $this->success($data);
    }

    public function putPlace(Request $request, int $placeId)
    {
        $data = $this->repository->update($placeId, $request->toArray());
        return $this->success($data);
    }

    public function deletePlace(Request $request, int $placeId)
    {
        $this->repository->destroy($placeId);
        return $this->success();
    }
}
