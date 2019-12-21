@extends('navbar.index')

@section('content')
	<br><br>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form method="post">
				{{csrf_field()}}
			  	<legend>Login</legend>
			  	<div class="form-group">
				    <label for="useraId">User ID</label>
				    <input type="text" class="form-control" id="userId" name="userId" placeholder="User ID">
				    @error('userId')
				    <label style="color: red">{{$message}}</label>
				    @enderror
				    
				  </div>
				  <div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" class="form-control" id="password" name="password" placeholder="password">
				    @if($errors->has('password'))
				    <label style="color: red">{{$errors->first('password')}}</label>
				    @endif
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
			<br>
			<p style="color: red">{{session('msg')}}</p>
		</div>
		<div class="col-md-4"></div>
	</div>
@endsection