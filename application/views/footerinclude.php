
      <div class="row" style="background:#fff; padding:5%; border-top:1px solid #ccc">
      <div class="col-md-3 cus-link" >
      <h3>COMPANY</h3><br>
      <a href="<?php echo base_url().'about' ?>">About Us</a><br>
      <a href="<?php echo base_url().'privacy-policy' ?>">Privacy Policy</a><br>
       <a href="<?php echo base_url().'terms' ?>">Terms and Conditions</a>
       <br>
      </div>
       <div class="col-md-3 cus-link" >
      <h3></h3>
      <b>Mobile App</b><br><br>
      <a href="#">Android(coming soon)</a><br>
      <a href="#">IOS(coming soon)</a><br> 
      </div>
       <div class="col-md-3 cus-link" >
      <h3>Quick Links</h3><br>
      
      <a href="<?php echo base_url().'pricing' ?>">Plan & Pricing</a><br>
      <a href="<?php echo base_url().'educator' ?>">Educator</a><br>
      <a href="<?php echo base_url().'contact' ?>" class="opencontact">Help Center</a><br>
      <!-- <a href="">Pricing</a><br> -->
      </div>
       <div class="col-md-3 cus-link" >
       <img src="<?php echo base_url().'assets-public/' ?>dist/img/logo.png" width="150"><br>
       <span style="position:relative;top:-8px; left:15px; font-size:12px; ">Making more simple</span><br>
       <span style="font-size:18px;">© INFIDUST</span>
      <h3>Follow Us</h3>
      <a href="#" style="font-size:18px;"><i class="fa fa-fw fa-facebook-square"></i></a>
      <a href="#" style="font-size:18px;"><i class="fa fa-fw fa-instagram"></i></a>
      <a href="#" style="font-size:18px;"><i class="fa fa-fw fa-linkedin-square"></i></a>
      <a href="#" style="font-size:18px;"><i class="fa fa-fw fa-twitter-square"></i></a>
      <a href="#" style="font-size:18px;"><i class="fa fa-fw fa-youtube-play"></i></a>
      </div>
      </div>

    </div>
    <!-- /.content -->



  <!-- Main Footer -->
  <footer class="main-footer" style="padding:1% 5% 1% 5%; font-size:12px;">
    <!-- To the right -->
 
    <strong>Copyright &copy; 2019 <a href="https://infidust.kamprik.com">Infidust</a>.</strong> All rights reserved.
  </footer>


<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->


<!-- AdminLTE App -->
   <script src="<?php echo base_url().'assets-public/' ?>dist/js/jquery-3.1.1.min.js"></script>

 
<script type="text/javascript">

$('#showtgl').click(function(){
   $('.side-menu').toggleClass('open-side');   
   $(this).hide();   
   $('#hidtgl').show();   
   $('.menu-overlay').fadeIn();   
});
$('#hidtgl').click(function(){
   $('.side-menu').toggleClass('open-side');   
   $(this).hide();   
   $('#showtgl').show();   
   $('.menu-overlay').fadeOut(); 
});
$('.menu-overlay').click(function(){
   $('.side-menu').toggleClass('open-side');   
   $('#hidtgl').hide();   
   $('#showtgl').show();   
   $('.menu-overlay').fadeOut(); 
});


</script>

<script type="text/javascript">
    $.getJSON('https://ipapi.co/json/', function(data) {
  //console.log(JSON.stringify(data, null, 2));
  // console.log(JSON.stringify(data.ip, null, 2));
     var newip = (JSON.stringify(data.ip, null, 2));
     var city = (JSON.stringify(data.city, null, 2));
     var state = (JSON.stringify(data.region, null, 2));
       var contry = (JSON.stringify(data.country_name, null, 2));
         var dataString = 'ip='+ newip+'&forpage=0'+'&city='+city+'&state='+state+'&contry='+contry;
        jQuery.ajax({
      type: "POST",
      url: base_url+'checkip/ipcheck',
      data: dataString,
      dataType: 'json',
      cache: false,
      success: function(response)
      {
        if(response.status == 200){ 
       // console.log("have");
        }else {
           // console.log("none have");
        }
      },
      error: function (response) {
      // $('#errorfield').show();
          }

    });
});
</script>
 

 <script type="text/javascript">
        $('#show-whyinfi').click(function(){
          $('#solutionm').addClass('not-visib'); 
          $('#whyinfi').toggleClass('not-visib'); 
        });
        $('#cls-whyinfi').click(function(){
          $('#whyinfi').toggleClass('not-visib'); 
        });

        $('#show-solution').click(function(){
          $('#whyinfi').addClass('not-visib'); 
          $('#solutionm').toggleClass('not-visib'); 
        });
        $('#cls-solutin').click(function(){
          $('#solutionm').toggleClass('not-visib'); 
        });



        $('.bigm-in-btn').click(function(){
          var visbdiv = this.id;
          $('.bigm-in-btn').removeClass('bgmactiv'); 
          $(this).addClass('bgmactiv'); 
          $('.soluinerb').hide(); 
          $('#'+visbdiv+'-blk').show(); 
        });




 </script>
</body>
</html>