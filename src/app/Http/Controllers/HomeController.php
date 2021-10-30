<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobExperience;
use App\Models\UserLicense;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return Inertia::render('Index', [
            'userInfo' => \Auth::user(),
            'experiences' => JobExperience::where('user_id', \Auth::id())->orderBy('work_start_date', 'asc')->with(['business', 'occupation'])->get()->toArray(),
            'userLicenses' => UserLicense::where('user_id', \Auth::id())->with(['license'])->get()->toArray(),
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }
}
