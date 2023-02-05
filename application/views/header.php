
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


</style>


<div class="container-fluid fixed-top" style="padding:0px; ">
<button type="button" class="tg-sidemnu " id="showtgl" style="color:#000;margin-top:6px"><img src="<?php echo base_url().'assets-public/' ?>dist/img/open-menu.svg" width="20"></button>
<button type="button" class="tg-sidemnu " id="hidtgl" style="display:none;color:#000;margin-top:6px"><img src="<?php echo base_url().'assets-public/' ?>dist/img/open-menu.svg" width="20"></button>
<a href="<?php echo base_url().'login' ?>" class="smallvisible"><button class="btn btn-info" style="position:absolute;z-index:99;right:0px;top:13px">Login</button></a>
  <nav class="navbar navbar-expand-lg navbar-light bg-white" style="padding:11px 11px 8px 11px;">
  <a class="navbar-brand" href="<?php echo base_url() ?>" style="padding-left:15px;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/logo.png" class="logo"></a>
<!--   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link dropdown-toggle" id="show-whyinfi" href="#" style="text-transform:none;"> &nbsp;&nbsp;&nbsp;Why Infi Dust</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link dropdown-toggle" id="show-solution" href="#" style="text-transform:none;"> &nbsp;&nbsp;&nbsp;Solution</a>
      </li>
     <!--  <li class="nav-item active ">
        <a class="nav-link dropdown-toggle" href="#" style="text-transform:none;"> &nbsp;&nbsp;&nbsp;Getting Started</a>
      </li> -->
  <li class="nav-item active ">
        <a class="nav-link " href="<?php echo base_url().'pricing' ?>" style="text-transform:none;"> &nbsp;&nbsp;&nbsp;Plan & Pricing</a>
      </li>  
     
  <li class="nav-item active ">
        <a class="nav-link " href="<?php echo base_url().'explore/how-its-works' ?>" style="text-transform:none;"> &nbsp;&nbsp;&nbsp;How It works</a>
      </li>  
     
     
    </ul>
    <div class="form-inline my-2 my-lg-0">
    <!-- <button type="button" class="btn btn-dark">Support</button> -->
      <!-- <button type="button" class="btn btn-info">Class Room</button> -->
      <a href="<?php echo base_url().'login' ?>"><button type="button" class="btn btn-info">Login</button></a>
       <a href="<?php echo base_url().'register?for=0' ?>"><button type="submit" class="btn btn-primary btn-raised">Get Started for free</button></a>
    </div>
  </div>
</nav>
</div>


   <div id="whyinfi" class="big-menu-blk not-visib" style="display:"><div class="mid-vline"></div><i id="cls-whyinfi" class="fa fa-fw fa-close bigm-close"></i>
        <div class="row">
          <div class="col-md-6">
           <div class="col-md-8">
            <div class="ineindder">
               <h3>“Skywalk Collaboration
Transformation Education”
 </h3><br>
               <p>Whether you are a teacher or student, join Infidust for an absolute education solution, all in one platform.</p>
       
            </div>
           </div>
          </div>
          <div></div>
          <div class="col-md-6">
            <div class="col-md-12" style="padding-top:40px;">
              <smtitle>WHY INFIDUST</smtitle>
            </div>
            <div class="row">
            <div class="col-md-6 feature1">
              <h2>Infidust Present</h2>
              <p>Live interaction between teacher<br> & student with proper live recording.</p>
            </div>
            <div class="col-md-6 feature1">
              <h2>Choose your institute</h2>
              <p>Study from your favorite institute or tuition online.</p>
            </div>
            <div class="col-md-6 feature1">
              <h2>Learn anytime, anywhere</h2>
              <p>Once profile review, you can watch all live classes from anywhere in your any devices</p>
            </div>
            <div class="col-md-6 feature1">
              <h2>Get customised responses</h2>
              <p>Based on your interest get customised responses from Infidust.
