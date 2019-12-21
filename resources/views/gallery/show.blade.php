@extends('navbar.generalMember')

@section('content')
<h1>{{$images[0]->title}}</h1>
<br>

<form method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="form-group">
	     <label for="image" style="color: darkblue;">Add New Image</label>
	     <input type="file" class="form-control-file" id="image" name="image[]" aria-describedby="fileHelp" multiple="multiple">
	     @error('image')
		 	<label style="color: red">{{$message}}</label>
		 @enderror
	   </div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>

<br><br>

<div class="row">
	@foreach($images as $img)
	<div class="col-md-4" style="height: 280px">
		<img src="/{{$img->creatorId}}/Gallery/{{$img->title}}/{{$img->image}}" width="90%" height="200px">
		<br><br>
		<a class="btn btn-danger" role="button" href="{{route('gallery.imageDelete', $img->id)}}">Delete</a>
	</div>
	@endforeach
</div>
@endsection