
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo18.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Oct 2023 15:15:52 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Bootstrap eCommerce Template">
    <meta name="author" content="SW-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/images/icons/favicon.png')}}">
    

    <style>
        .pagination{
            justify-content: center !important;
        }
    </style>

    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700,800', 'Poppins:200,300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = '{{asset('assets/js/webfont.js')}}';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('assets/css/demo18.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}">
</head>

<body>
    <div class="page-wrapper">
        <header class="header header-transparent">
            <div class="header-middle sticky-header">
                <div class="container-fluid">
                    <div class="header-left">
                        <button class="mobile-menu-toggler text-white mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <a href="{{route('home.index')}}" class="logo">
                            <img src="{{asset('assets/images/demoes/demo18/logo.png')}}" alt="Porto Logo">
                        </a>
                    </div>
                    <!-- End .header-left -->

                    <div class="header-center justify-content-between">
                        <nav class="main-nav w-100">
                            <ul class="menu">
                                <li class="active">
                                    <a href="{{route('home.index')}}">Home</a>
                                </li>
                                <li class="d-none d-xl-block">
                                    <a href="#">Pages</a>
                                    <ul>
                                        <li><a href="{{route('cart.index')}}">Shopping Cart</a></li>
                                        <li><a href="{{route('checkout.index')}}">Checkout</a></li>
                                        <li><a href="{{route('about.index')}}">About Us</a></li>
                                        <li><a href="{{route('blog.index')}}">Blog</a></li>
                                        <li><a href="{{route('contact.index')}}">Contact Us</a></li>
                                        <li><a href="{{route('login.index')}}">Login</a></li>
                                        <li><a href="{{route('auth.admin')}}">Login Admin</a></li>
                                        <li><a href="forgot-password.html">Forgot Password</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{route('shop.index')}}">Shop</a></li>
                                <li><a href="{{route('blog.index')}}">Blog</a></li>
                                <li class="d-none d-xxl-block"><a href="#">Special Offer!</a></li>
                      
                            </ul>
                        </nav>
                    </div>

                    <div class="header-right justify-content-end">
                        <div class="header-dropdowns">
                            <div class="header-dropdown ">
                                <a href="#">USD</a>
                                <div class="header-menu">
                                    <ul>
                                        <li><a href="#">USD</a></li>
                                        <li><a href="#">EUR</a></li>
                                    </ul>
                                </div>
                                <!-- End .header-menu -->
                            </div>
                            <!-- End .header-dropown -->

                            <div class="header-dropdown">
                                <a href="#">ENG</a>
                                <div class="header-menu">
                                    <ul>
                                        <li><a href="#">ENG</a>
                                        </li>
                                        <li><a href="#">FRA</a></li>
                                    </ul>
                                </div>
                                <!-- End .header-menu -->
                            </div>
                            <!-- End .header-dropown -->

                            <div class="header-dropdown">
                                <a href="#">LINKS</a>
                                <div class="header-menu">
                                    <ul>
                                        <li><a href="{{route('about.index')}}">ABOUT US</a>
                                        </li>
                                        <li><a href="{{route('contact.index')}}">CONTACT US</a></li>
                                    </ul>
                                </div>
                                <!-- End .header-menu -->
                            </div>
                            <!-- End .header-dropown -->
                        </div>
                        <!-- End .header-dropdowns -->

                        @if (Auth::check()) 
                        
                        {{Auth::user()->name}}| 
                        <a href="{{route('auth.logout')}}" class="header-icon" title="logout">Logout</a>
                    
                    @else 
                        <a href="{{route('login.index')}}" class="header-icon" title="login">Login</a>  
                        <a href="{{route('register.index')}}" class="header-icon" title="login">Register</a>
                    
                    @endif

                        
                        <a href="wishlist.html" class="header-icon" title="Wishlist"><i class="icon-wishlist-2"><span
                                    class="badge-circle">2</span></i></a>

                        <div class="header-icon header-search header-search-popup header-search-category text-right">
                            <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                                    <div class="select-custom">
                                        <select id="cat" name="cat">
                                            <option value="">All Categories</option>
                                            <option value="4">Fashion</option>
                                            <option value="12">- Women</option>
                                            <option value="13">- Men</option>
                                            <option value="66">- Jewellery</option>
                                            <option value="67">- Kids Fashion</option>
                                            <option value="5">Electronics</option>
                                            <option value="21">- Smart TVs</option>
                                            <option value="22">- Cameras</option>
                                            <option value="63">- Games</option>
                                            <option value="7">Home &amp; Garden</option>
                                            <option value="11">Motors</option>
                                            <option value="31">- Cars and Trucks</option>
                                            <option value="32">- Motorcycles &amp; Powersports</option>
                                            <option value="33">- Parts &amp; Accessories</option>
                                            <option value="34">- Boats</option>
                                            <option value="57">- Auto Tools &amp; Supplies</option>
                                        </select>
                                    </div>
                                    <!-- End .select-custom -->
                                    <button class="btn icon-magnifier p-0" title="search" type="submit"></button>
                                </div>
                                <!-- End .header-search-wrapper -->
                            </form>
                        </div>
                        <!-- End .header-search -->

                        <div class="dropdown cart-dropdown">
                            <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="minicart-icon"></i>
                                <span class="cart-count badge-circle">3</span>
                            </a>

                            <div class="cart-overlay"></div>

                            <div class="dropdown-menu mobile-cart">
                                <a href="#" title="Close (Esc)" class="btn-close">×</a>

                                <div class="dropdownmenu-wrapper custom-scrollbar">
                                    <div class="dropdown-cart-header">Shopping Cart</div>
                                    <!-- End .dropdown-cart-header -->

                                    <div class="dropdown-cart-products">
                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="{{route('product-detail.index')}}">Ultimate 3D Bluetooth Speaker</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">1</span> × $99.00
                                                </span>
                                            </div>
                                            <!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="{{route('product-detail.index')}}" class="product-image">
                                                    <img src="{{asset('assets/images/products/product-1.jpg')}}" alt="product" width="80" height="80">
                                                </a>

                                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                            </figure>
                                        </div>
                                        <!-- End .product -->

                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="{{route('product-detail.index')}}">Brown Women Casual HandBag</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">1</span> × $35.00
                                                </span>
                                            </div>
                                            <!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="{{route('product-detail.index')}}" class="product-image">
                                                    <img src="{{asset('assets/images/products/product-2.jpg')}}" alt="product" width="80" height="80">
                                                </a>

                                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                            </figure>
                                        </div>
                                        <!-- End .product -->

                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title">
                                                    <a href="{{route('product-detail.index')}}">Circled Ultimate 3D Speaker</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">1</span> × $35.00
                                                </span>
                                            </div>
                                            <!-- End .product-details -->

                                            <figure class="product-image-container">
                                                <a href="{{route('product-detail.index')}}" class="product-image">
                                                    <img src="{{asset('assets/images/products/product-3.jpg')}}" alt="product" width="80" height="80">
                                                </a>
                                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                            </figure>
                                        </div>
                                        <!-- End .product -->
                                    </div>
                                    <!-- End .cart-product -->

                                    <div class="dropdown-cart-total">
                                        <span>SUBTOTAL:</span>

                                        <span class="cart-total-price float-right">$134.00</span>
                                    </div>
                                    <!-- End .dropdown-cart-total -->

                                    <div class="dropdown-cart-action">
                                        <a href="{{route('cart.index')}}" class="btn btn-gray btn-block view-cart">View
                                            Cart</a>
                                        <a href="{{route('checkout.index')}}" class="btn btn-dark btn-block">Checkout</a>
                                    </div>
                                    <!-- End .dropdown-cart-total -->
                                </div>
                                <!-- End .dropdownmenu-wrapper -->
                            </div>
                            <!-- End .dropdown-menu -->
                        </div>
                        <!-- End .dropdown -->
                    </div>
                    <!-- End .header-right -->
                </div>
                <!-- End .container-fluid -->
            </div>
            <!-- End .header-middle -->
        </header>
        <!-- End .header -->


