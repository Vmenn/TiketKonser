





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tunggal Konser</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/imgs/theme/favicon.svg') }}" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />


    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css?v=5.3') }}" />

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

  <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
    <!-- Header  -->
<header class="header-area header-style-1 header-height-2">


    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="index.html"><img src="{{ asset('frontend/assets/imgs/theme/logo.svg') }}"
                            alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li>
                                    <a class="active" href="{{ url('home') }}">Home </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>


                <div class="hotline d-none d-lg-flex">
                    <div class="header-action-icon-2">
                        @auth
                            <a href="{{route('dashboard')}}"><span class="lable ml-0">Order Tiket</span></a>
                            <a href="{{route('user.logout')}}"><span class="text-danger">Logout</span></a>
                            
                        @else
                            <a href="{{ route('login') }}"><span class="lable ml-0">Login</span></a>

                            <span class="lable" style="margin-left: 2px; margin-right: 2px;"> | </span>


                            <a href="{{ route('register') }}"><span class="lable ml-0">Register</span></a>

                        @endauth




                    </div>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="shop-wishlist.html">
                                <img alt="Nest"
                                    src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="#">
                                <img alt="Nest"
                                    src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                <span class="pro-count white">2</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="shop-product-right.html"><img alt="Nest"
                                                    src="{{ asset('frontend/assets/imgs/shop/thumbnail-3.jpg') }}" /></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>$800.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="shop-product-right.html"><img alt="Nest"
                                                    src="{{ asset('frontend/assets/imgs/shop/thumbnail-4.jpg') }}" /></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>
                                            <h3><span>1 × </span>$3500.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>$383.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="shop-cart.html">View cart</a>
                                        <a href="shop-checkout.html">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- End Header  -->
<main class="page-wrapper">
    <!-- Page Title-->
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <section class="col-lg-8">
                <!-- Steps-->
                <!-- Autor info-->
                <div
                    class="d-sm-flex justify-content-between align-items-center bg-white p-4 rounded-3 mb-grid-gutter">
                    <div class="d-flex align-items-center">

                        <div class="ps-3">
                            <h5 class="fs-base mb-0">
                                @if (Auth::user() === null)
                                @else
                                    {{ Auth::user()->name }}
                                @endif

                            </h5><span class="text-danger fs-sm">
                                @if (Auth::user() === null)
                                @else
                                    {{ Auth::user()->email }}
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Shipping address-->
                <h2 class="h6 pt-1 pb-3 mb-3 border-bottom">Shipping address</h2>

                <form action="{{route('tiket.order')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $tiket->id }}">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-fn">First Name</label>
                                <input class="form-control" type="text" name="first_name" placeholder="">
                
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-ln">Last Name</label>
                                <input class="form-control" type="text" name="last_name" placeholder=""
                                    value="{{ old('last_name') }}">
                                @error('last_name')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-email">E-mail Address</label>
                                <input class="form-control" type="email" id="checkout-email" name="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-phone">Phone Number</label>
                                <input class="form-control" type="text" id="checkout-phone" name="phone"
                                    value="{{ old('phone') }}">
                                @error('phone')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-company">City</label>
                                <input class="form-control" type="text" id="checkout-company" name="city"
                                    value="{{ old('city') }}">
                                @error('city')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-zip">No Ktp</label>
                                <input class="form-control" type="number" id="checkout-zip" name="no_ktp"
                                    value="{{ old('no_ktp') }}">
                                @error('no_ktp')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="form-label" for="checkout-address-1">Address</label>
                                <input class="form-control" type="text" id="checkout-address-1" name="address"
                                    value="{{ old('address') }}">
                                @error('address')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-none d-lg-flex pt-4 mt-3">
                        <div class="w-50 pe-3"><a class="btn btn-secondary d-block w-100"
                                href="{{route('home')}}"><i class="ci-arrow-left mt-sm-0 me-1"></i><span
                                    class="d-none d-sm-inline">Back to
                                    Home</span><span class="d-inline d-sm-none">Back</span></a></div>

                        <button type="submit" class="btn btn-primary d-block w-100"><span
                                class="d-none d-sm-inline">Checkout</span><span class="d-inline d-sm-none">Next</span><i
                                class="ci-arrow-right mt-sm-0 ms-1"></i> </button>
                    </div>
                </form>

                <!-- Navigation (desktop)-->

            </section>
            <!-- Sidebar-->
            <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
                <div class="bg-white rounded-3 shadow-lg p-4 ms-lg-auto">
                    <div class="py-2 px-xl-2">
                        <div class="widget mb-3">
                            <h4 class="widget-title text-center">Order summary</h4>
                            <div class="d-flex align-items-center pb-2 border-bottom"><a class="d-block flex-shrink-0"
                                    href="shop-single-v1.html"><img src="{{asset('Upload/tiket/'.$tiket->image)}}" width="64"
                                        alt="Product"></a>
                                <div class="ps-2">
                                    <h6 class="widget-product-title"><a href="shop-single-v1.html">{{$tiket->name}}</a></h6>
                                    
                                    <div class="widget-product-meta"><span
                                            class="text-accent me-2">Rp {{number_format($tiket->price)}}</span>
                                            
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</main>

</body>
</html>