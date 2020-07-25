

@extends('layouts.app')
@section('content')


<div class="container">
	<div class="row">

        <aside id="column-right" class="col-right col-xs-12  col-sm-3">
            <div class="block block-account">
            <div class="block-title">My Account</div>
            <div class="block-content">
                <ul>

                    <li><a class="btn btn-info btn-block" type="button"  href="{{route('buyers.prof-info')}}" class="">Profile Information</a> </li>
                    <li><a class="btn btn-info btn-block" type="button" href="{{route('buyers.delivery-add')}}" class="">Delivery Address</a> </li>
                    <li><a class="btn btn-info btn-block" type="button" href="{{route('buyers.billing-add')}}" class="">Billing Address</a></li>
                    <li><a class="btn btn-info btn-block" type="button" href="{{route('buyers.order-history')}}" class="">Order History</a> </li>
                {{-- <li><a href="{{route('users.prod-stat')}}" class="">Change Password</a></li> --}}
                </ul>
            </div>
            </div>
        </aside>

        <div id="content" class="col-sm-9">
            <div class="col-main">


              <div class="my-account">
                @foreach ($user_profile as $current_user)

                {!! Form::open(['action' => ['MyAccountController@updateDeliveryInfo', $current_user->del_id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                      <div class="col-sm-12">
                        <h2>Delivery Address Information</h2>
                        <br>
                      </div>

                      <div class="row" style="padding:10px;">
                        <div class="col-md-6" style="font-weight:normal;">
                          <label class="col-md-12" style="font-weight: normal;"><span style="color:red;">*</span> Address</label>
                          <div class="col-md-12">
                            {{Form::text('del_address', $current_user->del_address, ['class' => 'form-control', 'placeholder' => 'Address'])}}
                         </div>
                        </div>

                        <div class="col-md-6" style="font-weight:normal;">
                          <label class="col-md-12" style="font-weight: normal;"><span style="color:#a94442;">*</span> Barangay</label>
                          <div class="col-md-12">
                            {{Form::text('del_brgy', $current_user->del_brgy, ['class' => 'form-control', 'placeholder' => 'Barangay'])}}


                          </div>
                        </div>
                      </div>

                      <div class="row" style="padding:10px;">
                        <div class="col-md-6" style="font-weight:normal;">
                          <label class="col-md-12" style="font-weight: normal;"><span style="color:red;">*</span> City</label>
                          <div class="col-md-12">
                            {{Form::text('del_city', $current_user->del_city, ['class' => 'form-control', 'placeholder' => 'City'])}}
                          </div>
                        </div>
                        <div class="col-md-6" style="font-weight:normal;">
                          <label class="col-md-12" style="font-weight: normal;"><span style="color:red;">*</span> State/Province</label>
                          <div class="col-md-12">
                            {{Form::text('del_province', $current_user->del_province, ['class' => 'form-control', 'placeholder' => 'Sate/Province'])}}

                          </div>
                        </div>
                      </div>

                      <div class="row" style="padding:10px;">
                        <div class="col-md-4" style="font-weight:normal;">
                          <label class="col-md-12" style="font-weight: normal;"><span style="color:red;">*</span> Zip Code</label>
                          <div class="col-md-12">
                            {{Form::text('del_zipcode', $current_user->del_zipcode, ['class' => 'form-control', 'placeholder' => 'Zip Code'])}}
                          </div>
                        </div>
                        <div class="col-md-8" style="font-weight:normal;">
                          <label class="col-md-12" style="font-weight: normal;"><span style="color:red;">*</span> Country</label>
                          <div class="col-md-12">
                            {{Form::text('del_country', $current_user->del_country, ['class' => 'form-control', 'placeholder' => 'Country'])}}
                          </div>
                        </div>
                      </div>
                      <div class="row" style="padding:10px;">
                        <div class="col-md-12" style="font-weight:normal;">
                          <label class="col-md-12" style="font-weight: normal;">Other Billing Address Details <span style="color:red; font-size: 12px;">(any known buildings, landmarks, etc.)</span></label>
                          <div class="col-md-12">
                            {{Form::textarea('del_others', $current_user->del_others, ['class' => 'form-control', 'placeholder' => 'Others'])}}

                          </div>
                        </div>
                      </div>

                    <br>
                      <div class="form-group col-sm-12">
                          <div class="pull-right">

                              {{form::submit('Update', ['class' => 'btn btn-primary'])}}
                          </div>
                      </div>

                      @endforeach

              </div>
            </div>
          </div>
    </div>
</div>
@endsection
