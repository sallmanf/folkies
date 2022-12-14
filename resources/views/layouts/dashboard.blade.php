<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    @stack('prepend-script')
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
        <link href="/style/main.css" rel="stylesheet" />
    <link rel="shortcut icon" href="/images/logo 2.png" />
    @stack('addon-script')
  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!--Side bar-->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <a href="{{route ('home')}}">
              <img src="/images/logo.png" height="100px" class="my-4" />
            </a>
          </div>
          <div class="list-group list-group-flush">
            <a href="{{route ('dashboard')}}" 
            class="list-group-item list-group-item-action {{ (request()-> is('dashboard')) ? 'active' : ''}}"> 
            Dashboard 
            </a>
            <a href="{{route ('dashboard-account')}}" 
            class="list-group-item list-group-item-action {{ (request()-> is('dashboard-account')) ? 'active' : ''}}"> 
            My Account 
            </a>
            <a href="{{ route('logout') }}" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
            class="list-group-item list-group-item-action"> 
            Sign Out 
            </a>
          </div>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>

        <!--Page Content-->
        <div id="page-content-wrapper">
          <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top">
            <div class="container-fluid">
              <button class="btn btn-secondary d-md-none mr-auto mr2" id="menu-toggle">&laquo; Menu</button>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!--Destkop Menu-->
                <ul class="navbar-nav d-none d-lg-flex ml-auto">
                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                      <img src="/images/guest.png" alt="" class="rounded-circle mr-2 profile-picture" />
                      Hi, {{ Auth::user()->name }}
                    </a>
                  <div class="dropdown-menu">
                    <a href="{{route ('home')}}" class="dropdown-item">Home</a>
                    <a href="{{route ('dashboard')}}" class="dropdown-item">Dashboard</a>
                    <a href="{{route ('dashboard-account')}}" class="dropdown-item">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                    class="dropdown-item">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </div>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('cart') }}" class="nav-link d-inline-block mt-2">
                      @php
                      $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                      @endphp
                      @if ($carts > 0)
                      <img src="/images/cart-filled.svg" alt="" />
                      <div class="cart-badge">{{ $carts }}</div>
                      @else
                      <img src="/images/cart-empty.svg" alt="" />
                      @endif
                    </a>
                  </li>
                </ul>

                <!--Mobile Menu-->
                <ul class="navbar-nav d-block d-lg-none">
                  <li class="nav-item">
                    <a href="#" class="nav-link"> Hi, {{ Auth::user()->name }} </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route ('home')}}" class="nav-link">Home</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('cart') }}" class="nav-link d-inline-block"> Cart </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

          <!--Content-->
          @yield('content')

          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    @stack('prepend-script')
    <script src="/vendor/jquery/jquery.slim.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
    @stack('addon-script')
  </body>
</html>
