@php
    $prefix=Request::route()->getPrefix();
    $route=Route::current()->getName();
@endphp
{{-- @dd($prefix); --}}

  <!-- Main Sidebar Container start -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('home')}}" class="brand-link">
      <img src="{{asset('public')}}/backend/dist/img/logo.png" alt="logo.png" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('public')}}/backend/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->role}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if(Auth::user()->role=='Admin')
        <li class="nav-item has-treeview {{($prefix=='/users')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.all')}}" class="nav-link {{($route=='users.all')?'active':''}} ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User List</p>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item has-treeview {{($prefix=='/profile')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Profile Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profile.user')}}" class="nav-link {{($route=='profile.user')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Profile</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('change.password')}}" class="nav-link {{($route=='change.password')?'active':''}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User Password Change</p>
                  </a>
                </li>
              </ul>
        </li>


        <li class="nav-item has-treeview {{($prefix=='/logos')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Logo Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('logos.view')}} " class="nav-link {{($route=='logos.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logo</p>
                </a>
              </li>


            </ul>
        </li>
        <li class="nav-item has-treeview {{($prefix=='/sliders')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Slider Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('sliders.view')}} " class="nav-link {{($route=='sliders.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Slider</p>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item has-treeview {{($prefix=='/contacts')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Contact Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('contacts.view')}} " class="nav-link {{($route=='contacts.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact</p>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item has-treeview {{($prefix=='/about')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                About US Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('about.view')}} " class="nav-link {{($route=='about.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Us</p>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item has-treeview {{($prefix=='/email')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Email Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user-email.view')}} " class="nav-link {{($route=='user-email.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Email</p>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item has-treeview {{($prefix=='/category')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Category Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.view')}} " class="nav-link {{($route=='category.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Category</p>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item has-treeview {{($prefix=='/brand')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Brand Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('brand.view')}} " class="nav-link {{($route=='brand.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Brand</p>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item has-treeview {{($prefix=='/color')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Color Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('color.view')}} " class="nav-link {{($route=='color.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Color</p>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item has-treeview {{($prefix=='/size')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Size Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('size.view')}} " class="nav-link {{($route=='size.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Size</p>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item has-treeview {{($prefix=='/product')?'menu-open':''}} ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Product Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('product.view')}} " class="nav-link {{($route=='product.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Product</p>
                </a>
              </li>
            </ul>
        </li>

        <div class="text-center mt-3">
            <a href="{{url('/')}}" class="btn btn-success">Go Website</a>
        </div>

        @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 <!-- Main Sidebar Container end -->
