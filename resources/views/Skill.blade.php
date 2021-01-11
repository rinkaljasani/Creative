@extends('layouts.app')
@section('content')

<div class="colorlib-blog">
	<div class="colorlib-narrow-content">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
				<span class="heading-meta">Skill</span>
				<h2 class="colorlib-heading">Freelancer Skill </h2>
			</div>
		</div>
		<div class="row">
		@foreach($skill as $s)
			<div class="col-md-4">
				<a href="{{ URL::to('skillexpert/'.$s->id) }}" class="services-wrap animate-box" data-animate-effect="fadeInRight">
					<div class="services-img" style="background-image: url('{{ asset('images/skill/'.$s->image) }}')"></div>
					<div class="desc">
						<h3>{{ $s->skill }}</h3>
					</div>
				</a>
			</div>
		@endforeach
		</div>
	</div>
</div>

@endsection