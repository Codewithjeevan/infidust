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
</style>
<body class="hold-transition skin-blue sidebar-collapse">

    <!-- Main content -->
    <div class="container-fluid" style="padding: 0px; background-color: #fff;">

 
    <div class="row">
      <div class="col-md-12"> </div>
      <div class="col-md-3"> </div>
      <div class="col-md-6" style="padding:5% 7% 5% 7%;">
        <div class="login-blk">
         <div id="alert-wait" class="loder-blk" style="display:none">
              <div class="sbl-circ-path"></div>
            </div>
          <div class="col-md-12" align="center">
            <img src="<?php echo base_url().'assets-public/' ?>dist/img/logo-icon.png" width="40"><br>
            <h3>Reset password</h3>
            <p>to continue to Infi Dust</p>
          </div>
  <div class="col-md-12" id="contactblk">
           
  <div class="form-group">
    <!-- <label for="exampleInputEmail1" class="bmd-label-floating">Email address</label> -->
    <label for="" class="bmd-label-floating">Contact number</label>
    <input type="text" class="form-control" id="contact">
    <span class="bmd-help">We'll never share your contact with anyone else.</span>
  </div>
 
 
 <div class="form-group" style="height:140px;">
 
  <br><br>
        <span class="pull-left" id="alert-err1" style="color:red;display:none">User Not found!</span>
   <button type="button" id="letslogin" class="btn btn-primary btn-raised pull-right">Next</button>
  </div>
  
          </div>

<div id="otpblk" class="col-md-12" style="display:none">
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

<div id="newpassblk" class="col-md-12" style="display:none">
    <div class="form-group col-md-6" style="padding-top:30;">
    <input class="form-control" type="text" placeholder="New password" id="newpass">
  </div>
  <div class="form-group" style="height:80px;">
  <span class="pull-left" id="fielderror3" style="color:red;display:none">Enter Newpassword</span>
  <br>
   <button type="submit" id="addnewpass" class="btn btn-primary btn-raised pull-right">Submit</button>
  </div>
</div>


        </div>
       </div>
    </div>
    

<!-- <div class="cus-option-back"></div> -->
  

  <form name="photo" id="loginFrom" enctype="multipart/form-data" action="<?php echo base_url();?>auth/Redirect" method="post">
<input name="path" value="" type="hidden" id="putpath">
   
</form>
   


    
     
    



    <?php require_once('footerblank.php');?> 

<script type="text/javascript">
window.onload = function exampleFunction() { 
$('#contact').focus();
$('#password').val('');
}


   $('#signin').click(function() {
        $('#signupblk').hide();
        $('#loginblk').show();
        $('#signup').removeClass('cus-round5');
        $('#signup').addClass('cus-round4');
        $('#signin').removeClass('cus-round4');
        $('#signin').addClass('cus-round5');
         
   });


$('#letslogin').click(function(){     

//var password =$('#password').val();
var contact =$('#contact').val();

if(!contact){

          $('#fielderror').show();
        }else{

           $('#fielderror').hide();
            $('#alert-err1').hide();
            $('#alert-err2').hide();
           $('#alert-wait').show();
                  var dataString = 'contact='+ contact;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'auth/forgpass',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){ 
                  $('#alert-wait').hide();
                   $('#contactblk').hide();
                   $('#otpblk').show();
                }else{
                 
                  $('#alert-wait').hide();
                  $('#alert-err1').show();
                }
              },
              error: function (response) {
                $('#alert-wait').hide();
                  $("#alert-err1").show()
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
              url: base_url +'auth/Veryfy_data_fpass',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){
                  $('#alert-wait').hide();
                  $('#otpblk').hide();
                  $('#newpassblk').show();
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

$('#addnewpass').click(function(){     
  var newpass =$('#newpass').val();
  
if(!newpass){

          $('#fielderror3').show();
        }else{

           $('#fielderror3').hide();
           $('#alert-wait').show();
                  var dataString = 'newpass='+ newpass;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'auth/Veryfy_newpass',
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

</script>