@extends('navbar.generalMember')

@section('content')
	<div class="row">
		<div class="col-3"></div>
	 	<div class="col-6"><h2>Notices</h2>
	 	</div>
		<div class="col-3"></div>
	</div>
		<br>
 		<div class="row">
 			<div class="col-3"></div>
		 	<div class="col-6"><h4>{{$notice->title}}</h4>
		 	</div>
			<div class="col-3"></div>
 		</div>
 		<div class="row">
 			<div class="col-3"></div>
		 	<div class="col-6">
		 		{{$notice->description}}<br>
		 	</div>
			<div class="col-3"></div>
 		</div>
		<br>
		<div class="row">
			<div class="col-3"></div>
		  	<div class="col-6">
				<form method="post" action="/notice/{{$notice->id}}">
					{{csrf_field()}}
					<div class="form-group">
						<label for="description">Comment</label>
					    <textarea class="form-control" name="description" id="description" placeholder="Comment"></textarea>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
		 		</div>
				<div class="col-3"></div>
			</div>
			<br>
			<div class="row">
			<div class="col-3"></div>
		  	<div class="col-6" class="embed-responsive embed-responsive-21by9">
				<iframe class="embed-responsive-item" src="{{route('noticecomment.index', $notice->id)}}" style="width: 100%; height: 200px" allowfullscreen></iframe>
		 		</div>
				<div class="col-3"></div>
			</div>
			<br><br>
			<br>
	
@endsection