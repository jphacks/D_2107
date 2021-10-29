<?php

namespace App\Http\Controllers;

use App\Models\JobExperience;
use App\Models\MasterBusiness;
use App\Models\MasterOccupation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\AnyRequest;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;


class JobExperienceController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show() {
        $this->getOccupations();
        return view('job_experience.show');
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
        return Inertia::render('AddExperience', [
            'allBusinesses' =>  MasterBusiness::all()->pluck('name', 'id'),
            'allOccupations' => MasterOccupation::all()->pluck('name', 'id')
        ]);
    }
}
