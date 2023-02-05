  <div class="row body-data" style="padding-top:20px;padding-bottom:10px; position:relative">
  <h3 style="font-family: 'Montserrat';">General Account Settings</h3>
  <div style="position:absolute; right:0;">
  <!-- <button id="crt-vid-pop" type="button" class="btn btn-outline-secondary "><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/plus-v.png" width="21"> &nbsp;<span style="color:#000; font-weight:bold;">CREATE VIDEO</span></button> -->
  </div>
</div>
  <div class="row">
    <div class="col-md-12 box-sdow seting-data" style="padding:50px 20% 50px 50px;">
    
    <div id="accordion" >
  <div class="card" style="box-shadow:none">
    <div class="card-header" id="headingOne" style="padding:15px 0px 15px 0px; border-bottom:none;border-top:1px solid #ddd">
      <div class="row" style="position:relative">
      <div class="col-md-3"><b>Name</b></div>
      <div class="col-md-9"><?php echo $memberdata['cus_fname'] ?> <?php echo $memberdata['cus_lname'] ?></div>
        <button class="btn btn-info pull-right" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="position:absolute;right:0;top:-8px">
          <i class="fa fa-fw fa-pencil "></i>
        </button>
      </div>
      
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      <div class="row">
         <div class="col-md-3"></div>
         <div class="col-md-4" style="padding-left:4px;">
             <div class="form-group" style="padding-bottom:10px;">
              <label for="exampleInputEmail1" style="font-size:12px;opacity:0.7">
              First name        
              </label>
              <input type="text" class="form-control" name="cus_fname" id="cus_fname" aria-describedby="innm" placeholder="Enter Name" value="<?php echo $memberdata['cus_fname'] ?>">
              <!-- <small id="innm" class="form-text text-muted">Not Visible for the public </small> -->
            </div>
             <div class="form-group">
              <label for="exampleInputEmail1" style="font-size:12px;opacity:0.7">
              Last name        
              </label>
              <input type="text" class="form-control" name="cus_lname" id="cus_lname" aria-describedby="innm" placeholder="Enter Name" value="<?php echo $memberdata['cus_lname'] ?>">
              <!-- <small id="innm" class="form-text text-muted">Not Visible for the public </small> -->
            </div>
            <button type="button" class="btn btn-raised btn-info btn-sm">SAVE</button>
         </div>
       </div>
      </div>
    </div>
  </div>
 <!--  <div class="card" style="box-shadow:none">
    <div class="card-header" id="headingTwo" style="padding:15px 0px 15px 0px; border-bottom:none;border-top:1px solid #ddd">
      <div class="row" style="position:relative">
      <div class="col-md-3">Username</div>
      <div class="col-md-9">Name</div>
        <button class="btn btn-info pull-right" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" style="position:absolute;right:0;top:-8px">
          <i class="fa fa-fw fa-pencil "></i>
        </button>
      </div>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur
      </div>
    </div>
  </div> -->
  <div class="card" style="box-shadow:none">
    <div class="card-header" id="headingThree" style="padding:15px 0px 15px 0px; border-bottom:none;border-top:1px solid #ddd">
       <div class="row" style="position:relative">
      <div class="col-md-3">Contact</div>
      <div class="col-md-9">Primary: <?php echo $memberdata['email'] ?> | <?php echo $memberdata['contact'] ?> <small class="label bg-gray sts-lvl2">Login Id</small></div>
        <button class="btn btn-info pull-right" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" style="position:absolute;right:0;top:-8px">
          <i class="fa fa-fw fa-pencil "></i>
        </button>
      </div>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
         <div class="row">
         <div class="col-md-3"></div>
         <div class="col-md-4" style="padding-left:4px;">
             <div class="form-group" style="padding-bottom:10px;">
              <label for="exampleInputEmail1" style="font-size:12px;opacity:0.7">
              Contact       
              </label>
              <input type="text" class="form-control" name="new_contact" id="new_contact" aria-describedby="innm" placeholder="Enter Contact" value="<?php echo $memberdata['contact'] ?>" >
              <input type="hidden" name="old_contact" id="old_contact" value="<?php echo $memberdata['contact'] ?>" >
              <!-- <small id="innm" class="form-text text-muted">Not Visible for the public </small> -->
            </div>
             <div class="form-group" style="padding-bottom:10px;">
              <label for="exampleInputEmail1" style="font-size:12px;opacity:0.7">
              Email       
              </label>
              <input type="text" class="form-control" name="new_mail" id="new_mail" aria-describedby="innm" placeholder="Enter Mail" value="<?php echo $memberdata['email'] ?>" >
              <input type="hidden" class="form-control" name="old_mail" id="old_mail" value="<?php echo $memberdata['email'] ?>" >
              <!-- <small id="innm" class="form-text text-muted">Not Visible for the public </small> -->
            </div>
             
            <button id="save_ids" type="button" class="btn btn-raised btn-info btn-sm">SAVE</button>
         </div>
       </div>
      </div>
    </div>
  </div>
  <div class="card" style="box-shadow:none">
    <div class="card-header" id="headingThree" style="padding:15px 0px 15px 0px; border-bottom:none;border-top:1px solid #ddd">
       <div class="row" style="position:relative">
      <div class="col-md-3">Password</div>
      <div class="col-md-9">**********</div>
        <button class="btn btn-info pull-right" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseThree" style="position:absolute;right:0;top:-8px">
          <i class="fa fa-fw fa-pencil "></i>
        </button>
      </div>
    </div>
    <div id="collapseFour" class="collapse " aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
       <div class="row">
         <div class="col-md-3"></div>
         <div class="col-md-4" style="padding-left:4px;">
             
             <div class="form-group">
              <label for="exampleInputEmail1" style="font-size:12px;opacity:0.7">
              New password        
              </label>
              <input type="password" class="form-control" name="" id="newpass" aria-describedby="innm" placeholder="Enter New Password" value="">
             <small id="innm" class="form-text ">Otp will send to your Email id </small>
            </div>
             <div id="otp_blk" class="form-group" style="background:#ddd; padding:15px; border-radius:5px; color:#000;display:none">
            
              <input type="text" class="form-control" name="" id="otp"  placeholder="Enter OTP" value="">
              <small id="innm" class="form-text ">Otp sent</small>
             </div>
            <button type="button" id="pass_next" class="btn btn-raised btn-info btn-sm">NEXT</button>
            <button type="button" id="pass_otp" class="btn btn-raised btn-info btn-sm" style="display:none;">UPDATE</button>
            <button type="button" id="pass_cncl" class="btn btn-raised btn-defult btn-sm" style="display:none">CANCEL</button>
            <span id="err-msg-show" style="color:red;display:none">Wrong OTP</span>
         </div>
       </div>
      </div>
    </div>
  </div>
