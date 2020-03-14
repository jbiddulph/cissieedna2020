@extends('layouts.app')

@section('content')
    <!-- Header -->
    <header>
        <div class="container" id="maincontent" tabindex="-1">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" width="350" src="http://www.cissieedna.com/img/profile.png" alt="">
                    <div class="intro-text">
                        <h1 class="name">{{$settings[0]->site_name}}</h1>
                        <hr class="star-light">
                        <span class="skills">{{$settings[0]->site_description}}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Portfolio</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal{{$product->id}}" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        @php
                            $mainphoto = str_replace('public/', '/storage/', $product->product_image)
                        @endphp
                        <img src="{{ asset($mainphoto) }}" class="img-responsive" alt="{{$product->title}}">
                    </a>
                </div>
                @endforeach
            </div>
            <div class="row">
                {{ $products->links() }}
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>{{$settings[0]->about_title}}</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <p>{{$settings[0]->about_description}}</p>
                </div>
                <!--<div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="#" class="btn btn-lg btn-outline">
                        <i class="fa fa-pagelines"></i> Find out more
                    </a>
                </div>-->
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contact Me</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="message">Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>{{$settings[0]->footerleft_title}}</h3>
                        <p>{{$settings[0]->footerleft_desc}}</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="{{$settings[0]->facebook}}" class="btn-social btn-outline"><span class="sr-only">Facebook</span><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="{{$settings[0]->twitter}}" class="btn-social btn-outline"><span class="sr-only">Twitter</span><i class="fab fa-twitter"></i></a>
                            </li>


                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>{{$settings[0]->footerright_title}}</h3>
                        <p>{{$settings[0]->footerright_desc}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; cissieedna.com 2019
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
    @foreach($products as $product)
    <div class="portfolio-modal modal fade" id="portfolioModal{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>{{$product->title}}</h2>
                            <hr class="star-primary">
                            @php
                                $mainphoto = str_replace('public/', '/storage/', $product->product_image)
                            @endphp
                            <img src="{{ asset($mainphoto) }}" class="img-responsive  img-centered" alt="{{$product->title}}">
                            <p>{{$product->description}}</p>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
<style>
    a.portfolio-link img
    {
        height: 260px;
        text-align: center;
        margin: auto;
        margin-bottom: 20px;
    }
    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
        background-color: #c40023;
        border-color: #c40023;
    }


</style>
