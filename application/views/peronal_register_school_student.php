<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register with student panel to <?php echo $personaldata['insti_nm'] ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link href="<?php echo base_url().'assets-public/' ?>dist/img/favicon.png" rel="shortcut icon" type="image/png">
   <meta name="description" content="Register with student panel of infidust in institute/school of <?php echo $personaldata['insti_nm'] ?>"/>
  <meta name="keywords" content="infidust signup, <?php echo $personaldata['insti_nm'] ?> register, infidust login" />

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
          <div class="col-md-12" align="" style="position:relative">
          
            <img src="<?php echo base_url().'assets/' ?>pro-sml/<?php echo $personaldata['pro_pic'] ?>" width="70" style="border-radius:5px">
            <div style="position:absolute; top:0;left:100px">
            <h3><?php echo $personaldata['insti_nm'] ?></h3>
            </div>
             </div>
          <div class="col-md-12" align="" style="padding-top:30px">
            <h4>Create your Account</h4>
            <p>to continue to Infi Dust</p>
          </div>


  <div id="signupblk" class="col-md-12">
            <form>
    <div style="height:20px;"></div>
    <div class="row">
    <div id="contact_blk" class="col-md-6" style="padding:0;">
   <div class="form-group res-in-pd">
    <label for="" class="">Contact No.</label>
    <input type="contact" class="form-control " id="contact" placeholder="Enter Contact Number" maxlength="10">
    <input type="hidden" class="form-control " id="instid" value="<?php echo $personaldata['mem_id'] ?>">
    <!-- <span class="bmd-help">Otp will be send.</span> -->
  </div>
   </div>

   
     <div id="havestudent" class="col-md-12" style="padding:0;display:none">
       Hello, <b class="shonm"></b><br>
       Please continue to join in <b id="shoschlnm"><?php echo $personaldata['insti_nm'] ?></b>
     </div>
     <div id="haveotherac" class="col-md-12" style="padding:0;display:none">
       Hello, <b class="shonm"></b><br>
       It seems your account is not in student account!
     </div>
     <div id="aldyjoined" class="col-md-12" style="padding:0;display:none">
       Hello, <b class="shonm"></b><br>
       It seems you are already joined!
     </div>



    <div id="newdataform" class="row" style="display:none">
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
      </div>
    </div>
    <div class="col-md-6 " style="padding:0;">
      <div class="form-group res-in-pd">
       <label for="exampleInputPassword1" class="bmd-label-floating">Email </label>
       <input type="email" class="form-control" id="cusemail">
      </div>
     </div>
     <div class="col-md-6" style="padding:0;">
       <div class="form-group">
        <label for="exampleInputEmail1" class="bmd-label-floating">Password</label>
        <input type="Password" class="form-control " id="cuspassword" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false;">
      </div>
    </div>
     

  </div>

  <div id="newdataform_crs" class="col-md-12" style="padding:0px;display:none">
  <div class="col-md-12" style="padding:0px 0px 10px 0px;">
       <a href="#" class="blue-link " href="#" role="button" data-toggle="modal" data-target="#actypmodal">Select Class/course type <i class="fa fa-fw fa-chevron-down"></i></a>
    </div>
    <div class="col-md-12" style="padding:0px 0px 10px 0px;">
      <div class="box-actyp" data-toggle="modal" data-target="#actypmodal">
        <i class="fa fa-fw fa-angle-right"></i> &nbsp;<span id="showactyp">Class/course</span>
      </div>
    </div>
  </div>


    
<div id="ac-crt-join" class="col-md-12" style="padding:0;display:none">
  Account created and joined! Please go to login.
</div>
    
<div id="ac-only-join" class="col-md-12" style="padding:0;display:none">
  Successful joined! Please go to login.
</div>

<div class="col-md-12" style="padding:0;">
  
 <div class="form-group" style="height:80px;"><br>
  <!-- <a href="#" class="blue-link">Sign in</a><br> -->
  <span class="pull-left" id="fielderror" style="color:red;display:none">Enter all field</span>
   <button type="button" id="checknumber" class="btn btn-primary btn-raised pull-right">Next</button>
   <button type="button" id="nextjoin" class="btn btn-primary btn-raised pull-right" style="display:none">Continue</button>
   <button type="button" id="newsignup" class="btn btn-primary btn-raised pull-right" style="display:none">Sign Up</button>
   <a id="gotologin" href="<?php echo base_url().'login' ?>" style="display:none"><button type="button"  class="btn btn-primary btn-raised pull-right" >Go to login</button></a>
  </div>
  
 </div>


  
