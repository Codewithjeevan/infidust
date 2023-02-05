<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link href="<?php echo base_url().'assets-public/' ?>dist/img/favicon.png" rel="shortcut icon" type="image/png">
  <meta name="description" content=""/>
  <meta name="keywords" content="" />

  <?php require_once('cssinclude.php');?> 

  
</head>

<style type="text/css">
 
  .ac-for { color: #479f12}
  .loder-blk { position: absolute; top: 0;left: 0; width: 100%; height: 100%; background: rgba(255,255,255,0.6); z-index: 99;}
  .box-actyp { border:1px solid #000; padding: 7px 10px 7px 10px; border-radius: 7px}
</style>
<body class="hold-transition skin-blue sidebar-collapse">

    <!-- Main content -->
    <div class="container-fluid" style="padding: 0px; background-color: #fff;">

 
    <div class="row">
      <div class="col-md-12"> </div>
      <div class="col-md-3"> </div>
      <div class="col-md-6" style="padding:5% 5% 5% 5%;">
        <div class="login-blk">

            <div id="alert-wait" class="loder-blk" style="display:none">
              <div class="sbl-circ-path"></div>
            </div>
          <div class="col-md-12" align="">
             <a href="<?php echo base_url()?>"><img src="<?php echo base_url().'assets-public/' ?>dist/img/logo-icon.png" width="40"></a><br>
            <h3>Create your Account</h3>
            <p>to continue to Infi Dust</p>
          </div>


  <div id="signupblk" class="col-md-12">
            <form>
    <div style="height:20px;"></div>
    <div class="row">
    <div class="col-md-12" style="padding:0px 0px 10px 0px;">
       <a href="#" class="blue-link " href="#" role="button" data-toggle="modal" data-target="#actypmodal">Select Account type <i class="fa fa-fw fa-chevron-down"></i></a>
    </div>
    <div class="col-md-12" style="padding:0px 0px 10px 0px;">
      <div class="box-actyp" data-toggle="modal" data-target="#actypmodal">
        <i class="fa fa-fw fa-angle-right"></i> &nbsp;<span id="showactyp">Account Type</span>
      </div>
    </div>
   
  </div>
  <div class="form-group">
     <input type="hidden" id="putacfor" value="">
     <input type="hidden" id="sub_putacfor" value="">
  </div>
            <div class="row">
   <div class="col-md-6 " style="padding:0;">
   <div class="form-group res-in-pd">
    <label for="exampleInputEmail1" class="bmd-label-floating">First name</label>
    <input type="text" class="form-control " id="cusfname">
  </div>
   </div>
   <div class="col-md-6 " style="padding:0;">
   <div class="form-group ">
    <label for="exampleInputEmail1" class="bmd-label-floating">Last name</label>
    <input type="text" class="form-control " id="cuslname">
  </div></div>
</div>
  

  <div class="form-group forinstu" style="display:none">
    <label for="exampleInputPassword1" class="bmd-label-floating">Institute/Tution name </label>
    <input type="text" class="form-control" id="instuname">
  </div>

  <div class="form-group forinstu" style="display:none">
    <label for="exampleInputPassword1" class="bmd-label-floating">Currently student strength</label>
    <input type="text" class="form-control" id="instuss">
    <span class="bmd-help">Ex. 0-10 / 20-40 / 50-100 / 100-150</span>

  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" class="bmd-label-floating">Email </label>
    <input type="email" class="form-control" id="cusemail">
  </div>

         <div class="row">
   <div class="col-md-6" style="padding:0;">
   <div class="form-group res-in-pd">
    <label for="" class="bmd-label-floating">Contact No.</label>
    <input type="contact" class="form-control " id="contact" maxlength="10">
    <span class="bmd-help">Otp will be send.</span>
  </div>
   </div>
   <div class="col-md-6" style="padding:0;">
   <div class="form-group">
    <label for="exampleInputEmail1" class="bmd-label-floating">Password</label>
    <input type="Password" class="form-control " id="cuspassword" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false;">
  </div>
  </div>
</div>
  
 <div class="form-group" style="height:80px;"><br>
  <!-- <a href="#" class="blue-link">Sign in</a><br> -->
  <span class="pull-left" id="fielderror" style="color:red;display:none">Enter all field</span>
  <span class="pull-left" id="alert-err" style="color:red;display:none">Something went wrong</span>
  <span class="pull-left" id="already-exist" style="color:red;display:none">Contact no. already exist</span>
   <button type="button" id="letssignup" class="btn btn-primary btn-raised pull-right">Next</button>
  </div>
  
 
  
</form>
 </div>


<div id="otpblk" class="col-md-12" style="display:none">
    <span>OTP sent in your contact number & email address.</span>
    <div class="form-group col-md-6" style="padding:0;">
    <input class="form-control form-control-lg" type="text" placeholder="Enter OTP" id="inotp">
  </div>
  <div class="form-group" style="height:80px;">
  <span class="pull-left" id="fielderror2" style="color:red;display:none">Enter otp</span>
  <span class="pull-left" id="alert-err2" style="color:red;display:none">Invalid otp</span>
  <br>
  <a href="#" id="resendotp" class="blue-link">Resend</a> <span id="otpgntik" class=" ac-for" style="display:none;"><i class="fa fa-fw fa-check"></i></span>
   <button type="submit" id="votp" class="btn btn-primary btn-raised pull-right">Submit</button>
  </div>
</div>


        </div>
       </div>
    </div>
    

<!-- <div class="cus-option-back"></div> -->
  

<!-- Modal -->
<div class="modal fade" id="actypmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Account Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="col-md-12" style="padding:0;">
        <div class="radio">
          <label style="color:#000">
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" onclick="putacnt('student');">
            Student
          </label>
        </div>
       
    </div>
    <div class="col-md-12" style="padding:0;">
        <div class="radio">
          <label style="color:#000">
            <input type="radio" name="optionsRadios" id="ind-tea" value="Individual Teacher" onclick="putacnt('ind-tea');">
            Individual Teacher
          </label>
        </div>
     
    </div>
    <div class="col-md-12" style="padding:0;">
       <div class="radio">
          <label style="color:#000">
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" onclick="putacnt('tution');">
            Tution
          </label>
        </div>
    </div>
    <div class="col-md-12" style="padding:0;">
        <div class="radio">
          <label style="color:#000">
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" onclick="putacnt('institute');">
            Institute
          </label>
        </div>
    </div>
    <div class="col-md-12" style="padding:0;">
        <div class="radio">
          <label style="color:#000">
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" onclick="putacnt('academy');">
            Academy
          </label>
        </div>
    </div>
    <div class="col-md-12" style="padding:0;">
        <div class="radio">
          <label style="color:#000">
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" onclick="putacnt('school');">
            School
          </label>
        </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>
   


    <form name="photo" id="loginFrom" enctype="multipart/form-data" action="<?php echo base_url();?>auth/Redirect" method="post">
<input name="path" value="" type="hidden" id="putpath">
   
</form>
     
    
<?php if(@$_GET['for']){ ?>
 <input id="thisplan" type="hidden" value="<?php echo @$_GET['for']; ?>">  
 <?php } else { ?> 
 <input id="thisplan" type="hidden" value="free">   
 <?php } ?> 


    <?php require_once('footerblank.php');?> 
<script type="text/javascript">

window.onload = function exampleFunction() { 

  
} 

function putacnt(acfor){
      if(acfor == 'tution'){
          $('#putacfor').val('institute');
          $('#sub_putacfor').val('tution');
          $('#showactyp').html('Tution');
        }else if(acfor == 'institute'){
          $('#putacfor').val('institute');
          $('#sub_putacfor').val('institute');
          $('#showactyp').html('Institute');
        }else if(acfor == 'student'){
          $('#putacfor').val('student');
          $('#sub_putacfor').val('student');
           $('#showactyp').html('Student');
        }else if(acfor == 'ind-tea'){
         $('#putacfor').val('institute');
         $('#sub_putacfor').val('ind-tea');
         $('#showactyp').html('Individual Teacher');
        }else if(acfor == 'academy'){
         $('#putacfor').val('institute');
         $('#sub_putacfor').val('academy');
         $('#showactyp').html('Academy');
        }else if(acfor == 'school'){
         $('#putacfor').val('institute');
         $('#sub_putacfor').val('school');
         $('#showactyp').html('School');
        }
         setTimeout(function(){ $('#actypmodal').modal('hide');}, 400);
}



var userid = '';

   $('.cacfor').click(function() {
        var id = this.id;
        $('.ac-for').hide();
        $('#sh_'+id).show();
        if(id == 'institute' || id == 'tution'){
          $('.forinstu').show();
        }else{
          $('.forinstu').hide();
        }
         if(id == 'tution'){
          $('#putacfor').val('institute');
        }else{
          $('#putacfor').val(id);
        }
        
   });

 



$('#letssignup').click(function(){     
  var cusfname =$('#cusfname').val();
  var cuslname =$('#cuslname').val();
var cusemail =$('#cusemail').val();
var cuspassword =$('#cuspassword').val();
var putacfor =$('#putacfor').val();
var sub_putacfor = $('#sub_putacfor').val();

var contact =$('#contact').val();
var instuname =$('#instuname').val();
var instuss =$('#instuss').val();

var thisplan =$('#thisplan').val();

if(!cusfname || !cuslname || !cusemail || !cuspassword || !contact || !putacfor){

          $('#fielderror').show();
        }else{

           $('#fielderror').hide();
            $('#already-exist').hide();
            $('#alert-err').hide();
           $('#alert-wait').show();
                  var dataString = 'cusfname='+ cusfname+'&cuslname='+cuslname+'&cusemail='+cusemail+'&cuspassword='+cuspassword+'&putacfor='+putacfor+'&instuname='+instuname+'&contact='+contact+'&instuss='+instuss+'&sub_putacfor='+sub_putacfor+'&thisplan='+thisplan;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'auth/Uewuser',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){ 
                 $('#alert-wait').hide();
                 $('#signupblk').hide();
                 $('#otpblk').show();
                }else if(response.status == 203){
                  $('#alert-wait').hide();
                  $('#alert-err').show();
                }else if(response.status == 204){
                  $('#alert-wait').hide();
                   $('#already-exist').show();
                }
              },
              error: function (response) {
            
                  $("#alert-err").show()
                //location.reload();
                  }

            });

        
       }

});

