<!-- Sidebar -->
<nav id="sidebar">
<!-- Sidebar Content -->
<div class="sidebar-content">
  <!-- Side Header -->
  <div class="content-header justify-content-lg-center">
    <!-- Logo -->
    <div>
      <span class="smini-visible fw-bold tracking-wide fs-lg">
        c<span class="text-primary">b</span>
      </span>
      <a class="link-fx fw-bold tracking-wide mx-auto" href="/admin">
        <span class="smini-hidden">
          <span class="fs-4 text-primary">JC </span><span class="fs-4 text-danger">Hardware</span>
        </span>
      </a>
    </div>
    <!-- END Logo -->

    <!-- Options -->
    <div>
      <!-- Close Sidebar, Visible only on mobile screens -->
      <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
      <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout" data-action="sidebar_close">
        <i class="fa fa-fw fa-times"></i>
      </button>
      <!-- END Close Sidebar -->
    </div>
    <!-- END Options -->
  </div>
  <!-- END Side Header -->

  <!-- Sidebar Scrolling -->
  <div class="js-sidebar-scroll">
    <!-- Side User -->
    <div class="content-side content-side-user px-0 py-0">
      <!-- Visible only in mini mode -->
      <div class="smini-visible-block animated fadeIn px-3">
        <img class="img-avatar img-avatar32" src="/backend/assets/media/avatars/avatar15.jpg" alt="">
      </div>
      <!-- END Visible only in mini mode -->

      <!-- Visible only in normal mode -->
      <div class="smini-hidden text-center mx-auto">
        <a class="img-link" href="be_pages_generic_profile.html">
          <img class="img-avatar" src="/backend/assets/media/avatars/avatar15.jpg" alt="">
        </a>
        <ul class="list-inline mt-3 mb-0">
          <li class="list-inline-item">
            <a class="link-fx text-dual fs-sm fw-semibold text-uppercase">{{Auth::user()->name}}</a>
          </li>
          <li class="list-inline-item">
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="link-fx text-dual" data-toggle="layout" data-action="dark_mode_toggle" href="javascript:void(0)">
              <i class="fa fa-burn"></i>
            </a>
          </li>
        </ul>
      </div>
      <!-- END Visible only in normal mode -->
    </div>
    <!-- END Side User -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
      <ul class="nav-main">
        <li class="nav-main-item">
          <a class="nav-main-link" href="/admin">
            <i class="nav-main-link-icon fa fa-house-user"></i>
            <span class="nav-main-link-name">Dashboard</span>
          </a>
        </li>
        <li class="nav-main-heading">Main Module</li>

        <li class="nav-main-item">
          <a class="nav-main-link" href="{{route('slider.index')}}">
            <i class="nav-main-link-icon fa fa-sliders"></i>
            <span class="nav-main-link-name">Slider</span>
          </a>
        </li>
        <li class="nav-main-item">
          <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
            <i class="nav-main-link-icon fa fa-users"></i>
            <span class="nav-main-link-name">Customer</span>
          </a>
          <ul class="nav-main-submenu">
            <li class="nav-main-item">
              <a class="nav-main-link" href="{{route('customer.create')}}">
                <span class="nav-main-link-name">Add Customer</span>
              </a>
            </li>

            <li class="nav-main-item">
              <a class="nav-main-link" href="{{route('customer.index')}}">
                <span class="nav-main-link-name">Customer List</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-main-item">
          <a class="nav-main-link" href="{{route('category.index')}}">
            <i class="nav-main-link-icon fa fa-list-ol"></i>
            <span class="nav-main-link-name">Category</span>
          </a>
        </li>
        <li class="nav-main-item">
          <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
            <i class="nav-main-link-icon fab fa-opencart"></i>
            <span class="nav-main-link-name">Product</span>
          </a>
          <ul class="nav-main-submenu">
            <li class="nav-main-item">
              <a class="nav-main-link" href="{{route('product.create')}}">
                <span class="nav-main-link-name">Add Product</span>
              </a>
            </li>

            <li class="nav-main-item">
              <a class="nav-main-link" href="{{route('product.index')}}">
                <span class="nav-main-link-name">Product List</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-main-item">
          <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
            <i class="nav-main-link-icon fa fa-store"></i>
            <span class="nav-main-link-name">Product Stock</span>
          </a>
          <ul class="nav-main-submenu">
            <li class="nav-main-item">
              <a class="nav-main-link" href="{{route('stock.create')}}">
                <span class="nav-main-link-name">Add Stock</span>
              </a>
            </li>

            <li class="nav-main-item">
              <a class="nav-main-link" href="{{route('stock.index')}}">
                <span class="nav-main-link-name">Stock List</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-main-item">
          <a class="nav-main-link" href="{{route('order.index')}}">
            <i class="nav-main-link-icon fa fa-shopping-cart"></i>
            <span class="nav-main-link-name">Customer Order</span>
          </a>
        </li>
        <li class="nav-main-item">
          <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
            <i class="nav-main-link-icon fab fa-opencart"></i>
            <span class="nav-main-link-name">Admin Create Order</span>
          </a>
          <ul class="nav-main-submenu">
            <li class="nav-main-item">
              <a class="nav-main-link" href="{{route('product.create')}}">
                <span class="nav-main-link-name">Create Order</span>
              </a>
            </li>

            <li class="nav-main-item">
              <a class="nav-main-link" href="{{route('order.admin.index')}}">
                <span class="nav-main-link-name">Create Order List</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-main-item">
          <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
            <i class="nav-main-link-icon fa fa-file"></i>
            <span class="nav-main-link-name">Report</span>
          </a>
          <ul class="nav-main-submenu">
            <li class="nav-main-item">
              <a class="nav-main-link" href="{{route('report.stock')}}">
                <span class="nav-main-link-name">Product Stock</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-main-item">
          <a class="nav-main-link" href="{{route('message.index')}}">
            <i class="nav-main-link-icon fa fa-envelope"></i>
            <span class="nav-main-link-name">User Message</span>
          </a>
        </li>
        <li class="nav-main-item">
          <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
            <i class="nav-main-link-icon fa fa-cogs"></i>
            <span class="nav-main-link-name">Site Setting</span>
          </a>
          <ul class="nav-main-submenu">
            <li class="nav-main-item">
              <a class="nav-main-link" href="{{route('setting.index')}}">
                <span class="nav-main-link-name">Information Setting</span>
              </a>
            </li>

            <li class="nav-main-item">
              <a class="nav-main-link" href="{{route('banner.index')}}">
                <span class="nav-main-link-name">Promotional Banner</span>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </div>
    <!-- END Side Navigation -->
  </div>
  <!-- END Sidebar Scrolling -->
</div>
<!-- Sidebar Content -->
</nav>
<!-- END Sidebar -->