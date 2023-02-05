
 



<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets-public/' ?>dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url().'assets-public/' ?>dist/js/popper.js"></script>
<script src="<?php echo base_url().'assets-public/' ?>dist/js/bootstrap-material-design.js"></script>
<script src="<?php echo base_url().'assets-public/' ?>dist/js/navigator_student.js"></script>

 <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
 
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

</body>
</html>