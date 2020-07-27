@extends('layouts.orders')

@section('content')
<div>
     <h4><strong>MY ORDERS</strong></h4><hr>
     <strong>PENDING ORDERS</strong>
      <div id="ordersbtn">
            <a href="{{route('myaccount.CompletedTransactionsOfBuyer')}}" class="btn btn-success" style="margin-bottom:1rem">Completed transactions</a>
            <!-- <a href="{{route('myaccount.CancelledOrderOfBuyer')}}" class="btn btn-info" style="margin-bottom:1rem">Cancelled Orders</a> -->
      </div>
            <div class="container-fluid px-5 py-5 mx-auto">
                <div class="row  px-3">
            @foreach ($orders_to_confirm as $order_item)
              @if($order_item->status == "Pending")
                    <div class="block text-center"> <img class="image" src="/storage/uploads/cropImage/{{$order_item->crop_image}}">
                        <div class="info py-2 px-2">
                          <div class="row px-3">

                                <a class="mb-0 lg-font btn cancelledorder" type="button" href="{{route('myaccount.CancelledOrder', ['canc_id'=> $order_item->io_id])}}">CANCEL ORDER</a>

                              </div>
                            <div class="text-left">
                              <h5 class="mb-0 mt-2">{{$order_item->crop_name}}</h5>
                              <small class="text-muted mb-1">Crop Price: ₱ {{$order_item->crop_price}} /kg</small><br>
                              <small class="text-muted mb-1">Quantity Ordered: {{$order_item->qty}} kg</small><br>
                              <small class="text-muted mb-1">Total price: ₱ {{$order_item->price}} </small>
                            <hr>

                            @foreach ($farmers_info as $farmer_info)
                            @if($farmer_info->id == $order_item->user_id)
                            <h6 class="mb-0 mt-2">Farmers Info:</h6>
                            <small class="text-muted mb-1"> Farmer's Name: {{$farmer_info->first_name}} {{$farmer_info->middle_name}} {{$farmer_info->last_name}} </small><br>
                            <small class="text-muted mb-1"> Company Name: {{$farmer_info->name_of_company}} </small><br>
                            <small class="text-muted mb-1"> Mobile Number: {{$farmer_info->mobile_no}}</small><br>

                            @else
                            @endif
                            @endforeach
                            </div>
                          </div>
                        </div>
              @endif

            @endforeach
                      </div>
                    </div>
<div class="panel panel-default panel-order">
              <div class="panel-heading">
              <h5><strong>LIST OF CONFIRMED ORDERS</strong></h5>
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

                                <a class="btn btnrec cart3" type="button" href="/chat">CONTACT FARMER</a>

                              </div>
                              <div class="text-left">
                              <h5 class="mb-0 mt-2">{{$order_item->crop_name}}</h5>
                              <small class="text-muted mb-1">Crop Price: ₱ {{$order_item->crop_price}} /kg</small><br>
                              <small class="text-muted mb-1">Quantity Ordered: {{$order_item->qty}} kg</small><br>
                              <small class="text-muted mb-1">Total price: ₱ {{$order_item->price}} </small>
                            <hr>

                            @foreach ($farmers_info as $farmer_info)
                            @if($order_item->user_id == $farmer_info->id)
                            <h6 class="mb-0 mt-2">Farmers Info:</h6>
                            <small class="text-muted mb-1"> Farmer's Name: {{$farmer_info->first_name}} {{$farmer_info->middle_name}} {{$farmer_info->last_name}} </small><br>
                            <small class="text-muted mb-1"> Company Name: {{$farmer_info->name_of_company}} </small><br>
                            <small class="text-muted mb-1"> Mobile Number: {{$farmer_info->mobile_no}}</small><br>

                            @foreach($sched as $schedule)
                                    @if($schedule->io_id == $order_item->io_id)

                                    <small style="color: red">Expected Delivery date: <br>{{$schedule->expected_del_date}}</small>
                                    @endif
                            @endforeach
                            @else
                            @endif
                            @endforeach
                            </div>
                          </div>
                        </div>
                        @endif
                        @endforeach
                      </div>
                    </div>
</div>


<div class="panel panel-default panel-order">
              <div class="panel-heading">
              <h5><strong>LIST OF DELIVERED ORDERS</strong></h5>
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
            @if($order_item->status == "Delivered")
                    <div class="block text-center"> <img class="image" src="/storage/uploads/cropImage/{{$order_item->crop_image}}">
                        <div class="info py-2 px-2">
                          <div class="row px-3">

                                <a class="btn btnrec cart4" type="button" href="{{route('myaccount.ReportOrder', ['repo_id'=> $order_item->io_id])}}">REPORT</a>
                                <a class="btn order3" type="button" href="{{route('myaccount.ReceivedOrder', ['rece_id'=> $order_item->io_id])}}">RECEIVED</a>

                              </div>
                              <div class="text-left">
                              <h5 class="mb-0 mt-2">{{$order_item->crop_name}}</h5>
                              <small class="text-muted mb-1">Crop Price: ₱ {{$order_item->crop_price}} /kg</small><br>
                              <small class="text-muted mb-1">Quantity Ordered: {{$order_item->qty}} kg</small><br>
                              <small class="text-muted mb-1">Total price: ₱ {{$order_item->price}} </small>
                            <hr>

                            @foreach ($farmers_info as $farmer_info)
                            @if($order_item->user_id == $farmer_info->id)
                            <h6 class="mb-0 mt-2">Farmers Info:</h6>
                            <small class="text-muted mb-1"> Farmer's Name: {{$farmer_info->first_name}} {{$farmer_info->middle_name}} {{$farmer_info->last_name}} </small><br>
                            <small class="text-muted mb-1"> Company Name: {{$farmer_info->name_of_company}} </small><br>
                            <small class="text-muted mb-1"> Mobile Number: {{$farmer_info->mobile_no}}</small><br>

                            @else
                            @endif
                            @endforeach
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
