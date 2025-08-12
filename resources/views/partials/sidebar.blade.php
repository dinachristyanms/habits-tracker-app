<!-- Sidebar Start -->
<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <nav class="sidebar-nav scroll-sidebar">
    <ul id="sidebarnav" class="list-unstyled">
      
      <li class="nav-small-cap">
        <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
        <span class="hide-menu">Home</span>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link" href="{{ url('/') }}" aria-expanded="false">
          <i class="ti ti-atom"></i>
          <span class="hide-menu">Dashboard</span>
        </a>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link justify-content-between" href="{{ url('/habits') }}" aria-expanded="false">
          <div class="d-flex align-items-center gap-3">
            <span class="d-flex"><i class="ti ti-map"></i></span>
            <span class="hide-menu">Habits</span>
          </div>
        </a>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link justify-content-between" href="{{ url('/kalender') }}">
          <div class="d-flex align-items-center gap-3">
            <span class="d-flex"><i class="ti ti-aperture"></i></span>
            <span class="hide-menu">Calender</span>
          </div>
        </a>
      </li>


      <!-- Front Pages dengan toggle collapse Bootstrap 5 -->
      <li class="sidebar-item">
        <a class="sidebar-link justify-content-between has-arrow" 
           href="#frontPages" 
           data-bs-toggle="collapse" 
           aria-expanded="false" 
           aria-controls="frontPages">
          <div class="d-flex align-items-center gap-3">
            <span class="d-flex"><i class="ti ti-layout-grid"></i></span>
            <span class="hide-menu">Front Pages</span>
          </div>
        </a>
        <ul id="frontPages" class="collapse first-level list-unstyled" data-bs-parent="#sidebarnav">
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between" href="#">
              <div class="d-flex align-items-center gap-3">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Homepage</span>
              </div>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between" href="#">
              <div class="d-flex align-items-center gap-3">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">About Us</span>
              </div>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between" href="#">
              <div class="d-flex align-items-center gap-3">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Blog</span>
              </div>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between" href="#">
              <div class="d-flex align-items-center gap-3">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Blog Details</span>
              </div>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between" href="#">
              <div class="d-flex align-items-center gap-3">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Contact Us</span>
              </div>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between" href="#">
              <div class="d-flex align-items-center gap-3">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Portfolio</span>
              </div>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between" href="#">
              <div class="d-flex align-items-center gap-3">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Pricing</span>
              </div>
            </a>
          </li>
        </ul>
      </li>

      <li>
        <span class="sidebar-divider lg"></span>
      </li>

      <li class="nav-small-cap">
        <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
        <span class="hide-menu">Apps</span>
      </li>

      <li class="sidebar-item">
        <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
          <div class="d-flex align-items-center gap-3">
            <span class="d-flex"><i class="ti ti-basket"></i></span>
            <span class="hide-menu">Ecommerce</span>
          </div>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
          <!-- Isi submenu Ecommerce -->
          <li class="sidebar-item">
            <a class="sidebar-link justify-content-between" href="#">
              <div class="d-flex align-items-center gap-3">
                <div class="round-16 d-flex align-items-center justify-content-center"><i class="ti ti-circle"></i></div>
                <span class="hide-menu">Shop</span>
              </div>
            </a>
          </li>
          <!-- dst... -->
        </ul>
      </li>

    </ul>
  </nav>
  <!-- End Sidebar navigation -->
</aside>
<!-- Sidebar End -->

<!-- Pastikan di bawah ini ada import Bootstrap JS untuk enable collapse -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
