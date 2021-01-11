<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Skill;
use App\User;
use App\Project_master;
use App\Project_fskill;
use App\Competition;

class HireController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skill = Skill::get();
        $mskill=DB::table('skills')->distinct()->get(['skill_master']);
        return view('hire',compact('skill','mskill'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hire.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = auth()->id();
        $pro_master = new Project_master();
        $pro_master->user_id=$id;
        $pro_master->pro_name=$request->bname;
        $pro_master->Description=$request->bdetail;
        $pro_master->Project_comp_day=$request->pro_complete_day;
        $pro_master->Project_comp_hour=$request->pro_complete_hour;
        $pro_master->Freelancer_level=$request->level;
        $pro_master->Project_budget=$request->budget;  
        $pro_master->save();    



        $fskill=$request->skill;
        foreach ($fskill as $f) {
            $pro_fskill=new Project_fskill();
            $pro_fskill->pro_id=$pro_master->id;
            $pro_fskill->skill_id=$f;
            $pro_fskill->save();
            
        }
        
        $comp=new Competition();
        $comp->user_id=auth()->id();
        $comp->pro_id=$pro_master->id;
        $comp->competition_name=$request->cname;
        $comp->comptetion_des=$request->cdetail;
        $comp->reg_deadline=$request->Rdeadline;
        $comp->submission_deadline=$request->Sdeadline;
        $comp->save();

        return redirect()->route('hire.index');

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
}
