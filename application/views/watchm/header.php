
<style type="text/css">
 @media only screen and (min-width: 993px) and (max-width: 3000px) { 
   .hdr-cus-pad { padding: 6px 11px 2px 11px;}
}
 @media only screen and (min-width: 260px) and (max-width: 992px) { 
 .hdr-cus-pad { padding: 14px 11px 10px 11px;}
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
.pro-btn { width: 36px; height: 36px; border-radius: 100%; z-index: 99;}
.cus-icon-btn {width: 36px; height: 36px; border-radius: 100%; padding: 0px;}
.cus-icon-btn:hover { background-color: rgba(255,255,255,1);}
.cus-icon-btn i {color: #fff; font-size: 16px;}
.hdr-btn-blk {width: 36px; height: 36px; background: ; position: relative; top: -2px;}
.botom-inst-view { position:absolute;height: 90px; bottom: 0; left: 0; width: 100%; background: ; border-top:1px solid #ddd;padding: 10px;}
.botom-inst-view:hover { background: #ddd;}
.inst-btm-img-blk { width: 65px; height: 65px; background: #fff; border-radius: 100%; overflow: hidden; }
.inst-btm-img-blk img { width: 100%;}
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
 <?php if($this->session->userdata("mem_type") == 'student'){ ?>
<a href="<?php echo base_url().'student_panel' ?>">
 <?php } else if($this->session->userdata("mem_type") == 'teacher'){ ?>
 <a href="<?php echo base_url().'teacher_panel' ?>">
 <?php } else { ?>
  <a href="<?php echo base_url().'institue_panel' ?>">
 <?php } ?>
<button type="button" class="tg-sidemnu " id="showtgl" ><i class="fa fa-fw fa-home"></i></button>
</a>
<button type="button" class="tg-sidemnu " id="hidtgl" style="display:none"><i class="fa fa-fw fa-bars"></i></button>
  <nav class="navbar navbar-expand-lg navbar-light cus-blue hdr-cus-pad" style="">
   <?php if($this->session->userdata("mem_type") == 'student'){ ?>
<a href="<?php echo base_url().'student_panel' ?>" style="padding-left:15px;">
 <?php } else if($this->session->userdata("mem_type") == 'teacher'){ ?>
 <a href="<?php echo base_url().'teacher_panel' ?>" style="padding-left:15px;">
 <?php } else { ?>
  <a href="<?php echo base_url().'institue_panel' ?>" style="padding-left:15px;">
 <?php } ?>

<img src="<?php echo base_url().'assets-public/' ?>dist/img/logow.png" class="logo2"></a>
 <?php if($this->session->userdata("crent_viewid")){ ?>
 <div class="bigvisible" ><button class="allinsbtn btn " data-toggle="modal" data-target="#mayallinsti" style="background: rgba(255,255,255,0.2);color: #fff; padding: 7px 10px 7px 10px; border-radius:4px"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/universities.svg"> <span style="padding-right:3px;">
 <?php if($crnt_inst_data){ ?>
  <?php echo substr($crnt_inst_data['insti_nm'], 0, 15).".." ; ?> 
 <?php } else {?>
 My First Institute
 <?php } ?>
 </span><i class="fa fa-fw fa-caret-down" style="font-size:17px;top:1px;position:relative"></i></button>
  </div>
  <div class="smallvisible" style="position:absolute;right:5px;">
  <button class="allinsbtn btn " data-toggle="modal" data-target="#mayallinsti" style="background: rgba(255,255,255,0.2);color: #fff; padding: 7px 5px 7px 10px; border-radius:4px;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/universities.svg"> </button>
  </div>
<?php } ?>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <!--   <li class="nav-item active">
        <a class="nav-link dropdown-toggle" href="#" style="text-transform:none;"> &nbsp;&nbsp;&nbsp;Why Infi Dust</a>
      </li> -->
    </ul>
    <div class="form-inline my-2 my-lg-0" >
     <div class="hdr-btn-blk">
        <button type="button" class="btn btn-info cus-icon-btn " id="helpblk" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-question-circle"></i></button>
           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="helpblk" style=" left:-164px; width:200px;">
        <a class="dropdown-item disabled" href="#" style="font-size:14px;">Documentation</a>
        <a class="dropdown-item disabled" href="#" style="font-size:14px;">Start a tutorial</a>
        <a class="dropdown-item" href="#" style="font-size:14px;">Help </a>
      </div>
     </div>
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
        <button type="button" class="btn btn-defult btn-raised pro-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
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





<div id="mayallinsti" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="border-radius:5px; ">
      <div class="row" >
      <div class="col-md-12" style="height:500px;padding:0;">
      <div class="row" >
        <div class="col-md-12 body-data" style="padding:30px 20px 20px 20px;">
          <h4>Select institute/coatching
          <span class="bigvisible">
           <button type="button" id="" class="btn btn-info pull-right open_srchinsti " style="top:-5px;">+ JOIN NEW INSTITUTE</button></span></h4>
       
        </div>
        <div class="col-md-12">
          <div class="" style="position:relative;padding-bottom:15px;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/search.svg" class="srch-icon"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/x-circle.svg" id="srch-close" class="srch-close"><div class="srch-loader"><div class="sbl-circ-path3"></div></div>
            <input type="text" class="cus-srch-input" placeholder="Search..">

          </div>
        </div>
        <div class="col-md-12" id="allmyistlist">
       
        </div>
      </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <div class="smallvisible">
        <button type="button" id="" class="btn btn-info pull-right open_srchinsti smallvisible" >+ JOIN NEW INSTITUTE</button>
      </div>
      </div>
    </div>
    
  </div>
</div>

