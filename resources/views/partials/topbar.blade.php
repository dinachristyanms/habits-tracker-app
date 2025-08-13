<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
  data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

  <!--  Main wrapper -->
  <div class="body-wrapper">
    <!--  Header Start -->
    <header class="app-header shadow-sm">
      <nav class="navbar navbar-expand-lg navbar-light px-3">
        <ul class="navbar-nav">
          <!-- Sidebar toggle (mobile view) -->
          <li class="nav-item d-block d-xl-none">
            <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
              <i class="ti ti-menu-2 fs-5"></i>
            </a>
          </li>

          <!-- Notification bell -->
          <li class="nav-item dropdown">
            <a class="nav-link position-relative" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
              aria-expanded="false">
              <i class="ti ti-bell fs-5"></i>
              <span class="position-absolute top-0 start-100 translate-middle p-1 bg-primary border border-light rounded-circle"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
              <div class="message-body">
                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center gap-2">
                  <i class="ti ti-message"></i> Notifikasi 1
                </a>
                <a href="javascript:void(0)" class="dropdown-item d-flex align-items-center gap-2">
                  <i class="ti ti-message"></i> Notifikasi 2
                </a>
              </div>
            </div>
          </li>
        </ul>

        <!-- Profile Section -->
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
          <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
            <li class="nav-item dropdown">
              <a class="nav-link d-flex align-items-center gap-2" href="javascript:void(0)" id="drop2"
                data-bs-toggle="dropdown" aria-expanded="false">
                <span class="d-none d-sm-inline fw-semibold">Hello, {{ Auth::user()->name ?? 'Guest' }}</span>
                <i class="ti ti-chevron-down"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                <div class="message-body">
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-user fs-5 text-primary"></i>
                    <span>My Profile</span>
                  </a>
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-mail fs-5 text-success"></i>
                    <span>My Account</span>
                  </a>
                  <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                    <i class="ti ti-list-check fs-5 text-warning"></i>
                    <span>My Task</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <form action="{{ route('logout') }}" method="POST" class="m-0">
                      @csrf
                      <button type="submit" 
                          class="d-flex align-items-center gap-2 dropdown-item text-danger fw-semibold" 
                          style="border: none; background: none;">
                          <i class="ti ti-logout fs-5"></i> Logout
                      </button>
                  </form>                
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!--  Header End -->
