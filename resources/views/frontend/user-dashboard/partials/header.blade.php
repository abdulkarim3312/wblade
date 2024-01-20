
{{-- new --}}
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          {{-- <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li> --}}
        </ol>
        {{-- <h6 class="font-weight-bolder mb-0">Dashboard</h6> --}}
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <div class="input-group">
          </div>
        </div>
        <ul class="navbar-nav  justify-content-end">
          <li class="nav-item d-flex align-items-center">
            <a href="{{ route('customer_profile') }}" class="nav-link text-body font-weight-bold px-0">
              <i class="fa fa-user me-sm-1 text-white"></i>
              <span class="d-sm-inline d-none text-white">Profile</span>
            </a>
          </li>
          <li class="nav-item d-flex align-items-center mx-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" class="nav-link head_position text-body font-weight-bold px-0" onclick="event.preventDefault();
                this.closest('form').submit();">
                    <i class="fa fa-sign-out text-white"></i>
                    <span class="d-sm-inline d-none text-white">Sign Out</span>
                </a>
            </form>
          </li>
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>