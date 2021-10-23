<?php

namespace App\Http\Controllers;

use App\Models\JobExperience;
use App\Models\MasterBusiness;
use App\Models\MasterOccurpation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class JobExperienceController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show() {
        $this->getOccurpations();
        return view('jobExperience.show');
    }

    public function getAllExperiences(){
        $userId = \Auth::id();
        $jobExperience = JobExperience::where('user_id', $userId)->get()->toArray();
        return response()->json($jobExperience);
    }

    public function getBusinesses(){
        $businesses = MasterBusiness::all()->pluck('name', 'id');
        return response()->json($businesses);
    }

    public function getOccupations(){
        $occurpations = MasterOccurpation::all()->pluck('name', 'id');
        return response()->json($occurpations);
    }

    public function store(Request $request){
        $jobExperience = new JobExperience();
        $jobExperience->executeFill($request->all());

        $jobExperience->save();
    }

    public function create()
    {
        return view('jobExperience.create');
    }
}
