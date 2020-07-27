<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom:2rem; padding-left:8rem;">
        <a class="navbar-brand" href="{{ url('/') }}">
            CROPLOOK
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <?php $folderName = '' ?>


        <div class="navbar-nav" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

            <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $folderName ?>/explore-farms">EXPLORE FARMS</a>
                          </li>
                        <li class="nav-item">
                          <a class="nav-link" href="<?php echo $folderName ?>/explore-products" style="margin-right:20rem">EXPLORE PRODUCTS</a>
                        </li>
            </ul>


            <!-- Right Side Of Navbar -->

                <!-- Authentication Links -->
                <ul class="navbar-nav mr-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                @can('isBuyer')
                <a class="nav-link"  href="{{route('reservation.reservationCart')}}">
                <span class="badge bg-light text-black-50">
                    {{Session::has('reservation') ? Session::get('reservation')->totalQty : ''}}
                   </span><i class="fa fa-shopping-basket" aria-hidden="true"></i>
                My Reservations<span class="caret"></span>
                </a>
                @endcan
                <a class="nav-link"  href="{{route('user.chat')}}">
                    <i class="fa fa-commenting-o" aria-hidden="true"></i>
                    Messages
                    </a>
                <ul class="nav-item dropdown  navbar-left">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fa fa-user-o" aria-hidden="true"></i> {{ Auth::user()->name }}
                    <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    @can('isFarmer')
                    <li><a class="dropdown-item" href="/dashboard" >Dashboard</a> </li>
                    @endcan
                    @can('isAdmin')
                    <li><a class="dropdown-item" href="/admin" >Admin Panel</a> </li>
                    @endcan
                    <li><a class="dropdown-item" href="{{ route('myaccount') }}"  >My Account</a> </li>
                    @can('isBuyer')
                    <li><a class="dropdown-item" href="{{ route('myorders') }}"  >My Orders</a> </li>
                    @endcan
                    <hr>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>

                    </ul>

                        {{-- <li class="nav-item dropdown  navbar-left">
                            <a class="nav-link dropdown-toggle"  href="{{route('reservation.reservationCart')}}"
                            data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="badge bg-light text-black-50">
                                {{Session::has('reservation') ? Session::get('reservation')->totalQty : ''}}
                               </span><i class="fa fa-shopping-basket" aria-hidden="true"></i>
                            Reservations<span class="caret"></span>
                            </a> --}}
{{--
                        @if(Session::has('reservation'))
                            <ul class="dropdown-menu dropdown-cart" role="menu">
                                @foreach($posts as $post)
                                <li>
                                    <span class="item">
                                      <span class="item-left">
                                        <img src="/storage/uploads/cropImage/{{$post['item']['crop_image']}}" style="width: 50px; height: 50px;" />
                                          <span class="item-info">
                                            <strong>{{ $post['item']['crop_name']}}</strong>
                                            <strong>{{ $post['price'] }}</strong>
                                          </span>
                                        </span>
                                        <span class="item-right">
                                                {{--  --}}
                                                {{-- {{ route('reservation.removeItem', ['id' => $post['item']['id']])}} --}}
                                                {{-- <a href="{{ route('reservation.reduceByOne', ['id' => $post['item']['id']])}}" class="btn btn-xs btn-danger pull-right">-</a>--}}
                                            {{-- <a href="" class="btn btn-xs btn-danger pull-right">x</a>
                                        </span>
                                        </span>
                                </li>
                                @endforeach
                                        <li class="divider"></li>
                                        {{-- <li><strong>Total: {{ $totalPrice }}</strong></li> --}}
                                    {{-- <li><a class="text-center" href="">View Cart</a></li>
                            </ul>
                            @else
                        <ul class="dropdown-menu dropdown-cart" role="menu">
                            <li><span>No Reservations!</span></li>
                        </ul>
                            @endif --}}
                            @endguest

            </ul>
        </div>
</nav>
