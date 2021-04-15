<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

    {{-- <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" role="button">
          <i class="fas fa-th-large"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
    </ul>
</nav>

<!-- <li class="nav-item menu-open">
  <a href="#" class="nav-link active">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="./index.html" class="nav-link active">
        <i class="far fa-circle nav-icon"></i>
        <p>Dashboard v1</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="./index2.html" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Dashboard v2</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="./index3.html" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Dashboard v3</p>
      </a>
    </li>
  </ul>
</li> -->