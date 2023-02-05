
      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url().'assets-public/' ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url().'assets-public/' ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets-public/' ?>dist/js/adminlte.min.js"></script>
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