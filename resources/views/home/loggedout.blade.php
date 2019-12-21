@extends('navbar.index')

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
  <div class="col-md-12">
    <h4>About Us</h4>
    <p align="justify">
      Information Technology is the use of computer to store, transmit, retrieve and manipulate data or information. Over the last decade, the use of the Information Technology has increased rapidly. Along with the extreme use of the technologies, the abuse in IT is also increasing. Illegal downloading of software, book, movie, song etc. has become common in our society. Hacking has become a matter of pride and expose of intelligence among the students of IT that inspired them to do unauthorized access to system and violate personal/organizational privacy. There are many more unethical activities regarding Information Technology such as visiting unethical sites that causes psychological problems, social dilemma etc., Internet addiction, cyber bulling and so on. To prevent the unethical activities in use of Information Technology, the causes should be analyzed to get a better formula.
    </p>
  </div>
</div>
@endsection