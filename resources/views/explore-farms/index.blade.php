@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-6">
    <h3>Explore Farms
    </h3>
    </div>

    <div class="col-6">

    <form action="/search-farms" method="get">
    <div class="input-group">
                <input type="search" class="form-control" name="search">

                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Search</button>
                </span>

    </div>
    </form>
    </div>
</div>

    <div class="row ">

        @if(count($farms) > 0)
    @foreach($farms as $farm)
        <div class="col-sm-6 col-md-4 border-dark">
          <div class="thumbnail" style="margin:10px" >
            <img style="height: 200px; width: 100%" class="img-responsive" src="/storage/uploads/landImage/{{$farm->land_image}}">
            <div class="caption">

            <h3><a href="/explore-farms/{{$farm->land_id}}" >{{$farm->name_of_company}}</a></h3>
                <h5>  {{$farm->land_address}}</h5>
              <div class="clearfix">
                <a href="/explore-farms/{{$farm->land_id}}" class="btn btn-success pull-right" role="button">More Info</a></p>
                </div>

            </div>

        </div>

        </div>
      @endforeach
      @else
        <p> No posts found </p>

      @endif
      </div>

      {{$farms->links()}}
@endsection
