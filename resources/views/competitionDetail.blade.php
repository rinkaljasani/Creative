@extends('layouts.app')
@section('content')



<div class="colorlib-blog">
	<div class="colorlib-narrow-content">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
				<span class="heading-meta">Competition </span>
				<h2 class="colorlib-heading">Competition Detail</h2>
			</div>
		</div>
		<div class="row ">
			<div  style="background-color:#eee; padding:60px;"><br><br>
				
				<ul type="none">
					<h3>Competition Detail</h3>
					<li>Competiton Name : {{ $competition->competition_name }}</li>
					<li>Competiton Discription : {{ $competition->comptetion_des }}</li>
					<li>Registration Deadline : {{ $competition->reg_deadline }}</li>
					<li>Submission Deadline: {{ $competition->reg_deadline }}</li>
					<li></li>
				</ul><br><br><br>

				<ul type="none">
					<h3>Project Detail Detail</h3>
					<li>Project Name : {{ $pro_master->pro_name }}</li>
					<li>Project Discription : {{ $pro_master->Description }}</li>
					<li>Project Completation Date : {{ $pro_master->Project_comp_day }}</li>
					<li>Project Competation Hour : {{ $pro_master->Project_comp_hour }}</li>
					<li>Project Budget : {{ $pro_master->Project_budget}}</li>
					<li>Skill Required : 



						@foreach($pro_fskill as $p_skill)
							@foreach($skill as $s)
								@if($s->id == $p_skill->skill_id)
									{{ $s->skill}},
								@endif
							@endforeach
						@endforeach
					</li>
					<br><br><br>
					

					<a href="{{ URL::to('participate/'.$competition->id) }}"  class="btn btn-primary btn-lg">Participate</a>	
				</ul><br><br><br>
			</div>
		</div>
	</div>
</div>

@endsection