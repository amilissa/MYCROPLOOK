

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

        delivery
    </div>
</div>
@endsection
