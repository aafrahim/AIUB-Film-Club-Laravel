@extends('navbar.generalMember')

@section('content')
<br>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h1>Create Post</h1>
		</div>
		<div class="col-md-2"></div>
	</div>

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<form method="post">
				{{csrf_field()}}
				<div class="form-group">
				    <label for="description">Description</label>
				    <textarea class="form-control" name="description" id="description" placeholder="Description">{{$post->description}}</textarea>
				    @error('description')
				    <label style="color: red">{{$message}}</label>
				    @enderror
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<div class="col-md-2"></div>
		
	</div>
@endsection