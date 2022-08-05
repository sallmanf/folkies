    <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top aos-init aos-animate" data-aos="fade-down">
      <div class="container">
        <a href="{{route ('home') }}" class="navbar-brand">
          <img src="/images/logo.png" height="65px" alt="Logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="{{route ('home') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="{{route ('products') }}" class="nav-link">Product</a>
            </li>
            <li class="nav-item">
              <a href="{{route ('about') }}" class="nav-link">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>