@extends('navbar.generalMember')

@section('content')
	<br><br>
		<h2>General Member</h2>
		<br>
		<div class="form-group" style="width:40%">
				    <input type="text" class="form-control" id="search" name="search" placeholder="Search General Member">
				  </div>
	<br>
		<div class="row" id="gm">
		 	
		 </div>

		 <script>
		$(document).ready(function(){

		 fetch_gm_data();

		 function fetch_gm_data(query = '')
		{
		  $.ajax({
		   url:"{{route('user.gmaction')}}",
		   method:'GET',
		   data:{query:query},
		   dataType:'json',
		   success:function(data)
		   {
		    $('#gm').html(data.div_data);
		   }
		  })
		 }
		  $(document).on('keyup', '#search', function(){
		  var query = $(this).val();
		  fetch_gm_data(query);
		 });
		});
	</script>
	
@endsection