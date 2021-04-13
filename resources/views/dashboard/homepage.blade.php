@extends('layouts.admin-master')

@section('breadcrumb')
<div class="c-subheader px-3">
          <!-- Breadcrumb-->
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
            <!-- Breadcrumb Menu-->
          </ol>
</div>
@endsection

@section('content')

          <div class="container-fluid">
            <div class="fade-in">
              <div class="row">
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-gradient-primary">
                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                      <div>
                        <div class="text-value-lg">Rs. {{$total_expense}}</div>
                        <div>Total Expense</div>
                      </div>
                      <div class="btn-group">
                        <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <svg class="c-icon">
                            <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                          </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="/expenses">Manage Expenses</a></div>
                      </div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                      <canvas class="chart" id="card-chart1" height="70"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-gradient-info">
                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                      <div>
                        <div class="text-value-lg">Rs. {{$total_payments_received}}</div>
                        <div>Payments Received</div>
                      </div>
                      <div class="btn-group">
                        <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <svg class="c-icon">
                            <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                          </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="/payments_received">Manage Payments Received</a></div>
                      </div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                      <canvas class="chart" id="card-chart2" height="70"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-gradient-warning">
                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                      <div>
                        <div class="text-value-lg">{{$total_vendors}}</div>
                        <div>Vendors</div>
                      </div>
                      <div class="btn-group">
                        <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <svg class="c-icon">
                            <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                          </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="/vendors">Manage Vendors</a></div>
                      </div>
                    </div>
                    <div class="c-chart-wrapper mt-3" style="height:70px;">
                      <canvas class="chart" id="card-chart3" height="70"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-white bg-gradient-danger">
                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                      <div>
                        <div class="text-value-lg">{{$total_customers}}</div>
                        <div>Customers</div>
                      </div>
                      <div class="btn-group">
                        <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <svg class="c-icon">
                            <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                          </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="/customers">Manage Customers</a></div>
                      </div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                      <canvas class="chart" id="card-chart4" height="70"></canvas>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
              </div>
              <!-- /.row-->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <div>
                      <h4 class="card-title mb-0">Income and Expense</h4>
                      <!--<div class="small text-muted">September 2019</div>-->
                    </div>
                    <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">
                      <div class="btn-group btn-group-toggle mx-3" data-toggle="buttons">
                        <label class="btn btn-outline-secondary">
                          <input id="option1" type="radio" name="options" autocomplete="off"> Day
                        </label>
                        <label class="btn btn-outline-secondary active">
                          <input id="option2" type="radio" name="options" autocomplete="off" checked=""> Month
                        </label>
                        <label class="btn btn-outline-secondary">
                          <input id="option3" type="radio" name="options" autocomplete="off"> Year
                        </label>
                      </div>
                      <button class="btn btn-primary" type="button">
                        <svg class="c-icon">
                          <use xlink:href="/vendor/coreui/vendors/@coreui/icons/svg/free.svg#cil-cloud-download"></use>
                        </svg>
                      </button>
                    </div>
                  </div>
                  <div class="c-chart-wrapper" style="height:300px;margin-top:40px;">
                    <canvas class="chart" id="main-chart" height="300"></canvas>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row text-center">
                    <!--<div class="col-sm-12 col-md mb-sm-2 mb-0">
                      <div class="text-muted">Visits</div><strong>29.703 Users (40%)</strong>
                      <div class="progress progress-xs mt-2">
                        <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md mb-sm-2 mb-0">
                      <div class="text-muted">Unique</div><strong>24.093 Users (20%)</strong>
                      <div class="progress progress-xs mt-2">
                        <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md mb-sm-2 mb-0">
                      <div class="text-muted">Pageviews</div><strong>78.706 Views (60%)</strong>
                      <div class="progress progress-xs mt-2">
                        <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md mb-sm-2 mb-0">
                      <div class="text-muted">New Users</div><strong>22.123 Users (80%)</strong>
                      <div class="progress progress-xs mt-2">
                        <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>-->
                    <div class="col-sm-12 col-md mb-sm-2 mb-0">
                      <div class="text-muted">Profit & Loss (Available)</div><strong>Rs. {{$profit_loss}}</strong>
                      <!--<div class="progress progress-xs mt-2">
                        <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>-->
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-->
              
              <!-- /.row-->
            </div>
          </div>
                
@endsection

@section('script')
  @parent
<script src="/vendor/coreui/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
<script type="text/javascript">
console.log(@json($payments_received_array));
  var mainChart = new Chart(document.getElementById('main-chart'), {
  type: 'line',
  data: {
    labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
    datasets: [{
      label: 'Expense',
      backgroundColor: coreui.Utils.hexToRgba(coreui.Utils.getStyle('--info'), 10),
      borderColor: coreui.Utils.getStyle('--info'),
      pointHoverBackgroundColor: '#fff',
      borderWidth: 2,
      data: @json($expense_array)
    }, {
      label: 'Payments Received',
      backgroundColor: 'transparent',
      borderColor: coreui.Utils.getStyle('--success'),
      pointHoverBackgroundColor: '#fff',
      borderWidth: 2,
      data: @json($payments_received_array)
    }, {
      label: 'Loans',
      backgroundColor: 'transparent',
      borderColor: coreui.Utils.getStyle('--danger'),
      pointHoverBackgroundColor: '#fff',
      borderWidth: 2,
     /* borderDash: [8, 5],*/
      data: @json($loans_array)
    }]
  },
  options: {
    maintainAspectRatio: false,
    legend: {
      display: true
    },
    scales: {
      xAxes: [{
        gridLines: {
          drawOnChartArea: false
        },
        offset:true
      }],
      yAxes: [{
        ticks: {
          beginAtZero: true
          /*,
          maxTicksLimit: 5,
          stepSize: Math.ceil(250 / 5),
          max: 250*/
        }
      }]
    },
    elements: {
      point: {
        radius: 2,
        hitRadius: 10,
        hoverRadius: 4,
        hoverBorderWidth: 3
      }
    }
  }
});
</script>
@endsection
