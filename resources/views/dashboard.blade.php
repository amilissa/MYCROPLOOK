@extends('layouts.app')

@section('content')

<div class="container">
    <h3>Dashboard</h3>
     <a href="/explore-products/create" class="btn btn-primary" style="margin-bottom:1rem">Add Product</a>
     <a href="{{route('users.prod-stat')}}" class="btn btn-success" style="margin-bottom:1rem">Products Statistics</a>
     <a href="{{route('users.orders-dashboard')}}" class="btn btn-info" style="margin-bottom:1rem">Orders Status</a>

        <div class="row">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

       {{-- template edit start --}}

        @if(count($posts) > 0)

        @foreach($posts as $post)
                <div class="col-sm-6 col-md-4 border-dark">
                    <div class="thumbnail" style="margin:10px" >
                    <a href="/explore-products/{{$post->id}}/edit/">
                        <div class="card-img lazy" style="height: 200px;">
                            <img style="height: 200px; width: 100%" src="/storage/uploads/cropImage/{{$post->crop_image}}">
                        </div>
                        <div class="card-body">
                            <h6 class="mb0">{{$post->crop_name}}</h6>
                            <p class="card-text">
                                Harvest Period: {{$post->startHarvestMonth}} {{$post->startHarvestDay}} {{$post->startHarvestYear}} -
                                                {{$post->endHarvestMonth}} {{$post->endHarvestDay}} {{$post->endHarvestYear}}
                            </p>
                            <p>
                                @if($dt->year == $post->startHarvestYear)
                                <h6>{{$dt->addMonths((int) $post->startHarvestMonth - (int) $dt->month)->diffForHumans()}}</h6>
                                @else
                                @endif
                            </p>

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
                            <small>{{$post->percentage_sold_before_harvest}}% sold</small>
                            <div class="form-row mt20">
                                <div class="col-3 text-center">
                                <p class="card-text mb0">
                                    @if($post->fixed_quantity == null)
                                    0/{{$post->crop_quantity}}
                                    @else
                                    {{$post->kilogram_sold}}/{{$post->fixed_quantity}}
                                    @endif
                                </p>
                                    <small class="text-secondary">Kilogram Sold</small>
                                </div>
                                <div class="col-6 text-center">
                                    <p class="card-text mb0">PHP {{$post->earnings}}</p>
                                    <small class="text-secondary">Earnings</small>
                                </div>

                                <div class="col-3 text-center">
                                @foreach($buyers as $buyer)
                                    @if($post->id == $buyer->crop_id)
                                    <p class="card-text mb0">{{$buyer->buyers_per_crop}}</p>
                                    @endif
                                @endforeach
                                    <small class="text-secondary">Buyers</small>
                                </div>
                            </div>
                            <div class="form-row mt20">
                                <div class="col-3 text-center">
                                <p class="card-text mb0">
                                    @if($post->fixed_quantity == null)
                                    0/{{$post->crop_quantity}}
                                    @else
                                    {{$post->kilogram_sold}}/{{$post->fixed_quantity}}
                                    @endif
                                </p>
                                    <small class="text-secondary">Kilogram Sold</small>
                                </div>
                                <div class="col-6 text-center">
                                    <p class="card-text mb0">PHP {{$post->production_cost}}</p>
                                    <small class="text-secondary">Prod. Cost</small>
                                </div>

                                <div class="col-3 text-center">
                                     {{(int)$post->earnings - (int)$post->production_cost}}
                                    <small class="text-secondary">Crop Profitability</small>
                                </div>
                            </div>
                            {!!Form::open(['action' => ['ExploreProductsController@destroy', $post->id], 'method' =>'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}
                        </div>
                    </a>
                </div>

{{--
        <div class="col-12 mt20">
            <nav aria-label="Page navigation example">
                <ul class="pagination float-right">

                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>



                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">»</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>

                </ul>
            </nav>
        </div> --}}


        {{-- template edit end --}}


                </div>
                        @endforeach
                    @else
                        <p>You have no Posts yet</p>
                    @endif
</div>
</div>
@endsection
