@extends('navbar.generalMember')

@section('content')
<br>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h1>Create Gallery Album</h1>
		</div>
		<div class="col-md-2"></div>
	</div>

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group">
				    <label for="title">Title</label>
				    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{old('title')}}">
				    @error('title')
				    <label style="color: red">{{$message}}</label>
				    @enderror
				</div>
				<div class="form-group">
				     <label for="image">Image</label>
				     <input type="file" class="form-control-file" id="image" name="image[]" aria-describedby="fileHelp" multiple="multiple">
				     @error('image')
				    <label style="color: red">{{$message}}</label>
				    @enderror
				   </div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<div class="col-md-2"></div>
		
	</div>
@endsection