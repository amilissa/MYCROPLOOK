
@extends('layouts.app')
@section('content')


<div class="container">
	<div class="row">

<aside id="column-right" class="col-right col-xs-12  col-sm-3">
    <div class="block block-account">
      <div class="block-title"><b><h4> My Account</h4></b></div>
      <div class="block-content">
        <ul>

          <li><a class="btn btn-info btn-block" href="{{route('buyers.prof-info')}}" class="">Profile Information</a> </li>
          <li><a class="btn btn-info btn-block" href="{{route('buyers.delivery-add')}}" class="">Delivery Address</a> </li>
          <li><a class="btn btn-info btn-block" href="{{route('buyers.billing-add')}}" class="">Billing Address</a></li>
          <li><a class="btn btn-info btn-block" href="{{route('buyers.order-history')}}" class="">Order History</a> </li>
          {{-- <li><a href="{{route('users.prod-stat')}}" class="">Change Password</a></li> --}}
        </ul>
      </div>
    </div>
  </aside>

  <div id="content" class="col-sm-9">
    <div class="col-main">


      <div class="my-account">

        <form id="frmRegister" action="https://www.palengkeboy.com/do-update-customer-profile" method="post" enctype="multipart/form-data" class="form-horizontal">

            <input type="hidden" id="_token" name="_token" value="vHbYmvYOheZchP9HpqvAhVoJy0nS3qdC3BO4jmmJ">

            <fieldset id="account">
              <div class="col-sm-12">
                <h2>Your Personal Details</h2>
                <br>
              </div>

              <div class="row" style="padding:10px;">
                <div class="col-md-4" style="font-weight:normal;">
                  <label class="col-md-12" style="font-weight: normal;"><span style="color:red;">*</span> First Name</label>
                  <div class="col-md-12">
                    <input type="text" name="FirstName" value="Mark" placeholder="First Name" id="input-firstname" class="form-control" required="">
                  </div>
                </div>
                <div class="col-md-4" style="font-weight:normal;">
                  <label class="col-md-12" style="font-weight: normal;"><span style="color:red;">*</span> Last Name</label>
                  <div class="col-md-12">
                    <input type="text" name="LastName" value="Anthony" placeholder="Last Name" id="input-lastname" class="form-control" required="">
                  </div>
                </div>
                <div class="col-md-4" style="font-weight:normal;">
                  <label class="col-md-12" style="font-weight: normal;">Middle Name</label>
                  <div class="col-md-12">
                    <input type="text" name="MiddleName" value="" placeholder="Middle Name" id="input-middlename" class="form-control">
                  </div>
                </div>
              </div>

              <div class="row" style="padding:10px;">
                <div class="col-md-4" style="font-weight:normal;">
                  <label class="col-md-12" style="font-weight: normal;"><span style="color:red;">*</span> Mobile No.</label>
                  <div class="col-md-12">
                    <input type="text" name="MobileNo" value="09093522667" placeholder="Mobile No." id="input-mobileno" class="form-control" required="">
                  </div>
                </div>
                <div class="col-md-4" style="font-weight:normal;">
                  <label class="col-md-12" style="font-weight: normal;">Tel. No.</label>
                  <div class="col-md-12">
                    <input type="tel" name="TelNo" value="n/a" placeholder="Telephone No." id="input-telephone" class="form-control" required="">
                  </div>
                </div>
                <div class="col-md-4" style="font-weight:normal;">
                  <label class="col-md-12" style="font-weight: normal;"><span style="color:red;">*</span> E-Mail Address</label>
                  <div class="col-md-12">
                    <input type="email" name="EmailAddress" value="marklibres345@gmail.com" placeholder="E-Mail Address" id="input-emailaddress" class="form-control" required="">
                  </div>
                </div>

              </div>

            </fieldset>
            <br>
            <fieldset>
              <div class="form-group col-sm-12">
                  <div class="pull-right">
                    <button type="submit" id="btnContinue" class="button continue" style="background-color: #1c9025; color:#fff;">Update</button>
                  </div>
              </div>
            </fieldset>

        </form>

      </div>
    </div>
  </div>
    </div>
</div>
@endsection
