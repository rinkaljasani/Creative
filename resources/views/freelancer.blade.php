@extends('layouts.app')
@section('content')

	<div class="colorlib-work">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
					<span class="heading-meta">Freelancer</span>
					<h2 class="colorlib-heading">All Category Freelancer</h2>
				</div>
			</div>
			<div class="row">
			@foreach($freelancer as $f)
			<div class="col-md-3 animate-box" data-animate-effect="fadeInLeft">
				@foreach($user as $u)
					@if($u->id==$f->user_id)
					<div class="project" style="background-image: url('/image/{{ $u->image }}');">
					@endif
				@endforeach
					<div class="desc">
						<div class="con">
							@foreach($user as $u)
							<h3><a href="{{ URL::to('freelancer_profile/'.$f->id) }}">
								@if($u->id == $f->user_id)
									{{$u->fname}} 	 {{$u->lname}}
								@endif
							</a></h3>
							@endforeach

							@foreach($f_skill as $fs)
							@if($fs->user_id == $f->user_id)
								@foreach($skill as $s)
									@if($s->id==$fs->skill_id)
										<span>{{$s->skill}}</span>
									@endif
								@endforeach
							@endif
							@endforeach
							<span></span>
							<p class="icon">
								<span><a href="#"><i class="icon-share3"></i></a></span>
								<span><a href="#"><i class="icon-eye"></i> 100</a></span>
								<span><a href="#"><i class="icon-heart"></i> 49</a></span>
							</p>
						</div>
					</div>
				</div>
			</div>
			@endforeach 
			</div>
		</div>

@endsection