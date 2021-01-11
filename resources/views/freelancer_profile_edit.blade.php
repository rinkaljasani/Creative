@extends('layouts.app')

@section('content')
	<div class="colorlib-about">
		<div class="colorlib-narrow-content">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 animate-box" data-animate-effect="fadeInRight">
					<div class="fancy-collapse-panel">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default">
							    <div class="panel-heading" role="tab" id="headingOne">
							        <h4 class="panel-title">
							            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Edit Personal Detail
							            </a>
							        </h4>
							        
							    </div>

				        	@foreach($user as $key => $u)

							    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							         <div class="panel-body">
							            <div class="row">
								      		<div class="col-md-6">
								      			<div class="form-group">
													<input type="text" class="form-control" placeholder="First Name" value="{{$u->fname}}">
												</div>
										
												<div class="form-group">
													<input type="text" class="form-control" placeholder="Last Name" value="{{$u->lname}}">
												</div>
												<div class="form-group">
													<input type="email" class="form-control" placeholder="Email" value="{{$u->email}}">
												</div>
												<div class="form-group">
													 <input type="text" class="form-control" name="mobile_number" placeholder="Mobile Number"
													 value="{{$u->mobile_number}}">
												</div>
												<div class="form-group">
													<textarea class="form-control" placeholder="address">{{$u->address}}</textarea>
												</div>
												<div class="form-group">
													Language : 
													<br/>
													@foreach($languages as $l)
													@foreach($freelancer_lang as $fl)
													

														<input type="checkbox" name="lang[]" value={{ $l->language }} id="activecheck" checked="">  {{$l->language}}<br>

													@endforeach
													@endforeach
												</div>
								      		</div>
								      		<div class="col-md-6">
												<img src="/image/{{$u ->image}}" width="350" height="400" />
												<br><br>
												<input type="file" name="image">
								      		</div>
								      	</div>
							         </div>
							    </div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection