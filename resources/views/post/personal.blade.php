@extends('navbar.generalMember')

@section('content')
	<div class="row">
		<div class="col-3"></div>
	 	<div class="col-6"><h2>Posts</h2>
	 	</div>
		<div class="col-3"></div>
	</div>
		<br>

		<div class="row">
 			<div class="col-3"></div>
		 	<div class="col-6"><h4>Approved</h4>
		 	</div>
			<div class="col-3"></div>
 		</div>
			
 	@foreach($posts as $post)
 		@if($post->approveStatus == "Approved")
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
		 		<div class="col-6" ><img src="/{{$post->creatorId}}/Post/{{$post->image}}" width="90%" height="240px">
		 		</div>
				<div class="col-3"></div>
			</div>
			@endif
			<br>
			<div class="row">
				<div class="col-3"></div>
		 		<div class="col-6">
		 			<a href="{{route('post.edit', $post->id)}}" class="btn btn-primary" role="button">Edit</a> &nbsp;
		 			<a href="{{route('post.delete', $post->id)}}" class="btn btn-danger" role="button">Delete</a>
		 			<!-- <button class="btn btn-danger delete">Delete</button> -->
		 		</div>
				<div class="col-3"></div>
			</div>
			<br><br>
 		@endif
 	@endforeach

	<br><br><br>
 	<div class="row">
 			<div class="col-3"></div>
		 	<div class="col-6"><h4>Pending</h4>
		 	</div>
			<div class="col-3"></div>
 		</div>
			
 	@foreach($posts as $post)
 		@if($post->approveStatus == "Pending")
 			<div class="row">
	 			<div class="col-3"></div>
			 	<div class="col-6">{{$post->description}}
			 	</div>
				<div class="col-3"></div>
 			</div>
			@if($post->image != Null)
			<br>
			<div class="row">
				<div class="col-3"></div>
		 		<div class="col-6"><img src="/{{$post->creatorId}}/Post/{{$post->image}}" width="90%" height="240px">
		 		</div>
				<div class="col-3"></div>
			</div>
			@endif
			<br>
			<div class="row">
				<div class="col-3"></div>
		 		<div class="col-6">
		 			<a href="{{route('post.edit', $post->id)}}" class="btn btn-primary" role="button">Edit</a> &nbsp;
		 			<a href="{{route('post.delete', $post->id)}}" class="btn btn-danger" role="button">Delete</a>
		 		</div>
				<div class="col-3"></div>
			</div>
			<br>
 		@endif
 	@endforeach

<!--  	<div class="modal fade" id="confirmModal">
					  <div class="modal-dialog" role="dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title">Delete Confirmation</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <p>Are You Sure??</p>
					      </div>
					      <div class="modal-footer">
					        <button type="button" name="ok_button" id="ok_button" class="btn btn-primary">OK</button>
					        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					      </div>
					    </div>
					  </div>
					</div> -->

<!--  	<script type="text/javascript">
 		$(document).ready(function(){
 			$(document).on('click', '.delete', function(){
 				$('#confirmModal').modal('show');
 			});
 		});
 	</script> -->
	
@endsection