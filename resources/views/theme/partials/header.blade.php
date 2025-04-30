<header id="header">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
            </div>			  					
        </div>
    </div>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="{{ route('theme.index') }}"><img src="{{ asset('assets/img/logo.png') }}" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="{{ route('theme.index') }}">Home</a></li>
                    <li><a href="{{ route('theme.about') }}">About</a></li>
                    <li><a href="{{ route('theme.hotels') }}">Hotels</a></li>				        				          					          		          
                    <li><a href="{{ route('theme.contact') }}">Contact</a></li>
                    <li class="menu-has-children">
                        <a href="#">Account</a>
                        <ul>
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Register</a></li>
                        </ul>
                    </li>
                </ul>
            </nav><!-- #nav-menu-container -->
            
            <!-- Alternative: Login/Register buttons directly in header -->
            <div class="header-btn d-none d-lg-block">
                <a href="#" class="btn header-btn">Login</a>
                <a href="#" class="btn header-btn primary-btn ml-2">Register</a>
            </div>
        </div>
    </div>
</header><!-- #header -->