@yield('main')


        <footer class="footer font2">
            <div class="container-fluid">
                <div class="footer-top top-border d-flex align-items-center justify-content-between flex-wrap">
                    <div class="footer-left widget-newsletter d-md-flex align-items-center">
                        <div class="widget-newsletter-info">
                            <h5 class="widget-newsletter-title text-white text-uppercase ls-0 mb-0">subscribe newsletter
                            </h5>
                            <p class="widget-newsletter-content mb-0">Get all the latest information on Events, Sales and Offers.</p>
                        </div>
                        @if (Auth::check())
                        <?php 
                        $sub = \App\Models\Subscriber::where('email', Auth::user()->email)->get()
                         ?>
                        @if(count($sub) > 0)
                            <form action="{{ route('user.unsubscriber')}}" method="POST">
                                @csrf
                                <div class="footer-submit-wrapper d-flex">
                                    <input type="hidden" class="form-control" value="{{$sub[0]->id}}" name="id" >
                                    <button type="submit" class="btn btn-danger btn-sm">Huỷ</button>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('user.subscriber')}}" method="POST">
                                @csrf
                                <div class="footer-submit-wrapper d-flex">
                                    <input type="hidden" class="form-control" value="{{Auth::user()->email}}" name="email" placeholder="Email address..." size="40" >
                                    <button type="submit" class="btn btn-danger btn-sm">Subscribe</button>
                                </div>
                            </form>
                        @endif
                    @endif
    
                    </div>
                    <div class="footer-right">
                        <div class="social-icons">
                            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"></a>
                            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"></a>
                            <a href="#" class="social-icon social-instagram icon-instagram" target="_blank"></a>
                        </div>
                        <!-- End .social-icons -->
                    </div>
                </div>
                <div class="footer-middle">
                    <div class="row">
                        <div class="col-lg-3">
                            <a href="{{route('home.index')}}">
                                <img src="{{asset('assets/images/demoes/demo18/logo.png')}}" alt="Logo" class="logo">
                            </a>

                            <p class="footer-desc">Lorem ipsum dolor sit amet, consectetur adipis.</p>

                            <div class="ls-0 footer-question">
                                <h6 class="mb-0 text-white">QUESTIONS?</h6>
                                <h3 class="mb-3 text-white"><a href="tel:1-888-123-456">1-888-123-456</a></h3>
                            </div>
                        </div>
                        <!-- End .col-lg-3 -->

                        <div class="col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Account</h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="links">
                                            <li><a href="{{route('about.index')}}">About us</a></li>
                                            <li><a href="{{route('contact.index')}}">Contact us</a></li>
                                            <li><a href="{{route('login.index')}}">My Account</a></li>
                                            <li><a href="#">Payment Methods</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="links">
                                            <li><a href="#">Order history</a></li>
                                            <li><a href="#">Advanced search</a></li>
                                            <li><a href="{{route('login.index')}}">Login</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->

                        <div class="col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">About</h4>

                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="links">
                                            <li><a href="{{route('about.index')}}">About Porto</a></li>
                                            <li><a href="#">Our Guarantees</a></li>
                                            <li><a href="#">Terms And Conditions</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="links">
                                            <li><a href="#">Return Policy</a></li>
                                            <li><a href="#">Intellectual Property Claims</a></li>
                                            <li><a href="#">Site Map</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->

                        <div class="col-lg-3">
                            <div class="widget text-lg-right">
                                <h4 class="widget-title">Features</h4>

                                <ul class="links">
                                    <li><a href="#">Powerful Admin Panel</a></li>
                                    <li><a href="#">Mobile &amp; Retina Optimized</a></li>
                                    <li><a href="#">Super Fast HTML Template</a></li>
                                </ul>
                            </div>
                            <!-- End .widget -->
                        </div>
                        <!-- End .col-lg-3 -->
                    </div>
                    <!-- End .row -->
                </div>
                <div class="footer-bottom">
                    <p class="footer-copyright text-lg-center mb-0">&copy; Porto eCommerce. 2021. All Rights Reserved
                    </p>
                </div>
                <!-- End .footer-bottom -->
            </div>
            <!-- End .container-fluid -->
        </footer>
        <!-- End .footer -->
    </div>
    <!-- End .page-wrapper -->

    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div class="mobile-menu-overlay"></div>
    <!-- End .mobil-menu-overlay -->

    <div class="header-center justify-content-between">
        <nav class="main-nav w-100">
            <ul class="menu">
                <li class="active">
                    <a href="{{route('home.index')}}">Home</a>
                </li>
                <li class="d-none d-xl-block">
                    <a href="#">Pages</a>
                    <ul>
                        <li><a href="{{route('shop.index')}}">Shopping Cart</a></li>
                        <li><a href="{{route('checkout.index')}}">Checkout</a></li>
                        <li><a href="">Dashboard</a></li>
                        <li><a href="{{route('about.index')}}">About Us</a></li>
                        <li><a href="{{route('blog.index')}}">Blog</a>
                        </li>
                        <li><a href="{{route('contact.index')}}">Contact Us</a></li>
                        <li><a href="{{route('login.index')}}">Login</a></li>
                        <li><a href="{{route('auth.admin')}}">Login Admin</a></li>
                        <li><a href="forgot-password.html">Forgot Password</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('shop.index')}}">Shop</a>
              
                </li>
          
                <li><a href="{{route('blog.index')}}">Blog</a></li>
                <li class="d-none d-xxl-block"><a href="#">Special Offer!</a></li>
                <li><a href="https://1.envato.market/DdLk5" target="_blank">Buy Porto!</a></li>
            </ul>
        </nav>
    </div>
    <!-- End .mobile-menu-container -->

    <div class="sticky-navbar">
        <div class="sticky-info">
            <a href="{{route('home.index')}}">
                <i class="icon-home"></i>Home
            </a>
        </div>
        <div class="sticky-info">
            <a href="{{route('shop.index')}}" class="">
                <i class="icon-bars"></i>Categories
            </a>
        </div>
        <div class="sticky-info">
            <a href="wishlist.html" class="">
                <i class="icon-wishlist-2"></i>Wishlist
            </a>
        </div>
        <div class="sticky-info">
            <a href="{{route('login.index')}}" class="">
                <i class="icon-user-2"></i>Account
            </a>
        </div>
        <div class="sticky-info">
            <a href="{{route('cart.index')}}" class="">
                <i class="icon-shopping-cart position-relative">
                    <span class="cart-count badge-circle">3</span>
                </i>Cart
            </a>
        </div>
    </div>

    <!-- End .newsletter-popup -->

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.appear.min.js')}}"></script>
    <script src="{{asset ('assets/js/filterProduct.js')}}"></script>
    <script>
        $(document).ready(function() {
            let elOlw = $('.test')
            elOlw.each(function(key, element) {
                $('#thumbnail_'+ key).on('click', function() {
                    $imageUrl = $(this).find ("img").attr("src");
                    $('.product-item').find('img').attr('src', $imageUrl)
                })
            });
        })
    </script>
    <!-- Main JS File -->
    <script src="{{asset('assets/js/main.min.js')}}"></script>
