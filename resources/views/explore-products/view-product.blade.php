@extends('layouts.app')

@section('content')


{{-- <a href="/explore-products" class="btn btn-secondary" style="margin-bottom:2rem">Go Back</a>


<h1>{{$post->crop_name}}</h1>
    <div>
<img style="" class="mi i" src="/storage/uploads/cropImage/{{$post->crop_image}}">
               <br><br>
        <h6>Crop Price: <b>{{$post->crop_price}}</b> / kg</h6>
        <h6>Description: {{$post->crop_desc}}</h6>
        <h6>Crop Status: {{$post->crop_status}}</h6>
        <h6>Crop Inventory: {{$post->crop_quantity}}</h6>
        <h6>Farmer: {{$post->user->name}}</h6>

    </div>
    <hr>

    <small> Posted on {{$post->created_at}}</small>
    <hr>
    <h6>Harvest Period: {{$post->crop_harvestPeriod}}</h6>
    <h6>Minimum Qty: 5Kg</h6>
    @if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id)
        <a href="/explore-products/{{$post->id}}/edit" class ="btn btn-default.inline-block bg-dark text-light">Edit</a>
           {!!Form::open(['action' => ['ExploreProductsController@destroy', $post->id], 'method' =>'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}

            @endif
    @endif
    @can('isBuyer')
    <a href="{{ route('reservation.startReservation', ['id' => $post->id]) }}" class="btn btn-success pull-left" role="button">Order Crop</a></p>
    @endcan --}}
<section class="body-content">

    <div class="container ptb50">

        <div class="row mb20 info-text">
            <div class="col-12 col-xl-9">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-lg-6 col-xl-6 justify-content-center" style="margin-right:-15px;">
                                    <img style="" class="mi i" src="/storage/uploads/cropImage/{{$post->crop_image}}">
                                </div>
                                <div class="col-12 col-lg-6 col-xl-6">
                                    <div class="row mt20">
                                        <div class="col-6 col-md-6 title-lg">
                                            <h4><strong>{{$post->crop_name}}</strong></h4>
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <div class="float-right plr15 product-tag-solid">
                                            In Season
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-12 product-sm-info">
                                           <ul class="info-product mb0">
                                               <li class="info-item">
                                                   <span>FRUIT</span>
                                               </li>
                                               <li class="info-item">
                                                   <span>TROPICAL</span>
                                               </li>
                                           </ul>
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        {{-- <div class="col-4 pr0">
                                            <span class="icons-align" style="display:block;">
                                            5 &nbsp;
                                            <small class="fa fa-star checked"></small>
                                            <small class="fa fa-star checked"></small>
                                            <small class="fa fa-star checked"></small>
                                            <small class="fa fa-star checked"></small>
                                            <small class="fa fa-star checked"></small>
                                            </span>
                                        </div>
                                        <div class="col-6 pl0 text-left">
                                            4 reviews
                                        </div> --}}
                                        <div class="col-12">
                                            <span class="product-price-big"><b>₱ {{$post->crop_price}} </b></span> / KG
                                        </div>
                                        <div class="col-12 mt20">
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

                                                <small>{{$post->percentage_sold_before_harvest}}% sold before harvest</small>
                                            @else

                                            <small>0% sold before harvest</small>
                                            @endif
                                        </div>

                                        <div class="col-12 mt15">
                                            <div class="row">
                                                <div class="col-4 pr0">
                                                    Harvest Period:
                                                </div>
                                                <div class="col-8 pl0 text-left">
                                                    {{$post->startHarvestMonth}} {{$post->startHarvestYear}} - {{$post->endHarvestMonth}} {{$post->endHarvestYear}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-4 pr0">
                                                    Minimum Qty:
                                                </div>
                                                <div class="col-8 pl0 text-left">
                                                    5 kg
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt20">
                                            <div class="form-row">
                                                <div class="col-12">
                                                    @can('isBuyer')
                                                        <a href="{{ route('reservation.startReservation', ['id' => $post->id]) }}" class="btn btn-success pull-left btn-block" role="button">Order Crop</a></p>
                                                    @endcan
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-12 mt15">
                                            <span class="icons-align product-md-info">
                                                <ion-icon class="mr10 icons-color hydrated" name="ios-heart" role="img" aria-label="heart"></ion-icon>Save to favorites
                                            </span>
                                        </div> --}}
                                        <div class="col-12 mt15">
                                            <h6>More Information</h6>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-5 pr0">
                                                    Available Qty (kg):
                                                </div>
                                                <div class="col-7 pl0">
                                                    {{$post->crop_quantity}}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                <div class="col-12 mt20 p20">
                    <h5>Description</h5>
                    <p class="text-justify mtb0">
                        {{$post->crop_desc}}
                    </p>

                </div>
                <div class="col-12 mt20 p20">
                    <h5>Shipping</h5>
                    <p class="text-justify mtb0">
                        Shipping fees are not included.
                        </p>
                </div>
                <div class="col-12 mt20 p20">
                    <h5>Cancellation Policy</h5>
                    <p class="text-justify mtb0">
                        Request a cancellation within: 2 hours of purchase.<br>
                        Strictly no cancellation permitted when harvest period begins.
                    </p>
                </div>

            </div>

            <div class="col-12 col-xl-3">
                <div>
                    <div class="card align-items-center border-none">
                        <div class="mt20">
                            <div >
                                <img  style="background:#4B524E; width:80px; height:80px; border-radius:40px;" src="/storage/uploads/userImage/no-image.jpeg">
                            </div>
                        </div>
                        <div class="card-body pt15 pb0">
                            <h5 class="mb0"><b>{{$farm->first_name}} {{$farm->middle_name}} {{$farm->last_name}}</b></h5>
                            <ul class="info-address pt0 align-center">
                                <li class="info-item">
                                    <span>{{$farm->name_of_company}}</span>
                                </li>
                                <li class="info-item">
                                    <span>{{$farm->land_address}}</span>
                                </li>
                            </ul>
                        </div>
                        {{-- <div class="icons-align d-inline">
                            <small class="fa fa-star checked"></small>
                            <small class="fa fa-star checked"></small>
                            <small class="fa fa-star checked"></small>
                            <small class="fa fa-star checked"></small>
                            <small class="fa fa-star checked"></small>
                            284
                        </div> --}}
                        {{-- <div class="col-lg-12 align-center">
                            <ul class="info-farm-type">
                                <li class="info-item">
                                    <span>Superhost</span>
                                </li>
                                <li class="info-item">
                                    <img src="/static/home_assets/img/icon-verified.png">
                                </li>
                                <li class="info-item">
                                    <img src="/static/home_assets/img/icon-secure.png">
                                </li>
                            </ul>
                        </div> --}}
                        <div class="col-12">
                            <a href="/explore-farms/{{$farm->land_id}}" class=" btn-main-invert btn-block">VIEW FARM</a>
                        </div>
                        <div class="col-12 mt15">
                            <div class="row justify-content-center mlr0">
                                <div class="col-4 col-md-3 col-xl-8 pl0 product-md-info align-items-left">
                                        SEND MESSAGE
                                </div>
                                <div class="col-4 col-md-3 col-xl-4 pr0 text-right">
                                    <i class="fa fa-paper-plane icon-send"  aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ptb15">
                        <div class="row mlr0">
                            <div class="col-8 pr0">
                                <span class="text-lato-bold align-left fs14 pr0">From the same farm
                            </span></div>
                            <div class="col-4 pl0 align-right">
                                <a href="#" class="read-more read-more-arrow-sm hydrated  mr0">

                                    See All<i  class="fa fa-chevron-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="row mlr0 align-items-center mt10">
                            @foreach ($farm_products as $farmproduct)
                            <div class="col-12 col-xs-12 col-sm-6 col-xl-12">
                                <div class="row">
                                    <div class="col-3 col-sm-2 col-xl-3">
                                        <img class="mr10 img img10 product-ic-sm"  src="/storage/uploads/cropImage/{{$farmproduct->crop_image}}" alt="Explore Image">
                                    </div>
                                    <div class="col-9 col-sm-10 col-xl-9 pl0 lh-md">
                                        <div class="col-12 text-lato-bold">{{$farmproduct->crop_name}}</div>
                                        <div class="col-12">₱ {{$farmproduct->crop_price}} / kg</div>
                                        <div class="col-12 product-sm-info">Harvesting in {{$post->startHarvestMonth}} {{$post->startHarvestYear}} - {{$post->endHarvestMonth}} {{$post->endHarvestYear}}</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="row mb20 info-text">
            <div class="col-12">
                <h5> Similar Products</h5>
                <div class="row">
                    @foreach ($allPosts as $allPost)
                    <div class="col-12 col-xs-6 col-sm-4 col-md-3 products-similar">
                        <div class="row">
                            <div class="col-12">
                                <div class="card m15 border-none">
                                    <a href="/explore-products/{{$allPost->post_id}}">
                                    <img class="card-img-top" src="/storage/uploads/cropImage/{{$allPost->crop_image}}" alt="Explore Image">
                                        <div class="card-img-overlay overlay d-flex flex-column p0 tag-img">

                                            <p class="card-tag-solid text-lato-bold">In Season</p>
                                        </div>
                                        <div class="card-body p0">
                                            {{-- <ul class="info-address">
                                                <li class="info-item">
                                                    <span>Banaue</span>
                                                </li>
                                                <li class="info-item">
                                                    <span>Ifugao</span>
                                                </li>
                                            </ul> --}}
                                            <h6 class="info-title">{{$allPost->crop_name}}</h6>
                                            <span class="product-price text-sub">{{$allPost->crop_price}}</span> / kg <br>
                                            <span class="product-harvest-pending">Harvesting in {{$allPost->startHarvestMonth}} {{$allPost->startHarvestYear}} - {{$allPost->endHarvestMonth}} {{$allPost->endHarvestYear}}</span>
                                            <div class="form-row mt15">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="pl15 pr0">
                                                            <img src="/storage/uploads/landImage/{{$allPost->land_image}}" style="background:#4B524E; width:40px; height:40px; border-radius:20px;">
                                                        </div>
                                                        <div class="pl0">
                                                            <div class="col-12">{{$allPost->name_of_company}}</div>
                                                            <div class="col-12">{{$allPost->land_address}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="form-row mt10">
                                                <div class="col-lg-12 farm-rating-area text-lg-right">
                                                    <ul class="info-farm-type">
                                                        <li class="info-item">
                                                            <span>Superhost</span>
                                                        </li>
                                                        <li class="info-item">
                                                            <img src="/static/home_assets/img/icon-verified.png">
                                                        </li>
                                                        <li class="info-item">
                                                            <img src="/static/home_assets/img/icon-secure.png">
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

    </section>
    @endsection
