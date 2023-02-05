<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Prikmo</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="<?php echo base_url().'assets-site/' ?>images/favicon.png" rel="shortcut icon" type="image/png">
  <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>dist/css/pace-theme-center-simple.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

   <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>dist/css/skins/skin-green.min.css">
  <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <script src="<?php echo base_url().'assets-public/' ?>dist/js/jquery-3.1.1.min.js"></script>
  <script src="<?php echo base_url().'assets-public/' ?>dist/js/pace.js"></script>

  <!-- jQuery 3 -->
<!-- <script src="<?php echo base_url().'assets-public/' ?>bower_components/jquery/dist/jquery.min.js"></script> -->


  <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>bower_components/select2/dist/css/select2.min.css">
   <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>dist/css/cus.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script type="text/javascript">var bsid = '<?php echo $this->session->userdata("bs_id");?>';</script>
    <script type="text/javascript">var clid = '<?php echo $this->session->userdata("cli_id");?>';</script>
    <script type="text/javascript">var brid = '<?php echo $this->session->userdata("brnch_id");?>';</script>
    <script type="text/javascript">var type = '<?php echo $this->session->userdata("type");?>';</script>
    <script type="text/javascript">var base_url = '<?php echo base_url();?>';</script>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect

-->
<style type="text/css">
.dropdown-large {
  position: static !important;
}
.dropdown-menu-large {
  margin-left: 16px;
  margin-right: 16px;
  padding: 10px 0px;
-webkit-box-shadow: 0px 2px 6px -2px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 2px 6px -2px rgba(0,0,0,0.75);
box-shadow: 0px 2px 6px -2px rgba(0,0,0,0.75);
}
.dropdown-menu-large > li > ul {
  padding: 0;
  margin: 0;
}
.dropdown-menu-large > li > ul > li {
  list-style: none;
}
.dropdown-menu-large > li > ul > li > a {
  display: block;
  padding: 3px 15px;
  clear: both;
  font-weight: normal;
  line-height: 1.428571429;
  color: #333333;
  white-space: normal;
}
.dropdown-menu-large > li ul > li > a:hover,
.dropdown-menu-large > li ul > li > a:focus {
  text-decoration: none;
  color: #262626;
  background-color: #f5f5f5;
}
.dropdown-menu-large .disabled > a,
.dropdown-menu-large .disabled > a:hover,
.dropdown-menu-large .disabled > a:focus {
  color: #999999;
}
.dropdown-menu-large .disabled > a:hover,
.dropdown-menu-large .disabled > a:focus {
  text-decoration: none;
  background-color: transparent;
  background-image: none;
  filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
  cursor: not-allowed;
}
.dropdown-menu-large .dropdown-header {
  color: #000; text-transform: uppercase;
  font-size: 15px; padding-bottom: 15px;
}
@media (max-width: 768px) {
  .dropdown-menu-large {
    margin-left: 0 ;
    margin-right: 0 ;
  }
  .dropdown-menu-large > li {
    margin-bottom: 30px;
  }
  .dropdown-menu-large > li:last-child {
    margin-bottom: 0;
  }
  .dropdown-menu-large .dropdown-header {
    padding: 3px 15px !important;
  }
}
.cus-droplink { text-align: center;  width: 60px; height: 62px; color: #fff; font-size: 11px; padding-top: 12px; cursor: pointer;}
.cus-droplink:hover { background-color: rgba(255,255,255,0.3); }
</style>
<script>
    paceOptions = {
      elements: true
    };
  </script>

  <script>
    function load(time){
      var x = new XMLHttpRequest()
      x.open('GET', "http://localhost:5646/walter/" + time, true);
      x.send();
    };

    load(20);
    load(100);
    load(500);
    load(2000);
    load(3000);

    setTimeout(function(){
      Pace.ignore(function(){
        load(3100);
      });
    }, 4000);

    Pace.on('hide', function(){
      console.log('done');
    });
  </script>
<body class="hold-transition skin-green sidebar-mini fixed">
<div class="page-loader" id="mainpageloader" style="top:0px;z-index: 9999999; position: fixed;width: 100%; left:0px; height: 100%; background: #fff; text-align: center; padding-top: 20%;">
<img src="<?php echo base_url();?>assets-public/dist/img/dataloder.gif" width="65">
                
            </div>
<div class="popupblock" id="alert-suc" style="display: none;">
  <span class="sucsess-msg" style="display: ;"><i class="fa fa-fw fa-check"></i> Successful</span>
</div>
<div class="popupblock" id="alert-err" style="display: none;">
  <span class="error-msg" style="display: ;"><i class="fa fa-fw fa-exclamation-triangle"></i> Faild</span>
</div>
<div class="popupblock" id="alert-wait" style="display: none;">
  <span class="waiting-msg" style="display:;"><i class="fa fa-spinner fa-spin"></i> Please wait</span>
</div>

<div class="wrapper">

  <!-- Main Header -->
   <div style="position: fixed; padding-top: 10px; padding-left: 10px; top: 0px; left: 50px; background: #31b80d; height: 60px; width: 600px; z-index: 9999;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/logo.png" width="130"> <div style="position: absolute; top: 14px; left: 160px; width: 1px; height: 30px; background: #fff;"></div> <span style="color: #fff; font-size: 23px; position: absolute; left: 185px; top: 13px;">SEO</span></div>
  <header class="main-header">
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="position: fixed; color: #fff; top: 5px; left: 5px;">
        <span class="sr-only">Toggle navigation</span>
      </a>

    <!-- Logo -->
    <a href="#" class="logo" style="background-color:#31b80d;">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
     

      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

       
        
         

           

           <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo base_url().'assets-public/' ?>dist/img/propic/0.png" class="user-image" alt="User Image">
              
              <span class="hidden-xs">SEO</span>
             
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo base_url().'assets-public/' ?>dist/img/propic/0.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata("bsname");?>
                  
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
               <!--  <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="pull-right">
                  <a href="#" id="letslogout" class="btn btn-default btn-flat">Log out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="overflow-y: scroll; height: 100%;">
        <section class="sidebar">

            <!-- Sidebar Menu -->
      
         <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="">
          <a href="#" id="opendashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
       <li>
          <a href="#" id="openrestu">
            <i class="fa fa-dashboard"></i> <span>Restaurant</span>
          </a>
        </li>


       <!--  <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-users"></i> <span>Clients</span><span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="<?php echo base_url()."insert" ?>"><i class="fa fa-circle-o"></i> Add Client</a></li>
            <li><a href="<?php echo base_url()."user" ?>"><i class="fa fa-circle-o"></i> Manage Client</a></li>
          </ul>
        </li> -->

       

      
    
        
    </section>
      <!-- /.sidebar-menu -->
 
  
  </aside>

  <div class="content-wrapper"></div>

       <footer class="main-footer">
        <strong>Copyright &copy; 2019 <a href="#">Prikmo</a>.</strong> All rights reserved.
     </footer>
     
<script type="text/javascript">
  $(document).ready(function() { 
    var kotmenu = '<?php echo $bs_option["kot"];?>';
    if(kotmenu === '0'){
      $('#showkotmenu').hide();
    }else{
      $('#showkotmenu').show();
    }
  });
$(window).on('load', function () {
     $("#mainpageloader").fadeOut();
 });

</script> 
<script type="text/javascript">

        $(document).ready(function() {
            $(".content-wrapper").load('<?php echo base_url()."dashboard/dashboardpage"; ?>');
        });

        $('#openrestu').click(function(){
        $(".content-wrapper").load('<?php echo base_url()."restaurant/Restaurant"; ?>');
        });
       
</script>
<script type="text/javascript">
  
         $('#letslogout').click(function(){
          $('#alert-wait').show();
                  var dataString = 'logout=logout';
            jQuery.ajax({
              type: "POST",
              url: base_url +'auth/Logout',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){ 
                  window.location.href = base_url+'Dashboard';
                  window.location.href = base_url+'Business';
                }
              },
              error: function (response) {
            
                  $("#alert-err").show().delay(5000).fadeOut();
                //location.reload();
                  }

            }); 
        });
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    $('.select3').select2()

   

    // //Date picker
    // $('#datepicker').datepicker({
    //   autoclose: true,
    //    format: "yyyy-mm-dd"
    // })
    // //Date picker
    // $('#datepicker2').datepicker({
    //   autoclose: true,
    //    format: "yyyy-mm-dd"
    // })

    

  })
</script>

<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script> -->
<script src="<?php echo base_url().'assets-public/' ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url().'assets-public/' ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src=" <?php echo base_url().'assets-public/' ?>dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url().'assets-public/' ?>bower_components/select2/dist/js/select2.full.min.js"></script>

 <script src="<?php echo base_url()."assets-public/" ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url()."assets-public/" ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets-public/' ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url().'assets-public/' ?>bower_components/chart.js/Chart.js"></script>
 <!-- bootstrap time picker -->
<script src="<?php echo base_url().'assets-public/' ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url().'assets-public/' ?>bower_components/jquery-knob/js/jquery.knob.js"></script>

<!-- <script src="<?php echo base_ur()."assets-public/" ?>bower_components/jquery/dist/jquery.min.js"></script>

<script src="<?php echo base_url()."assets-public/" ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="<?php echo base_url()."assets-public/" ?>dist/js/adminlte.min.js"></script>
 -->



</body>
</html>