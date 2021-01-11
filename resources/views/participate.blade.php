@extends('layouts.app')
@section('content')



<div class="colorlib-blog">
	<div class="colorlib-narrow-content">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
				<span class="heading-meta">Participate </span>
				<h2 class="colorlib-heading">All Participate Competition</h2>
			</div>
		</div>
		<div class="row">

			<table class="table">
				<tr>
					<td>Sr No.</td>
					<td>Competition Name</td>
					<td>Registration Date</td>
					<td>No Of Participate</td>
					<td colspan="3"><center>Action</center></td>
				</tr>
				<?php 
					$srNo=1;
					$count=0;
				?>
				@foreach($competition as $comp)
				<tr>
					<td>{{ $srNo++}}</td>
					<td>{{ $comp->competition_name }}</td>
					<td>{{ $comp->reg_deadline }}</td>
					<td>
						@foreach($competition_participant as $compPart)
							@if($compPart->comp_id == $comp->id)
								<?php $count++ ?>
							@endif
						@endforeach
						{{ $count }}
					</td>
					<td><a href="" class="btn btn-success">View</a></td>
					<td><a href="" class="btn btn-danger">Delete</a></td>
					<td><a href="" class="btn btn-info">Participate</a></td>
				</tr>
				@endforeach
			</table>

		</div>
	</div>
</div>
@endsection