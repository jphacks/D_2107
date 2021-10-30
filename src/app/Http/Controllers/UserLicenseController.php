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
use App\Models\MasterLicense;
use App\Models\UserLicense;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserLicenseController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show() {
        return Inertia::render('変えてね', [
            'allLicenses' => MasterOccupation::all()->pluck('name', 'id')
        ]);
    }

    public function store(Request $request)
    {
        Log::info($request);
        $params = [
            'user_id' => $request['user_id'],
            'master_license_id' => $request['master_license_id'],
            'note' => $request['note'],
            'received_date' => $request['received_date'],
        ];

        $userLincense = new UserLicense();
        $userLincense->fill($params);
        $userLincense->save();

        return response()->json(['message' => '更新完了']);
    }

    public function edit($id){
        $userLincense = UserLicense::find($id);
        return Inertia::render('変えてね', [
            'allLicenses' => MasterLicense::all()->pluck('name', 'id'),
            'userLicense' => $userLincense,
        ]);
    }

    public function update($id, Request $request){
        $params = [
            'user_id' => $request['user_id'],
            'master_license_id' => $request['master_license_id'],
            'received_date' => $request['received_date'],
            'work_end_date' => $request['work_end_date'],
        ];

        $userLincense = UserLincense::find($id);
        $userLincense->fill($params);
        $userLincense->save();

        return response()->json(['message' => '更新完了']);
    }

    public function create()
    {
        return Inertia::render('AddLicense', [
            'allLicenses' =>  MasterLicense::all()->pluck('name', 'id'),
            'userId' => \Auth::id()
        ]);
    }
}
