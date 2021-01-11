<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Skill;
use App\Freelancer;
use App\Freelancer_skill;
use App\Freelancer_lang_know;
use App\Freelancer_edu_detail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function about()
    {
        return view('about');
    }
     public function services()
    {
        return view('services');
    }
     public function blog()
    {
        return view('blog');
    }
     public function contact()
    {
        return view('contact');
    }
    public function freelancer()
    {
        return View('freelancer')
        ->with('user', User::all())
        ->with('freelancer', Freelancer::all())
        ->with('skill',Skill::all())
        ->with('f_lang', Freelancer_lang_know::all())
        ->with('f_edu', Freelancer_edu_detail::all())
        ->with('f_skill', Freelancer_skill::all()); 
    }
    public function skillExpert(Request $request)
    {   
        return view('skillFreelancer');
    }
    public function edit_userDetail(Request $request)
    {
        
    }
}
    