</div>

    </div>
  
  </div>
    <script type="text/javascript">
    
  $('#save_ids').click(function() { 
  var new_contact = $('#new_contact').val();
  var old_contact = $('#old_contact').val();
  var new_mail = $('#new_mail').val();
 // var old_mail = $('#old_mail').val();
 
  if(!new_contact || !new_mail){

  }else{


       $('#alert-wait').show();
                  var dataString = 'new_contact='+ new_contact+'&old_contact='+ old_contact+'&new_mail='+ new_mail;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'gsetting/Changeids',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 201){ 
                    $('#alert-wait').delay().slideUp(); 
                    $('#alert-msg').html('Enter new number'); 
                    $('#alert-toast').show().delay(2000).slideUp(); 
                 
                }else if(response.status == 202){
                    $('#alert-wait').delay().slideUp(); 
                    $('#alert-msg').html('Number already exist!'); 
                    $('#alert-toast').show().delay(2000).slideUp(); 
                }else if(response.status == 200){
                    $('#alert-wait').delay().slideUp(); 
                    $('#alert-suc').show().delay(2000).slideUp(); 
                    $('#old_contact').val(new_contact);
                }
              },
              error: function (response) {  $('#alert-wait').delay().slideUp(); }

            }); 
  }
});   
  $('#pass_next').click(function() { 
  var newpass = $('#newpass').val();
 
  if(!newpass){

  }else{
       $('#alert-wait').show();
                  var dataString = 'newpass='+ newpass;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'gsetting/Chkpass',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){ 
                    $('#alert-wait').delay().slideUp(); 
                  $('#otp_blk').show();
                  $('#pass_next').hide();
                  $('#pass_otp').show();
                  $('#pass_cncl').show();
                }else{
                    $('#alert-wait').delay().slideUp(); 
                }
              },
              error: function (response) {  $('#alert-wait').delay().slideUp(); }

            }); 
  }
});  
  $('#pass_otp').click(function() { 
  var otp = $('#otp').val();
 
  if(!otp){

  }else{
       $('#alert-wait').show();
        $('#err-msg-show').hide(); 
                  var dataString = 'otp='+ otp;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'gsetting/Chkpass_otp',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){ 
                    $('#alert-wait').delay().slideUp(); 
                  $('#otp_blk').hide();
                  $('#pass_next').show();
                  $('#pass_otp').hide();
                  $('#pass_cncl').hide();
                  $('#newpass').val('');
                   $('#alert-suc').delay(2000).show().slideUp(); 
                }else if(response.status == 203){
                    $('#alert-wait').delay().slideUp(); 
                     $('#err-msg-show').show(); 
                }
              },
              error: function (response) {  $('#alert-wait').delay().slideUp(); }

            }); 
  }
});  

    </script>