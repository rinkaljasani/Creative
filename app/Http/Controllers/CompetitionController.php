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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $skill= new Skill::all();
        // $pro_master=Project_master::all();
        // $pro_fskill=Project_fskill::all();
        // $competition=Competition::all();
        // return view('Competition',['skill'=>$skill , 'pro_master'=>$pro_master, 'competition'=>$competition,'pro_fskill'=>$pro_fskill]);


        return View('Competition')
        ->with('skill', Skill::all())
        ->with('pro_fskill', Project_fskill::all())
        ->with('pro_master', Project_master::all())
        ->with('competition', Competition::all()); 
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
        $comp = new Competition_participant();
        $comp->comp_id=$request->id;
        $comp->user_id = Auth::id();
        $comp->sample_data="";
        $comp->status=0;
        $comp->save();

        return view('participate');
    }
}
