@extends('navbar.generalMember')

@section('content')
	<div class="row">
		<div class="col-3"></div>
	 	<div class="col-6"><h2>Posts</h2>
	 	</div>
		<div class="col-3"></div>
	</div>
		<br>
			
 	@foreach($posts as $post)
 		<div class="row">
 			<div class="col-3"></div>
		 	<div class="col-6"><h4>{{$post->creatorName}}</h4>
		 	</div>
			<div class="col-3"></div>
 		</div>
 		<div class="row">
 			<div class="col-3"></div>
		 	<div class="col-6">{{$post->description}}
		 	</div>
			<div class="col-3"></div>
 		</div>
		@if($post->image != Null)
			<br><br>
			<div class="row">
				<div class="col-3"></div>
		 		<div class="col-6" style="height: 250px; text-align: justify;"><img src="/{{$post->creatorId}}/Post/{{$post->image}}" width="90%" height="240px">
		 		</div>
				<div class="col-3"></div>
			</div>
		@endif
		<br>
		<div class="row">
			<div class="col-3"></div>
		  	<div class="col-6">
				<form method="post" action="/post/main/{{$post->id}}">
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
				<iframe class="embed-responsive-item" src="{{route('postcomment.index', $post->id)}}" style="width: 100%; height: 200px" allowfullscreen></iframe>
		 		</div>
				<div class="col-3"></div>
			</div>
			<br><br>
			<br>
 	@endforeach
	
@endsection