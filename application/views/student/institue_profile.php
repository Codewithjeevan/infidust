  <div class="row ">
    <div class="col-md-4" align="center">
     <form name="photo" id="updatepicfrom" enctype="multipart/form-data" action="<?php echo base_url();?>student/Updateprofile_pic" method="post">
        <div class="round-problk">
          <div class="iner-round smth-sdwo">

            <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/usert.svg" class="def-ins-pic-user">
            <?php if($profdata['pro_pic']){ ?>
            <img src="<?php echo base_url().'assets/' ?>pro-mid/<?php echo @$profdata['pro_pic']?>" class="output-pic">
            <?php } ?>
            <img id="outpuimg" src="" class="output-pic">
          </div>
          <div class="addpic1"><img src="<?php echo base_url().'assets-public/' ?>dist/img/addpi1.png" ></div>
          <input type="file" name="file" class="pro-big-in" accept="image/*" onchange="loadFile(event)">
        </div>
      </form>
    </div>
    <div class="col-md-8 body-data" style="padding-top:20px;">
      <h1><?php echo @$this->session->userdata('cus_fname') ?> <?php echo @$this->session->userdata('cus_lname') ?></h1>
      <?php if($profdata['address']){ ?>
      <h2 class="showaddr"><?php echo @$profdata['address']?></h2>
      <?php }else { ?>
      <h2 class="showaddr">Full address</h2>
      <?php } ?>
      
      <h2 class="showphn"><?php echo @$userdata['contact']?></h2>
     
     

    </div>
  </div>
 <div class="row" style="height:50px;"></div>

  <div class="row box-sdow">
  <div class="col-md-12">
    <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" id="prodata">Profile Data</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="persodata">Personal Data</a>
  </li>
</ul>
  </div>

  <div id="profdatablk" class="row" style="display:">
      <div class="col-md-6 " align="" style="color:;padding:7% 3% 5% 5%">

        <form id="updateproffrom" enctype="multipart/form-data" action="<?php echo base_url();?>student/Updateprofile" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1" class="gray">First Name</label>
          <input type="text" class="form-control black" name="instfnm" id="instfnm" aria-describedby="innm" placeholder="Enter frist name" value="<?php echo @$userdata['cus_fname']?>">
          <small id="innm" class="form-text text-muted">Visible for the public </small>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1" class="gray">Last Name</label>
          <input type="text" class="form-control black" name="instlnm" id="instlnm" aria-describedby="innm" placeholder="Enter last Name" value="<?php echo @$userdata['cus_lname']?>">
          <small id="innm" class="form-text text-muted">Visible for the public </small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1" class="gray">Your Address</label>
          <input type="text" class="form-control black" name="instaddr" id="instaddr" placeholder="Full address" value="<?php echo @$profdata['address']?>">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1" class="gray">City</label>
          <input type="text" class="form-control black" name="instcity" id="instcity" placeholder="Enter city" value="<?php echo @$profdata['city']?>">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1" class="gray">State</label>
          <input type="text" class="form-control black" name="inststat" id="inststat" placeholder="Enter state" value="<?php echo @$profdata['state']?>">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1" class="gray">Contact No.</label>
          <input type="text" class="form-control" name="instcon" id="instcon" placeholder="8888888888" disabled="" value="<?php echo @$userdata['contact']?>">
        
        </div>
        <br><br>
        
     
      <button id="updateprodata" type="submit" class="btn btn-primary btn-raised">Submit</button>
       </form>
      </div>
      <div class="col-md-6" style="padding-top:4%" align="center">
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/notprofi.png" width="70%">
      </div> 
      </div>
  <div id="persodatablk" class="row" style="display:none">
      <div class="col-md-6 " align="" style="color:;padding:7% 3% 5% 5%">

        <form id="updateproffromtwo" enctype="multipart/form-data" action="<?php echo base_url();?>student/Updateprofiletwo" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1" class="gray">Qualification</label>
          <textarea class="form-control" id="exampleTextarea" rows="3" name="quatific" id="instfnm"><?php echo @$profdata['qualif']?></textarea>
          <small id="innm" class="form-text text-muted">Visible for the public </small>
        </div>
       
        <br><br>
        
     
      <button id="updateprodatatwo" type="submit" class="btn btn-primary btn-raised">Submit</button>
       </form>
      </div>
      <div class="col-md-6" style="padding-top:4%" align="center">
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/notprofi.png" width="70%">
      </div> 
      </div>
    </div>

    <script type="text/javascript">
    
   $('#prodata').click(function(){
    $('#persodatablk').hide();
     $('#profdatablk').show();
     
   });

   $('#persodata').click(function(){
     $('#profdatablk').hide();
     $('#persodatablk').show();
   });

   $('#instaddr').keyup(function(){
   onpageputadd();
   });
   $('#instcon').keyup(function(){
  // onpageputadd();
   });

  function onpageputadd(){
    var addre = $('#instaddr').val();
    var phonn = $('#instcon').val();
    var city = $('#instcity').val();
    var state = $('#inststat').val();
    $('.showaddr').html(addre);
    $('.showphn').html(phonn);
  }

     $('#updateprodata').click(function(){

        $('#updateproffrom').submit();
  });
     $('#updateprodatatwo').click(function(){

        $('#updateproffromtwo').submit();
  });
   $(document).ready(function (e) {
   
    $('#updateproffrom').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
      
         
        // $('#fielderror').hide();
         //   $('#chkmsg').hide();
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
               //$('#alert-wait').hide();
             //   $("#alert-suc").show().delay(5000).fadeOut();
               // $("#prolists").load('<?php echo base_url()."products/Productlist/"; ?>'+forbrn);
                
                $('#alert-wait').delay().slideUp(); 
                $('#alert-suc').delay(2000).show().slideUp(); 


            },
            error: function(data){
                console.log("error");
                console.log(data);
                  $('#alert-wait').delay().slideUp(); 
                $('#alert-err').delay(2000).show().slideUp(); 
                  
            }
        });
        

    }));
  

});
 $(document).ready(function (e) {
   
    $('#updateproffromtwo').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
      
         
        // $('#fielderror').hide();
         //   $('#chkmsg').hide();
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
               //$('#alert-wait').hide();
             //   $("#alert-suc").show().delay(5000).fadeOut();
               // $("#prolists").load('<?php echo base_url()."products/Productlist/"; ?>'+forbrn);
                
                $('#alert-wait').delay().slideUp(); 
                $('#alert-suc').delay(2000).show().slideUp(); 


            },
            error: function(data){
                console.log("error");
                console.log(data);
                  $('#alert-wait').delay().slideUp(); 
                $('#alert-err').delay(2000).show().slideUp(); 
                  
            }
        });
        

    }));
  

});

  var loadFile = function(event) {
    var outpuimg = document.getElementById('outpuimg');
    outpuimg.src = URL.createObjectURL(event.target.files[0]);
   $('#updatepicfrom').submit();
  };

 $(document).ready(function (e) {
   
    $('#updatepicfrom').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        
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
               
                $('#alert-wait').delay().slideUp(); 
                $('#alert-suc').delay(2000).show().slideUp();
            },
            error: function(data){
                console.log("error");
                console.log(data);
                 $('#alert-wait').delay().slideUp(); 
                $('#alert-err').delay(2000).show().slideUp(); 
            }
        });
        

    }));
  

});
    </script>