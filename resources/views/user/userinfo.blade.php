@extends('navbar.generalMember')

@section('content')
<br>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<h1>{{$user->name}}</h1>
			<br>
		</div>
		<div class="col-md-1"></div>
	</div>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-7">
			<table class="table table-striped">
				<tr>
					<th>User ID</td>
					<td>:</td>
					<td>{{$user->userId}}</td>
				</tr>
				<tr>
					<th>Email</td>
					<td>:</td>
					<td>{{$user->email}}</td>
				</tr>
				<tr>
					<th>Phone</td>
					<td>:</td>
					<td>{{$user->phone}}</td>
				</tr>
				<tr>
					<th>Club Role</td>
					<td>:</td>
					<td>{{$user->role}}</td>
				</tr>
				<tr>
					<th>Designation</td>
					<td>:</td>
					<td>{{$user->designation}}</td>
				</tr>
			</table>
		</div>
		<div class="col-md-3" align="center">
			<img src="/picture/{{$user->image}}" title="Profile picture" alt="Profile picture" width="70%" height="200px">
		</div>
		<div class="col-md-1"></div>
		
	</div>
@endsection