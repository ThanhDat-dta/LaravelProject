<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-collapse-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand pt-0" href="{{ url('/admin') }}">
        <img src="{{ asset('images/logo.png') }}" class="navbar-brand-img" alt="...">
      </a>
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/dashboard') }}">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/users') }}">
              <i class="ni ni-single-02 text-yellow"></i> Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/settings') }}">
              <i class="ni ni-settings-gear-65 text-red"></i> Settings
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>