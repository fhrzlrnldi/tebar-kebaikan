<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset ('assets/img/logo.png')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Tebar Kebaikan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset ('assets/admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="/show" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          {{-- @if (auth()->user()->hasRole('admin') || (auth()->user()->hasRole('donatur'))) --}}
          <li class="nav-header">MASTER</li>
          <li class="nav-item">
            <a href="{{ route('kategori.index') }}" class="nav-link {{ request()->is('kategori*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-cube"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('galangdana.index') }}" class="nav-link {{ request()->is('galangdana*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-th-large"></i>
              <p>
                Projek
              </p>
            </a>
          </li>


          <li class="nav-header">REFERENSI</li>
          <li class="nav-item">
            <a href="{{ route('daftar-galang-dana') }}" class="nav-link {{ request()->is('daftar-galang-dana*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>Galang Dana</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('daftar-donasi') }}" class="nav-link {{ request()->is('daftar-donasi*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-donate"></i>
              <p>Daftar Donasi</p>
            </a>
          </li>
          {{-- @endif --}}
         
          @if (auth()->user()->role_id == 2)
          <li class="nav-header">INFORMASI</li>
          <li class="nav-item">
            <a href="{{ route('all-user') }}" class="nav-link {{ request()->is('all-user*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('artikel.index') }}" class="nav-link {{ request()->is('artikel*') ? 'active' : ''}}">
              <i class=" nav-icon fas fa-newspaper"></i>
              <p>Artikel</p>
            </a>
          </li>
          @endif

          
          
          

          <li class="nav-header">PENGATURAN</li>

          <li class="nav-item">
            <a href="/show" class="nav-link {{ request()->is('show*') ? 'active' : ''}}">
              <i class=" nav-icon fas fa-user-edit"></i>
              <p>Profil</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
