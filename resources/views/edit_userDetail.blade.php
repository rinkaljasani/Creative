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
							        <h4 class="panel-title">
							            <a>Change Your Profile</a>
							        </h4>
							    </div>
							    <div id="collapseOne" class="panel-collapse collapse in freelancer_profile" role="tabpanel" aria-labelledby="headingOne">
							        <div class="panel-body">
							            <div class="row ">
							            	<br>
							            	<div class="col-md-10 col-md-offset-1  animate-box editDetail" data-animate-effect="fadeInLeft">
												<form action=" ">
													<div class="form-group">
								      					First Name : <input type="text" name="fname" value="{{$user_detail->fname}}" class="form-control" readonly>
								      				</div><br>

								      				<div class="form-group">
								      					Last Name : <input type="text" name="lname" value="{{$user_detail->lname}}" class="form-control" readonly="">
								      				</div><br>
								      				
								      				<div class="form-group">
								      					Mobile Number : <input type="text" name="mobile_number" value="{{$user_detail->mobile_number}}" class="form-control">
								      				</div><br>
								      				
								      				<div class="form-group">
								      					address : <textarea name="address" class="form-control">{{$user_detail->address}}</textarea>
								      				</div><br>

								      				<div class="form-group">
								      					Image : <input type="file" name="image" value="{{$user_detail->image}}" class="form-control">
								      				</div><br><br><br>

								      				<div class="form-group">
								      					<center><input type="button" name="submit" value="Add changes" class="btn btn-primary btn-send-message" id="edit"></center>
								      				</div>
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
		</div>
	</div>

<script type="text/javascript">
	$('#edit').click(function(){
  $('#form').toggleClass('view');
  $('input').each(function(){
    var inp = $(this);
    if (inp.attr('readonly')) {
     inp.removeAttr('readonly');
    }
    else {
      inp.attr('readonly', 'readonly');
    }
  });
}); 
</script>
	
@endsection