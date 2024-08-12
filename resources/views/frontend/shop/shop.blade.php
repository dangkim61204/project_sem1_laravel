@extends('frontend.layouts.porto')
@section('title', 'Shop')
@section('main')
<main class="main bg-gray">
    <div class="category-banner-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner mb-2 mb-lg-0" style="background-color: #fff;">
                        <figure>
                            <img src="{{asset('assets/images/demoes/demo18/banners/banner1.jpg')}}" alt="banner" width="873"
                                height="151">
                        </figure>
                        <div
                            class="banner-layer banner-layer-middle d-flex align-items-center justify-content-between">
                            <div class="content-left">
                                <h4 class="mb-0">Summer Sale</h4>
                                <h5 class="text-uppercase mb-0">20% off</h5>
                            </div>
                            <a href="demo18-shop.html" class="btn btn-dark">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner" style="background-color: #111;">
                        <figure>
                            <img src="{{asset('assets/images/demoes/demo18/banners/banner2.jpg')}}" alt="banner" width="873"
                                height="151">
                        </figure>
                        <div
                            class="banner-layer banner-layer-middle d-flex align-items-center justify-content-between">
                            <div class="content-left">
                                <h4 class="text-white mb-0">Flash Sale</h4>
                                <h5 class="text-uppercase text-white mb-0">30% off</h5>
                            </div>
                            <a href="demo18-shop.html" class="btn btn-light">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="demo18.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </div>
    </nav>
    <div class="container-fluid bg-gray">
        <div class="row">
            <div class="col-lg-9 main-content shop-content">
                <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                    <div class="toolbox-left">
                        <a href="#" class="sidebar-toggle">
                            <svg data-name="Layer 3" id="Layer_3"
                                viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                <path
                                    d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                    class="cls-2"></path>
                                <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                <path
                                    d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                    class="cls-2"></path>
                            </svg>
                            <span>Filter</span>
                        </a>
                        <form action="" method="get">
                            <div class="toolbox-item toolbox-sort">
                                <label>Sort By:</label>
                                <input type="text" name="search" value="{{ request('search') ?: old('search')}}" placeholder="tìm kiếm">
                                <button type="submit">Tìm kiếm</button>
                            </div>
                        </form>
                    </div>
                    <!-- End .toolbox-left -->
                    <div class="toolbox-right">
                        <div class="toolbox-item layout-modes">
                            <a href="demo18-shop.html" class="layout-btn btn-grid active" title="Grid">
                            <i class="icon-mode-grid"></i>
                            </a>
                            <a href="category-list.html" class="layout-btn btn-list" title="List">
                            <i class="icon-mode-list"></i>
                            </a>
                        </div>
                        <!-- End .layout-modes -->
                    </div>
                    <!-- End .toolbox-right -->
                </nav>
                <div class="row product-ajax-grid mb-2">
                    @if( count($search) > 0)
                    @foreach ($search as $item)
                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product-default inner-quickview inner-icon">
                            <figure>
                                <a href="{{route('product-detail.index',[ 'productId' => $item->id ])}}">
                                <img src="{{ asset($item->image) }}"  width="205"
                                    height="205')}}" alt="product">
                                </a>
                                <div class="btn-icon-group">
                                    <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                        class="icon-shopping-cart"></i></a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-wrap">
                                    <div class="category-list">
                                        <a href="demo18-shop.html" class="product-category">category: <b>{{$item->catalogues->name}}</b></a>
                                    </div>
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                        class="icon-heart"></i></a>
                                </div>
                                <h3 class="product-title">
                                    <a href="{{route('product-detail.index',[ 'productId' => $item->id ])}}">{{$item->name}}</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <span class="product-price"><b>$</b> {{number_format($item->price)}}</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    </div>
                    <!-- End .col-lg-3 -->
                    @endforeach
                    @endif
                </div>
                <div class="link">
                    {{$search->links()}}  
                </div>
            </div>
            <!-- End .col-lg-9 -->
            <div class="sidebar-overlay"></div>
            <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                <div class="sidebar-wrapper">
                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true"
                                aria-controls="widget-body-2">Danh Mục</a>
                        </h3>
                        <div class="collapse show" id="widget-body-2">
                            <div class="widget-body">
                                <ul class="cat-list">
                                    @foreach ($category as $item)
                                    <li><a href="{{'/frontend/shop?catalogues='.$item->id}}" >{{$item->name}}<span class="products-count">({{count($item->products)}})</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- End .widget-body -->
                        </div>
                        <!-- End .collapse -->
                    </div>
                    <!-- End .widget -->
                    
                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true"
                                aria-controls="widget-body-3">Price</a>
                        </h3>
                        <div class="collapse show" id="widget-body-3">
                            <div class="widget-body pb-0">
                                    <div class="price-slider-wrapper">
                                        <div id="price-slider"></div>
                                    </div>

                                    <div class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
                                        <div class="filter-price-text">
                                            Price:
                                            <span id="filter-price-range"></span> <!--để lấy giá trị-->
                                        </div>
                                        <button type="button" class="btn btn-primary" id="filterPrice">Filter</button> 
                                    </div>
                                <form action="{{ route('shop.index') }}" method="GET" id="submitForm">
                                    @csrf
                                    <input name="rangePrice" type="hidden" value="" id="valueFilter">
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="widget widget-featured">
                        <h3 class="widget-title">Featured</h3>

                        <div class="widget-body">
                            <div class="">
                                <div class="featured-col">
                                    @foreach ($search as $key =>  $item)
                                    @if($key < 3)
                                    <div class="product-default left-details product-widget">
                                        <figure>
                                            <a href="{{route('product-detail.index',[ 'productId' => $item->id ])}}">
                                                <img src="{{asset ($item->image)}}" width="75" height="75" alt="product" />
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h3 class="product-title"> <a href="product.html">{{$item->name}}</a> </h3>
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:100%"></span>
                                                    <!-- End .ratings -->
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <!-- End .product-ratings -->
                                            </div>
                                            <!-- End .product-container -->
                                            <div class="price-box">
                                                <span class="product-price">${{$item->price}}</span>
                                            </div>
                                            <!-- End .price-box -->
                                        </div>
                                        <!-- End .product-details -->
                                    </div>
                                    @endif
                                    @endforeach
                                   
                                </div>
                            </div>
                        </div>
                        <!-- End .widget-body -->
                    </div>
                    <!-- End .widget -->

                    <div class="widget widget-block">
                        <h3 class="widget-title">Custom HTML Block</h3>
                        <h5>This is a custom sub-title.</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non placerat mi. Etiam non tellus </p>
                    </div>

                </div>
                <!-- End .sidebar-wrapper -->
            </aside>
            <!-- End .col-lg-3 -->
        </div>
        <!-- End .row -->
    </div>
    <!-- End .container-fluid -->
</main>
<!-- End .main -->

@endsection
<script src="{{asset ('assets/js/nouislider.min.js')}}"></script>
