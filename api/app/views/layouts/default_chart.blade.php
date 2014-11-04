<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>SimApi - A EnergyPlus RestFul API</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')  }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')  }} " rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/bootstrap/css/bootstrap.min.css')  }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/uniform/css/uniform.default.css')  }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')  }}" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="{{ URL::asset('assets/global/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/plugins/nouislider/jquery.nouislider.css') }}" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="{{ URL::asset('assets/admin/pages/css/tasks.css') }}" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="{{ URL::asset('assets/global/css/components.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/admin/layout/css/layout.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('assets/admin/layout/css/themes/default.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
<link href="{{ URL::asset('assets/admin/layout/css/custom.css') }}" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content">

<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
  <!-- BEGIN HEADER INNER -->
  <div class="page-header-inner">
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
    
    <!-- END RESPONSIVE MENU TOGGLER -->
    <!-- BEGIN LOGO -->
    <div class="page-logo">
      <a class="navbar-brand font-red" href="{{ URL::route('home') }}"><i class="fa fa fa-fire fa-lg fa-2x"></i>&nbsp;SIMAPI</a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN TOP NAVIGATION MENU -->
    <div class="top-menu">
      <ul class="nav navbar-nav pull-right">
        <li><a href="{{URL::route('document')}}" class="font-red">API Documentation</a></li>
        <li><a href="http://docs.simulapi.apiary.io/" class="font-red">API Blueprint</a></li>
        <!-- BEGIN NOTIFICATION DROPDOWN -->
        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
          <span>
           <i class="fa fa-user fa-2x"></i>
         </span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <ul class="dropdown-menu-list scroller" style="height: 250px;">

                  @if(Auth::check())
                  <li><a href="{{URL::route('accounts-logout')}}">Sign out</a></li>
                  <li><a href="{{URL::route('accounts-change-password')}}">Change Password</a></li>
                  @else
                  <li><a href="{{URL::route('accounts-login')}}">Sign in</a></li>
                  <li><a href="{{URL::route('accounts-create')}}">Sign up</a></li>
                  <li><a href="{{URL::route('accounts-forgot')}}">Forgot password</a></li>
                  @endif
            </ul>
          </li>
        </ul>
        </ul>

    </div>
  </div>
</div>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
  <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
      <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
        <li class="sidebar-toggler-wrapper">
          <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
          <div class="sidebar-toggler"></div>
          <!-- END SIDEBAR TOGGLER BUTTON -->
        </li>
        <li class="active">
          <a href="javascript:;">
          <i class="icon-home"></i>
          <span class="title">Home</span>
          <span class="arrow "></span>
          </a>

           @if(Auth::check())
          <ul class="sub-menu">
            <li>
              <a href="{{ URL::route('form-create-instance') }}">
              <i class="icon-bar-chart"></i>
              <span class="title">Create Instance</span></a>
            </li>
            <li>
              <a href="{{ URL::route('begin-instance-form') }}">
              <i class="icon-bulb"></i>
              <span class="title">Begin Simulation</span></a>
            </li>
            <li class="active">
              <a href="">
              <i class="icon-graph"></i>
              <span class="title">Export Data</span></a>
            </li>
          </ul>
          @endif
        </li>

      </ul>
    </div>
  </div>
<!-- END SIDEBAR -->
  
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content">
     <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      @if (Session::get('flash_message'))
              <div class="Metronic-alerts alert-success fade in"></br>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                &nbsp;&nbsp;&nbsp;&nbsp;{{ Session::get('flash_message') }}</br></br></div>
       @endif
     </div>

     @if(Session::has('global'))
     <p>
       {{ Session::get('global')}}
     </p>
     @endif   
    
    </div>
<div class="row">
       @yield('content')
</div>
  
<div class="page-footer">
  <div class="page-footer-inner">
     2014 &copy; Electricity Research Centre 
  </div>
  <div class="page-footer-tools">
    <span class="go-top">
    <i class="fa fa-angle-up green"></i>
    </span>
  </div>
