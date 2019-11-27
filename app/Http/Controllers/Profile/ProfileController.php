<?php


namespace App\Http\Controllers\Profile;


use App\Entities\Helpers\Profile;
use App\Http\BaseController;
use App\Repositories\Profile\ProfileRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ProfileController extends BaseController
{
    use ApiResponse;
    public function __construct(Profile $model, ProfileRepository $repository)
    {
        $this->model = $model;
        $this->repository = $repository;
    }

    public function getProfileData(Request $request){

    }

    public function putProfileData(Request $request, $id){
        $request->merge([
            'enabled' => $request->has('enabled') ? true : false
        ]);

        $result = $this->repository->update($id,$request->all());
        return $this->success($result);
    }
}
