@extends('layouts.app')

@section('content')


<body>

    @if(Session::has('reservation'))
		        <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-8">
	 						<div class="items">

                                @foreach($posts as $post)
				 				<div class="product">
				 					<div class="row">
					 					<div class="col-md-3">
					 						<img class="img-fluid mx-auto d-block image" src="/storage/uploads/cropImage/{{$post['item']['crop_image']}}" >
					 					</div>
					 					<div class="col-md-8">
					 						<div class="info">
						 						<div class="row">
							 						<div class="col-md-8 product-name">
							 							<div class="product-name">
								 							<h5><strong><a href="#">{{ $post['item']['crop_name']}}</a></strong></h5>
								 							<div class="product-info">
									 							<div><strong>Price: </strong><span class="value">₱ {{ $post['item']['crop_price'] }} /kg</span></div>
									 							<div><strong>Description: </strong><span class="value">{{ $post['item']['crop_desc'] }}</span></div>
                                                                <div><strong>Harvest Period: </strong><span class="value">{{ $post['item']['startHarvestMonth'] }} {{ $post['item']['startHarvestYear'] }} - {{ $post['item']['endHarvestMonth'] }} {{ $post['item']['endHarvestYear'] }}</span></div>
                                                                {{-- <div><strong>Grower: </strong><span class="value">{{$post->user->name}}</span></div> --}}


                                                                <hr>
                                                                <div><strong>Total Price: </strong><span class="value">₱ {{ $post['price'] }}</span></div>

									 						</div>
									 					</div>
                                                     </div>
                                                    <div class="col-md-4">
							 						<div class="w-100 quantity">
                                                         <div class="" style="height: 50px"><span class="centerspan">
                                                            <label for="quantity">KG:</label>
                                                         <span class="badge bg-dark text-white">{{ $post['qty']}}</span>
                                                            <a href="{{ route('reservation.removeItem', ['id' => $post['item']['id']])}}"- type="button" class="btn btn-outline-danger btn-sm">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </a>
                                                            <a href="{{ route('reservation.addByOne', ['id' => $post['item']['id']])}}"  type="button" class="plus"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                                        <a href="{{ route('reservation.reduceByOne', ['id' => $post['item']['id']])}}"  type="button" class="minus"><i class="fa fa-minus" aria-hidden="true"></i></a>

                                                        </span></div>
                                                     </div>
                                                    </div>

							 					</div>
							 				</div>
					 					</div>
					 				</div>
                                 </div>
                                 <hr>
                                 @endforeach
				 			</div>
			 			</div>
			 			<div class="col-md-12 col-lg-4">
			 				<div class="summary">
			 					<h3>Summary</h3>
			 					<div class="summary-item"><strong class="text">Subtotal: </strong><span class="price">₱ {{ $totalPrice }}</span></div>
			 					<div class="summary-item"><strong class="text">Discount: </strong><span class="price">₱ 0</span></div>
			 					<div class="summary-item"><strong class="text">Shipping: </strong><span class="price">₱ 0</span></div><hr>
			 					<div class="summary-item"><strong class="text">Total: </strong><span class="tPrice">₱ {{ $totalPrice }}</span></div>
                                 <a href="{{ route('checkout')}}" type="button" class="btn btn-primary btn-lg btn-block">Checkout</a>
				 			</div>
			 			</div>
		 			</div>
                 </div>
                 @else
<div class="row">
    <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
    <h2>No Reservations!</h2>
    </div>
</div>
@endif
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
@endsection
{{--


@if(Session::has('reservation'))
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <ul class="list-group ">
                @foreach($posts as $post)
                <li class="list-group-item">
                    <img src="/storage/uploads/cropImage/{{$post['item']['crop_image']}}" style="width: 50px; height: 50px;" />
                <strong>{{ $post['item']['crop_name']}}</strong>
                <strong>{{ $post['item']['farmer'] }}</strong>
                <span class="label label-success">{{$post['price']}}</span>
                <div class="btn-group">
                    <button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action<span class="tab-content"></span></button>
                    <ul class="dropdown-menu">
                    <li><a href="{{ route('reservation.reduceByOne', ['id' => $post['item']['id']])}}">Reduce by 1</a></li>
                        <li><a href="{{ route('reservation.removeItem', ['id' => $post['item']['id']])}}">Remove Crop</a></li>
                    </ul>
                </div>

                <span class="badge bg-dark text-white">{{ $post['qty']}}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <strong>Total: {{ $totalPrice }}</strong>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <a href="{{ route('checkout')}}" type="button" class="btn btn-success">Checkout</a>
        </div>
    </div>
 --}}