</div>
</div>
</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{ URL::asset('assets/global/plugins/respond.min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/excanvas.min.js') }}"></script> 
<![endif]-->
<script src="{{ URL::asset('assets/global/plugins/jquery-1.11.0.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery-migrate-1.2.1.min.js') }}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{ URL::asset('assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/flot/jquery.flot.categories.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery.pulsate.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-daterangepicker/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
<script src="{{ URL::asset('assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/gritter/js/jquery.gritter.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/nouislider/jquery.nouislider.min.js') }}"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ URL::asset('assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/admin/layout/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/admin/layout/scripts/quick-sidebar.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/admin/pages/scripts/index.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/admin/pages/scripts/tasks.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/admin/pages/scripts/components-nouisliders.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}"></script>
<script src="{{ URL::asset('assets/admin/pages/scripts/table-managed.js') }}"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
<script src="http://code.highcharts.com/highcharts.js" type="text/javascript"></script>
<script src="http://code.highcharts.com/modules/exporting.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
    $(document).ready(function () {
    var interval = null;
    var warmingCounter = 0;
    interval = setInterval(function() {
      if(Objects.length == 0)
      {
        if(warmingCounter == 0)
        {
          $('#warming').html('<h3>Warming up .</h3>');
          warmingCounter = 1;
        }
        else if(warmingCounter == 1)
        {
          $('#warming').html('<h3>Warming up ..</h3>');
          warmingCounter = 2;
        }
        else
        {
          $('#warming').html('<h3>Warming up ...</h3>');
          warmingCounter = 0;
        }
      }
      else{     
        if($('#bigContainer').css('display') == 'none')
        {
          $('#warming').hide();
          $('#bigContainer').show();
          clearInterval(interval); // stop the interval
        }
      }
    }, 1000); 
    
    Highcharts.setOptions({
      global: {
        useUTC: false
      }
    });

    $('#containers').highcharts({
      chart: {
        type: 'spline',
        marginRight: 10,
        events: {
          load: function () {
            var series = this.series[0], y; // set up the updating of the chart each second
            var series2 = this.series[1], y2; // set up the updating of the chart each second
            setInterval(function () {
              if(flaq == true){
                window.location.replace("http://simapi.ucd.ie/show-results?instance_id="+ document.getElementById('instnum').textContent);
              }
              if(Objects.length > 0 && (typeof Objects[0] !== "undefined"))
              {
                y = Number(Objects[0]["Living"]);
                y2 = Number(Objects[0]["Kitchen"]);
                Objects.shift();
              }
              else
              {
                y = 0;
                y2= 0;
              }
              series.addPoint( y, true, true);
              series2.addPoint(y2, true, true);
            }, 1500);
          }
        }
      },
      title: {
        text: 'Live house temperature'
      },
      xAxis: {      
        type: 'linear',
        tickInterval: 1
      },
      yAxis: {
        title: {
          text: 'Temperature'
        },
        plotLines: [{
          value: 0,
          width: 1,
          color: '#808080'
        }]
      },
      tooltip: {
        formatter: function () {
          return '<b>' + this.series.name + '</b><br/>' +
            Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', (new Date()).getTime()) + '<br/>' +
            Highcharts.numberFormat(this.y, 2);
        }
      },
      legend: {
        enabled: true
      },
      exporting: {
        enabled: false
      },
      series: [{
        name: 'Living room',
        data: (function () {
          
          var data = [],  // generate an array of random data
            i;

          for (i = -11; i <= 0; i += 1) {
            data.push({
              y: 0
            });
          }
          return data;
        }())
      },
      {
        name: 'Kitchen',
        data: (function () {
          
          var data = [],  // generate an array of random data
            i;

          for (i = -11; i <= 0; i += 1) {
            data.push({
              y: 0
            });
          }
          return data;
        }())
      }
      ]
    });
    
    $('#Energycontainers').highcharts({
    chart: {
      type: 'spline',
      marginRight: 10,
      events: {
        load: function () {
          var series = this.series[0], y; // set up the updating of the chart each second
          var series2 = this.series[1], y2; // set up the updating of the chart each second
          setInterval(function () {
            if(Objects.length > 0 && (typeof Objects[0] !== "undefined"))
            {
              y = Number(Objects[0]["EMS_BuildingConsumption"]);
              y2 = Number(Objects[0]["EMS_PVProductionEMS"]);
              Objects.shift();
            }
            else
            {
              y = 0;
              y2 = 0;
            }
            series.addPoint(y, true, true);
            series2.addPoint(y2, true, true);
          }, 1500);
        }
      }
    },
    title: {
      text: 'House energy consumption'
    },
    xAxis: {      
            type: 'linear',
            tickInterval: 1
    },
    yAxis: {
      title: {
        text: 'Energy J'
      },
      plotLines: [{
        value: 0,
        width: 1,
        color: '#808080'
      }]
    },
    tooltip: {
      formatter: function () {
        return '<b>' + this.series.name + '</b><br/>' +
          Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', (new Date()).getTime()) + '<br/>' +
          Highcharts.numberFormat(this.y, 2);
      }
    },
    legend: {
      enabled: true
    },
    exporting: {
      enabled: false
    },
    series: [{
      name: 'Building consumption',
      data: (function () {
        
        var data = [],  // generate an array of random data
          i;

        for (i = -11; i <= 0; i += 1) {
          data.push({
            y: 0
          });
        }
        return data;
      }())
    },
    {
      name: 'Solar Energy',
      color: '#FFCC00',
      data: (function () {
        
        var data = [],  // generate an array of random data
          i;

        for (i = -11; i <= 0; i += 1) {
          data.push({
            y: 0
          });
        }
        return data;
      }())
    }
    ]
  });

  });
});
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-1779523-7', 'auto');
  ga('send', 'pageview');

</script>
<!-- END JAVASCRIPTS -->
</body>