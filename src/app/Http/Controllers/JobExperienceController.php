<?php

namespace App\Http\Controllers;

use App\Models\JobExperience;
use App\Models\MasterBusiness;
use App\Models\MasterOccupation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class JobExperienceController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show() {
        $this->getOccupations();
        return view('job_experience.show');
    }

    public function getAllExperiences(){
        Log::info("来たよ");
        $userId = \Auth::id();
        $jobExperience = JobExperience::where('user_id', 3)->get()->toArray();
        Log::info($userId);
        Log::info($jobExperience);
        return response()->json($jobExperience);
    }

    public function getBusinesses(){
        $businesses = MasterBusiness::all()->pluck('name', 'id');
        return response()->json($businesses);
    }

    public function getOccupations(){
        $occupations = MasterOccupation::all()->pluck('name', 'id');
        return response()->json($occupations);
    }

    public function store(Request $request){
        dd($request->all());
        $jobExperience = new JobExperience();
        $jobExperience->executeFill($request->all());

        $jobExperience->save();
    }

    public function create()
    {
        return view('job_experience.create');
    }
}