</p>
            </div>
            <div class="col-md-6 feature1">
              <h2>Analyst reports</h2>
              <p>Check your daily schedule and study report form any device.</p>
            </div>
            <div class="col-md-6 feature1">
              <h2>Trust and Security</h2>
              <p>Get a trusted institute with proper data security.</p>
            </div>
            
            
            

            </div>
          </div>
        </div>
   </div>




   <div id="solutionm" class="big-menu-blk not-visib" style="display:; height:60%"><i id="cls-solutin" class="fa fa-fw fa-close bigm-close"></i>
       <div class="bigm-inr-menu-blk">
        <button id="slou-b1" class="bigm-in-btn bgmactiv"> Feature solution</button>
        <button id="slou-b2" class="bigm-in-btn"> Infrastructure modernization</button>
        <button id="slou-b3" class="bigm-in-btn"> Build flexible classes</button>
        <button id="slou-b4" class="bigm-in-btn"> Institute solution</button>
        <!-- <button id="slou-b5" class="bigm-in-btn"> title five</button> -->
       </div>
        <div class="row" style="margin-left:320px;">
          <div class="col-md-12" style="padding:0;">

            <div id="slou-b1-blk" class="row soluinerb" style="display:">
               <div class="col-md-12 feature2" style="padding-bottom:20px;padding-top:30px">
               <h3>Infidust Features</h3>
               </div>
               <div class="col-md-4 feature2">
               <h2>Live classes</h2>
               <p>Pre- scheduled live classes which will never miss your important class.</p>
               </div>
               <div class="col-md-4 feature2">
               <h2>Live online test</h2>
               <p>Stay safe at home and give safe online test at your time.</p>
               </div>
               <div class="col-md-4 feature2">
               <h2>Online results</h2>
               <p>Check your result from anywhere without migration.</p>
               </div>
               <div class="col-md-4 feature2">
               <h2>White board</h2>
               <p>Understand the proper methods or steps through the whiteboard.</p>
               </div>
               <div class="col-md-4 feature2">
               <h2>Upload videos & notes</h2>
               <p>Get all notes and lectures of your institute in the infidust profile.</p>
               </div>
               <div class="col-md-4 feature2">
               <h2>Get your subject online coaching</h2>
               <p>Find and choose your suitable & best Tuition/institute.</p>
               </div>
            </div>

            <div id="slou-b2-blk" class="row soluinerb" style="display:none">
               <div class="col-md-12 feature2" style="padding-bottom:20px;padding-top:30px">
               <h3>Infrastructure modernization</h3>
               </div>
               <div class="col-md-4 feature2">
               <h2>Data management</h2>
               <p>Manage data and classes easily from anywhere, anytime and stay updated.</p>
               </div>
               <div class="col-md-4 feature2">
               <h2>Represent coaching</h2>
               <p>Tell more about your Tution/Institute to attract more student</p>
               </div>
               <div class="col-md-4 feature2">
               <h2>Teacher strength</h2>
               <p>Show details, biography & experience of your Tution/Institute teachers.</p>
               </div>
               <div class="col-md-4 feature2">
               <h2>Coaching expression</h2>
               <p>When your Tution/Institute is established and why to choose your Tution/Institute.</p>
               </div>
               <div class="col-md-4 feature2">
               <h2>Student review</h2>
               <p>Tell your success story by adding student reviews & results.</p>
               </div>
               <div class="col-md-4 feature2">
               <h2>Course pricing</h2>
               <p>Describe your proper fees structure of every course of your Tution/Institute.</p>
               </div>
            </div>

            <div id="slou-b3-blk" class="row soluinerb" style="display:none">
               <div class="col-md-12 feature2" style="padding-bottom:20px;padding-top:30px">
               <h3>Build flexible classes</h3>
               </div>
               <div class="col-md-4 feature2">
               <h2>Schedule management</h2>
               <p>According to your time schedule, arrange the Live classes & exams.</p>
               </div>
               <div class="col-md-4 feature2">
               <h2>Teacher management</h2>
               <p>Analysis your Tution/Institute teachers class timing and teaching without any cctv camera.</p>
               </div>
               <div class="col-md-4 feature2">
               <h2>Student slot management</h2>
               <p>Make unlimited different slot wise students class batch and stay connected with all students.</p>
               </div>
               <div class="col-md-4 feature2">
               <h2>Virtual classroom</h2>
               <p>Easily interact with all your Tution/Institute students and solve doubt clearly.</p>
               </div>
               <div class="col-md-4 feature2">
               <h2>Online admission process</h2>
               <p>Get students or teacher admission through infidust without any hassle.</p>
               </div>
               <div class="col-md-4 feature2">
               <h2>All courses management</h2>
               <p>Manage all your courses subjects & study materials online through infidust.</p>
               </div>
            </div>

            <div id="slou-b4-blk" class="row soluinerb" style="display:none">
               <div class="col-md-12 feature2" style="padding-bottom:20px;padding-top:30px">
               <h3>Institute solution</h3>
               </div>
               <div class="col-md-4 feature2">
               <h2>Mentor/ Tutor</h2>
               <p>Join yourself as a individual tutor or in any institute.</p>
               </div>
               <div class="col-md-4 feature2">
               <h2>Material management</h2>
               <p>Provide and manage all your institute study material online and do paperless management.</p>
               </div>
               <div class="col-md-4 feature2">
               <h2>Publish your institute</h2>
               <p>Reach to student by your own institute NAME & get best rating.</p>
               </div>
               <div class="col-md-4 feature2">
               <h2>Smart classes</h2>
               <p>Teach all the practicals and theory through smart classes.</p>
               </div>
               <div class="col-md-4 feature2">
               <h2>Collaboration</h2>
               <p>Stay connected with teacher & student through infidust.</p>
               </div>
               <div class="col-md-4 feature2">
               <h2>Report analysis</h2>
               <p>Daily analysis your institute report.</p>
               </div>
            </div>

          


          </div>
         </div>

   </div>
  

  <div class="menu-overlay"></div>
<div class="side-menu smallvisible"><br>
  <a href="<?php echo base_url().'whyinfidust' ?>" ><button type="button" class="btn btn-primary btn-block sidebtn sidemactiv open_home" style="margin: 0; text-align:left"> Why Infi Dust <i class="fa fa-fw fa-angle-right pull-right" style="margin-top:3px"></i></button></a>
  <a href="<?php echo base_url().'solution' ?>" >
  <button type="button" class="btn btn-primary btn-block sidebtn sidemactiv open_home" style="margin: 0; text-align:left"> Solution <i class="fa fa-fw fa-angle-right pull-right" style="margin-top:3px"></i></button>
  </a>
    <a href="<?php echo base_url().'about' ?>" >
  <button type="button" class="btn btn-primary btn-block sidebtn sidemactiv open_home" style="margin: 0; text-align:left"> About Us <i class="fa fa-fw fa-angle-right pull-right" style="margin-top:3px"></i></button>
 </a>
    <a href="<?php echo base_url().'pricing' ?>" >
  <button type="button" class="btn btn-primary btn-block sidebtn sidemactiv open_home" style="margin: 0; text-align:left"> Plan & Pricing <i class="fa fa-fw fa-angle-right pull-right" style="margin-top:3px"></i></button>
 </a>
    <a href="<?php echo base_url().'explore/how-its-works' ?>" >
  <button type="button" class="btn btn-primary btn-block sidebtn sidemactiv open_home" style="margin: 0; text-align:left"> How it works <i class="fa fa-fw fa-angle-right pull-right" style="margin-top:3px"></i></button>
 </a>

</div>