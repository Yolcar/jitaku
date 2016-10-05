<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand main-title" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <p class="navbar-text sub-title">El autentico sabor Peruano</p>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('cart-show') }}"><i class="fa fa-shopping-cart fa-2x"></i></a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user fa-2x"></i> @if (!Auth::guest()) {{ Auth::user()->name . ' ' . Auth::user()->last_name }} @endif <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                      <li>
                          <a href="{{ url('/logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                    @endif
                  </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