$('#votp').click(function(){     
  var inotp =$('#inotp').val();
  
if(!inotp){

          $('#fielderror2').show();
        }else{

           $('#fielderror').hide();
            $('#alert-err2').hide();
           $('#alert-wait').show();
                  var dataString = 'inotp='+ inotp;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'auth/Veryfy_data',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 201){
                $('#putpath').val('institue_panel');
                 $('#loginFrom').submit();
                }else if(response.status == 202){
                  $('#putpath').val('student_panel');
                 $('#loginFrom').submit();
                }else if(response.status == 204){
                 $('#putpath').val('teacher_panel');
                 $('#loginFrom').submit();
                }else if(response.status == 203){
                  $('#alert-wait').hide();
                  $('#alert-err2').show();
                }
              },
              error: function (response) {
            $('#alert-wait').hide();
                  $("#alert-err2").show()
                //location.reload();
                  }

            });

        
       }

});

$('#resendotp').click(function(){     


           $('#fielderror').hide();
            $('#alert-err2').hide();
           $('#alert-wait').show();
                  var dataString = 'ok=ok';
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'auth/Resendotp',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){ 
                $('#alert-wait').hide();
                 $("#otpgntik").show().delay(5000).fadeOut();
                
                }else if(response.status == 203){
                 // $('#alert-wait').hide();
                 // $('#alert-err2').show();
                }
              },
              error: function (response) {
            
                 // $("#alert-err2").show()
                //location.reload();
                  }

            });

        

});


 var specialKeys = new Array();
     specialKeys.push(8);  //Backspace
     specialKeys.push(9);  //Tab
     specialKeys.push(46); //Delete
     specialKeys.push(36); //Home
     specialKeys.push(35); //End
     specialKeys.push(37); //Left
     specialKeys.push(39); //Right
     
     function IsAlphaNumeric(e) {
         var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
         var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
        // document.getElementById("error").style.display = ret ? "none" : "inline";
         return ret;
     }

</script>