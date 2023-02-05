  
<style type="text/css">
 
</style>

  <div class="row ">
  
      <div class="col-md-6 " align="" style="color:;padding:0% 2% 5% 0%;">
      <div class="box-sdow" align="" style="color:;padding:5% 3% 5% 1%;">
      <div class="col-md-12 body-data" style="padding-bottom:10px;"> <h3><i class="fa fa-fw fa-archive"></i> &nbsp;&nbsp;Setup subjects</h3></div>
       


      <div id="" class="col-md-12 " align="" style="height:370px; overflow-x:hidden;overflow-y:scroll; display:;">
        <div class="respopad40">
         <div class="form-group">
            <label for="exampleSelect1" class="bmd-label-floating">Select type/course</label>
            <input type="hidden" value="0" id="thisubid">
            <select class="form-control" id="mycours">
              <?php foreach ($mycourse as $mycourse) { 
               ?>
              <option value="<?php echo $mycourse['mycours_id']; ?>"><?php echo $mycourse['cours_nm']; ?></option>
               <?php } ?>
             
            </select>
          </div>
           <div class="form-group">
            <label for="entersub" class="bmd-label-floating">Enter Subject Name</label>
            <input type="text" class="form-control" id="entersub" placeholder="">
            <span class="bmd-help">Please do not enter multiple at onece, add one by one</span>
          </div>
          <button id="letsadsub" class="btn btn-primary btn-raised">Submit</button>
        </div>
      </div>

      
      </div>
      </div>

     <div class="col-md-6" align="" style="color:;padding:0% 0% 5% 0%; ">
      <div class="box-sdow" align="" style="color:;padding:5% 0% 5% 1%;">
      <div class="col-md-12 body-data" style="padding-bottom:10px;"> <h3><i class="fa fa-fw fa-magic"></i> &nbsp;&nbsp;Settled subject </h3></div>
      <div id="mycourselist" class="col-md-12  " align="" style="height:460px; overflow-x:hidden;overflow-y:scroll;">
     
      
      </div>
      </div> 
      </div> 
    </div>



    <script type="text/javascript">
   $(document).ready(function() {
           // $("#allcours-val").load('<?php echo base_url()."dashboard/institue_allcourdef/0"; ?>');
             $("#mycourselist").load('<?php echo base_url()."dashboard/institue_mysubject"; ?>');


        });


   $(document).on('click', '.changcatgo', function(){  
   var catid = this.id;
   $("#allcours-val").html('');
  $("#allcours-val").load('<?php echo base_url()."dashboard/institue_allcourdef/"; ?>'+catid);
   });  

 $(document).on('click', '.catitemid', function(){  
   var catid = this.id;
  $('.addthiscatitems_'+catid).show();
});
    $(document).on('click', '.canclethiscat', function(){  
   var catid = this.id;
  $('.addthiscatitems_'+catid).hide();
});
$('#letsadsub').click(function(){ 
     var newrsub = $('#entersub').val();
        var mycours = $('#mycours').val();
        var mycours = $('#mycours').val();
        var thisubid = $('#thisubid').val();

  if(!newrsub){

  }else{
       
  $('#fielderror').hide();
            $('#chkmsg').hide();
           $('#alert-wait').show();
                  var dataString = 'newrsub='+ newrsub+'&mycours='+ mycours+'&thisubid='+ thisubid;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'dashboard/Addnewsubjet',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){ 
                
                 $("#mycourselist").load('<?php echo base_url()."dashboard/institue_mysubject"; ?>');

                   $('#alert-wait').delay().slideUp(); 
                  $('#alert-suc').delay(2000).show().slideUp(); 
                  $('#entersub').val('');
                  
                }else if(response.status == 204){
                  $('#chkmsg').show().delay(2000).fadeOut();
                   $('#alert-wait').delay().slideUp(); 
                 
                }
              },
              error: function (response) {
            
                  $('#alert-wait').delay().slideUp(); 
                $('#alert-err').delay(2000).show().slideUp();
                  }

            }); 
    }
});
   
  $(document).on('click', '.remvmysub', function(){  

  var catid = this.id;
  //console.log(catid);
  $('#fielderror').hide();
            $('#chkmsg').hide();
           $('#alert-wait').show();
                  var dataString = 'catid='+ catid;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'dashboard/Revmysub',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){ 
                
                 $("#mycourselist").load('<?php echo base_url()."dashboard/institue_mysubject"; ?>');

                    $('#alert-wait').delay().slideUp(); 
                  $('#alert-suc').delay(2000).show().slideUp(); 
               
                }else if(response.status == 204){
                  $('#chkmsg').show();
                   $('#alert-wait').delay().slideUp(); 
                 
                }
              },
              error: function (response) {
            
                  $('#alert-wait').delay().slideUp(); 
                $('#alert-err').delay(2000).show().slideUp();
                  }

            }); 
});


$(document).on('click', '.modirysub', function(){
   var id = this.id;
   var splitid = id.split("*");
        var subjid = splitid[0];
        var mycrsid = splitid[1];
        var subjectnm = splitid[2];
         $('#mycours').val(mycrsid).trigger('change');
         $('#entersub').val(subjectnm);
         $('#thisubid').val(subjid);
});
 


    </script>