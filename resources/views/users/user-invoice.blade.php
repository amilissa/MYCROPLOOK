@extends('layouts.app')

@section('content')
    <div class="container" style="background-color: #f2f2f2;">
        <div class="row">
                <div class="col-12">

                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                          <!-- title row -->
                          <div class="row">
                            <div class="col-12">
                              <h4>
                                <i class="fa fa-globe"></i> CROPLOOK
                                <small class="float-right">Date: 2/10/2018</small>
                              </h4>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- info row -->
                          <div class="row invoice-info">

                            <div class="col-sm-4 invoice-col">
                            @foreach($farmerInfo as $farmer)
                              From
                              <address>
                                <strong>{{$farmer->first_name}} {{$farmer->middle_name}} {{$farmer->last_name}}</strong><br>
                                {{$farmer->name_of_company}}<br>
                                {{$farmer->land_address}}<br>
                                {{$farmer->mobile_no}}<br>

                              </address>
                              @endforeach
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                              To
                              @foreach($orders as $order)
                              <address>
                                <strong>{{$order->orders_buyer_name}}</strong><br>
                                {{$order->orders_address}}<br>
                                {{$order->orders_mobile_no}}<br>
                              </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                              <b>Invoice #007612</b><br>
                              <br>

                              <b>Order ID:</b> {{$order->orders_id}}<br>
                              <b>Date Issued:</b> {{$order->updated_at}}<br>
                              {{-- <b>Account:</b> 968-34567 --}}
                            </div>
                            <!-- /.col -->

                          @endforeach
                          </div>
                          <!-- /.row -->

                          <!-- Table row -->

                          <div class="row">
                            <div class="col-12 table-responsive">
                              <table class="table table-striped">
                                <thead>
                                <tr>
                                  <th>Qty (kg)</th>
                                  <th>Product</th>
                                  <th>Serial #</th>
                                  <th>Description</th>
                                  <th>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->orders_reservation->posts as $post)
                                @if($post['item']['id'] == $postId)
                                <tr>
                                  <td>{{$post['qty']}}</td>
                                  <td>{{$post['item']['crop_name']}}</td>
                                  <td>{{$post['item']['id']}}</td>
                                  <td>{{$post['item']['crop_desc']}}</td>
                                  <td>{{$post['price']}}</td>
                                </tr>
                                </tbody>
                                @endif
                                @endforeach
                              </table>
                            </div>
                            <!-- /.col -->
                          </div>

                          <!-- /.row -->

                          <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                              <p class="lead">Payment Methods:</p>
                              <img src="https://adminlte.io/themes/dev/AdminLTE/dist/img/credit/visa.png" alt="Visa">
                              <img src="https://adminlte.io/themes/dev/AdminLTE/dist/img/credit/mastercard.png" alt="Mastercard">
                              <img src="https://adminlte.io/themes/dev/AdminLTE/dist/img/credit/american-express.png" alt="American Express">
                              <img src="https://adminlte.io/themes/dev/AdminLTE/dist/img/credit/paypal2.png" alt="Paypal">

                              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                                plugg
                                dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                              </p>
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                              <p class="lead">Amount Due 2/22/2014</p>

                              <div class="table-responsive">
                                <table class="table">
                                  <tbody><tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>$250.30</td>
                                  </tr>
                                  <tr>
                                    <th>Tax (9.3%)</th>
                                    <td>$10.34</td>
                                  </tr>
                                  <tr>
                                    <th>Shipping:</th>
                                    <td>$5.80</td>
                                  </tr>
                                  <tr>
                                    <th>Total:</th>
                                    <td>$265.24</td>
                                  </tr>
                                </tbody></table>
                              </div>
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->

                          <!-- this row will not appear when printing -->
                          <div class="row no-print">
                            <div class="col-12">

                              <a href="" @click.prevent="printme" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                              <button type="button" class="btn btn-success float-right">
                                  <i class="fa fa-credit-card"></i>
                                  Submit Payment
                              </button>

                              <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fa fa-download"></i> Generate PDF
                              </button>

                            </div>
                          </div>

                        </div>
                        <!-- /.invoice -->
                      </div>


        </div>
    </div>


@endsection
