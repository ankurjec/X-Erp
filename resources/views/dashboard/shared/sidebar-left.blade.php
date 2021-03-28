<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
  <div class="c-sidebar-brand d-lg-down-none">
        <!--<svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
          <use xlink:href="/vendor/coreui/assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
          <use xlink:href="/vendor/coreui/assets/brand/coreui.svg#signet"></use>
        </svg>-->
        <b>{{env('APP_NAME')}}</b>
  </div>
  <ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link" href="/dashboard">
        <svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> Dashboard
      </a>
    </li>
    
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
            </svg> Users
      </a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('users.index') }}"><span class="c-sidebar-nav-icon"></span> Manage Users</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('users.create') }}"><span class="c-sidebar-nav-icon"></span> Add User</a></li>
      </ul>
    </li>
    
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
            </svg> Role
      </a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('roles.index') }}"><span class="c-sidebar-nav-icon"></span> Manage Role</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('roles.create') }}"><span class="c-sidebar-nav-icon"></span> Add Role</a></li>
      </ul>
    </li>
    
  </ul>
  
  <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>