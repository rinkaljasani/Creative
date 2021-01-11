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
			         		<form action="{{ route('profile.update')}}" method="POST" enctype="multipart/form-data">
			         			
			         			{{ method_field('PUT') }}
			         			<input type="hidden" name="_token" value="{{ csrf_token() }}">
					            <input type="hidden" name="f_id" value="{{$freelancer->id}}">
					            <input type="hidden" name="u_id" value="{{$user_detail->id}}">
					            <div class="row "style="padding: 20px">
					            	<h3>Personal Detail :--</h3>
					            	<div class="row">
					            		<div class="col-md-12">
					            			<div class="form-group">
					            				<label>First Name : </label>
					            				<input type="text" name="fname" value="{{$user_detail->fname}}" class="form-control">
					            			</div><br>
					            			<div class="form-group">
							            		<label>Last Name : </label>
							            		<input type="text" name="lname" value="{{$user_detail->lname}}" class="form-control">
							            	</div><br>
							            	<div class="form-group">
							            		<label>Email : </label>
							            		<input type="email" name="email" value=" {{$user_detail->email}}" class="form-control">
							            	</div><br>
							            	<div class="form-group">
							            		<label>Mobile Number : </label>
							            		<input type="number" name="number" value="{{$user_detail->mobile_number}}" class="form-control">
							            	</div><br>
							            	<div class="form-group">
							            		<label>Address : </label>
							            		<textarea name="address" class="form-control">{{$user_detail->address}}</textarea>
							            	</div><br><br>
							            	<div class="form-group">
							            		<label>Image</label>
							            		<img src="/image/{{$user_detail->image}}" width="30" height="30" style="border-radius: 50%">
							            		<input type="file" name="file" value="{{$user_detail->image}}" class="form-control">
							            	</div><br>
							            	<div class="form-group row">
							            		<div class="col-md-6"><label>Language :</label> <br></div>
							            		<div class="col-md-6">
							            			@foreach($language as $lang)
							            				<input type="checkbox" name="lang[]" value="{{$lang->id}}" 
							            				@foreach($user_lang as $f_lang)
							            					@if($f_lang->lang_id == $lang->id && $f_lang->status==1)
							            						checked=""
							            					@endif 
							            				@endforeach
							            				> {{$lang->language}}<br>
							            			@endforeach
							            		</div>
					            			</div>
					            		</div>
					       			</div>
					       		</div>
					       		
					       		<hr style="border: 1px solid #ccc;">
					       		
					       		<div class="row "style="padding: 20px">
					            	<h3>Education Detail :--</h3>
					            	<div class="row">
					            		@foreach($user_edu as $f_edu)
					            			<input type="hidden" name="f_edu_id" value="{{$f_edu->id}}">
					            			<div class="col-md-12">
						            			<div class="form-group">
						            				<label>Collage Name : </label>
						            				<input type="text" name="collage" value="{{$f_edu->collage}}" class="form-control">
						            			</div><br>
						            			<div class="form-group">
						            				<label>Course Name : </label>
						            				<input type="text" name="course" value="{{$f_edu->course}}" class="form-control">
						            			</div><br>
						            			<div class="form-group">
						            				<label>Degree Name : </label>
						            				<input type="text" name="degree" value="{{$f_edu->degree}}" class="form-control">
						            			</div><br><hr>
					            			</div>
					            		@endforeach
					            	</div>
					       		</div>

					       		<hr style="border: 1px solid #ccc;">
					       		
					       		<div class="row" style="padding: 20px;">
					       			<h3>Freelancer Skill</h3>
					       			<div class="form-group">
					       				<div class="row"> 
										@foreach($skill as $skill)
											@foreach($freelancer_skill as $f_skill)
												@if($skill->id==$f_skill->skill_id)
												<div class="col-md-3">
													<input type="checkbox" name="skill[]" value="{{$skill->id}}" checked=""> {{$skill->skill}}<br>
												</div>
												@else
												<div class="col-md-3">
													<input type="checkbox" name="skill[]" value="{{$skill->id}}"> {{$skill->skill}}<br>
												</div>
												@endif
											@endforeach
										@endforeach
										</div>
									</div>
					       		</div>

					       		<hr style="border: 1px solid #ccc;">
					       		
					       		<div class="row "style="padding: 20px">
					            	<h3>Past Experiance Detail</h3>

				            		@foreach($user_exp as $f_exp)
				            				<input type="hidden" name="past_id[]" value="{{$f_exp->id}}">
				            			<div class="form-group">
				            				<label>Job Position : </label>
				            				<input type="text" name="job_position" value="{{$f_exp->job_position}}" class="form-control">
				            			</div><br>
				            			<div class="form-group">
				            				<label>Comapany : </label>
				            				<input type="text" name="company" value="{{$f_exp->Company_Name}}" class="form-control">
				            			</div><br>
				            			<div class="form-group">
				            				<label>Joining Date : </label>
				            				<input type="date" name="joining_date" value="{{$f_exp->joining_date}}" class="form-control">
				            			</div><br>
				            			<div class="form-group">
				            				<label>Leaving Date : </label>
				            				<input type="date" name="leaving_date" value="{{$f_exp->leaving_date}}" class="form-control">
				            			</div><br>
				            			<div class="form-group">
				            				<label>Location : </label>
				            				<input type="text" name="location" value="{{$f_exp->location}}" class="form-control">
				            			</div><br>
				            			<hr>
				            		@endforeach
					       		</div>	
					       		<center><input type="submit" name="submit" value="Update" class="btn btn-success"></center>
					       	</form>
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
