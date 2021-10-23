<?php

namespace App\Http\Controllers;

use App\Models\JobExperience;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class JobExperienceController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show() {
        return view('jobExperience.show');
    }

    public function getAllExperiences(){
        $userId = \Auth::id();
        $jobExperience = JobExperience::where('user_id', $userId)->get()->toArray();
        return response()->json($jobExperience);
    }

    public function create()
    {
        return view('jobExperience.create');
    }
}
