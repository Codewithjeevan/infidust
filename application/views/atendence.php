
  <!-- Content Wrapper. Contains page content -->
   <!-- DataTables -->

    <!-- Content Header (Page header) -->
  <!--   <section class="content-header" style="background: #fff;padding: 10px 15px 0 15px; height: 50px;-webkit-box-shadow: 0px 3px 7px -3px rgba(0,0,0,0.77);
-moz-box-shadow: 0px 3px 7px -3px rgba(0,0,0,0.77);
box-shadow: 0px 3px 7px -3px rgba(0,0,0,0.77);">
      <h1>
        Dashboard
        <small>admin</small>
      </h1><br>
      
    
    </section> -->
<style type="text/css">
  .dataTables_length { display: none; }
  .dataTables_filter input { border:1px solid #ccc; padding: 5px; }
</style>
    <!-- Main content -->
    <section class="content container-fluid">



    <div class="row">
    <div class="col-lg-6">
       <div class="box box-primary" style="position: relative; left: 0px; top: 0px;">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Modify for Branch</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <select class="form-control select2" id="selectboxbr" name="hoarding" style="width: 100%;">
                  <option value="0" selected="selected">-- Select --</option>
                  <?php
                  foreach($brnchlist as $brnchlist)
                  {?>
                  <option value="<?php echo $brnchlist['brn_id'];?>*<?php echo $brnchlist['br_name'];?>*<?php echo $brnchlist['cl_id'];?>"><?php echo $brnchlist['br_name'];?></option>
                 <?php }?>
                </select>
                <div class="col-lg-12 table-responsive no-padding" id="putfind">
                </div>
            </div>
            </div>

            <div class="box box-primary" style="position: relative; left: 0px; top: 0px;">
          
              <input type="hidden" name="brnchcl_id" id="brncl_id">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Make Attendance for :: <b><span id="showbrnm" data-toggle="tooltip" data-placement="right" title=""></span></b></h3>
              <input type="hidden" name="probranid" id="getbrid" value="0"><input type="hidden" id="getpoid" name="mainproid" value="0">
              <button type="button" class="btn btn-info btn-flat pull-right">TODAY ATTENDANCE</button>
            </div>
            <!-- /.box-header -->
            <div class="form-horizontal">
              <div class="box-body" id="putmakeatend">
              
            
               
              </div>
           
              <!-- /.box-footer -->
            </div>
           
          </div>
    </div>

    <div class="col-md-6" id="prolists">
               
            </div>
    </div>
    <div class="row">
       
    </div>
    </section>
<script type="text/javascript">
  $('#selectboxbr').on('change', function() {
     var val = this.value;
     var splitid = val.split("*");
     var br_id = splitid[0];
     $('#brncl_id').val(splitid[2]);
     $('#showbrnm').html(splitid[1]);
     $('#showbrnm').attr("title", splitid[1]);
     $('#showbrnm').text($('#showbrnm').text().substring(0,10)+'..');
     $('#getbrid').val(br_id);
    $("#putmakeatend").load('<?php echo base_url()."atendence/Makeatenlist/"; ?>'+br_id );
    $("#prolists").load('<?php echo base_url()."atendence/Recordlist/"; ?>'+br_id );
    $('#employnm').val('');
    $('#ememail').val('');
        $('#emcontact').val('');
        $('#addnewitem').show();
        $('#updateitem').hide();

  //alert( this.value );
});
</script>
<script type="text/javascript">
  $(document).ready(function() {
            $("#prolists").load('<?php echo base_url()."atendence/Recordlist/0"; ?>');
            var brnnmlimit = $('#showbrnm');
              brnnmlimit.text(brnnmlimit.text().substring(0,10)+'..');
            $('[data-toggle="tooltip"]').tooltip();  

              timechk();
            setInterval(function(){ timechk(); }, 30000);
             function timechk(){
              var getbrid = $('#getbrid').val();
                if(getbrid === '0'){

                }else{
                  $("#putmakeatend").load('<?php echo base_url()."atendence/Makeatenlist/"; ?>'+getbrid );
                  console.log("time update");
                  
                }
             }
            
        });
   $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    $('.select3').select2()
     //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
    $('.timepicker2').timepicker({
      showInputs: false
    })
   })
</script>
<script type="text/javascript">
 var loadFile = function(event) {
    var outpuimg = document.getElementById('outpuimg');
    outpuimg.src = URL.createObjectURL(event.target.files[0]);
  };

  $('#addnewitem').click(function(){
    var brncl_id = $('#brncl_id').val();
    var employnm = $('#employnm').val();
    var emcontact = $('#emcontact').val();
    
    if(!employnm || !emcontact || !brncl_id){
      $('#fielderror').show();
    }else{
      $('#imageUploadForm').submit();
    }
  });
  $('#updateitem').click(function(){
    var brncl_id = $('#brncl_id').val();
    var employnm = $('#employnm').val();
    var emcontact = $('#emcontact').val();
    if(!employnm || !emcontact || !brncl_id){
      $('#fielderror').show();
    }else{
      $('#imageUploadForm').submit();
    }
  });

  $(document).ready(function (e) {
   
    $('#imageUploadForm').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var forbrn = $('#getbrid').val();
         
         $('#fielderror').hide();
            $('#chkmsg').hide();
           $('#alert-wait').show();
        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
               // console.log("success");
                //console.log(data);
               $('#alert-wait').hide();
                $("#alert-suc").show().delay(5000).fadeOut();
                $("#prolists").load('<?php echo base_url()."employe/Employelist/"; ?>'+forbrn);
                $('#employnm').val('');
                $('#ememail').val('');
                 $('#emcontact').val('');
                 $('#getpoid').val('0');
                  $('#addnewitem').show();
                $('#updateitem').hide();
                 
                 var outpuimg = document.getElementById('outpuimg');
                 outpuimg.src = '';
                 
            },
            error: function(data){
                console.log("error");
                console.log(data);
                 $('#alert-wait').hide();
                   $("#alert-err").show().delay(5000).fadeOut();
            }
        });
        

    }));
  

});

</script>

<!-- jQuery 3 -->
