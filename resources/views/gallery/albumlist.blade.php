@extends('navbar.generalMember')

@section('content')
		<h2>My Album</h2>
		<br>
		<div class="form-group" style="width:40%">
				    <input type="text" class="form-control" id="search" name="search" placeholder="Search General Member">
				  </div>
	<br>
		<div class="row" id="album">
		 	
		 </div>

		 <script>
		$(document).ready(function(){

		 fetch_album_data();

		 function fetch_album_data(query = '')
		{
		  $.ajax({
		   url:"{{route('gallery.albumaction')}}",
		   method:'GET',
		   data:{query:query},
		   dataType:'json',
		   success:function(data)
		   {
		    $('#album').html(data.div_data);
		   }
		  })
		 }
		  $(document).on('keyup', '#search', function(){
		  var query = $(this).val();
		  fetch_album_data(query);
		 });
		});
	</script>
	
@endsection