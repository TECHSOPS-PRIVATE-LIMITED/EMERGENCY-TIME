<div id="home" class="header-section flex-box-middle half-header section gradiant-background header-curbed">
    <div id="particles-js" class="particles-container"></div>
    <div id="navigation" class="navigation is-transparent" data-spy="affix" data-offset-top="5">
        <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#site-collapse-nav" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="">
                        <img class="logo logo-light" src="{{ asset('admin/assets/images/brand-logos/logo.png') }}" alt="logo" style="height: auto; max-height: 70px;" />
                        <img class="logo logo-color" src="{{ asset('admin/assets/images/brand-logos/logo.png') }}" alt="logo" style="height: auto; max-height: 70px;" />
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse font-secondary" id="site-collapse-nav">
                    <ul class="nav nav-list navbar-nav navbar-right">
                        <li><a class="nav-item" href="#home">Home</a></li>
                        <li><a class="nav-item" href="#about">About</a></li>
                        <li><a class="nav-item" href="#features">Features</a></li>
                        <li><a class="nav-item" href="#pricing">Pricing</a></li>
                        <li><a class="nav-item" href="#testimonial">Testimonial</a></li>
                        <li><a class="nav-item" href="#contacts">Contact Us</a></li>
                        @auth
                            <li>
                                <a class="nav-item" style="padding: 10px; background-color:black; border-radius:5px; color:white;" href="{{ route('login') }}">
                                    {{ __('Register/Login') }}</a>
                            </li>
                        @endauth
                        <li>
                                <a class="nav-item" style="padding: 10px; background-color:black; border-radius:5px; color:white;" href="{{ route('providerregisteration') }}">
                                    {{ __('Apply for Provider') }}</a>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>
    </div><!-- .navigation -->

    <div class="header-content pt-90 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="header-texts">
                        <h1 class="wow fadeInUp" data-wow-duration=".5s">Emergency TIME</h1>
                        <p class="lead wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">Your essential companion for navigating medical emergencies with confidence and efficiency.</p>
                        <ul class="download-buttons">
                            <li><a href="#" class="wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".6s"><img src="{{ asset('site/images/google-play.png') }}" alt="google-play" /></a></li>
                            <li><a href="#" class="wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".9s"><img src="{{ asset('site/images/app-store.png') }}" alt="app-store" /></a></li>
                        </ul>
                    </div>
                </div><!-- .col -->
                <div class="text-center col-md-6">
                    <div class="alt-header-mockup">
                        <img class="mockup-left wow fadeInLeft" data-wow-duration=".5s" data-wow-delay=".9s" src="{{ asset('site/images/login.png') }}" alt="header-screen" />
                        <img class="mockup-middle wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".6s" src="{{ asset('site/images/dash.png') }}" alt="header-screen" />
                        <img class="mockup-right wow fadeInRight" data-wow-duration=".5s" data-wow-delay="1.2s" src="{{ asset('site/images/register.png') }}" alt="header-screen" />
                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .header-content -->
</div>
