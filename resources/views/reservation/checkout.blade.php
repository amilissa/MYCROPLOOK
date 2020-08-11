@extends('layouts.app')

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" style="padding: 10px;" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="/storage/uploads/banners/banner0.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/storage/uploads/banners/banner2.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/storage/uploads/banners/banner1.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/storage/uploads/banners/banner3.jpg" alt="Third slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/storage/uploads/banners/banner4.jpg" alt="Third slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="/storage/uploads/banners/banner5.jpg" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

<form action="{{route('checkout')}}" method="POST" id="checkout-form">
<div id="content" class="col-sm-12">

    <div class="panel-group" id="accordion">

      <div class="panel panel-default">

        <div class="panel-heading">

          <h4 class="panel-title">

            <a href="#collapse-account-details" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle collapsed" aria-expanded="false" style="color: #229a2c;"><span class="number">1</span> Account Details</a>

          </h4>

        </div>

    <div class="panel-collapse collapse" id="collapse-account-details" aria-expanded="false" style="height: 0px;">

          <div class="panel-body">




          <p style="color:#a94442;font-size:11px;">Reminder: (*) mark with asterisk sign are required input fields</p>

          @foreach ($user_profile as $current_user)
               <div class="row" style="padding:10px;">
                <div class="col-md-4" style="font-weight:normal;">

                  <label class="col-md-12" style="font-weight: normal;"><span style="color:#a94442;">*</span> First Name</label>

                  <div class="col-md-12">
                  <input type="text" name="firstName" value="{{$current_user->first_name}}" id="firstName" class="form-control" style="width: 100%;" readonly required>

                  </div>

                </div>
                <div class="col-md-4" style="font-weight:normal;">

                  <label class="col-md-12" style="font-weight: normal;"><span style="color:#a94442;">*</span> Last Name</label>

                  <div class="col-md-12">
                    <input type="text" name="lastName" value="{{$current_user->last_name}}" id="lastName" class="form-control" style="width: 100%;" readonly required>

                  </div>

                </div>

                <div class="col-md-4" style="font-weight:normal;">

                  <label class="col-md-12" style="font-weight: normal;">Middle Name</label>

                  <div class="col-md-12">
                    <input type="text" name="middleName" value="{{$current_user->middle_name}}" id="middleName" class="form-control" style="width: 100%;" readonly required>

                  </div>

                </div>

              </div>

              <div class="row" style="padding:10px;">

                <div class="col-md-4" style="font-weight:normal;">

                  <label class="col-md-12" style="font-weight: normal;"><span style="color:#a94442;">*</span> Mobile No.</label>

                  <div class="col-md-12">

                    <input type="text" name="mobile_no" value="{{$current_user->mobile_no}}" id="mobile_no" class="form-control" style="width: 100%;" readonly required>

                  </div>

                </div>


                <div class="col-md-4" style="font-weight:normal;">

                  <label class="col-md-12" style="font-weight: normal;"><span style="color:#a94442;">*</span> E-Mail Address</label>

                  <div class="col-md-12">

                    <input type="text" name="email" value="{{$current_user->email}}" id="email" class="form-control" style="width: 100%;" readonly required>

                  </div>

                </div>

              </div>

              @endforeach


              <div class="row" style="padding:10px;">

                  <div class="col-md-12" style="font-weight:normal;">

                    <div class="form-group">

                      <div class="pull-right">

                        <br>

                        <a href="{{route('buyers.prof-info')}}" type="button" id="btnAccountDetailsNext" class="btn continue" style="width: 180px; background-color: #1c9025; color:#fff;"> Update </a>

                        <br>

                        <br>

                      </div>

                    </div>

                  </div>

              </div>






          </div>

        </div>

      </div>




        <div class="panel panel-default">

          <div class="panel-heading">

            <h4 class="panel-title">

              <a href="#collapse-shipping-address" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle collapsed" aria-expanded="false" style="color: #229a2c;"><span class="number">2</span> Delivery Address</a>

            </h4>

          </div>

          <div class="panel-collapse collapse" id="collapse-shipping-address" aria-expanded="false" style="height: 0px;">
            <div class="panel-body">
                <p style="color:#a94442;font-size:11px;">Reminder: (*) mark with asterisk sign are required input fields.</p>
                <p style="color:#a94442;font-size:11px;"><b>Ship To</b> - refers to the person who will receive your order during delivery.</p>
              {{-- <div class="row" style="padding:10px;">
                <div class="col-md-12" style="font-weight:normal;">
                    <div class="checkbox custom-checkbox">
                        <label style="font-size:13px;color:#229a2c;">
                            <input id="chkShipTo" type="checkbox"> <span class="fa fa-check"></span><b>Deliver to the same person?</b>
                        </label>
                    </div>
                </div>
              </div> --}}



              @foreach ($user_profile as $current_user)
              <div class="row" style="padding:10px;">

                <div class="col-md-6" style="font-weight:normal;">

                  <label class="col-md-12" style="font-weight: normal;"><span style="color:#a94442;">*</span> Ship To</label>

                  <div class="col-md-12">

                    <input type="text" name="fullName" value="{{($current_user->first_name . ' ' . $current_user->middle_name . ' ' . $current_user->last_name)}}" id="fullName" class="form-control" style="width: 100%;" readonly required>

                  </div>

                </div>



                <div class="col-md-6" style="font-weight:normal;">

                  <label class="col-md-12" style="font-weight: normal;"><span style="color:#a94442;">*</span> Contact No.</label>

                  <div class="col-md-12">
                    <input type="text" name="mobile_no" value="{{$current_user->mobile_no}}" id="mobile_no" class="form-control" style="width: 100%;" readonly required>

                  </div>

                </div>

              </div>

              @endforeach


              @foreach ($user_delivery as $current_user)
              <div class="row" style="padding:10px;">

                <div class="col-md-6" style="font-weight:normal;">

                  <label class="col-md-12" style="font-weight: normal;"><span style="color:#a94442;">*</span> Delivery Address</label>

                  <div class="col-md-12">
                    <input type="text" name="del_address" value="{{$current_user->del_address}}" id="del_address" class="form-control" style="width: 100%;" readonly required>

                  </div>

                </div>



                <div class="col-md-6" style="font-weight:normal;">

                  <label class="col-md-12" style="font-weight: normal;"><span style="color:#a94442;">*</span> Barangay</label>

                  <div class="col-md-12">

                    <input type="text" name="del_brgy" value="{{$current_user->del_brgy}}" id="del_brgy" class="form-control" style="width: 100%;" readonly required>

                  </div>

                </div>

              </div>



              <div class="row" style="padding:10px;">

                <div class="col-md-6" style="font-weight:normal;">

                  <label class="col-md-12" style="font-weight: normal;"><span style="color:#a94442;">*</span> City</label>

                  <div class="col-md-12">

                    <input type="text" name="del_city" value="{{$current_user->del_city}}" id="del_city" class="form-control" style="width: 100%;" readonly required>

                  </div>

                </div>

                <div class="col-md-6" style="font-weight:normal;">

                  <label class="col-md-12" style="font-weight: normal;"><span style="color:#a94442;">*</span> State/Province</label>

                  <div class="col-md-12">

                    <input type="text" name="del_province" value="{{$current_user->del_province}}" id="del_province" class="form-control" style="width: 100%;" readonly required>

                  </div>

                </div>

              </div>



              <div class="row" style="padding:10px;">

                <div class="col-md-4" style="font-weight:normal;">

                  <label class="col-md-12" style="font-weight: normal;"><span style="color:#a94442;">*</span> Zip Code</label>

                  <div class="col-md-12">

                    <input type="text" name="del_zipcode" value="{{$current_user->del_zipcode}}" id="del_zipcode" class="form-control" style="width: 100%;" readonly required>


                  </div>

                </div>



                <div class="col-md-8" style="font-weight:normal;">

                  <label class="col-md-12" style="font-weight: normal;"><span style="color:#a94442;">*</span> Country</label>

                  <div class="col-md-12">

                    <input type="text" name="del_country" value="{{$current_user->del_country}}" id="del_country" class="form-control" style="width: 100%;" readonly required>

                  </div>

                </div>

              </div>



              <div class="row" style="padding:10px;">

                <div class="col-md-12" style="font-weight:normal;">

                  <label class="col-md-12" style="font-weight: normal;">Other Address Details <span style="color:#a94442; font-size: 12px;">(any known buildings, landmarks, etc.)</span></label>

                  <div class="col-md-12">
                    <input type="textarea" name="del_others" value="{{$current_user->del_others}}" id="del_others" class="form-control" style="width: 100%;" readonly required>

                  </div>

                </div>

              </div>
              <div>

                <label class="col-md-12" style="font-weight: normal;">Your Complete Address:</label>

                <input type="text" name="completeAddress" value="{{($current_user->del_address . ', (' . $current_user->del_others . '), ' . $current_user->del_brgy . ', ' . $current_user->del_city
                . ', ' . $current_user->del_province . ', ' . $current_user->del_country . ', ' . $current_user->del_zipcode)}}" id="completeAddress" class="form-control" style="width: 100%;" readonly required>

              </div>

              @endforeach
              <div class="row" style="padding:10px;">

                  <div class="col-md-12" style="font-weight:normal;">

                    <div class="form-group">

                      <div class="pull-right">

                        <br>

                      <a type="button" href="{{route('buyers.delivery-add')}}" id="btnShipAddressNext" class="btn continue" style="width: 180px; background-color: #1c9025; color:#fff;"> Update </a>

                        <br>

                        <br>

                      </div>

                    </div>

                  </div>

              </div>



            </div>

          </div>

        </div>



        <div class="panel panel-default">

          <div class="panel-heading">

            <h4 class="panel-title">

              <a href="#collapse-order-review" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle" aria-expanded="true" style="color: #229a2c;"><span class="number">3</span> Order Summary Review</a>

            </h4>

          </div>


          <div class="panel-collapse collapse in" id="collapse-order-review" aria-expanded="true" style="">

            <div class="panel-body">



                <div id="content" class="col-md-12">
                  <p class="col-md-12" style="color:red;font-size:11px;margin:0px;">
                    <br>
                    <span style="font-size:15px;"><b>Important Reminders :</b></span>
                    <br>
                    * Some product images are shown for illustration purposes only and may not be the actual representation of the product.
                    <br>
                    * Some product may not have the exact measurement/weight result as expected. Customer will be informed once the weight exceeds 250 grams.
                    <br>
                    * Check the items upon receive and report to us immediately any lacking or damages within 24 hrs.
                    <br>
                    * Order cancellation is not allowed once the order has been confirmed by the farmer.
                    <br>
                  </p>
                </div>






                      <div class="table-responsive shopping-cart-tbl">
                        <br>
                        <div style="background-color: green;">
                          <p style="padding: 5px; color: #fff;"><b>Summary</b>
                          </p>
                        </div>
                        <table class="data-table cart-table" id="shopping-cart-table">
                          <thead>
                            <tr>
                              <td class="text-center">Image</td>
                              <td class="text-left" style="width: 350px">Product Name</td>
                              <td class="text-left" style="width: 7%">Quantity</td>
                              <td class="text-right">Unit Price</td>
                              <td class="text-right">Sub Total</td>
                            </tr>
                          </thead>
                          <tbody>

                        @foreach($posts as $post)

                                      <tr>
                                        <td class="text-center">
                                            <img class="img-thumbnail" src="/storage/uploads/cropImage/{{$post['item']['crop_image']}}" >
                                        </td>
                                        <td class="text-left">

                                          <div class="input-group btn-block" style="max-width: 200px;">
                                            <h5 class="" style="width: 70px;"><strong>{{ $post['item']['crop_name']}}</strong></h5>

                                          </div>
                                        </td>
                                        <td class="text-right">Php {{ $post['qty']}} / kg</td>
                                        <td class="text-right">Php {{$post['item']['crop_price']}}</td>
                                      </tr>

                                      @endforeach




                          </tbody>
                        </table>
                      </div>

                      <div class="row container">
                        <div class="col-md-6">
                          <div class="panel-group" id="accordion">
                            <div class="panel panel-default" style="margin-top: -10px;">
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <table class="table table-bordered">
                            <tbody>
                              <tr>
                                <td style="text-align: right;"><strong>Total :</strong></td>
                                <td style="text-align: right;">Php {{$total}}</td>
                              </tr>
                              <tr>
                                <td style="text-align: right;"><strong>Delivery Charge:</strong></td>
                                <td style="text-align: right;">Php
                                  <span id="spnDeliveryCharge">0.00</span>
                                </td>
                              </tr>
                              <tr>
                                <td style="text-align: right;"><strong>Paypal Charges:</strong></td>
                                <td style="text-align: right;">Php
                                  <span id="spnPayPalCharges">0.00</span>
                                </td>
                              </tr>
                              <tr>
                                <td style="text-align: right;">
                                    <input type="text" id="GCertificateCode" name="GCertificateCode" value="" placeholder="Voucher Code" class="form-control">
                                </td>
                                <td style="text-align: right;">
                                    Php <span id="spnGiftCertificateVoucherAmount">0.00</span>
                                </td>
                              </tr>
                              <tr>
                                <td style="text-align: right; color:green;"><strong>Total Amount Due :</strong></td>
                                <td style="text-align: right; color:green;"><b>Php <span id="spnTotalAmountDue">{{$total}}</span></b></td>
                              </tr>
                                                                  <tr>
                                  <td style="text-align: right; color:red;"><strong>Minimum Purchase :</strong></td>
                                  <td id="spnMinimumPurchase" style="text-align: right; color:red;"><b><span>Php 0.00</span></b></td>
                                </tr>

                            </tbody>
                          </table>

                        </div>
                      </div>

              </div>


              <div class="row">

                <div class="col-sm-12 container">

                  <div class="col-sm-12 col-xs-12">

                    <div class="form-group">

                        <div class="pull-right">

                          <br>
{{--
                          <a href="{{view('/explore-products')}}" type="button" id="btnAccountDetailsNext" class="btn continue" style="width: 180px; background-color: #1c9025; color:#fff;"> Add More Crops? </a> --}}
                          <br>

                          <br>

                        </div>

                    </div>

                  </div>
                </div>


            </div>

          </div>

        </div>



        <div class="panel panel-default">

          <div class="panel-heading">

            <h4 class="panel-title">

              <a href="#collapse-payment-info" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle" aria-expanded="true" style="color: #229a2c;"><span class="number">4</span> Payment Information</a>

            </h4>

          </div>



          <div class="panel-collapse collapse in" id="collapse-payment-info" aria-expanded="true" style="">

            <div class="panel-body">

              <div style="clear:both;"></div>
              <br>
              <div class="row">
                <div class="col-md-12" style="font-weight:normal;">
                  <label class="col-md-12" style="font-size: 15px; font-weight: bold; background-color: #1c9025; padding: 10px; color:white;">Available Mode Of Payment</label>
                </div>
              </div>

              <div style="clear:both;"></div>
              <br>
              <div style="font-weight:normal;">
                <select id="ModeOfPayment" name="ModeOfPayment" class="form-control select2 select2-hidden-accessible" style="width: 100%;"  tabindex="-1" aria-hidden="true" required>
                    <option value="">Please Select</option>
            <option value="BT">Bank Transfer (not available)</option>
            <option value="COD">Cash On Delivery </option>
            <option value="EWP">E-Wallet Payment (not available)</option>
            <option value="GCash">GCash (not available)</option>
            <option value="Paypal">Paypal (not available)</option>
            </select>
            <span class="select2 select2-container select2-container--default select2-container--above" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-ModeOfPayment-container"><span class="select2-selection__rendered" id="select2-ModeOfPayment-container" title="Cash On Delivery">Cash On Delivery</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
              </div>

              <div style="clear:both;"></div>
              <br>


              <div class="row col-md-12">

                <div id="divCOD" class="text-center" style="font-weight: normal;">

                    <div class="col-md-4" style=" padding: 0px !important; padding-right: 10px !important; font-weight:normal; margin-bottom: 10px;">
                      <img src="/storage/uploads/croplists/cod.jpg" alt="Cash On Delivery" style="width: 100%; margin-bottom: 10px;">
                    </div>
                    <div class="col-md-8" style=" padding: 0px !important; font-weight:normal;">

                      <ul>
                        {{-- <li style="text-transform: none; font-weight: normal; text-align: left;">
                          With minimum purchase per area and a delivery charges for only  Php 8.00
                        </li> --}}
                        <li style="text-transform: none; font-weight: normal; text-align: left;">
                          You can pay in cash to our courier when you received the goods at your doorstep
                        </li>
                        <li style="text-transform: none; font-weight: normal; text-align: left;">
                          You will be notified regarding your order status via email and/or SMS
                        </li>
                      </ul>

                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                            <input type="text" name="ExpectedPaymentAmount" value="" id="ExpectedPaymentAmount" class="form-control" maxlength="12" placeholder="Expected Payment Amount" style="width: 100%; border-color: black" required>

                      <hr>

                      {{ csrf_field()}}
                      <button class="btn btn-success">Place Order</button>
                      </form>
                      <br>

                      <br>

                    </div>

                </div>

            </div>

          </div>

        </div>


    </div>

