
      

    </div>
    <!-- /.content -->



<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets-public/' ?>dist/js/adminlte.min.js"></script>
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

</body>
</html>