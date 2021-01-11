<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\Skill;
use App\Freelancer;
use App\Freelancer_edu_detail;
use App\Freelancer_Lang_know;
use App\Freelancer_skill;
use App\Language;
use App\Freelancer_past_expr;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function freelancerProfile(Request $request)
    {
        $freelancer= DB::table('freelancers')->where('id', $request->id)->first();
        $user_detail=DB::table('users')->where('id',$freelancer->user_id)->first(); 
        $freelancer_edu=DB::table('freelancer_edu_details')->where('f_id',$request->id)->get();
        $freelancer_exp=DB::table('freelancer_past_exprs')->where('f_id',$request->id)->get();
        $freelancer_skill=DB::table('freelancer_skills')->where('f_id',$request->id)->get();
        $mskill=DB::table('skills')->distinct()->get(['skill_master']);

        return View('freelancer_profile')
        ->with('freelancer',$freelancer)
        ->with('user_detail',$user_detail)
        ->with('user_lang', Freelancer_lang_know::all())
        ->with('language', Language::all())
        ->with('user_edu',$freelancer_edu)
        ->with('user_exp',$freelancer_exp)
        ->with('freelancer_skill',$freelancer_skill)
        ->with('mskill',$mskill)
        ->with('skill', Skill::all());


    }

    public function editUserDetail(Request $request)
    {
        $user_detail=DB::table('users')->where('id',$request->id)->first(); 
        return View('edit_userDetail')
        ->with('user_lang', Freelancer_lang_know::all())
        ->with('language', Language::all())
        ->with('user_detail',$user_detail);
    }
    
}
