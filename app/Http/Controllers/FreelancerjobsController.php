<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Skill;
use App\Freelancer;
use App\Freelancer_edu_detail;
use App\Freelancer_Lang_know;
use App\Freelancer_skill;
use App\Language;
use App\Freelancer_past_expr;
use Illuminate\Http\Request;

class FreelancerjobsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $skill = Skill::get();
        $language=Language::all();
        $mskill=DB::table('skills')->distinct()->get(['skill_master']);
        return view('freelancer_job',compact('skill','mskill','language'));
    }

    public function store(Request $request)
    {

        //current user id
        $id = auth()->id();
        


        //freelancer table
        echo "<br> Freelancer";
        $freelancer=new Freelancer();
        echo "<br>".$freelancer->user_id=$id;
        echo "<br>".$freelancer->level=$request->level;
        $freelancer->save();
        $freelancerid=$freelancer->id;


        //freelancer skill table
        echo "<br>Freelancer Skill<br>";
        $fskill=$request->skill;
        foreach ($fskill as $f) {
            $fskill=new Freelancer_skill();
            echo "<br>user id".$fskill->f_id=$freelancerid;
            echo "<br>skill id".$fskill->skill_id=$f;
            $fskill->save();
        }

        

        //freelancer education detail table
        echo "<br>Freelancer Education<br>";

        $course=$request->course_name;
        $degree=$request->degree;
        $collage=$request->collage;
        foreach($collage as $key => $clg) 
        {   
            $edu=new Freelancer_edu_detail();
            echo "<br>".$edu->f_id=$freelancerid;
            echo "<br>".$edu->collage=$clg;
            echo "<br>".$edu->course=$course[$key];
            echo "<br>".$edu->degree=$degree[$key];
            $edu->save();
        }
        
        

        //freelancer past experiance
        echo "<br>Freelancer past<br>";
        $past=new Freelancer_past_expr();
        echo "<br>".$past->f_id=$freelancerid;
        echo "<br>".$past->job_position=$request->position;
        echo "<br>".$past->Company_name=$request->company_nm;
        echo "<br>".$past->location=$request->location;
        echo "<br>".$past->joining_date=$request->joining;
        echo "<br>".$past->leaving_date=$request->leaving;
        $past->save();




        //freelancer Language table
        echo "<br>Freelancer Language<br>";
        $lang=$request->lang;
        foreach ($lang as $l) 
        {
            $lang=new Freelancer_Lang_know();
            echo "<br>".$lang->f_id=$freelancerid;
            echo "<br>".$lang->lang_id=$l;
            echo "<br>".$lang->status=1;
            echo "<br>";
            $lang->save();
        }    


        return redirect('freelancer');

    }

   
}
