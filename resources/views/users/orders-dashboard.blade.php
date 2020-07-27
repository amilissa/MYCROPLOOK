@extends('layouts.orders')

@section('content')

<div>
     <h4><strong>Orders Dashboard</strong></h4><hr>
     <strong>Orders Confirmation</strong>
      <div id="ordersbtn">
            <a href="{{route('dashboard.CompletedTransaction')}}" class="btn btn-success" style="margin-bottom:1rem">Completed transactions</a>
            <a href="{{route('users.orders-dashboard')}}" class="btn btn-info" style="margin-bottom:1rem">Declined Orders</a>
      </div>


            <div class="container-fluid px-5 py-5 mx-auto">
                <div class="row  px-3">

            @foreach ($orders_to_confirm as $order_item)
            @if($order_item->status == "Pending")
                    <div class="block text-center"> <img class="image" src="/storage/uploads/cropImage/{{$order_item->crop_image}}">
                        <div class="info py-2 px-2">
                          <div class="row px-3">
{{--
                            <input type="date" name="expected_del_date" value="" id="expected_del_date" class="">--}}
                            {{-- <button class="mb-0 lg-font btn cart" data-target="#forDelSched" class="btn btn-success">CONFIRM ORDER</button> --}}

                        <button class ="mb-0 lg-font btn cart" data-toggle="modal" data-target="#forDelSched">CONFIRM</button>
                            <div class="modal fade" id="forDelSched" role="dialog">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                <h4 class="modal-title">Delivery Schedule</h4>
                                <button type="button" class="close" data-dismiss="modal" style="float: right">&times;</button>
                                </div>
                                <div class="modal=body">
                            <form action="{{route('dashboard.ConfirmedOrder', ['conf_id'=> $order_item->io_id])}}" method="GET" id="checkout-form">
                                <input type="date" name="expected_del_date" value="" id="expected_del_date" class="" required>
                                <button class="mb-0 lg-font btn cart" class="btn btn-success">CONFIRM ORDER</button>

                            </form>

                            </div>
                            <div class="modal-footer">
                            </div>
                            </div>
                            </div>
                            </div>

                            <a class="mb-0 lg-font order" type="button" href="{{route('dashboard.DeclinedOrder', ['decl_id'=> $order_item->io_id])}}">DECLINE</a>

                              </div>
                            <div class="text-left">
                              <h5 class="mb-0 mt-2">{{$order_item->crop_name}}</h5>
                              <small class="text-muted mb-1">Crop Price: ₱ {{$order_item->crop_price}} /kg</small><br>
                              <small class="text-muted mb-1">Quantity Ordered: {{$order_item->qty}} kg</small><br>
                              <small class="text-muted mb-1">Total price: ₱ {{$order_item->price}} </small>
                            <hr>
                            <h6 class="mb-0 mt-2">Buyers Info:</h6>
                            <small class="text-muted mb-1"> Buyer's Full Name: {{$order_item->orders_buyer_name}} </small><br>
                            <small class="text-muted mb-1"> Buyer's Address: {{$order_item->orders_address}} </small><br>
                            <small class="text-muted mb-1"> Buyer's Mobile Number: {{$order_item->orders_mobile_no}}</small><br>
                            </div>
                          </div>
                        </div>
                        @endif
                        @endforeach
                      </div>
                    </div>

                            <div class="panel panel-default panel-order">
                                        <div class="panel-heading">
                                        <h5><strong>Lists of Reservations</strong></h5>
                                            <div class="btn-group pull-right">
                                                <div class="btn-group">

                                                        <button type="button" class=" btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                                        Filter Reservations <i class="fa fa-filter"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#">Approved orders</a></li>
                                                        <li><a href="#">Pending orders</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        <hr>

                                        <div class="container-fluid px-5 py-5 mx-auto">
                                            <div class="row  px-3">

                                        @foreach ($orders_to_confirm as $order_item)
                                        @if($order_item->status == "Confirmed")
                                                <div class="block text-center"> <img class="image" src="/storage/uploads/cropImage/{{$order_item->crop_image}}">
                                                    <div class="info py-2 px-2">
                                                    <div class="row px-3">

                                                            <a class="mb-0 lg-font btn cart2" type="button" href="{{route('dashboard.DeliveredOrder', ['deli_id'=> $order_item->io_id])}}">DELIVERED</a>


                                                        </div>
                                                        <div class="text-left">
                                                        <h5 class="mb-0 mt-2">{{$order_item->crop_name}}</h5>
                                                        <small class="text-muted mb-1">Crop Price: ₱ {{$order_item->crop_price}} /kg</small><br>
                                                        <small class="text-muted mb-1">Quantity Ordered: {{$order_item->qty}} kg</small><br>
                                                        <small class="text-muted mb-1">Total price: ₱ {{$order_item->price}} </small>
                                                        <hr>
                                                        <h6 class="mb-0 mt-2">Buyers Info:</h6>
                                                        <small class="text-muted mb-1"> Buyer's Full Name: {{$order_item->orders_buyer_name}} </small><br>
                                                        <small class="text-muted mb-1"> Buyer's Address: {{$order_item->orders_address}} </small><br>
                                                        <small class="text-muted mb-1"> Buyer's Mobile Number: {{$order_item->orders_mobile_no}}</small><br>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    @endif
                                                    @endforeach
                                                </div>
                                                </div>
                            </div>

                            </div>
@endsection

