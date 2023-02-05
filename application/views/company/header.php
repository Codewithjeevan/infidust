
<style type="text/css">
 @media only screen and (min-width: 993px) and (max-width: 3000px) { 

}
 @media only screen and (min-width: 260px) and (max-width: 992px) { 

}

.navbar-inverse { background-color: red; border-color: #fff;}
.navbar-inverse .navbar-nav>li>a { color: #000;}
.navbar-inverse .navbar-nav>.open>a { color: #000; background-color: #fff;}
.navbar-inverse .navbar-nav>.open>a:hover { color: #000; background-color: #fff;}
.navbar-inverse .navbar-nav>li>a:focus { color: #000; background-color: #fff;}
.navbar-nav>li>a { padding: 21px; font-size: 14px;  }
  .mega-dropdown {
  /*position: static !important;*/
  position:relative;
}
.mega-dropdown-menu {
    padding: 20px 0px;
    width: 200px;
    box-shadow: none;
    -webkit-box-shadow: none;
}
.mega-dropdown-menu > li > ul {
  padding: 0;
  margin: 0;
}
.mega-dropdown-menu > li > ul > li {
  list-style: none;
}
.mega-dropdown-menu > li > ul > li > a {
  display: block;
  color: #222;
  padding: 3px 5px;
}
.mega-dropdown-menu > li ul > li > a:hover,
.mega-dropdown-menu > li ul > li > a:focus {
  text-decoration: none;
}
.mega-dropdown-menu .dropdown-header {
  font-size: 18px;
  color: #ff3546;
  padding: 5px 60px 5px 5px;
  line-height: 30px;
}

.carousel-control {
  width: 30px;
  height: 30px;
  top: -35px;

}
.left.carousel-control {
  right: 30px;
  left: inherit;
}
.carousel-control .glyphicon-chevron-left, 
.carousel-control .glyphicon-chevron-right {
  font-size: 12px;
  background-color: #fff;
  line-height: 30px;
  text-shadow: none;
  color: #333;
  border: 1px solid #ddd;
}
.navbar-nav>li { text-align: center;}

.nav-item>i { position: absolute; left: 45%; bottom: -5px; display: ;}

.navbar-nav>li>a { color: #414141; font-size: 13px;}
.nav>li>a:hover i { display: block;}
.nav>li>a:hover,
.nav>li>a:active,
.nav>li>a:focus {  background: #fff;color: #000;}

.cus-blue { background:#1a73e8;
-webkit-box-shadow: 0px 3px 5px 0px rgba(168,166,168,1);
-moz-box-shadow: 0px 3px 5px 0px rgba(168,166,168,1);
box-shadow: 0px 3px 5px 0px rgba(168,166,168,1);
}

.sidebtn { text-align: left; color: #353535; border-radius: 0px; padding: 12px 12px 12px 18px; opacity: 0.8; }
.sidebtn:hover {  opacity: 1;}
.side-menu brktxt { padding-left: 19px; font-size: 12px; text-transform: uppercase; opacity: 0.7; margin-top: 20px; display: block;}
.sidebtn img { width: 18px; margin-right: 10px; margin-bottom: 2px;}
.pro-btn { width: 36px; height: 36px; border-radius: 100%; z-index: 99}

.cus-icon-btn {width: 36px; height: 36px; border-radius: 100%; padding: 0px;}
.cus-icon-btn:hover { background-color: rgba(255,255,255,1);}
.cus-icon-btn i {color: #fff; font-size: 16px;}
.hdr-btn-blk {width: 36px; height: 36px; background: ; position: relative; top: -2px;}

.alert-blk { position: fixed; width: 100%; height: 60px;z-index: 9999;bottom: 0; display: ; }
.alert-waitiner {  width: 220px; height: 60px; background: #000;  
   padding: 10px 0px 10px 0px; color: #fff; border-top-left-radius:5px;border-top-right-radius:5px;}
   .alert-suciner {  max-width: 250px; height: 60px; background: #55a500;  
   padding: 10px 0px 10px 0px; color: #fff; border-top-left-radius:5px;border-top-right-radius:5px;} 
    .alert-erriner {  max-width: 220px; height: 60px; background: #d40000;  
   padding: 10px 0px 10px 0px; color: #fff; border-top-left-radius:5px;border-top-right-radius:5px;}
   .coursbtn { text-align: left; border-bottom: 1px solid #ccc; padding-left: 5px; padding-top: 10px; font-size: 13px;}
   .coursbtn img {float: right; width: 18px}
   .coursbtn i {float: right; font-size: 18px; margin-right: 10px;}
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
<!-- $('#error-blk').show().delay(2000).slideUp(); -->
<div id="alert-wait" class="alert-blk animatedshort fadeInUp" align="center" style="display:none">
<div class="alert-waitiner" >
<table width="100%">
  <tr>
    <td width="50"><div class="sbl-circ-path2"></div> </td>
    <td width="30"></td>
    <td>Please wait..</td>
  </tr>
</table>
</div>
</div>

<div id="alert-suc" class="alert-blk animatedshort fadeInUp" align="center" style="height: 50px;display:none">
<div class="alert-suciner" >
<table width="100%">
  <tr>
    <td width="50" align="center"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/check.svg" width=""> </td>
   
    <td><span id="suc-msg">Successfully Updated..</span></td>
  </tr>
</table>
</div>
</div>

<div id="alert-err" class="alert-blk animatedshort fadeInUp" align="center" style="height: 50px;display:none">
<div class="alert-erriner" >
<table width="100%">
  <tr>
    <td width="50" align="center"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/alert-circle.svg" width=""> </td>
   
    <td><span id="suc-msg">Update faild...</span></td>
  </tr>
</table>
</div>
</div>

<div id="alert-toast" class="alert-blk animatedshort fadeInUp" align="center" style="height: 50px;display:none">
<div class="alert-toast" >
<table width="100%">
  <tr>
    
    <td align="center" style="padding:0px 5px 0px 5px"><span id="alert-msg"></span></td>
  </tr>
</table>
</div>
</div>

<div class="container-fluid fixed-top" style="padding:0px;">
<button type="button" class="tg-sidemnu " id="showtgl" ><i class="fa fa-fw fa-bars"></i></button>
<button type="button" class="tg-sidemnu " id="hidtgl" style="display:none"><i class="fa fa-fw fa-bars"></i></button>
<!-- onetapbk.png -->
<div class="top-wave-blk smallvisible" align="center" id="goFS" style="display:none">
<img src="<?php echo base_url().'assets-public/' ?>dist/img/onetapp.png" >
<div class="circlew onew"></div>
<div class="circlew twow"></div>
<div class="circlew threew"></div>
<div class="onet-ap-bk" style="background-image: url(<?php echo base_url().'assets-public/' ?>dist/img/onetapbk.png);">
Use one touch app!</div>
</div>
  <nav class="navbar navbar-expand-lg navbar-light cus-blue" style="padding:6px 11px 2px 11px;">
  
  <a class="navbar-brand" href="#" style="padding-left:15px;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/logow.png" class="logo2"></a>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <!--   <li class="nav-item active">
        <a class="nav-link dropdown-toggle" href="#" style="text-transform:none;"> &nbsp;&nbsp;&nbsp;Why Infi Dust</a>
      </li> -->
    </ul>
    <div class="form-inline my-2 my-lg-0" >
    <!--  <div class="hdr-btn-blk">
        <button type="button" class="btn btn-info cus-icon-btn " id="helpblk" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-question-circle"></i></button>
           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="helpblk" style=" left:-164px; width:200px;">
        <a class="dropdown-item disabled" href="#" style="font-size:14px;">Documentation</a>
        <a class="dropdown-item disabled" href="#" style="font-size:14px;">Start a tutorial</a>
        <a class="dropdown-item" href="#" style="font-size:14px;">Help </a>
      </div>
     </div> -->
&nbsp;&nbsp;
     <div class="hdr-btn-blk">
        <button type="button" class="btn btn-info cus-icon-btn " id="notifblk" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-bell"></i></button>
           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notifblk" style=" left:-250px; width:350px;">
        <a class="dropdown-item disabled" href="#" style="max-width:350px;" align="center">Notification</a>
         <div class="dropdown-divider"> </div>
        <a class="dropdown-item" href="#" style="max-width:350px;">No Notifications</a>
      </div>
     </div>
&nbsp;&nbsp;&nbsp;&nbsp;
     <div class="hdr-btn-blk">
        <button type="button" class="btn btn-defult btn-raised pro-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        </button>
        <div class="proimgblk">
        <?php if($profdata['pro_pic']) { ?>
        <img src="<?php echo base_url().'assets/' ?>pro-sml/<?php echo $profdata['pro_pic']?>">
        <?php }else { ?>
        <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/userfull.png">
        <?php } ?>
        </div>
           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="problk" style=" left:-300px; width:350px;">
           <div style="padding-top:10px;">
             <table width="100%">
                <tr>
                  <td width="120" valign="top" align="center">
                  <div class="mid-dis-img2">
                 <?php if($profdata['pro_pic']) { ?>
                  <img src="<?php echo base_url().'assets/' ?>pro-sml/<?php echo $profdata['pro_pic']?>">
                  <?php }else { ?>
                  <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/userfull.png">
                  <?php } ?>
                  </div>
                </td>
                  <td>
                  <h5 style="font-size:18px"><?php echo $this->session->userdata('cus_fname') ?> <?php echo $this->session->userdata('cus_lname') ?></h5>
                  <p style="font-size:12px;padding-right:30px;"><?php echo $this->session->userdata('email') ?></p>
                  
                  </td>
                </tr>
            </table>
           </div>
           <div class="dropdown-divider"> </div>
           <div style="padding:0px 7px 0px 7px;" align="right">
             <a href="<?php echo base_url().'auth/logout' ?>"><button type="button" class="btn active">Sign out</button></a>
           </div>
       
        
      </div>
     </div>
     

     &nbsp;&nbsp;&nbsp;&nbsp;
      
    </div>
  </div>
</nav>
</div>

<div class="menu-overlay"></div>
<div class="side-menu">
  <button type="button" class="btn btn-primary btn-block sidebtn sidemactiv open_home" style="margin: 0;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/home.svg"> Home</button>
  <!-- <brktxt>Live schedule</brktxt>
  &nbsp;&nbsp;&nbsp;&nbsp; 
  <button type="button" class="btn btn-primary btn-block sidebtn " style="margin: 0;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/smile.svg"> Live Class</button>
  <button type="button" class="btn btn-primary btn-block sidebtn " style="margin: 0;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/smile.svg"> Class Engage</button> -->
  <brktxt>Study Materials</brktxt>
  <button type="button" class="btn btn-primary btn-block sidebtn notliveotast" style="margin: 0;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/archive.svg"> Videos & Notes</button>
  <brktxt>Members</brktxt>
  <button type="button" class="btn btn-primary btn-block sidebtn open_allstudent" style="margin: 0;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/smile.svg"> My Students</button>
  <button type="button" class="btn btn-primary btn-block sidebtn open_admision" style="margin: 0;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/user-plus.svg"> Student Admission  <a href="#" class="badge badge-info pull-right">0</a></button>

  <button type="button" class="btn btn-primary btn-block sidebtn open_allteacher" style="margin: 0;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/usert.svg"> All institute</button>
  <button type="button" class="btn btn-primary btn-block sidebtn open_teacher_join" style="margin: 0;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/layers.svg"> Teachers Joining <a href="#" class="badge badge-info pull-right">0</a></button>
  <brktxt>Settings</brktxt>
   <button type="button" class="btn btn-primary btn-block sidebtn open_class_alotm" style="margin: 0;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/coffee.svg"> Class Allotment</button>
   <button type="button" class="btn btn-primary btn-block sidebtn open_class_slot" style="margin: 0;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/package.svg"> Class Batches</button>
  <button type="button" class="btn btn-primary btn-block sidebtn open_subject" style="margin: 0;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/paperclip.svg"> Subject</button>
  <button type="button" class="btn btn-primary btn-block sidebtn open_courseseting" style="margin: 0;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/paperclip.svg"> Courses</button>
  <button type="button" class="btn btn-primary btn-block sidebtn open_ins_pro" style="margin: 0;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/briefcase.svg"> Profile</button>
  <!-- <button type="button" class="btn btn-primary btn-block sidebtn open_setting" style="margin: 0;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/settings.svg"> Setting</button> -->

</div>






  