@extends('navbar.generalMember')

@section('content')
	<div class="jumbotron">
   <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/slide/committee.jpg" class="d-block w-100" alt="..." style="width: 100%; height: 400px">
    </div>
    <div class="carousel-item">
      <img src="/slide/female01.png" class="d-block w-100" alt="..." style="width: 100%; height: 400px">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 
  </div>

<br>

<div class="row">
	<div class="col-md-8">
  <div class="card-header bg-primary" style="width: 92%">Events</div>
    <div class="row">
      @foreach($events as $event)
        <div class="col-md-5">
        <div class="card text-white bg-dark mb-3" style="max-width: 20rem; height: 250px">
          <div class="card-body">
            <h4 class="card-title">{{$event->title}}</h4>
            <p class="card-text">
              Location: {{$event->location}} <br>
              Time: {{$event->starts}}
            </p>
          </div>
          <div class="card-footer">
              <a class="btn btn-primary" role="button" href="{{route('event.details', $event->id)}}">Details</a>
          </div>
        </div>
    </div>
    <div class="col-md-1"></div>
      @endforeach
    </div>
    
  </div>
	<div class="col-md-4">
		<div class="list-group">
		  <a href="#" class="list-group-item list-group-item-action active">
		    Notices
		  </a>
      @foreach($notices as $notice)
		  <a href="{{route('notice.details', $notice->id)}}" class="list-group-item list-group-item-action">{{$notice->title}}</a>
		  @endforeach
</div>
	</div>
</div>
@endsection