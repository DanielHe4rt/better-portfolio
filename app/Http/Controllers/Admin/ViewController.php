<?php


namespace App\Http\Controllers\Admin;


use App\Entities\Helpers\Access;
use App\Entities\Helpers\Profile;
use App\Entities\Place\Place;
use App\Enums\Profile\ProfileEnum;
use App\Http\Controllers\Controller;
use App\Repositories\View\ViewRepository;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    use ApiResponse;

    private $repository;

    public function __construct()
    {
        $this->repository = new ViewRepository();
    }

    public function viewPortfolio(){
        $data = Profile::all();
        $result = [];

        foreach($data as $value){
            $values = [
                'value' => $value->value,
                'enabled' => $value->enabled
            ];
            $result[$value->slug] = $values;
        }

        if(env('APP_STATUS') === "MAINENTANCE"){
            return view('mainentance');
        }

        $places = Place::with(['translation' => function($query) {
            $query->where('lang','=',App::getLocale());
        }])->get();

        return view('portfolio', ['profile' => $result, 'places' => $places]);
    }

    public function viewAllPlaces(){
        return view('admin.places.all');
    }

    public function viewDashboard()
    {

        $data = $this->repository->getAccessData();
        return view('admin.dashboard', ['statistics' => json_encode($data)]);
    }

    public function viewLogin()
    {
        return view('auth.login');
    }

    public function viewAllMails()
    {
        $mails = \App\Entities\Mailer\Mail::orderBy('created_at', 'DESC')->get();
        return view('admin.mailer.all', ['mails' => $mails]);
    }

    public function viewAllSkills()
    {
        return view('admin.skill.all');
    }

    public function viewAllProfile(){
        return view('admin.profile.all');
    }
}
