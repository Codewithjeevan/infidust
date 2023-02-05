
  <!-- Content Wrapper. Contains page content -->
 
    <!-- Content Header (Page header) -->
    <section class="content-header" style="background: #fff;padding: 10px 15px 0 15px; height: 50px;-webkit-box-shadow: 0px 3px 7px -3px rgba(0,0,0,0.77);
-moz-box-shadow: 0px 3px 7px -3px rgba(0,0,0,0.77);
box-shadow: 0px 3px 7px -3px rgba(0,0,0,0.77);">
      <h1>
        Dashboard
        <small>admin</small>
      </h1><br>
      
    
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

    <div class="col-md-12" align="center"><br><br><br>
      <b>Your Manage panel is not setup yet. Please contact your main branch</b>
    </div>

    <div class="row">
      
    </div>
    </section>



<script type="text/javascript">

$(document).ready(function() {

 //var url = 'https://api.myjson.com/bins/b29r7';
 var bsid = '<?php echo $this->session->userdata("b_id")?>';
 var url = '<?php echo base_url()?>'+'homeapp/allhoardingadmin/'+bsid;

         $.ajax({
          url: url,
          method: 'GET',
          dataType:'json',
           cache: false,
         success:function(result) {
          console.log(result);
          // JSON data array
          var data = result;
          var cntad = '';
          var $datar = $('#selectbox');
          // rowbefore = '<option value="0">Search</option>';
            $.each(data, function( key, value ) {
          
           // row = value.show_o_id;

            row = 
            '<option value="'+value.bct_id+'"><span>'+value.adcode+' - '+value.short_name+'</span></option>'
            ;
             cntad += row;
            });

          //  $row.append('</ul>');
            $('#selectbox').append(cntad);
           },error:function(error) {
            console.error(error);
           }
       });

 $('select').on('change', function() {
  $('#putfind').html('');
  getrecord(this.value);
//  alert(this.value);
});

function getrecord(orderid){
 // alert(orderid);
  var ordid = orderid;
  $.ajax({
          url: '<?php echo base_url()?>'+'homeapp/chckadadmin/'+ordid,
          method: 'GET',
          dataType:'json',
           cache: false,
         success:function(result) {
          console.log(result);
          // JSON data array
          var data = result;
          var cntadr = '';
          // rowbefore = '<option value="0">Search</option>';
          brow = 
          '<table class="table table-hover">'+
                '<tbody><tr>'+
                  '<th>O.ID</th>'+
                  '<th>Ad Date.</th>'+
                  '<th>Status</th>'+
                '</tr>' ;
            $.each(data, function( key, value ) {
          var sdate = value.start_date.split("-");
          var sy = sdate[0];
          var sm = sdate[1];
          var sd = sdate[2];
          var s_date = sd+'/'+sm+'/'+sy;

          var edate = value.end_date.split("-");
          var ey = edate[0];
          var em = edate[1];
          var ed = edate[2];
          var e_date = ed+'/'+em+'/'+ey;

          var ostatus = value.status;
          if(ostatus == 0){
            showsts = '<small class="label label-warning">not started yet</small>';
          }else if(ostatus == 1){
            showsts = '<small class="label label-success">ongoing</small>';
          }
            row = 
                '<tr>'+
                  '<td>'+value.show_o_id+'</td>'+
                  '<td>'+s_date+' - '+e_date+'</td>'+
                  '<td>'+showsts+'</td>'+
                 
                '</tr>'
            ;
             cntadr += row;
            });
            arow = '</tbody></table>'
            ;
          //  $row.append('</ul>');
            $('#putfind').append(brow + cntadr + arow);
           },error:function(error) {
            console.error(error);
           }
       });


}

  });
   
        
</script>
<script type="text/javascript">

</script>
 <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
       format: "yyyy-mm-dd"
    })
    //Date picker
    $('#datepicker2').datepicker({
      autoclose: true,
       format: "yyyy-mm-dd"
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<!-- jQuery 3 -->
