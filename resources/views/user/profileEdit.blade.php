@extends('navbar.generalMember')

@section('content')
<br>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<h1>Profile</h1>
		</div>
		<div class="col-md-1"></div>
	</div>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-7">
			<form method="post">
				{{csrf_field()}}
				<table class="table table-striped">
				<tr>
					<th>User ID</td>
					<td>:</td>
					<td><input type="text" class="form-control" id="userId" name="id" value="{{$user->userId}}" disabled="disabled">
					</td>
				</tr>
				<tr>
					<th>Name</td>
					<td>:</td>
					<td><input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" disabled="disabled"></td>
				</tr>
				<tr>
					<th>Password</td>
					<td>:</td>
						@if($errors->has('password'))
					    @error('password')
					    <td><input type="password" class="form-control" id="password" name="password">
					    <label style="color: red">{{$message}}</label>
					    @enderror
					@else
					    <td><input type="password" class="form-control" id="password" name="password" value="{{$user->password}}">
				    @endif
					</td>
				</tr>
				<tr>
					<th>Confirm Password</td>
					<td>:</td>
					
						@if($errors->has('conPassword'))
					    @error('conPassword')
					    <td><input type="password" class="form-control" id="conPassword" name="conPassword">
					    <label style="color: red">{{$message}}</label>
					    @enderror
					@else
					    <td><input type="password" class="form-control" id="conPassword" name="conPassword" value="{{$user->password}}">
				    @endif
					</td>
				</tr>
				<tr>
					<th>Date of Birth</td>
					<td>:</td>
					<td><input type="text" class="form-control" id="dob" name="dob" value="{{$user->dob}}" disabled="disabled"></td>
				</tr>
				<tr>
					<th>Address</td>
					<td>:</td>
					@if($errors->has('address'))
					    @error('address')
					    <td><textarea class="form-control" id="address" name="address" placeholder="Address"></textarea>
					    <label style="color: red">{{$message}}</label>
					    @enderror
					@else
					    <td><textarea class="form-control" id="address" name="address" placeholder="Address">{{$user->address}}
					</textarea>
				    @endif
					</td>
				</tr>
				<tr>
					<th>Email</td>
					<td>:</td>
					@if($errors->has('email'))
					    @error('email')
					    <td><input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
					    <label style="color: red">{{$message}}</label>
					    @enderror
					@else
					    <td><input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->email}}">
				    @endif
					</td>
				</tr>
				<tr>
					<th>Phone</td>
					<td>:</td>
					@if($errors->has('phone'))
					    @error('phone')
					    <td><input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{old('phone')}}">
					    <label style="color: red">{{$message}}</label>
					    @enderror
					@else
					    <td><input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{$user->phone}}">
				    @endif
					</td>
				</tr>
				<tr>
					<th>Club Role</td>
					<td>:</td>
					<td><input type="text" class="form-control" id="role" name="role" value="{{$user->role}}" disabled="disabled"></td>
				</tr>
				<tr>
					<th>Designation</td>
					<td>:</td>
					<td><input type="text" class="form-control" id="designation" name="designation" value="{{$user->designation}}" disabled="disabled"></td>
				</tr>
				<tr>
					<th></td>
					<td></td>
					<td><button type="submit" class="btn btn-primary">Submit</button></td>
				</tr>
			</table>
			</form>
		</div>
		<div class="col-md-3" align="center">
		</div>
		<div class="col-md-1"></div>
		
	</div>
@endsection