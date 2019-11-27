<?php


namespace App\Http\Controllers\Skills;


use App\Entities\Skill\Skill;
use App\Http\Controllers\Controller;
use App\Repositories\Skill\SkillsRepository;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    use ApiResponse;

    private $model;
    private $repository;

    public function __construct()
    {
        $this->model = new Skill();
        $this->repository = new SkillsRepository();
    }

    public function getSkills(Request $request)
    {
        $data = $this->model->all();
        return $this->success($data);
    }

    public function postSkill(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'type_id' => 'required|exists:skill_type,id',
            'time_id' => 'required|exists:skill_time,id',
            'comment' => 'string'
        ]);
        $data = $this->repository->create($request->all());
        return $this->success($data);
    }

    public function getSkill(Request $request, int $skillId)
    {

        $includes = $request->input('includes');
        $data = $includes ?
            $this->repository->findById($skillId, $includes) :
            $this->repository->findById($skillId);
        return $this->success($data);
    }

    public function putSkill(Request $request, int $skillId)
    {
        $request->merge(['id' => $skillId]);
        $this->validate($request, [
            'id' => 'exists:skills|required',
            'name' => 'string',
            'type_id' => 'exists:skill_type,id',
            'time_id' => 'exists:skill_time,id',
            'comment' => 'string'
        ]);

        $data = $this->repository->update($skillId, $request->all());
        return $this->success($data);
    }

    public function deleteSkill(Request $request, int $skillId)
    {
        $this->repository->destroy($skillId);
        return $this->success();
    }
}
