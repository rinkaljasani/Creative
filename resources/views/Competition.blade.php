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
			<table class="table">
				<tr>
					<td>Competiton Name </td>
					<td>Registration Last Date :</td>
					<td>Skill</td>
					<td>No Of Participant</td>
					<td colspan="3"><center>Action</center></td>
				</tr>
			@foreach($pro_master as $p)
				@foreach($competition as $c)
					<?php $count=0;?>
					<tr>
					@if($p->id == $c->pro_id && $c->reg_deadline>date('Y-m-d'))
						
						<td>{{ $c->competition_name }} </td>	
						<td>{{$c->reg_deadline}}</td>
						<td>
							 
							@foreach($pro_fskill as $pf)
							 	@if($p->id==$pf->pro_id)
							  		@foreach($skill as $s)
							  			@if($s->id == $pf->skill_id)
							  				{{ $s->skill}},
							  			@endif
							  		@endforeach
							  	@endif
							  @endforeach
						</td>
						<td>	
							@foreach($competition_participant as $compPart)
								@if($compPart->comp_id == $c->id)
									<?php $count++ ?>
								@endif
							@endforeach
							{{ $count }}
						</td>
						<td><a class="btn btn-primary" href="{{ URL::to('competitionDetail/'.$p->id) }}" role="button">View</a>
						</td>
						<td><a class="btn btn-success" href="{{ URL::to('participate/'.$p->id) }}" role="button">Participate</a></td>
						<td><a class="btn btn-danger" href="{{ URL::to('participate/'.$p->id) }}" role="button">Leave Competition</a></td>
					@endif
					</tr>

				@endforeach
			@endforeach
			</table>
		</div>
	</div>
</div>

@endsection