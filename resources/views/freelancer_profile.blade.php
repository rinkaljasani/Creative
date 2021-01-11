@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="colorlib-about">
	<div class="colorlib-narrow-content">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 animate-box" data-animate-effect="fadeInRight">
				<div class="fancy-collapse-panel">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
					   <div class="panel-heading" role="tab" id="headingOne">
					        <h4 class="panel-title"><a>Freelancer Detail</a></h4>
					   </div>
					   <div id="collapseOne" class="panel-collapse collapse in editDetail" role="tabpanel" aria-labelledby="headingOne" >
			         	<div class="panel-body">
				            <div class="row "style="padding: 20px">
				            	<h3>Personal Detail
				            		<span style="float:right; font-size:16px">
				            			<a href="/freelancer_profile_edit/{{ $freelancer->id }}">Edit</a>
				            		</span>
				            	</h3>
				            	<div class="row">
				            		<div class="col-md-6">
				            			<ul type="none">
						            		<li>Name : {{$user_detail->fname}} {{$user_detail->lname}}</li>
						            		<li>Email : {{$user_detail->email}}</li>
						            		<li>Mobile Number : {{$user_detail->mobile_number}}</li>
						            		<li>Address : {{$user_detail->address}}</li>
						            		<li>Language : 
						            			@foreach($language as $lang)
						            				@foreach($user_lang as $u_lang)
						            					@if($lang->id === $u_lang->lang_id && $freelancer->id === $u_lang->f_id && $u_lang->status==1)
						            						{{$lang->language}},
						            					@endif
						            				@endforeach
						            			@endforeach
						            		</li>
						            	</ul>		
				            		</div>
				            		<div class="col-md-6">
				            			<center><img src="/image/{{$user_detail->image}}" width="130" height="130"  style="border-radius: 50%"></center>
				            		</div>
				            	</div>
				       		</div>

				       		<div class="row "style="padding: 20px">
				            	<h3>Education Detail</h3>
				            	<div class="row">
				            		@foreach($user_edu as $f_edu)
				            			<div class="col-md-4">
					            			<ul type="none">
					            				<li>Collage Name : {{$f_edu->collage}}</li>
					            				<li>Course Name : {{$f_edu->course}}</li>
					            				<li>Degree Name : {{$f_edu->degree}}</li>
					            			</ul>
				            			</div>
				            		@endforeach
				            	</div>
				       		</div>

				       		<div class="row" style="padding: 20px;">
				       			<h3>Freelancer Skill</h3>
				       			<ul type="none">
				       				<li>
				       					Skill : 
					            		@foreach($skill as $s)
					            			@foreach($freelancer_skill as $f_skill)
					            				@if($s->id== $f_skill->skill_id && $freelancer->id== $f_skill->f_id)
					            					{{$s->skill}},
					            				@endif
					            			@endforeach
					            		@endforeach
				       				</li>
				       			</ul>
				       		</div>

				       		<div class="row "style="padding: 20px">
				            	<h3>Past Experiance Detail</h3>

				            	<div class="row">
				            		
				            		@foreach($user_exp as $f_exp)
				            			<div class="col-md-6">
					            			<ul type="none">
					            				<li>Job Position : {{$f_exp->job_position}}</li>
					            				<li>Company Name : {{$f_exp->Company_Name}}</li>
					            				<li>Joining Date : {{$f_exp->joining_date}}</li>
					            				<li>Leaving Date : {{$f_exp->leaving_date}}</li>
					            				<li>Location : {{$f_exp->location}}</li>
					            			</ul>
				            			</div>
				            		@endforeach
				            	</div>
				       		</div>

					    </div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		


@endsection
