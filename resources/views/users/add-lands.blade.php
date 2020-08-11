@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">

        <aside id="column-right" class="col-right col-xs-12  col-sm-3">
            <div class="block block-account">
            <div class="block-title">My Account</div>
            <div class="block-content">
                <ul>

                    <li><a class="btn btn-info btn-block" href="{{route('buyers.prof-info')}}" class="">Profile Information</a> </li>
                    @can('isBuyer')
                    <li><a class="btn btn-info btn-block" href="{{route('buyers.delivery-add')}}" class="">Delivery Address</a> </li>
                      @endcan
                    @can('isFarmer')

                    <li><a class="btn btn-info btn-block" href="{{route('farmers.lands')}}" class="">My Lands</a> </li>
                    @endcan
                    {{-- <li><a class="btn btn-info btn-block" href="{{route('buyers.billing-add')}}" class="">Billing Address</a></li> --}}
                    <li><a class="btn btn-info btn-block" href="{{route('buyers.order-history')}}" class="">Order History</a> </li>
                    {{-- <li><a href="{{route('users.prod-stat')}}" class="">Change Password</a></li> --}}
                  </ul>
            </div>
            </div>
        </aside>
        <div class="col-md-9">
            <div class="main-content">
                <div class="container">
                    <div class="form-row">
                        <div class="col-12">
                            <div id="display_info" class="box box-white">
                                <div class="box-header">
                                    <h5>Add Lands</h5>
                                    <hr>
                                </div>
                                <div class="box-body">
                                    <div class="row">

                                        {!! Form::open(['action' => 'MyLandsController@storelands', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('nameOfCompany','Name Of Company:')}}
                                                        <div class="col-15">
                                                            {{Form::text('nameOfCompany', '', ['class' => 'form-control', 'placeholder' => 'Name of Company'])}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('landAddress','Land Address')}}
                                                        <div class="col-15">
                                                            {{Form::text('landAddress','' , ['class' => 'form-control', 'placeholder' => 'Land Address'])}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('landArea','Land Area')}}
                                                        <div class="col-15">
                                                            {{Form::text('landArea','' , ['class' => 'form-control', 'placeholder' => 'Land Area'])}}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-8 mt10 mb30" style="font-size: 14px">
                                                        {{Form::label('landElevation','Land Elevation')}}
                                                        <div class="col-15">
                                                            {{Form::text('landElevation','', ['class' => 'form-control', 'placeholder' => 'Land Elevation'])}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <i class="fa fa-camera-retro fa-lg"></i>
                                                        {{Form::file('landImage')}}
                                                    </div>
                                                    {{form::submit('Submit', ['class' => 'btn btn-primary'])}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
