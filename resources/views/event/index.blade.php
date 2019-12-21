@extends('navbar.generalMember')

@section('content')
	<div class="row">
		<div class="col-3"></div>
	 	<div class="col-6"><h2>Events</h2>
	 	</div>
		<div class="col-3"></div>
	</div>
		<br>
			
 	@foreach($events as $event)
 		<div class="row">
 			<div class="col-3"></div>
		 	<div class="col-6"><h4>{{$event->title}}</h4>
		 	</div>
			<div class="col-3"></div>
 		</div>
 		<div class="row">
 			<div class="col-3"></div>
		 	<div class="col-6">
		 		{{$event->description}}<br>
		 		<b>Hosted by:</b> {{$event->host}}<br>
		 		<b>Location:</b> {{$event->location}}<br>
		 		<b>Event Time:</b> From {{$event->starts}} to {{$event->ends}}
		 	</div>
			<div class="col-3"></div>
 		</div>
		<br>
		<div class="row">
			<div class="col-3"></div>
		  	<div class="col-6">
				<form method="post" action="/event/{{$event->id}}">
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
				<iframe class="embed-responsive-item" src="{{route('eventcomment.index', $event->id)}}" style="width: 100%; height: 200px" allowfullscreen></iframe>
		 		</div>
				<div class="col-3"></div>
			</div>
			<br><br>
			<br>
 	@endforeach
	
@endsection