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
								<th>Farmer's name & Company</th>
								<th>Farmer's number</th>
								<th>Crop Status</th>
								<th>Date completed</th>
							</tr>
						</thead>
						<tbody>


						@foreach ($alltranss as $alltran)
                        @if($alltran->status == "Received")

							<tr>
								<td>{{$alltran->io_id}}</td>
								<td>{{$alltran->crop_name}}</td>
								<td>{{$alltran->qty}}</td>
                                <td>{{$alltran->price}}</td>
                                @foreach ($farmers_info as $farmer_info)
                            @if($farmer_info->id == $alltran->user_id)
								<td>{{$farmer_info->first_name}} {{$farmer_info->middle_name}} {{$farmer_info->last_name}} -  {{$farmer_info->name_of_company}} </td>
                                <td>{{$farmer_info->mobile_no}}</td>

                            @else
                            @endif
                            @endforeach
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
