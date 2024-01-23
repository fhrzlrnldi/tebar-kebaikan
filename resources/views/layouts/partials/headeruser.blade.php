 <!-- ======= Header ======= -->
 <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="/" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>TebarKebaikan<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="/#about">Tentang Kami</a></li>
          <li><a href="/blog">Artikel</a></li>
          <li><a href="/donasi">Donasi</a></li>

          @auth
          <li class="dropdown"><a href="#"><span>{{ auth()->user()->name }}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>

              <li><a style="color:#2b2b2b" href="{{ auth()->user()->role_id=='2'?'/dashboard':'/profiluser' }}">Profile</a></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button style="border: none; background-color:transparent; padding-left: 20px; font-weight:600; color:#2b2b2b" type="submit">Log out</button>
                </form>
              </li>

            </ul>
          </li>
          @else
          <li class="dropdown"><a href="#"><span>Masuk</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="/login">Sign in</a></li>
              <li><a href="/register">Sign Up</a></li>
            </ul>
          </li>

          @endauth

        </ul>
      </nav>
      <!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->
