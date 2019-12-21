@extends('navbar.generalMember')

@section('content')
	<br><br>
		<h2>President</h2>
		<br>
		<div class="row">
		 	@foreach($users as $user)
			 	@if($user->role == 'President')
				 	<div class="col-4" style="height: 250px; text-align: center;">
					<a href="{{route('user.userinfo', $user->id)}}">
					<img src="/picture/{{$user->image}}" width="95%" height="240px">
					</a>
					<a href="{{route('user.userinfo', $user->id)}}" style="text-decoration-line: none;">{{$user->name}}</a>
					</div>
			 	@endif
		 	@endforeach
		 </div>
	<br><br>
		<h2>General Secretary</h2>
		<div class="row">
		 	@foreach($users as $user)
			 	@if($user->role == 'General Secretary')
				 	<div class="col-4" style="height: 250px; text-align: center;">
					<a href="{{route('user.userinfo', $user->id)}}">
					<img src="/picture/{{$user->image}}" width="95%" height="240px">
					</a>
					<a href="{{route('user.userinfo', $user->id)}}" style="text-decoration-line: none;">{{$user->name}}</a>
					</div>
			 	@endif
		 	@endforeach
		 </div>
	<br><br>
		<h2>Executive</h2>
		<div class="row">
		 	@foreach($users as $user)
			 	@if($user->role == 'Executive')
				 	<div class="col-4" style="height: 250px; text-align: center;">
					<a href="{{route('user.userinfo', $user->id)}}">
					<img src="/picture/{{$user->image}}" width="95%" height="240px">
					</a>
					<a href="{{route('user.userinfo', $user->id)}}" style="text-decoration-line: none;">{{$user->name}}</a>
					</div>
			 	@endif
		 	@endforeach
		 </div>
	<br><br>
	
@endsection