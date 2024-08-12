@extends('frontend.layouts.porto')

@section('title', 'About')
@section('main')
<main class="main about">
    <div class="page-header page-header-bg text-left"
        style="background-image: url(assets/images/demoes/demo18/page-header-bg.jpg); background-color: #111">
        <div class="container-fluid">
            <h1 class="text-white"><span>History</span>About Us</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->

    <div class="about-section bg-gray">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <img src="assets/images/demoes/demo18/about.jpg" alt="About">
                </div><!-- End .col-lg-6 -->

                <div class="col-lg-6 padding-left-lg">
                    <h2 class="subtitle">WHO WE ARE</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been the industry’s standard dummy text ever since the 1500s, when an unknown
                        printer toofa k a galley of type and scrambled it to make a type specimen book. It has
                        survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged. It was popularised in the 1960s with the release of
                        Letraset sheets containing Lorem Ipsum passages</p>

                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        <li>Nulla id nisi a nulla rhoncus sodales et ac lectus.</li>
                        <li>In sagittis diam et lorem egestas, ac sodales dolor venenatis.</li>
                    </ul>
                </div><!-- End .col-lg-6 -->
            </div><!-- End .row -->

            <hr>

            <div class="row">
                <div class="col-md-4">
                    <h2 class="subtitle mb-2">OUR MISSION</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a Finibus Bonorum et Malorum,</p>
                </div><!-- End .col-md-4 -->

                <div class="col-md-4">
                    <h2 class="subtitle mb-2">OUR VISION</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a Finibus Bonorum et Malorum,</p>
                </div><!-- End .col-md-4 -->

                <div class="col-md-4">
                    <h2 class="subtitle mb-2">OUR VALUE</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make a Finibus Bonorum et Malorum,</p>
                </div><!-- End .col-md-4 -->
            </div><!-- End .row -->
        </div><!-- End .container-fluid -->
    </div><!-- End .about-section -->

    <div class="counters-section"
        style="background-image: url(assets/images/demoes/demo18/bg-counters.jpg); background-color: #111;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 col-md-4 count-container text-center">
                    <div class="count-wrapper">
                        <span class="count-to" data-from="0" data-to="32561" data-speed="2000"
                            data-refresh-interval="50">32561</span><span>M+</span>
                    </div><!-- End .count-wrapper -->
                    <h4 class="count-title">Sold Products</h4>
                </div><!-- End .col-md-4 -->

                <div class="col-6 col-md-4 count-container text-center">
                    <div class="count-wrapper">
                        <span class="count-to" data-from="0" data-to="42561" data-speed="2000"
                            data-refresh-interval="50">42561</span><span>M+</span>
                    </div><!-- End .count-wrapper -->
                    <h4 class="count-title">Happy Buyers</h4>
                </div><!-- End .col-md-4 -->

                <div class="col-6 col-md-4 count-container text-center">
                    <div class="count-wrapper">
                        <span class="count-to" data-from="0" data-to="866" data-speed="2000"
                            data-refresh-interval="50">866</span><span>M+</span>
                    </div><!-- End .count-wrapper -->
                    <h4 class="count-title">Employees</h4>
                </div><!-- End .col-md-4 -->

                <div class="col-6 col-md-4 count-container text-center">
                    <div class="count-wrapper">
                        <span class="count-to" data-from="0" data-to="58584" data-speed="2000"
                            data-refresh-interval="50">58584</span>+
                    </div><!-- End .count-wrapper -->
                    <h4 class="count-title">Products</h4>
                </div><!-- End .col-md-4 -->

                <div class="col-6 col-md-4 count-container text-center">
                    <div class="count-wrapper">
                        <span class="count-to" data-from="0" data-to="24" data-speed="2000"
                            data-refresh-interval="50">24</span><span>HR+</span>
                    </div><!-- End .count-wrapper -->
                    <h4 class="count-title">Support Available</h4>
                </div><!-- End .col-md-4 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .counters-section -->

    <div class="testimonials-section">
        <div class="container-fluid">
            <h2 class="subtitle text-center">BUYERS REVIEW</h2>

            <div class="testimonials-slider owl-carousel owl-theme" data-togggle="owl" data-owl-options="{
                    'dots': false,
                    'nav': true
                }">
                <div class="testimonial">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make.</p>

                    <h4>Client Name</h4>
                </div><!-- End .testimonial -->

                <div class="testimonial">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy text ever since the 1500s, when an unknown
                        printer took a galley of type and scrambled it to make.</p>

                    <h4>Client Name</h4>
                </div><!-- End .testimonial -->
            </div><!-- End .testimonials-slider -->
        </div><!-- End .container -->
    </div><!-- End .testimonials-section -->

    <div class="info-boxes-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="info-box">
                        <i class="icon-support"></i>

                        <div class="info-box-content">
                            <h4>ONLINE SUPPORT</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                        </div><!-- End .info-box-content -->
                    </div><!-- End .info-box -->
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="info-box">
                        <i class="icon-shipping"></i>

                        <div class="info-box-content">
                            <h4>FREE SHIPPING & RETURN</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                        </div><!-- End .info-box-content -->
                    </div><!-- End .info-box -->
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="info-box">
                        <i class="icon-money"></i>

                        <div class="info-box-content">
                            <h4>MONEY BACK GUARANTEE</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                        </div><!-- End .info-box-content -->
                    </div><!-- End .info-box -->
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="info-box">
                        <div class="info-box">
                        <i class="icon-cat-shirt"></i>

                        <div class="info-box-content">
                            <h4>NEW STYLES EVERY DAY</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                        </div><!-- End .info-box-content -->
                    </div><!-- End .info-box -->
                </div>
            </div><!-- End .row -->
        </div><!-- End .container-fluid -->
    </div><!-- End .info-boxes-container -->
</main><!-- End .main -->

    
@endsection