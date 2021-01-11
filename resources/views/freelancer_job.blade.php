@extends('layouts.app')
@section('content')

	<div class="colorlib-services ">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Job</span>
					<h2 class="colorlib-heading">Find Freelancer Job</h2>
				</div>
			</div>

			<div class="row">
				<form action="{{ route('freelancer_job.store') }}" method="POST">
				@csrf 
					<div class="col-md-8 col-md-offset-1 col-md-push-1 hire-form" id="FreelancerExpert">
						<div class="row">	
							<div class="col-md-10  col-md-pull-1 animate-box" data-animate-effect="fadeInLeft" id="BrandName">
								<h2 class="colorlib-heading">Freelancer Expertice</h2>
								<div class="form-group">
									<b>
										<h5>Select Main Category of Freelancer</h5>
									</b>
									@foreach($mskill as $m)
										<input type="checkbox" name="clases" id="activecheck{{$m->skill_master}}"> {{$m->skill_master}}<br>
										<div id="active_sub{{$m->skill_master}}" style="display: none;" class="form-group pl-5">
								        @foreach($skill as $s)
								        	@if($s->skill_master==$m->skill_master)
								        		<input type="checkbox" name="skill[]" value="{{$s->id}}"/> {{$s->skill}}<br/>
								        	@endif
								        @endforeach
						        		<br/>
						    		</div>
								    <script type="text/javascript">

											// master skill checkbox
											document.getElementById('activecheck{{$m->skill_master}}').onclick = function() {
									    	// call toggleSub when checkbox clicked
									    	// toggleSub args: checkbox clicked on (this), id of element to show/hide
									    	toggleSub(this, 'active_sub{{$m->skill_master}}');
											};

											// called onclick of checkbox
											function toggleSub(box, id) {
										    // get reference to related content to display/hide
										    var el = document.getElementById(id);
										    el.style.display = 'none';
										    if ( box.checked ) {
										        el.style.display = 'block';
										    } else {
										        el.style.display = 'none';
										    }
											}
										</script> 
									@endforeach
								</div>
							</div>
						</div>
					</div>

				<div class="col-md-8 col-md-offset-1 col-md-push-1 hire-form" id="FreelancerLevel">
					<div class="row">	
						<div class="col-md-10  col-md-pull-1 animate-box" data-animate-effect="fadeInLeft" id="BrandName">
							<h2 class="colorlib-heading ">Your Level</h2>
							<div class="form-group"> 
							    <h5>Select Freelancer Level</h5>
							    <select id="cars" class="form-control" name="level">
								 	<option value="entry">Entry Level</option>
								  	<option value="intermediate">Intermediate level</option>
								  	<option value="expert">Expert level</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 col-md-offset-1 col-md-push-1 hire-form" id="FreelancerEducation">
					<div class="row">	
						<div class="col-md-10  col-md-pull-1 animate-box" data-animate-effect="fadeInLeft" id="BrandName">
						<h2 class="colorlib-heading">Education Detail</h2>


						<div class="form-group">
						<table>
						<tr>
							<td>No of Degree Your Enter</td>
							<td>
								<select name="num" id="dropdown" class="form-control">
						    	<option value="0">Please Select</option>
						    	<option value="1">1</option>
						    	<option value="2">2</option>
						    	<option value="3">3</option>
						    	</select>
						    </td>
						</tr>
						<tr><br><br></tr>
						<tr id="textboxDiv"></tr>

						<script type="text/javascript">
							$(document).ready(function() {
							    $("#dropdown").change(function() {
							        var selVal = $(this).val();
							        $("#textboxDiv").html('');
							        if(selVal > 0) {
							            for(var i = 1; i<= selVal; i++) {
							                $("#textboxDiv").append(
							                	'<span class="heading-meta">Your Education</span>'+
							             
							                	'<div class="form-group">'+
							                		'<input type="text" class="form-control" placeholder="Enter Collage Name" name="collage['+i+']">'+
							                	'</div>'+
							                	'<div class="form-group">'+
							                		'<input type="text" class="form-control" placeholder="Enter Course Name" name="course_name['+i+']">'+
							                	'</div>'+
							                	'<div class="form-group">'+
							                		'<select class="form-control" name="degree['+i+']">'+
							                			'<option value="diploma">Diploma</option>'+
							                			'<option value="bacholer">Bacholer</option>'+
							                			'<option value="master">Master</option>'+
							                			'<option value="phd">PHD</option>'+
							                		'</select>'+
							                	'</div><div><br><br>');
							            }
							        }
							    });
							});
							</script>
						</table>
						</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 col-md-offset-1 col-md-push-1 hire-form" id="FreelancerPastExperinace">
					<div class="row">	
						<div class="col-md-10  col-md-pull-1 animate-box" data-animate-effect="fadeInLeft" id="BrandName">
							<h2 class="colorlib-heading ">Past Experinace</h2>
							<div class="form-group">
								<span class="heading-meta">Your position</span>
								<select id="cars" class="form-control" name="position">
								 	<option value="teamleader">Team Leader</option>
								  	<option value="manager">Manager</option>
								  	<option value="assistant">Assistant Manager</option>
									<option value="coordinator">Coordinator</option>
									<option value="administrator">Administrator</option>
								</select>
							</div>

							<div class="form-group"> 
								<span class="heading-meta">Company Name</span>
								<input type="text" class="form-control" placeholder="Enter Company Name" name="company_nm">
							</div>


							<div class="form-group"> 
								<span class="heading-meta">Location</span>
								<input type="text" class="form-control" placeholder="Enter Company Location" name="location">
							</div>	

							<div class="form-group"> 
								<span class="heading-meta">Joining Date</span>
								<input type="date" class="form-control" placeholder="Enter Company Location" name="joining">
							</div>	

							<div class="form-group"> 
								<span class="heading-meta">Leaving Date</span>
								<input type="date" class="form-control" placeholder="Enter Company Location" name="leaving">
							</div>	

						</div>
					</div>
				</div>

				<div class="col-md-8 col-md-offset-1 col-md-push-1 hire-form" id="FreelancerLanguage">
					<div class="row">	
						<div class="col-md-10  col-md-pull-1 animate-box" data-animate-effect="fadeInLeft" id="BrandName">
							<h2 class="colorlib-heading ">Language</h2>
							<div class="form-group"> 
								<span class="heading-meta">Select Freelancer Language</span>
								@foreach($language as $l)
									<input type="checkbox" name="lang[]" value="{{$l->id}}"/>
									{{$l->language}}<br>
								@endforeach
						</div>
					</div>
				</div>		

				<div class="col-md-8 col-md-offset-1 col-md-push-1 hire-form">	
					<div class="row">
						<div class="form-group">
							<input type="submit" class="btn btn-primary btn-send-message" value="Next">
						</div>
					</div>
				</div>				
					


				</form>
			</div>
		</div>
	</div>


@endsection
