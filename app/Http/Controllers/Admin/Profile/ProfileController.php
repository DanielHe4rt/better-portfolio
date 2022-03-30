<?php


namespace App\Http\Controllers\Admin\Profile;


use App\Http\BaseController;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Repositories\Admin\Profile\ProfileRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class ProfileController extends BaseController
{
    use ApiResponse;

    public function __construct(ProfileRepository $repository)
    {
        $this->repository = $repository;
    }

    public function viewProfile(): View
    {
        $fields = $this->repository->build();
        return view('admin.profile.all', ['fields' => $fields]);
    }

    public function putProfileData(UpdateProfileRequest $request, int $fieldId): JsonResponse
    {
        $result = $this->repository->update($fieldId, $request->validated());
        return $this->success($result);
    }
}