<script>(function(){var js = "window['__CF$cv$params']={r:'816905095e42b442',t:'MTY5NzM4Mjk1MC4xOTEwMDA='};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='../../cdn-cgi/challenge-platform/h/g/scripts/jsd/dffb14d6/main.js',document.getElementsByTagName('head')[0].appendChild(_cpo);";var _0xh = document.createElement('iframe');_0xh.height = 1;_0xh.width = 1;_0xh.style.position = 'absolute';_0xh.style.top = 0;_0xh.style.left = 0;_0xh.style.border = 'none';_0xh.style.visibility = 'hidden';document.body.appendChild(_0xh);function handler() {var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;if (_0xi) {var _0xj = _0xi.createElement('script');_0xj.innerHTML = js;_0xi.getElementsByTagName('head')[0].appendChild(_0xj);}}if (document.readyState !== 'loading') {handler();} else if (window.addEventListener) {document.addEventListener('DOMContentLoaded', handler);} else {var prev = document.onreadystatechange || function () {};document.onreadystatechange = function (e) {prev(e);if (document.readyState !== 'loading') {document.onreadystatechange = prev;handler();}};}})();</script></body>


<!-- Mirrored from portotheme.com/html/porto_ecommerce/demo18.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 15 Oct 2023 15:16:29 GMT -->
</html>