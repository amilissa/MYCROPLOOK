@extends('layouts.app')

@section('content')
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

<body style=" overflow-x: hidden;">

    <div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" style="padding: 10px;" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="/storage/uploads/banners/banner1.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/storage/uploads/banners/banner2.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/storage/uploads/banners/banner3.jpg" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/storage/uploads/banners/banner4.jpg" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/storage/uploads/banners/banner5.jpg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
{{-- <div class="jumbotron text-center" >
    <h1>Welcome to CropLook!</h1>
    <h5 >Barangay Kapatagan Agricultural Trading Portal with Real-Time SMS Notification for Crop-Growth Monitoring</h5>
   </div> --}}


   <div class="row">
       <div class="col-md-6 col-sm-6">
            <h4>TOP 12 AVAILABLE CROPS</h4>
        </div>
    </div>

   <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" style="margin-left: 8%">
    <div class="carousel-item active">
    @foreach ($top6qty as $indexKey => $top)
    
                          @foreach ($defaultImg as $default)
                          @if($default->crop_name == $top->crop_name)
                      <div class="center col-2 row grandchild">
                          <div class="col-4 grandchild">
                              <h1  style="font-size:57px;">{{ ++$indexKey }}</h1>
                          </div>
                          <div class="col-8 grandchild">
                          <img style="height: 100px;" class="d-block w-100" src="/storage/uploads/croplists/{{$default->default_cropImage}}">
                          <small class="text-muted">{{$top->totalAvailableQty}} KG</small>
                          </div>
                      </div>
                  @endif
                      @endforeach
                  @endforeach
      
    </div>
    <div class="carousel-item row">
                      @foreach ($top12qty as $indexKey => $top)
                          @foreach ($defaultImg as $default)
                          @if($default->crop_name == $top->crop_name)
                      <div class="col-2 row grandchild">
                          <div class="col-4 grandchild">
                              <h1  style="font-size:57px;">{{ ++$indexKey  }}</h1>
                          </div>
                          <div class="col-8 grandchild">
                          <img style="height: 100px;" class="img-responsive" src="/storage/uploads/croplists/{{$default->default_cropImage}}">
                          <small class="text-muted">{{$top->totalAvailableQty}} KG</small>
                          </div>
                      </div>
                  @endif
                      @endforeach
                  @endforeach
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
               

   <div class="row">
       <div class="col-md-6 col-sm-6">
            <h4>TOP 12 BEST SELLING CROPS</h4>
        </div>
    </div>

   <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" style="margin-left: 8%">
    <div class="carousel-item active">
    @foreach ($top6 as $top)
                          @foreach ($defaultImg as $default)
                          @if($default->crop_name == $top->crop_name)
                      <div class="col-2 row grandchild">
                          <div class="col-4 grandchild">
                              <h1  style="font-size:55px;">{{ $loop->iteration }}</h1>
                          </div>
                          <div class="col-8 grandchild">
                          <img style="height: 100px;" class="d-block w-100" src="/storage/uploads/croplists/{{$default->default_cropImage}}">
                          <small class="text-muted">{{$top->totalKgSold}} KG SOLD</small>
                          </div>
                      </div>
                  @endif
                      @endforeach
                  @endforeach
      
    </div>
    <div class="carousel-item row">
    @foreach ($top12 as $top)
                          @foreach ($defaultImg as $default)
                          @if($default->crop_name == $top->crop_name)
                      <div class="col-2 row grandchild">
                          <div class="col-4 grandchild">
                              <h1  style="font-size:55px;">{{ $loop->iteration }}</h1>
                          </div>
                          <div class="col-8 grandchild">
                          <img style="height: 100px;" class="img-responsive" src="/storage/uploads/croplists/{{$default->default_cropImage}}">
                          <small class="text-muted">{{$top->totalKgSold}} KG SOLD</small>
                          </div>
                      </div>
                  @endif
                      @endforeach
                  @endforeach
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


<hr>
<div class="row">
       <div class="flex col-md-6">
             {!! $chart->container() !!}
        </div>
        
    <div class="flex col-md-6">
        {!! $salesChart->container() !!}
    </div>

</div>



<div class="row">
       <div class="col-md-6 col-sm-6">
            <h4>Explore Products</h4>
        </div>
        <div class="col-md-6 col-sm-6">
            <a class="a-see-all" href="/explore-products" class="pull-right">
                                    
                See All<i  class="fa fa-chevron-right" aria-hidden="true"></i></a>
        </div>

    </div>
   <div class="card-deck" >
        @if(count($posts) > 0)
        @foreach($posts as $post)

        <div class="card">
            <img style="height: 200px;" class="img-responsive" src="/storage/uploads/cropImage/{{$post->crop_image}}">
            <div class="card-body">
                <h5 class="card-title"><a href="/explore-products/{{$post->id}}" >{{$post->crop_name}}</a></h5>
                <h6 class="card-text"> {{$post->crop_desc}}</h6>
                <a href="/explore-products/{{$post->id}}" type="button" class="btn btn-success btn-card-view">view</a>
            </div>
        </div>

    @endforeach
    @else
    <p> No posts found </p>

    @endif
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6">
             <h4>Explore Farms</h4>
         </div>
         <div class="col-md-6 col-sm-6">
             <a class="a-see-all" href="/explore-farms" class="pull-right">
                                     
                 See All<i  class="fa fa-chevron-right" aria-hidden="true"></i></a>
         </div>
 
     </div>
    <div class="card-deck">
         @if(count($user_lands) > 0)
         @foreach($user_lands as $user_land)

         <div class="card">
             <img style="height: 200px;" class="img-responsive" src="/storage/uploads/landImage/{{$user_land->land_image}}">
             <div class="card-body">
                 <h3 class="card-title">{{$user_land->name_of_company}}</h3>
                 <h5 class="card-text"> {{$user_land->land_address}}</h5>
                 <h5 class="card-text"> {{$user_land->land_area}}</h5>
                 <a href="/explore-farms/{{$user_land->land_id}}" type="button" class="btn btn-success btn-card-view">more info</a>
             </div>
         </div>

     @endforeach
     @else
     <p> No posts found </p>

     @endif
     </div>

    </div>
     {!! $chart->script() !!}
     {!! $salesChart->script() !!}
     {{-- {!! $spanChart->script() !!} --}}
    </div>

  </body>
@endsection
