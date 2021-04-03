<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
  <div class="c-sidebar-brand d-lg-down-none">
        <!--<svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
          <use xlink:href="/vendor/coreui/assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
          <use xlink:href="/vendor/coreui/assets/brand/coreui.svg#signet"></use>
        </svg>-->
        <h3>{{env('APP_NAME')}}</h3>
  </div>
  <ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link" href="/dashboard">
        <svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
            </svg> Dashboard
      </a>
    </li>
    
    @can('user-list')
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
            </svg> Users
      </a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('users.index') }}"><svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-right-alt"></use>
            </svg> Manage Users</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('users.create') }}"><svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-right-alt"></use>
            </svg> Add User</a></li>
      </ul>
    </li>
    @endcan
    
    @can('role-list')
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
            </svg> Role
      </a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('roles.index') }}"><svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-right-alt"></use>
            </svg> Manage Role</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('roles.create') }}"><svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-right-alt"></use>
            </svg> Add Role</a></li>
      </ul>
    </li>
    @endcan
    
    @can('project-list')
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-playlist-add"></use>
            </svg> Projects
      </a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('projects.index') }}"><svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-right-alt"></use>
            </svg> Manage Projects</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('projects.create') }}"><svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-right-alt"></use>
            </svg> Add Project</a></li>
      </ul>
    </li>
    @endcan
    
    @can('vendor-list')
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-industry"></use>
            </svg> Vendors
      </a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('vendors.index') }}"><svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-right-alt"></use>
            </svg> Manage Vendors</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('vendors.create') }}"><svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-right-alt"></use>
            </svg> Add Vendor</a></li>
      </ul>
    </li>
    @endcan
    
    @can('customer-list')
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-address-book"></use>
            </svg> Customers
      </a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('customers.index') }}"><svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-right-alt"></use>
            </svg> Manage Customers</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('customers.create') }}"><svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-right-alt"></use>
            </svg> Add Customer</a></li>
      </ul>
    </li>
    @endcan
    
    @can('expense-list')
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-money"></use>
            </svg> Expenses
      </a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('expenses.index') }}"><svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-right-alt"></use>
            </svg> Manage Expenses</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('expenses.create') }}"><svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-right-alt"></use>
            </svg> Add Expense</a></li>
      </ul>
    </li>
    @endcan
    
    @can('payments-received-list')
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-dollar"></use>
            </svg> Payments Received
      </a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('payments_received.index') }}"><svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-right-alt"></use>
            </svg> Manage Payments Received</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('payments_received.create') }}"><svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-right-alt"></use>
            </svg> Add Payments Received</a></li>
      </ul>
    </li>
    @endcan
    
    @can('payment-list')
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-grid"></use>
            </svg> Payments Made
      </a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('payments.index') }}"><svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-right-alt"></use>
            </svg> Manage Payments</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('payments.create') }}"><svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-right-alt"></use>
            </svg> Add Payments</a></li>
      </ul>
    </li>
    @endcan
    
    @can('loan-list')
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-bank"></use>
            </svg> Loans
      </a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('loans.index') }}"><svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-right-alt"></use>
            </svg> Manage Loans</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('loans.create') }}"><svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-right-alt"></use>
            </svg> Add Loans</a></li>
      </ul>
    </li>
    @endcan
    
    @can('loan-repayment-list')
    <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-balance-scale"></use>
            </svg> Loan Repayments
      </a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('loan_repayments.index') }}"><svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-right-alt"></use>
            </svg> Manage Loan Repayments</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('loan_repayments.create') }}"><svg class="c-sidebar-nav-icon">
              <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-right-alt"></use>
            </svg> Add Loan Repayments</a></li>
      </ul>
    </li>
    @endcan
    
  </ul>
  
  <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>