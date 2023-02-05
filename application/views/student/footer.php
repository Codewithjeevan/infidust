
      <div class="row" style="background:#fff; padding:5%; border-top:1px solid #ccc">
      <div class="col-md-3 cus-link" >
      <h3>COMPANY</h3><br>
      <a href="">About Us</a><br>
      <a href="">Privacy Policy</a><br>
      <a href="">Blog</a><br>
      </div>
       <div class="col-md-3 cus-link" >
      <h3></h3>
      <b>Mobile App</b><br><br>
      <a href="">Android</a><br>
      <a href="">IOS</a><br> 
      </div>
       <div class="col-md-3 cus-link" >
      <h3>Quick Links</h3><br>
      <a href="" class="opencontact">Help Center</a><br>
      <a href="">Terms and Conditions</a><br>
      <a href="">SmartReports</a><br>
      <a href="">Pricing</a><br>
      </div>
       <div class="col-md-3 cus-link" >
       <img src="<?php echo base_url().'assets-public/' ?>dist/img/logo.png" width="150"><br>
       <span style="position:relative;top:-8px; left:15px; font-size:12px; ">Making more simple</span><br>
       <span style="font-size:18px;">© PRIKPAY</span>
      <h3>Follow Us</h3>
      <a href="" style="font-size:18px;"><i class="fa fa-fw fa-facebook-square"></i></a>
      <a href="" style="font-size:18px;"><i class="fa fa-fw fa-instagram"></i></a>
      <a href="" style="font-size:18px;"><i class="fa fa-fw fa-linkedin-square"></i></a>
      <a href="" style="font-size:18px;"><i class="fa fa-fw fa-twitter-square"></i></a>
      <a href="" style="font-size:18px;"><i class="fa fa-fw fa-youtube-play"></i></a>
      </div>
      </div>

    </div>
    <!-- /.content -->



  <!-- Main Footer -->
  <footer class="main-footer" style="padding:1% 5% 1% 5%; font-size:12px;">
    <!-- To the right -->
 
    <strong>Copyright &copy; 2019 <a href="https://.com">Prikpay</a>.</strong> All rights reserved.
  </footer>


<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->


<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets-public/' ?>dist/js/adminlte.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="<?php echo base_url().'assets-public/' ?>dist/js/popper.js"></script>
<script src="<?php echo base_url().'assets-public/' ?>dist/js/bootstrap-material-design.js"></script>

 <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
 
<script type="text/javascript">
  $(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<script type="text/javascript">
    $.getJSON('https://ipapi.co/json/', function(data) {
  //console.log(JSON.stringify(data, null, 2));
   console.log(JSON.stringify(data.ip, null, 2));
     var newip = (JSON.stringify(data.ip, null, 2));
     var city = (JSON.stringify(data.city, null, 2));
     var state = (JSON.stringify(data.region, null, 2));
    //      var dataString = 'ip='+ newip+'&forpage=0'+'&city='+city+'&state='+state;
    //     jQuery.ajax({
    //   type: "POST",
    //   url: 'https://kamprik.com/checkip/ipcheck',
    //   data: dataString,
    //   dataType: 'json',
    //   cache: false,
    //   success: function(response)
    //   {
    //     if(response.status == 200){ 
    //     console.log("have");
    //     }else {
    //         console.log("none have");
    //     }
    //   },
    //   error: function (response) {
    //   // $('#errorfield').show();
    //       }

    // });
});
</script>
  <script type="text/javascript">

     
        $('.openlogin').click(function(){
          window.location.href = '<?php echo base_url()."login"; ?>';
        });
        $('.opencontact').click(function(){
          window.location.href = '<?php echo base_url()."contact"; ?>';
        });
        $('.openfeature').click(function(){
          window.location.href = '<?php echo base_url()."feature"; ?>';
        });
 </script>
</body>
</html>