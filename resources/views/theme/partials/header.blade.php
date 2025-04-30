<style>
	/* Button Styles */
.header-btn {
    display: flex;
    gap: 10px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 30px;
    font-size: 1rem;
    font-weight: 500;
    transition: all 0.3s;
    border: 2px solid #a68a56;
    cursor: pointer;
}

.header-btn .btn {
    color: #a68a56;
    background: transparent;
}

.header-btn .btn:hover {
    background: #a68a56;
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(166, 138, 86, 0.3);
}

.header-btn .primary-btn {
    background: #a68a56;
    color: #fff;
}

.header-btn .primary-btn:hover {
    background: #8c7346;
    border-color: #8c7346;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(140, 115, 70, 0.4);
}

.ml-2 {
    margin-left: 7px;
}
</style>

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
                    
                    <!-- Account Dropdown for Login/Register or Logout -->
                    @if(Auth::check())
                        <!-- If user is logged in, show Logout option -->
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <!-- If user is not logged in, show Login/Register -->
                        <li class="menu-has-children">
                            <a href="#">Account</a>
                            <ul>
							<a href="{{ route('login') }}" class="btn header-btn">Login</a>
							<a href="{{ route('register') }}" class="btn header-btn primary-btn ml-2">Register</a>
                            </ul>
                        </li>
                    @endif
                </ul>
            </nav><!-- #nav-menu-container -->
            
            <!-- Alternative: Login/Register buttons directly in header -->
            <div class="header-btn d-none d-lg-block">
                @if(Auth::check())
                    <!-- Display logout button if user is logged in -->
                    <a href="{{ route('logout') }}" class="btn header-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                @else
                    <!-- Display Login/Register buttons if user is not logged in -->
                    <a href="{{ route('login') }}" class="btn header-btn">Login</a>
                    <a href="{{ route('register') }}" class="btn header-btn primary-btn ml-2">Register</a>
                @endif
            </div>
        </div>
    </div>
</header><!-- #header -->
