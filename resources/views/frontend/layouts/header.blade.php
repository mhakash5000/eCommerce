@php
    $count=0;
@endphp
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('public')}}/frontend/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('public')}}/frontend/css/style.css">

    <body>

    <!-- header section start -->
        <header class="header-v4">
            <!-- Header desktop -->
            <div class="container-menu-desktop">
                <!-- Topbar -->
                <div class="top-bar">
                    <div class="content-topbar flex-sb-m h-full container">
                        <div class="left-top-bar">
                            <div class="left-top-bar">
                                <font size="3px" color="#fff">
                                    01782283171 &nbsp;&nbsp;&nbsp;
                                    mhakash5000@gmail.com
                                </font>
                            </div>
                        </div>

                        <div class="right-top-bar flex-w h-full">
                            <ul class="social">
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="wrap-menu-desktop how-shadow1">
                    <nav class="limiter-menu-desktop container">

                        <!-- Logo desktop -->
                        <a href="index.html" class="logo">
                            <img src="{{asset('public/frontend')}}/images/logo/logo.png" alt="IMG-LOGO">
                        </a>

                        <!-- Menu desktop -->
                        <div class="menu-desktop">
                            <ul class="main-menu">
                                <li class="active-menu">
                                    <a href="url{{('/')}}">HOME</a>
                                </li>
                                <li class="active-menu">
                                    <a href="#">SHOPS</a>
                                    <ul class="sub-menu">
                                        <li><a href="">Products</a></li>
                                        <li><a href="">Checkout</a></li>
                                        <li><a href="{{route('shoppingCart')}}">Cart</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{route('aboutUs')}}">ABOUT US</a>
                                </li>
                                <li>
                                    <a href="{{route('contactUs')}}">CONTACT US</a>
                                </li>

                                <li><a href="">LOGIN</a></li>
                            </ul>
                        </div>

                        <!-- Icon header -->
                        <div class="wrap-icon-header flex-w flex-r-m">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- Header Mobile -->
            <div class="wrap-header-mobile">
                <!-- Logo moblie -->
                <div class="logo-mobile">
                    <a href="index.html"><img src="{{asset('public/frontend')}}/images/logo/logo.png" alt="IMG-LOGO"></a>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>

                <!-- Button show menu -->
                <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </div>
            </div>

            <!-- Menu Mobile -->
            <div class="menu-mobile">
                <ul class="topbar-mobile">
                    <li>
                        <div class="left-top-bar">
                            <font size="3px" color="#fff">
                                01782283171 &nbsp;&nbsp;&nbsp;
                                mhakash5000@gmail.com
                            </font>
                        </div>
                    </li>

                    <li>
                        <div class="right-top-bar flex-w h-full">
                            <ul class="social">
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </li>
                </ul>

                <ul class="main-menu-m">
                    <li><a href="url{{('/')}}">Home</a></li>
                    <li>
                        <a href="">SHOPS</a>
                        <ul class="sub-menu-m">
                            <li><a href="">Products</a></li>
                            <li><a href="">Checkout</a></li>
                            <li><a href="{{route('shoppingCart')}}">Cart</a></li>
                        </ul>
                        <span class="arrow-main-menu-m">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </span>
                    </li>
                    <li>
                        <a href="{{route('aboutUs')}} ">ABOUT US</a>
                    </li>
                    <li>
                        <a href="{{route('contactUs')}} ">CONTACT US</a>
                    </li>
                    <li><a href="">LOGIN</a></li>
                </ul>
            </div>

            <!-- Modal Search -->
            <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
                <div class="container-search-header">
                    <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                        <img src="{{asset('public/frontend')}}/images/icons/icon-close2.png" alt="CLOSE">
                    </button>

                    <form class="wrap-search-header flex-w p-l-15">
                        <button class="flex-c-m trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                        <input class="plh3" type="text" name="search" placeholder="Search...">
                    </form>
                </div>
            </div>
        </header>
    <!-- header section end -->

    <!-- Slider Section start -->
    <section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url(public/frontend/images/slider/slider-1.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Dummy text
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Long dummy text
								</h2>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(public/frontend/images/slider/slider-2.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Dummy text2
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Long dummy text2
								</h2>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(public/frontend/images/slider/slider-3.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Dummy text3
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Long dummy text3
								</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- slider section end -->