@endsection
{{--
                <div id="divGCash" class="text-center" style="font-weight:normal; display: none;">

                    <div class="col-md-4" style=" padding: 0px !important; padding-right: 10px !important; font-weight:normal; margin-bottom: 10px;">
                      <img src="https://www.palengkeboy.com/public/img/gcash.png" alt="Cash On Delivery" style="width: 100%; margin-bottom: 10px;">
                    </div>
                    <div class="col-md-8" style=" padding: 0px !important; font-weight:normal;">

                      <ul>
                        <li style="text-transform: none; font-weight: normal; text-align: left;">
                          Please express send your payment to our GCash Mobile No. 09054811840
                        </li>
                        <li style="text-transform: none; font-weight: normal; text-align: left;">
                          Send screenshot of your payment to info@palengkeboy.com
                        </li>
                      </ul>
                      <div class="col-md-12">
                        <input type="text" name="GCashPaymentAmount" value="" id="GCashPaymentAmount" class="input-text col-md-12 DecimalOnly" maxlength="12" placeholder="Enter GCash Payment Amount" style="width: 100%;">
                      </div>
                    </div>

                </div>

                <div id="divBankTransfer" class="text-center" style="font-weight:normal; display: none;">

                    <div class="col-md-4" style=" padding: 0px !important; padding-right: 10px !important; font-weight:normal; margin-bottom: 10px;">
                      <img src="https://www.palengkeboy.com/public/img/banktransfer.png" alt="Cash On Delivery" style="width: 100%; margin-bottom: 10px;">
                    </div>
                    <div class="col-md-8" style=" padding: 0px !important; font-weight:normal;">

                      <div class="col-md-12">

                        <select id="BankTransferBank" name="BankTransferBank" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required="" tabindex="-1" aria-hidden="true">

                            <option value="">Please Select Bank</option>
                                                              <option value="BDO" data-bankabrv="BDO" data-bank="Banco De Oro" data-bankacctno="0017-3050-4181" data-bankacctname="PALENGKE BOY ONLINE MARKETING">Banco De Oro</option>
                                                              <option value="BPI" data-bankabrv="BPI" data-bank="Bank of the Philippine Islands" data-bankacctno="9833-0218-07" data-bankacctname="PALENGKE BOY ONLINE MARKETING">Bank of the Philippine Islands</option>
                                                              <option value="MBTC" data-bankabrv="MBTC" data-bank="Metrobank" data-bankacctno="665-3-665-30650-0" data-bankacctname="PALENGKE BOY ONLINE MARKETING">Metrobank</option>
                                                              <option value="RCBC" data-bankabrv="RCBC" data-bank="Rizal Commercial Banking Corporation" data-bankacctno="759-0582-457" data-bankacctname="PALENGKE BOY ONLINE MARKETING">Rizal Commercial Banking Corporation</option>

                        </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-BankTransferBank-container"><span class="select2-selection__rendered" id="select2-BankTransferBank-container" title="Please Select Bank">Please Select Bank</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

                      </div>

                      <div class="col-md-12" style="margin-top: 10px;">

                        <span id="spnBankAccountNo" style="font-weight: normal;">Account No. ---- ---- ----</span>
                        <br>
                        <span id="spnBankAccountName" style="font-weight: normal;">Account Name : PALENGKE BOY ONLINE MARKETING</span>

                      </div>

                      <div class="col-md-12" style="margin-top: 10px;">

                        <input type="text" name="TransferredAmount" value="" id="TransferredAmount" class="input-text col-md-12 DecimalOnly" maxlength="12" placeholder="Enter Transferred Amount" style="width: 100%;">

                      </div>

                      <div class="col-md-12" style="font-weight:normal;">
                          <span style="font-size: 12px; font-weight:normal; color:red;">* Please send us a photo of your payment (proof of payment) to our email address at <b>info@palengkeboy.com</b></span>
                      </div>

                    </div>


                </div>

                <div id="divRCBCCashExpress" class="text-center" style="font-weight:normal; display: none;">


                    <div class="col-md-4" style=" padding: 0px !important; padding-right: 10px !important; font-weight:normal; margin-bottom: 10px;">
                      <img src="https://www.palengkeboy.com/public/img/rcbc-cashexpress.png" alt="RCBC Cash Express" style="width: 100%; margin-bottom: 10px;">
                    </div>
                    <div class="col-md-8" style=" padding: 0px !important; font-weight:normal;">

                      <span style="color:#1c9025;">
                        <b>
                          Pay your order right at your door-step with your Debit Card.
                        </b>
                      </span>

                      <ul style="list-style: none; padding-left: 0;">
                        <li style="text-transform: none; font-weight: normal; text-align: left;">

                            <img src="https://www.palengkeboy.com/public/img/rcbc-cashexpress1.png" alt="RCBC Cash Express - Step 1" style="width: 50px; margin-bottom: 10px; margin-right: 10px;">

                            Step 1. Enter your Order Number and Total Amount Due.

                        </li>
                        <li style="text-transform: none; font-weight: normal; text-align: left;">

                            <img src="https://www.palengkeboy.com/public/img/rcbc-cashexpress2.png" alt="RCBC Cash Express - Step 1" style="width: 50px; margin-bottom: 10px; margin-right: 10px;">

                            Step 2. Insert your Debit Card and key-in your PIN.

                        </li>
                        <li style="text-transform: none; font-weight: normal; text-align: left;">

                            <img src="https://www.palengkeboy.com/public/img/rcbc-cashexpress3.png" alt="RCBC Cash Express - Step 1" style="width: 50px; margin-bottom: 10px; margin-right: 10px;">

                            Step 3. Take your receipt.

                        </li>

                        <li style="text-transform: none; font-weight: normal; text-align: left;">

                          <span style="color:red;"><b>Please take note the following :</b></span>
                          <br>
                          <span style="color:red;">
                            * Php 30.00 RCBC Convenience Fee will be charge to your account
                          </span>
                          <br>
                          <span style="color:red;">
                            * Bancnet fees and charges will still be applied
                          </span>

                        </li>

                      </ul>

                    </div>

                </div>

                <div id="divTermsPayment" class="text-center" style="font-weight:normal; display: none;">


                    <div class="col-md-4" style=" padding: 0px !important; padding-right: 10px !important; font-weight:normal; margin-bottom: 10px;">
                      <img src="https://www.palengkeboy.com/public/img/terms.png" alt="Terms Payment" style="width: 100%; margin-bottom: 10px;">
                    </div>
                    <div class="col-md-8" style=" padding: 0px !important; font-weight:normal;">

                      <div class="col-md-12">
                        <span style="font-size: 15px; color:#1c9025;">
                            Your current payment terms :
                        </span>
                        <br><br>
                        <span style="font-size: 25px; color:#1c9025;">
                            <b>0 Days</b>
                        </span>
                      </div>

                      <div class="col-md-12">
                        <br><br>
                        <span>
                            To know more about your payment terms, please contact us at +63 (082) 285-4004.
                        </span>
                      </div>

                    </div>

                </div>

                <div id="divEWalletPayment" class="text-center" style="font-weight:normal; display: none;">

                    <div class="col-md-4" style=" padding: 0px !important; padding-right: 10px !important; font-weight:normal; margin-bottom: 10px;">
                      <img src="https://www.palengkeboy.com/public/img/ewallet.png" alt="E-Wallet Payment" style="width: 100%; margin-bottom: 10px;">
                    </div>
                    <div class="col-md-8" style=" padding: 0px !important; font-weight:normal;">

                      <div class="col-md-12" style="margin-bottom: 10px;">

                        <select id="EWalletType" name="EWalletType" class="form-control select2 select2-hidden-accessible" style="width: 100%;" required="" tabindex="-1" aria-hidden="true">

                            <option value="">Please Select E-Wallet Type</option>
                                                              <option value="Hiyang International">Hiyang International</option>

                        </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-EWalletType-container"><span class="select2-selection__rendered" id="select2-EWalletType-container" title="Please Select E-Wallet Type">Please Select E-Wallet Type</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

                      </div>

                      <div id="divEwalletDetails" style="display: none;">

                        <div class="col-md-12" style="padding: 0px !important; margin-bottom: 10px;">
                          <label class="col-md-12" style="font-weight: normal;"><span id="spnEWalletHeaderLabel" style="color:#a94442;"></span></label>
                        </div>

                        <div class="col-md-12" style="padding: 0px !important; margin-bottom: 10px;">

                          <label class="col-md-12" style="font-weight: normal;"><span style="color:#a94442;">*</span> Username</label>

                          <div class="col-md-12">

                            <input type="text" id="EWalletUsername" name="HiyangUsername" value="" placeholder="Username" class="form-control" required="">

                          </div>
                        </div>

                        <div class="col-md-12" style="padding: 0px !important; margin-bottom: 10px;">

                          <label class="col-md-12" style="font-weight: normal;"><span style="color:#a94442;">*</span> Password</label>

                          <div class="col-md-12">

                            <input type="password" id="EWalletUserPassword" name="HiyangUserPassword" value="" placeholder="Password" class="form-control" required="">

                          </div>
                        </div>

                        <div class="col-md-12" style="margin-bottom: 10px;">
                          <span id="spnEWalletBalance" style="font-weight:bold;">E-Wallet Balance : Php 0.00</span>
                        </div>

                        <div class="col-md-12">
                          <button type="button" id="btnVerifyEWallet" class="button" style="width: 180px; background-color: #1c9025; color:#fff;"> Verify E-Wallet </button>
                        </div>

                      </div>

                    </div>

                </div>


                <div id="divPaypal" class="text-center" style="font-weight:normal; display: none;">


                    <div class="col-md-4" style=" padding: 0px !important; padding-right: 10px !important; font-weight:normal; margin-bottom: 10px;">
                      <img src="https://www.palengkeboy.com/public/img/paypal_payments.jpg" alt="Paypal Payment" style="width: 100%; margin-bottom: 10px;">
                    </div>
                    <div class="col-md-8" style=" padding: 0px !important; font-weight:normal;">

                      <div class="col-md-12">
                        <span id="spnPaypalNote" style="font-size: 15px; color:#1c9025;">
                            Note : Please be informed that a Paypal charges worth Php <span id="spnPayPalChargesLabel">0.00</span> will be applied for this transaction.
                        </span>
                      </div>
                    </div>

                </div>

              </div> --}}


