@extends('layouts.app')
@section('content')

	<div class="colorlib-services">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Hire</span>
					<h2 class="colorlib-heading">Hire best Freelancer</h2>
				</div>
			</div>
			
			<div class="row">
				<form action="{{ route('hire.store') }}" method="POST">
					@csrf 
					<div class="col-md-8 col-md-offset-1 col-md-push-1 hire-form" id="BrandName">
						<div class="row">	
							<div class="col-md-10  col-md-pull-1 animate-box" data-animate-effect="fadeInLeft" id="BrandName">
								<h2 class="colorlib-heading ">Brand Name</h2>
								<div class="form-group">
									<span class="heading-meta">Name Your Brand</span>
									<input type="text" class="form-control" placeholder="Name" name="bname">
								</div>
							</div>
						</div>
					</div>



					<div class="col-md-8 col-md-offset-1 col-md-push-1 hire-form" id="BrandDetail">
						<div class="row">	
							<div class="col-md-10  col-md-pull-1 animate-box" data-animate-effect="fadeInLeft" id="BrandName">
								<h2 class="colorlib-heading">Brand Detail</h2>
								<div class="form-group">
									<span class="heading-meta">Your brand or advertisment compelete detail</span>
									<textarea name="bdetail" id="message" cols="30" rows="7" class="form-control" placeholder="Discripetive Detail"></textarea>
								</div>
							</div>
						</div>
					</div>



					<div class="col-md-8 col-md-offset-1 col-md-push-1 hire-form" id="FreelancerExpert">
						<div class="row">	
							<div class="col-md-10  col-md-pull-1 animate-box" data-animate-effect="fadeInLeft" id="BrandName">
								<h2 class="colorlib-heading">Freelancer Expertice</h2>
								<div class="form-group">
									<b><span class="heading-meta">Select Main Category of Freelancer</span></b>
									    @foreach($skill as $s)
									        <input type="checkbox" name="skill[]" value="{{$s->id}}"/> {{$s->skill}}<br/>
									    @endforeach
							    	<br/><br/>
							    </div>
							    <div class="form-group"> 
								    <span class="heading-meta">Select Freelancer Level</span>
								    <select id="cars" class="form-control" name="level">
										<option value="entry">Entry Level</option>
										<option value="intermediate">Intermediate level</option>
										<option value="expert">Expert level</option>
									</select>
								</div>
								<br/><br/>


							    <div class="form-group">
									<span class="heading-meta">Select Freelancer Language</span>
									<input type="checkbox" name="lang[]" value="english" id="activecheck">  English<br>
									<input type="checkbox" name="lang[]" value="gujrati" id="activecheck">  Gujarati<br>
									<input type="checkbox" name="lang[]" value="hindi" id="activecheck">  Hindi<br>
								</div>	  

							</div>
						</div>
					</div>
					

					<div class="col-md-8 col-md-offset-1 col-md-push-1 hire-form" id="Competition">
						<div class="row">	
							<div class="col-md-10  col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
								<h2 class="colorlib-heading">Competition Detail</h2>
								<div class="form-group">
									<span class="heading-meta">Competition Name</span>

									<input type="text" class="form-control" placeholder="Competition Name" name="cname">
								</div>
								<div class="form-group">
									<span class="heading-meta">Competition Detail</span>
									<textarea id="message" cols="30" rows="7" class="form-control" placeholder="Competion  Discription" name="cdetail"></textarea>
								</div>
								<div class="form-group">
									<span class="heading-meta">Registration Deadline</span>
									<input type="date" id="start" class="form-control" placeholder="Registraion Deadline" name="Rdeadline">
									<h1 id="result"></h1>
								</div>
								<div class="form-group">
									<span class="heading-meta">Submission Deadline</span>
									<input type="date" id="end" class="form-control" placeholder="Submission Deadline" name="Sdeadline">
									<h1 id="result1"></h1>
								</div>
							</div>
						</div>
					</div>

					<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

					<script>

					$(document).ready(function(){
						var sdate="";
						var edate="";
					    $("#start").on("input", function(){
					        sdate=$('#start').val();
					        //$("#result").text(sdate);
					    });
					    $("#end").on("input",function(){
					    	edate=$('#end').val();
					    	//$('#result1').text(edate);

					    	if(sdate>=edate)
					    	{

					    		alert("Submission date must be greater then Registraion date");
					    		$('#end').val('');
					    	}
					    });

					});

					</script>


					<div class="col-md-8 col-md-offset-1 col-md-push-1 hire-form" id="Budget">
						<div class="row">	
							<div class="col-md-10  col-md-pull-1 animate-box" data-animate-effect="fadeInLeft" >
								<h2 class="colorlib-heading">Project Other Detail</h2>
								<div class="form-group">
									<span class="heading-meta">Project Completetion Day</span>
									<input type="number" class="form-control" placeholder="Completetion Hour" name="pro_complete_day">
								</div>
								<div class="form-group">
									<span class="heading-meta">Project Completetion Hour</span>
									<input type="number" class="form-control" placeholder="Completetion Hour" name="pro_complete_hour">
								</div>
								<div class="form-group">
									<span class="heading-meta">Project Budject</span>
									<input type="number" class="form-control" placeholder="Budget" name="budget">
								</div>
								
							</div>
						</div>
					</div>



					<div class="col-md-7 col-md-push-1">
					<div class="row">
						<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInLeft">
				
								<div class="form-group">
									<input type="submit" class="btn btn-primary btn-send-message" value="Submit">
								</div>
						
						</div>
						
					</div>
				</div>

				</form>
			</div>
		</div>
	</div>
@endsection
