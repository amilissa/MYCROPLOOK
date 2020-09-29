@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6">
        <h3>Explore Products
        </h3>
        </div>

        <div class="col-6">

        <form action="/search-products" method="get">
        <div class="input-group">
                    <input type="search" class="form-control" name="search">

                    <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </span>

        </div>
        </form>
        </div>
    </div>

    <div class="row">
        @if(count($posts) > 0)
        @foreach($posts as $post)

        <div class="col-sm-6 col-md-4 border-dark">
          <div class="thumbnail" style="margin:10px" >
            <img style="height: 200px; width: 100%" class="img-responsive" src="/storage/uploads/cropImage/{{$post->crop_image}}">
            <div class="caption">
                <h5><a href="/explore-products/{{$post->id}}" >{{$post->crop_name}}</a></h5>
                
                <h6> Posted on {{$post->created_at}} <br> Farmer: {{$post->user->first_name}} {{$post->user->last_name}}</h6>

                <h6>Harvest Period: {{$post->startHarvestMonth}} {{$post->startHarvestYear}} - {{$post->endHarvestMonth}} {{$post->endHarvestYear}} </h6>
                @if($dt->year == $post->startHarvestYear)
                <h6>{{$dt->addMonths((int) $post->startHarvestMonth - (int) $dt->month)->diffForHumans()}}</h6>
                @else
                @endif
                <style type="text/css">
                    .progress{
                        height: 10px;
                        width: 100%;
                    }
                    .progress-bar{
                        height: 10px;
                        background-color: green;

                    }
                    </style>
                <div class="progress">
                    <div class="progress-bar" style="
                    width: {{$post->percentage_sold_before_harvest}}%;">
                    </div>
                </div>

                @if(!empty($post->percentage_sold_before_harvest))

                    <small>{{$post->percentage_sold_before_harvest}}% sold</small>
                @else
                <small>0% sold </small>
                @endif
                <hr>
                @if($post->crop_quantity >110)
                <span class="badge badge-success" style=" font-size: 15px;">In Stock</span><br>
                @elseif($post->crop_quantity < 110 && $post->crop_quantity >0)
                <span class="badge badge-warning" style=" font-size: 15px;">Low Stock</span><br>
                @else
                <span class="badge badge-danger" style=" font-size: 15px;">Not Available</span><br>
                @endif
              <div class="clearfix">
                  <div class="float-left price">₱ {{$post->crop_price}} /kg</div>
              <p>
                @can('isBuyer')
                <a href="{{ route('reservation.startReservation', ['id' => $post->id]) }}" class="btn btn-success pull-right" role="button">Order Crop</a></p>
                @endcan
            </div>

            </div>

        </div>

        </div>
      @endforeach
      @else
        <p> No posts found </p>

      @endif
      </div>

      {{$posts->links()}}
@endsection
