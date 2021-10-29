<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobExperience\CreateRequest;
use App\Models\JobExperience;
use App\Models\MasterBusiness;
use App\Models\MasterOccupation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Requests\AnyRequest;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;


class JobExperienceController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show() {
        return Inertia::render('show-experience', [
            'allOccupations' => MasterOccupation::all()->pluck('name', 'id')
        ]);
    }

    public function store(CreateRequest $request){
        $params = [
            "title" => $request['jobTitle'],
            "user_id" => $request['userId'],
            "master_occupation_id" => $request['ocuppationId'],
            "master_business_id" => $request['businessId'],
            "work_end_date" => $request['workEndDate'],
            "work_start_date" => $request['workStartDate'],
        ];

        $jobExperience = new JobExperience();
        $jobExperience->fill($params);
        $jobExperience->save();

        return response()->json(['message' => '更新完了']);
    }

    public function edit($id){
        $jobExperience = JobExperience::find($id);
        return Inertia::render('変えてね', [
            'allLicenses' => JobExperience::all()->pluck('name', 'id'),
            'jobExperience' => $jobExperience,
        ]);
    }

    public function update($id, Request $request){
        $params = [
            "title" => $request['jobTitle'],
            "user_id" => $request['userId'],
            "master_occupation_id" => $request['ocuppationId'],
            "master_business_id" => $request['businessId'],
            "work_end_date" => $request['workEndDate'],
            "work_start_date" => $request['workStartDate'],
        ];

        $jobExperience = JobExperience::find($id);
        $jobExperience->fill($params);
        $jobExperience->save();

        return response()->json(['message' => '更新完了']);
    }

    public function create()
    {
        return Inertia::render('AddExperience', [
            'allBusinesses' =>  MasterBusiness::all()->pluck('name', 'id'),
            'allOccupations' => MasterOccupation::all()->pluck('name', 'id')
        ]);
    }
}
