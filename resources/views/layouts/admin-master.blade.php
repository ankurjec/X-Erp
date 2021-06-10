<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Rahul Baruah">
    <meta name="keyword" content="">
    <title>X-Erp</title>
    <link rel="apple-touch-icon" sizes="57x57" href="/vendor/coreui/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/vendor/coreui/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/vendor/coreui/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/vendor/coreui/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/vendor/coreui/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/vendor/coreui/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/vendor/coreui/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/vendor/coreui/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/vendor/coreui/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/vendor/coreui/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/vendor/coreui/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/vendor/coreui/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/vendor/coreui/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="/vendor/coreui/assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/vendor/coreui/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Main styles for this application-->
    <link href="/vendor/coreui/css/style.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <!--<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','UA-118965717-3');gtag('config','UA-118965717-5');</script>-->
    <link href="/vendor/coreui/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/vendor/jquery-confirm/jquery-confirm.min.css?v=3.3.4') }}">
    <style type="text/css">
      .c-main {
        padding-top: 10px;
      }
      div.dataTables_wrapper div.dataTables_length select {
        width: 50px!important;
      }
      
      .table100 { background-color: #fff;}
      table { width: 100%;}
      th, td { font-weight: unset; padding-right: 10px;}
      .column1 { width: 33%; padding-left: 40px;}
      .column2 { width: 13%;}
      .column3 { width: 22%;}
      .column4 { width: 19%;}
      .column5 { width: 13%;}
      .table100-head th { padding-top: 18px; padding-bottom: 18px;}
      .table100-body td { padding-top: 16px; padding-bottom: 16px;}
      /*==================================================================[ Fix header ]*/
      .table100 { position: relative; /*padding-top: 60px;*/}
      .table100-head { position: absolute; width: 100%; top: 0; left: 0;}
      .table100-body { max-height: 585px; overflow: auto;}
      /*==================================================================[ Ver1 ]*/
      .table100.ver1 th { font-family: Lato-Bold; font-size: 18px; color: #fff; line-height: 1.4; background-color: #607d8b;}
      .table100.ver1 td { font-family: Lato-Regular; font-size: 15px; color: #808080; line-height: 1.4;}
      .table100.ver1 .table100-body tr:nth-child(even) { background-color: #f8f6ff;}
      /*---------------------------------------------*/
      .table100.ver1 { overflow: hidden; box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15); -moz-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15); -webkit-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15); -o-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15); -ms-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);}
      .table100.ver1 .ps__rail-y { right: 5px;}
      .table100.ver1 .ps__rail-y::before { background-color: #ebebeb;}
      .table100.ver1 .ps__rail-y .ps__thumb-y::before { background-color: #cccccc;}
      .img-responsive{margin-left: auto;margin-right: auto;}
      .table100.ver1 .table {margin-bottom:0}
      
      .c-show>.c-sidebar-nav-dropdown-toggle {
        background: #321fdb;
      }
      .c-sidebar-nav-dropdown-items {
        background: #90a4ae;
      }
    </style>
    @section('style')
    @show
  </head>
  <body class="c-app">
    
    @include('dashboard.shared.sidebar-left')
    
    <div class="c-wrapper c-fixed-components">
      
      @include('dashboard.shared.header')
      
      <div class="c-body">
        <main class="c-main">
          @include('dashboard.shared.alert')
          
          @yield('content')
          
        </main>
        
        @include('dashboard.shared.footer')
        
      </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="/vendor/coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="/vendor/coreui/vendors/@coreui/utils/js/coreui-utils.js"></script>
    <!--[if IE]><!-->
    <script src="/vendor/coreui/vendors/@coreui/icons/js/svgxuse.min.js"></script>
    <!--<![endif]-->
    <!-- Plugins and scripts required by this view-->
    <!--<script src="/vendor/coreui/vendors/@coreui/chartjs/js/coreui-chartjs.bundle.js"></script>
    <script src="/vendor/coreui/js/main.js"></script>-->
    <!-- jQuery -->
  <script src="/vendor/plugins/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="{{ asset('/vendor/jquery-confirm/jquery-confirm.min.js?v=3.3.4') }}"></script>
  <script defer src="/vendor/fontawesome5/js/all.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".delForm button[type=submit], .delForm input[type=submit]").on('click', function(e){
          var $this = $(this).closest('.delForm');
          e.preventDefault();
          $.confirm({
  			    title: 'Confirm!',
  			    content: 'Confirm Deletion?',
  			    buttons: {
  			    	confirm: {
  			            text: 'Delete',
  			            btnClass: 'btn-danger',
  			            action: function(){
  			                $this.submit();
  			                return true;
  			            }
  			        },
  			        cancel: function() {
  					    }
  			    }
  			});
  			return false;
      });
    });
  </script>
  @section('script')
  @show
    
  </body>
</html>