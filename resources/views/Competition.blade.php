@extends('layouts.app')
@section('content')



<div class="colorlib-blog">
	<div class="colorlib-narrow-content">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
				<span class="heading-meta">Competition </span>
				<h2 class="colorlib-heading">Search Competition </h2>
			</div>
		</div>
		<div class="row ">
			<div class="col-md-4">

				@foreach($pro_master as $p)
					<div class="" style="background-color:#eee;padding:40px 18px 40px 8px; ">
						<ul type="none">


					  		@foreach($competition as $c)
					  			@if($p->id == $c->pro_id)
					  				<li>Competiton Name : {{ $c->competition_name }} </li>	
					  				<li>Registration Last Date :{{$c->reg_}}</li>			
					  				<li>Registration Last Date :{{$c->reg_deadline}}</li>	
					  			@endif
					  		@endforeach
					  
							<li>Skill : 
							  @foreach($pro_fskill as $pf)
							  	@if($p->id==$pf->pro_id)
							  		@foreach($skill as $s)
							  			@if($s->id == $pf->skill_id)
							  				{{ $s->skill}},
							  			@endif
							  		@endforeach
							  	@endif
							  @endforeach
							</li>

					  
						</ul>
						<br>
						<center><a class="btn btn-primary btn-lg" href="{{ URL::to('competitionDetail/'.$p->id) }}" role="button">Learn more</a></center>
					</div>
					
				@endforeach
			</div>
		</div>
	</div>
</div>

@endsection