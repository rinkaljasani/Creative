<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Skill;
use App\Project_master;
use App\Project_fskill;
use App\Competition;
use App\Competition_participant;

class CompetitionController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
     
        return View('Competition')
        ->with('skill', Skill::all())
        ->with('pro_fskill', Project_fskill::all())
        ->with('pro_master', Project_master::all())
        ->with('competition', Competition::all())
        ->with('competition_participant', Competition_participant::all()); 
            
    }

    public function competitionDetail(Request $request)
    {   
        echo $request->id;
        $pro_fskill=DB::table('project_fskills')->where('pro_id',$request->id)->get();    
        $project_master=DB::table('project_masters')->where('id',$request->id)->first();    
        $competition=DB::table('competitions')->where('pro_id',$request->id)->first();

        return View('competitionDetail')
        ->with('skill', Skill::all())
        ->with('pro_fskill', $pro_fskill)
        ->with('pro_master', $project_master)
        ->with('competition', $competition);

    }

    public function participate(Request $request)
    {
        $comp_id=$request->id;
        $user_id = Auth::id();
        $userPart=DB::table('competition_participants')
                ->where('comp_id',$comp_id)
                ->where('user_id',$user_id)
                ->get();
        $countRow=count($userPart);
        if($countRow>0)
        {

        }
        else
        {

            $comp = new Competition_participant();
            $comp->comp_id=$request->id;
            $comp->user_id = Auth::id();
            $comp->sample_data="";
            $comp->status=0;
            $comp->save();
   
        }
        // return redirect()->route('route.name', [$param]);
        return redirect()->route('competition.participateView');
    }
    public function participateView()
    {
        return view('');
    }
}
