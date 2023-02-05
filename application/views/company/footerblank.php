
 



<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets-public/' ?>dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url().'assets-public/' ?>dist/js/popper.js"></script>
<script src="<?php echo base_url().'assets-public/' ?>dist/js/bootstrap-material-design.js"></script>
<script src="<?php echo base_url().'assets-public/' ?>dist/js/navigator_admin.js"></script>

 <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

<script type="text/javascript">
window.onload = function onetchap() { 
    $('.onet-ap-bk').show().delay(3000).fadeOut();
}
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
<script>
  var goFS = document.getElementById("goFS");
  goFS.addEventListener("click", function() {
     // document.body.requestFullscreen();
  }, false);
</script>
</body>
</html>