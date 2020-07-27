@extends('layouts.app')
@section('content')


<div class="container">

    	<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">Completed Transactions</h4>

					</div>

					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>Order ID</th>
                                <th>Crop</th>
                                <th>Total Qty</th>
                                <th>Total Price</th>
								<th>Buyer's name</th>
								<th>Buyer's number</th>
								<th>Crop Status</th>
								<th>Date completed</th>
							</tr>
						</thead>
						<tbody>
                        @foreach ($alltrans as $alltran)
                        @if($alltran->status == "Delivered" || $alltran->status == "isReceived")
							<tr>
								<td>{{$alltran->io_id}}</td>
								<td>{{$alltran->crop_name}}</td>
								<td>{{$alltran->qty}}</td>
								<td>{{$alltran->price}}</td>
								<td>{{$alltran->orders_buyer_name}}</td>
								<td>{{$alltran->orders_mobile_no}}</td>
								<td>{{$alltran->status}}</td>
								<td>{{$alltran->updated_at}}</td>
							</tr>

                            @endif
                        @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
</div>


@endsection
