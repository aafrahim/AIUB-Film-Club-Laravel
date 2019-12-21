<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrapV4.4.1cerulean.css')}}">
    <script type="text/javascript" src="{{URL::asset('js/jquery-3.4.1.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/bootstrapV4.4.1.min.js')}}"></script>
</head>
<body>
	@foreach($comments as $comment)
		@if($comment->creatorId == session('uid'))
			<div style="text-align: justify;">
			<h5>{{$comment->creatorName}}</h5>
			<p>{{$comment->description}}</p>
			<a class="btn-sm btn-danger" role = "button" href="{{route('eventcomment.delete', $comment->id)}}">Delete</a>
			<hr>
		@else
			<div style="text-align: justify;">
			<h5>{{$comment->creatorName}}</h5>
			<p>{{$comment->description}}</p>
			<hr>
		</div>
		@endif

	@endforeach
</body>
</html>