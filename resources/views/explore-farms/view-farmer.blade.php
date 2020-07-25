@extends('layouts.app')

@section('content')

<section class="body-content">

    <div class="container pb20">
        <div class="mb20 farm-container">
            <img class="col-12 mlr0 mt15" style="display:block; width:100%; height: 400px;" src="/storage/uploads/landImage/{{$farm->land_image}}">

            </div>
            <div class="row mlr0 mt15" style="padding-left: 40px;">
                <div class="col-12 col-lg-8">
                    <div class="row pl0">
                        <div class="col-12">
                            <span class="title-lg">{{$farm->name_of_company}}</span>
                        </div>
                        <div class="col-12">
                            <span class="text-sub">
                                {{$farm->land_address}}
                            </span>
                        </div>
                        {{-- <div class="col-12">
                            <ul class="info-address mb0">
                                <li class="info-item">
                                    <span>  </span>
                                </li>
                                <li class="info-item">
                                    <span> Member since 2018 </span>
                                </li>
                            </ul>
                        </div> --}}
                        {{-- <div class="col-12 mtb0">
                            <span class="text-sub"> 95% Response Time</span>
                        </div> --}}
                        {{-- <div class="col-12 icons-align">
                            <div class="star-rating">
                                <span style="width:100%"></span>
                            </div>
                            <span class="farm-text">284</span>
                        </div> --}}
                    </div>
                    <div class="row pl0 mt30">
                        <div class="col-12">
                            <span class="title-md">About</span>
                        </div>
                        <div class="col-12 info-text text-justify">
                            Farm Area: {{$farm->land_area}} <br>
                            Farm Elevation: {{$farm->land_elevation}}<br>
                            <br>
                            Happy farms is about happy farms.
                        </div>
                    </div>
                    <div class="row mlr0 mtb5">
                        <a href="#" class="read-more">READ MORE</a>
                    </div>

                    <div class="row mlr0 mt20">
                        <div class="col-12 plr0">
                            <span class="title-md">Shipping</span>
                        </div>
                        <div class="col-12 plr0 info-text text-justify">
                            Shipping fees are not included. <br>
                            The following options are available:
                        </div>
                    </div>
                    <div class="row mlr0 mt20">
                        <div class="col-12 plr0">
                            <span class="title-md">Cancellation Policy</span>
                        </div>
                        <div class="col-12 plr0 info-text text-justify">
                            Request a cancellation within: 2 hours of purchase. <br>
                            Strictly no cancellation permitted when harvest period begins.
                        </div>
                    </div>

                </div>
                <div class="col-12 col-lg-4">
                    <div>
                        <div class="card align-items-center border-none">
                            <div class="mt20">
                                <img style="background:#4B524E; width:100px; height:100px; border-radius:58.5px;" src="/storage/uploads/userImage/no-image.jpg">
                            </div>
                            <div class="card-body pt15 pb0 title-md align-center">
                                <h5 class="mb0 title-md">{{$farm->first_name}} {{$farm->middle_name}} {{$farm->last_name}}</h5>
                                <ul class="info-address pt0 align-center">
                                    <li class="info-item">
                                        <span class="align-center">GROWER</span>
                                    </li>
                                </ul>
                            </div>
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
                            <div class="pr0">
                            <a href="{{route('user.chat', $farm->user_id)}}" class="btn-main-solid btn-farm-size">SEND MESSAGE<i class="fa fa-paper-plane icon-send"  aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div>
                        {{-- <div class="row mt30">
                            <div class="col-12 align-left">
                                <h6> Active Products</h6>
                            </div>
                        </div> --}}
                        {{-- <div class="row mr0">

                            <div class="col-6 pr0 mt20 products-similar">
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="card border-none">
                                            <a href="/farm/view-product/">
                                                <img class="card-img-top" src="/static/home_assets/img/product-banana02.png" alt="Explore Image">
                                                <div class="card-img-overlay overlay d-flex flex-column p0 tag-img">
                                                    <!-- <p class="card-tag-solid text-lato-bold">In Season</p> -->
                                                </div>
                                                <div class="card-body p0 mt10 info-text-sm">
                                                    <span class="text-lato-bold mb0">Bananas (Lakatan)</span><br>
                                                    <span class="">PHP 900 / ton</span><br>
                                                    <span class="product-sm-info mt0">Harvesting in March</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 pr0 mt20 products-similar">
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="card border-none">
                                            <a href="/farm/view-product/">
                                                <img class="card-img-top" src="/static/home_assets/img/product-banana02.png" alt="Explore Image">
                                                <div class="card-img-overlay overlay d-flex flex-column p0 tag-img">
                                                    <!-- <p class="card-tag-solid text-lato-bold">In Season</p> -->
                                                </div>
                                                <div class="card-body p0 mt10 info-text-sm">
                                                    <span class="text-lato-bold mb0">Bananas (Lakatan)</span><br>
                                                    <span class="">PHP 900 / ton</span><br>
                                                    <span class="product-sm-info mt0">Harvesting in March</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 pr0 mt20 products-similar">
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="card border-none">
                                            <a href="/farm/view-product/">
                                                <img class="card-img-top" src="/static/home_assets/img/product-banana02.png" alt="Explore Image">
                                                <div class="card-img-overlay overlay d-flex flex-column p0 tag-img">
                                                    <!-- <p class="card-tag-solid text-lato-bold">In Season</p> -->
                                                </div>
                                                <div class="card-body p0 mt10 info-text-sm">
                                                    <span class="text-lato-bold mb0">Bananas (Lakatan)</span><br>
                                                    <span class="">PHP 900 / ton</span><br>
                                                    <span class="product-sm-info mt0">Harvesting in March</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 pr0 mt20 products-similar">
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="card border-none">
                                            <a href="/farm/view-product/">
                                                <img class="card-img-top" src="/static/home_assets/img/product-banana02.png" alt="Explore Image">
                                                <div class="card-img-overlay overlay d-flex flex-column p0 tag-img">
                                                    <!-- <p class="card-tag-solid text-lato-bold">In Season</p> -->
                                                </div>
                                                <div class="card-body p0 mt10 info-text-sm">
                                                    <span class="text-lato-bold mb0">Bananas (Lakatan)</span><br>
                                                    <span class="">PHP 900 / ton</span><br>
                                                    <span class="product-sm-info mt0">Harvesting in March</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> --}}
                        {{-- <div class="row mt10">
                            <div class="col-12 align-right">
                                <a href="#" class="read-more mr0">
                                    <ion-item>
                                        View Archived Listings<ion-icon name="ios-arrow-forward" class="q-icon read-more-arrow-sm hydrated" role="img" aria-label="arrow forward"></ion-icon>
                                    </ion-item>
                                </a>
                            </div>
                        </div> --}}
                        {{-- <div class="row mt20">
                            <button class="btn-main-solid btn-farm-size-full">SEND ORDER REQUEST</button>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="row mt40 info-text title-md pt20">
                <div class="col-12 col-sm-6 text-center text-sm-left">
                    <h5>All Products from {{$farm->name_of_company}}</h5>
                </div>
                {{-- <div class="col-12 col-sm-6 text-center text-sm-right">
                    <ul class="pl0">
                        <li class="list-inline-item list-padding active plr0 pb5">
                        <span class="fs18">&nbsp; &nbsp; Active &nbsp; &nbsp;</span>
                        </li>
                        <li class="list-inline-item list-padding plr0 pb5">
                        <span class="fs18 mb15">&nbsp; &nbsp; Archived &nbsp; &nbsp;</span>
                        </li>
                    </ul>
                    <!-- Active / Archived -->
                </div> --}}
            </div>
            <div class="row info-text">

            @foreach($farm_products as $farmproduct)
                <div class="col-12 col-sm-4 col-md-6 col-lg-4 col-xl-3 mt10 mb15 products-similar">
                    <div class="row">
                        <div class="col-12">
                            <div class="card m15 border-none">
                                    <img class="card-img-top" src="/storage/uploads/cropImage/{{$farmproduct->crop_image}}" alt="Explore Image">
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
                                        <h6 class="info-title">{{$farmproduct->crop_name}}</h6>
                                        <span class="product-price text-sub"> {{$farmproduct->crop_price}} </span> / kg <br>
                                        <span class="product-harvest-pending">Harvesting in {{$farmproduct->startHarvestMonth}} {{$farmproduct->startHarvestYear}} - {{$farmproduct->endHarvestMonth}} {{$farmproduct->endHarvestYear}}</span>
                                        <div class="form-row mt10">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="pl15 pr0">
                                                        Minimum order of 5 kg
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row mt10 align-items-center">
                                            <div class="col-8">
                                                @can('isBuyer')
                                                <a href="/explore-products/{{$farmproduct->posts_id}}" class="btn btn-success pull-left btn-block" role="button">View Product</a></p>
                                            @endcan
                                            </div>
                                            <div class="col-4 align-right">
                                                <button class="btn-transparent">
                                                    <ion-icon class="icons-color inactive fs20 hydrated" name="heart" role="img" aria-label="heart"></ion-icon>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            </div>
            {{$farm_products->links()}}
            <div class="row mtb20 info-text title-md pt20" >
                <div class="col-12">
                    <h5> Related Growers <a href="/explore-farms" class="read-more pull-right">

                        See All<i  class="fa fa-chevron-right" aria-hidden="true"></i>
                    </a></h5>
                    <div class="row">
                        @foreach($allFarms as $allFarm)
                        <div class="col-12 col-xs-6 col-md-6 col-lg-3 products-similar">
                            <div class="row">
                                <div class="plr15">
                                    <div class="card m15 border-none">
                                    <a href="/explore-farms/{{$allFarm->land_id}}">
                                        <img class="card-img-top" src="/storage/uploads/userImage/no-image.jpeg" alt="Explore Image">
                                            <div class="card-body p0">
                                                {{-- <ul class="info-address">
                                                    <li class="info-item">
                                                        <span>Banaue</span>
                                                    </li>
                                                    <li class="info-item">
                                                        <span>Ifugao</span>
                                                    </li>
                                                </ul> --}}
                                                <h6 class="info-title">{{$allFarm->name_of_company}}</h6>
                                                {{-- <ul class="info-subtitle">
                                                    <li class="info-item">
                                                        <span>Carrots</span>
                                                    </li>
                                                    <li class="info-item">
                                                        <span>Eggplant</span>
                                                    </li>
                                                    <li class="info-item">
                                                        <span>Squash</span>
                                                    </li>
                                                </ul> --}}
                                                {{-- <div class="form-row mt10">
                                                    <div class="col-7 col-md-6 col-lg-12 col-xl-7 ">
                                                    <!-- <div class="col-7"> -->
                                                        <div class="star-rating">
                                                            <span style="width:100%"></span>
                                                        </div>
                                                        <span class="farm-text">1.2k</span>
                                                    </div>
                                                    <div class="col-5 col-md-6 col-lg-12 col-xl-5 farm-rating-area text-right text-lg-left text-xl-right">
                                                    <!-- <div class="col-5"> -->
                                                        <ul class="info-farm-type">
                                                            <li class="info-item farm-text">
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

    </div>

    </section>

    @endsection
