<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Freelancer_lang_know;
use App\Freelancer_past_expr;
use App\Freelancer_skill;
use App\Language;
use App\Skill;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
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
    public function edit(Request $request)
    {
        $freelancer= DB::table('freelancers')->where('id', $request->id)->first();
        $user_detail=DB::table('users')->where('id',$freelancer->user_id)->first(); 
        $freelancer_edu=DB::table('freelancer_edu_details')->where('f_id',$request->id)->get();
        $freelancer_exp=DB::table('freelancer_past_exprs')->where('f_id',$request->id)->get();
        $freelancer_skill=DB::table('freelancer_skills')->where('f_id',$request->id)->get();
        $freelancer_lang=DB::table('freelancer_lang_knows')->where('f_id',$request->id)->get();
        $mskill=DB::table('skills')->distinct()->get(['skill_master']);

        return View('freelancer_profile_update')
        ->with('freelancer',$freelancer)
        ->with('user_detail',$user_detail)
        ->with('user_lang', $freelancer_lang)
        ->with('language', Language::all())
        ->with('user_edu',$freelancer_edu)
        ->with('user_exp',$freelancer_exp)
        ->with('freelancer_skill',$freelancer_skill)
        ->with('mskill',$mskill)
        ->with('skill', Skill::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //user data
        $user=User::find($request->u_id);
        $user->fname=$request->fname;
        $user->lname=$request->lname;
        $user->email=$request->email;
        $user->mobile_number=$request->number;
        $user->address=$request->address;
        if($request->file=='' && $request->file==NULL)
        {
            $user->image=$user->image;    
        }
        else{
            echo $user->image=$request->image;
            $new_image=rand().'.'.$user->image->getClientOriginalExtension();
            echo $user->image->move(public_path("image"),$new_image);
            $user->image=$new_image;    
        }
        //$user->save();
        
        //freelancer language
        echo "<br>Freelancer Language<br>";
        
        $lang=$request->lang;
        if($lang==null)
        {
            
            $freelancer_lang= DB::table('freelancer_lang_knows')->get();
            foreach($freelancer_lang as $value)
            {
                if($value->status==1)
                    {
                        echo $value->id;
                        $update=Freelancer_lang_know::find($value->id);
                        $update->status=0;
                        $update->save();
                    }
            }
        }
        else
        {
            
            $freelancer_lang= DB::table('freelancer_lang_knows')->get();
            foreach ($freelancer_lang as $value) 
            {
                foreach ($lang as $l) 
                {
                    if($value->lang_id==$l && $value->status!=1)
                    {
                        $value->id;
                        $update=Freelancer_lang_know::find($value->id);
                        $update->status=1;
                        $update->save();
                    } 
                    elseif($value->lang_id!=$l)
                    {
                        $lang=new Freelancer_Lang_know();
                        $lang->f_id=$request->f_id;
                        $lang->lang_id=$l;
                        $lang->status=1;
                        $lang->save();
                    }
                    else
                    {
                        $value->id;
                        $update=Freelancer_lang_know::find($value->id);
                        $update->status=0;
                        $update->save();
                    }

                }
            }
        
        } 
        

        //freelancer skill table
        echo "<br>Freelancer Skill<br>";
        $fskill=$request->skill;
        if($fskill==null)
        {
            
            $freelancer_skill= DB::table('freelancer_skills')->get();
            foreach($freelancer_skill as $value)
            {
                if($value->status==1)
                    {
                        $value->id;
                        $update=Freelancer_skill::find($value->id);
                        $update->status=0;
                        $update->save();
                    }
            }
        }
        else
        {
            
            $freelancer_skill= DB::table('freelancer_skills')->get();
            foreach ($freelancer_skill as $value) 
            {
                foreach ($fskill as $skill) 
                {
                    if($value->skill_id==$skill && $value->status!=1)
                    {
                        $value->id;
                        $update=Freelancer_Skill::find($value->id);
                        $update->status=1;
                        $update->save();
                    } 
                    elseif($value->skill_id!=$skill)
                    {
                        $skill=new Freelancer_Skill();
                        $skill->f_id=$request->f_id;
                        $skill->skill_id=$skill;
                        $skill->status=1;
                        $skill->save();
                    }
                    else
                    {
                        $value->id;
                        $update=Freelancer_Skill::find($value->id);
                        $update->status=0;
                        $update->save();
                    }

                 }
            }
        }

        echo "<br>Freelancer Education<br>";

        $course=$request->course_name;
        $degree=$request->degree;
        // $collage=$request->collage;
        // foreach($collage as $clg) 
        // {   

        //     $edu=Freelancer_edu_detail::find($request->f_id);

        //     echo "<br>".$edu->f_id=$request->f_id;
        //     echo "<br>".$edu->collage=$clg;
        //     echo "<br>".$edu->course=$course[$key];
        //     echo "<br>".$edu->degree=$degree[$key];
        //     $edu->save();
        // }
        
        

        //freelancer past experiance
        echo "<br>Freelancer past<br>";
        echo $request->f_id;
        $past=Freelancer_past_expr::find($request->past_id);
        echo "<br>".$past->f_id=$request->f_id;
        echo "<br>".$past->job_position=$request->job_position;
        echo "<br>".$past->Company_Name=$request->company;
        echo "<br>".$past->location=$request->location;
        echo "<br>".$past->joining_date=$request->joining_date;
        echo "<br>".$past->leaving_date=$request->leaving_date;
        $past->save();



        //return back();
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