</form>
 </div>

 <div style="border-top:1px solid #ddd;padding-top:10px;" align="center">
   <div class="col-md-12" align="center" style="opacity:0.5">
            <img src="<?php echo base_url().'assets-public' ?>/dist/img/logo-icon.png" width="20"> Infidust
            
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
        <h5 class="modal-title" id="exampleModalLongTitle">Select</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="hidden" id="coursid" value="">
      <?php foreach ($mycourse as $key => $value) {
      ?>
      <div class="col-md-12" style="padding:0;">
        <div class="radio">
          <label style="color:#000">
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="<?php echo $value['mycours_id']?>" onclick="getcoursid('<?php echo $value['mycours_id']?>');">
            <?php echo $value['cours_nm']?>
          </label>
        </div>
      </div>
      <?php } ?>
   
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

    <?php require_once('footerblank.php');?> 
<script type="text/javascript">

window.onload = function exampleFunction() { 

  
} 
function getcoursid(coursid){
$('#coursid').val(coursid);
}
var checked_contact = 0;

$('#checknumber').click(function(){     
var contact =$('#contact').val();
var instid =$('#instid').val();

if(!contact){

          $('#fielderror').show();
        }else{

           $('#fielderror').hide();
            $('#already-exist').hide();
            $('#alert-err').hide();
           $('#alert-wait').show();
                  var dataString = 'contact='+ contact+'&instid='+ instid;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'auth/Schoolreg_chknum',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {

                if(response.status == 200){ 
                 $('#alert-wait').hide();
                 $('#newdataform').show();
                 $('#newdataform_crs').show();
                 $('#newsignup').show();

                   $('#havestudent').hide();
                   $('#aldyjoined').hide();
                   $('#haveotherac').hide();
                   $('#nextjoin').hide();
                   $('#checknumber').hide();
                   
                }else if(response.status == 203){
                   $('#alert-wait').hide();
                   $('#havestudent').show();
                   $('#haveotherac').hide();
                   $('#aldyjoined').hide();
                   $('#nextjoin').show();
                   $('#newdataform_crs').show();
                   $('#checknumber').hide();
                   $('.shonm').html(response.name);
                 
                }else if(response.status == 201){
                   $('#alert-wait').hide();
                   $('#aldyjoined').show();
                   $('#haveotherac').hide();
                   $('#havestudent').hide();
                   $('#nextjoin').hide();
                    $('#checknumber').show();
                     $('.shonm').html(response.name);
                }else if(response.status == 204){
                   $('#alert-wait').hide();
                  $('#haveotherac').show();
                  $('#aldyjoined').hide();
                   $('#havestudent').hide();
                   $('#nextjoin').hide();
                    $('#checknumber').show();
                     $('.shonm').html(response.name);
                }
                checked_contact = contact;
              },
              error: function (response) {
            
                  $("#alert-err").show()
                //location.reload();
                  }

            });

        
       }

});



$('#newsignup').click(function(){     
  var cusfname =$('#cusfname').val();
  var cuslname =$('#cuslname').val();
var cusemail =$('#cusemail').val();
var cuspassword =$('#cuspassword').val();
var instid =$('#instid').val();
var coursid =$('#coursid').val();


if(!cusfname || !cuslname || !cusemail || !cuspassword || !checked_contact || !coursid){

          $('#fielderror').show();
        }else{

           $('#fielderror').hide();
            $('#already-exist').hide();
            $('#alert-err').hide();
           $('#alert-wait').show();
                  var dataString = 'cusfname='+ cusfname+'&cuslname='+cuslname+'&cusemail='+cusemail+'&cuspassword='+cuspassword+'&contact='+checked_contact+'&instid='+instid+'&coursid='+coursid;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'auth/Personal_student_reg',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){ 
                 $('#alert-wait').hide();
                 $('#contact_blk').hide();
                 $('#newdataform').hide();
                 $('#newsignup').hide();
                 $('#gotologin').show();
                 $('#ac-crt-join').show();
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


$('#nextjoin').click(function(){     
var instid =$('#instid').val();
var coursid =$('#coursid').val();


if(!coursid){

          $('#fielderror').show();
        }else{

           $('#fielderror').hide();
            $('#already-exist').hide();
            $('#alert-err').hide();
           $('#alert-wait').show();
                  var dataString = 'contact='+checked_contact+'&instid='+instid+'&coursid='+coursid;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'auth/Personal_student_join',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                console.log(response.status);
                if(response.status == 200){ 
                 $('#alert-wait').hide();
                 $('#contact_blk').hide();
                 $('#newdataform').hide();
                 $('#havestudent').hide();
                 $('#newdataform_crs').hide();
                 $('#newsignup').hide();
                 $('#nextjoin').hide();
                 $('#gotologin').show();
                 $('#ac-only-join').show();
                }else if(response.status == 203){
                  $('#alert-wait').hide();
                  $('#alert-err').show();
                }
              },
              error: function (response) {
            
                  $("#alert-err").show()
                //location.reload();
                  }

            });

        
       }

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