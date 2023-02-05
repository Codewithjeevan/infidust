<style type="text/css">
  @media only screen and (min-width: 993px) and (max-width: 3000px) {}

  @media only screen and (min-width: 260px) and (max-width: 992px) {}

  .navbar-inverse {
    background-color: red;
    border-color: #fff;
  }

  .navbar-inverse .navbar-nav>li>a {
    color: #000;
  }

  .navbar-inverse .navbar-nav>.open>a {
    color: #000;
    background-color: #fff;
  }

  .navbar-inverse .navbar-nav>.open>a:hover {
    color: #000;
    background-color: #fff;
  }

  .navbar-inverse .navbar-nav>li>a:focus {
    color: #000;
    background-color: #fff;
  }

  .navbar-nav>li>a {
    padding: 21px;
    font-size: 14px;
  }

  .mega-dropdown {
    /*position: static !important;*/
    position: relative;
  }

  .mega-dropdown-menu {
    padding: 20px 0px;
    width: 200px;
    box-shadow: none;
    -webkit-box-shadow: none;
  }

  .mega-dropdown-menu>li>ul {
    padding: 0;
    margin: 0;
  }

  .mega-dropdown-menu>li>ul>li {
    list-style: none;
  }

  .mega-dropdown-menu>li>ul>li>a {
    display: block;
    color: #222;
    padding: 3px 5px;
  }

  .mega-dropdown-menu>li ul>li>a:hover,
  .mega-dropdown-menu>li ul>li>a:focus {
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

  .side-menu brktxt {
    padding-left: 19px;
    font-size: 12px;
    text-transform: uppercase;
    opacity: 0.7;
    margin-top: 20px;
    display: block;
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

  .navbar-nav>li {
    text-align: center;
  }

  .nav-item>i {
    position: absolute;
    left: 45%;
    bottom: -5px;
    display: ;
  }

  .navbar-nav>li>a {
    color: #414141;
    font-size: 13px;
  }

  .nav>li>a:hover i {
    display: block;
  }

  .nav>li>a:hover,
  .nav>li>a:active,
  .nav>li>a:focus {
    background: #fff;
    color: #000;
  }
</style>

<div class="container-fluid fixed-top" style="padding:0px; ">
  <button type="button" class="tg-sidemnu " id="showtgl" style="color:#000;margin-top:6px"><img src="<?php echo base_url() . 'assets-public/' ?>dist/img/open-menu.svg" width="20"></button>
  <button type="button" class="tg-sidemnu " id="hidtgl" style="display:none;color:#000;margin-top:6px"><img src="<?php echo base_url() . 'assets-public/' ?>dist/img/open-menu.svg" width="20"></button>
  <a href="<?php echo base_url() . 'login' ?>" class="smallvisible"><button class="btn btn-info" style="position:absolute;z-index:99;right:0px;top:13px">Login</button></a>
  <nav class="navbar navbar-expand-lg navbar-light bg-white" style="padding:11px 11px 8px 11px;">
    <a class="navbar-brand" href="<?php echo base_url() ?>" style="padding-left:15px;"><img src="<?php echo base_url() . 'assets-public/' ?>dist/img/logo.png" class="logo"></a>
    <!--   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> -->

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <div class="mr-auto w-100">
        <input class="form-control srchtxt" placeholder="Search courses">
      </div>
      <button class="btn btn-primary srchbtn"><i class="fa fa-search" aria-hidden="true"></i></button>
      <a href="<?php echo base_url() . 'login' ?>"><button type="button" class="btn btn-info">Login</button></a>
      <a href="<?php echo base_url() . 'register?for=0' ?>"><button type="submit" class="btn btn-primary btn-raised">Get Started for free</button></a>
    </div>
</div>
</nav>
</div>

<div class="menu-overlay"></div>
<div class="side-menu h-50" style="">
  <brktxt>Home</brktxt>
 <a href="<?php echo base_url(); ?>" style="text-decoration:none"><button type="button" class="btn btn-primary btn-block sidebtn " style="margin: 0;"> Home</button></a>
  <brktxt>Fillter</brktxt>
  <button type="button" class="btn btn-primary btn-block sidebtn " style="margin: 0;"> Filter</button>
</div>
<div class="side-menu smallvisible"><br>
  <a href="<?php echo base_url() . 'whyinfidust' ?>"><button type="button" class="btn btn-primary btn-block sidebtn sidemactiv open_home" style="margin: 0; text-align:left"> Why Infi Dust <i class="fa fa-fw fa-angle-right pull-right" style="margin-top:3px"></i></button></a>
  <a href="<?php echo base_url() . 'solution' ?>">
    <button type="button" class="btn btn-primary btn-block sidebtn sidemactiv open_home" style="margin: 0; text-align:left"> Solution <i class="fa fa-fw fa-angle-right pull-right" style="margin-top:3px"></i></button>
  </a>
  <a href="<?php echo base_url() . 'about' ?>">
    <button type="button" class="btn btn-primary btn-block sidebtn sidemactiv open_home" style="margin: 0; text-align:left"> About Us <i class="fa fa-fw fa-angle-right pull-right" style="margin-top:3px"></i></button>
  </a>
  <a href="<?php echo base_url() . 'pricing' ?>">
    <button type="button" class="btn btn-primary btn-block sidebtn sidemactiv open_home" style="margin: 0; text-align:left"> Plan & Pricing <i class="fa fa-fw fa-angle-right pull-right" style="margin-top:3px"></i></button>
  </a>
  <a href="<?php echo base_url() . 'explore/how-its-works' ?>">
    <button type="button" class="btn btn-primary btn-block sidebtn sidemactiv open_home" style="margin: 0; text-align:left"> How it works <i class="fa fa-fw fa-angle-right pull-right" style="margin-top:3px"></i></button>
  </a>

</div>

<script>
  $('.srchbtn').click(function() {
    var txt = $('.srchtxt').val();
    var trimStr =  $.trim(txt);
    var srchtxt = trimStr.replace(/ /g,"-");
    var url = '<?php echo base_url() ?>institute/' + srchtxt;
    window.location.href = url;
  });
</script>