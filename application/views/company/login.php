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
            <h3>Sign in</h3>
            <p>to continue to Infi Dust</p>
          </div>
          <div class="col-md-12">
           
  <div class="form-group">
    <!-- <label for="exampleInputEmail1" class="bmd-label-floating">Email address</label> -->
    <label for="" class="bmd-label-floating">Contact number</label>
    <input type="text" class="form-control" id="contact">
    <span class="bmd-help">We'll never share your contact with anyone else.</span>
  </div>
  <div class="form-group">
    <label for="" class="bmd-label-floating">Password</label>
    <input type="password" class="form-control" id="password">
  </div>
 
 <div class="form-group" style="height:140px;">
  <a href="<?php echo base_url().'forgotpass' ?>" class="blue-link2">Forget password</a><br><br>
  <a href="<?php echo base_url().'register' ?>" class="blue-link " href="#"  role="button" >Create account</a>
      
  <br><br>
        <span class="pull-left" id="alert-err1" style="color:red;display:none">User Not found!</span>
        <span class="pull-left" id="alert-err2" style="color:red;display:none">Wrong Password</span>
   <button type="button" id="letslogin" class="btn btn-primary btn-raised pull-right">Login</button>
  </div>
  
 
  

          </div>
        </div>
       </div>
    </div>
 

  

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

var password =$('#password').val();
var contact =$('#contact').val();

if(!password || !contact){

          $('#fielderror').show();
        }else{

           $('#fielderror').hide();
            $('#alert-err1').hide();
            $('#alert-err2').hide();
           $('#alert-wait').show();
                  var dataString = 'contact='+ contact+'&password='+password;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'auth/Clogin',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 205){ 
                  $('#putpath').val('admin_panel');
                 $('#loginFrom').submit();
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

</script>