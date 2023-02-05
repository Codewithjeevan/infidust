  <div class="row">
    <div class="col-md-12 body-data" style="padding:0px 10px 10px 0px;"> <h3>General Account Settings</h3></div>

    <div class="col-md-12 box-sdow seting-data" style="padding:50px 20% 50px 50px;">
    
    <div id="accordion" >
  <div class="card" style="box-shadow:none">
    <div class="card-header" id="headingOne" style="padding:10px 0px 10px 0px; border-bottom:none;border-top:1px solid #ddd">
      <div class="row" style="position:relative">
      <div class="col-md-3">Name</div>
      <div class="col-md-9">Name</div>
        <button class="btn btn-info pull-right" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="position:absolute;right:0;top:-8px">
          <i class="fa fa-fw fa-pencil "></i>
        </button>
      </div>
      
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card" style="box-shadow:none">
    <div class="card-header" id="headingTwo" style="padding:10px 0px 10px 0px; border-bottom:none;border-top:1px solid #ddd">
      <div class="row" style="position:relative">
      <div class="col-md-3">Name</div>
      <div class="col-md-9">Name</div>
        <button class="btn btn-info pull-right" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" style="position:absolute;right:0;top:-8px">
          <i class="fa fa-fw fa-pencil "></i>
        </button>
      </div>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card" style="box-shadow:none">
    <div class="card-header" id="headingThree" style="padding:10px 0px 10px 0px; border-bottom:none;border-top:1px solid #ddd">
       <div class="row" style="position:relative">
      <div class="col-md-3">Name</div>
      <div class="col-md-9">Name</div>
        <button class="btn btn-info pull-right" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" style="position:absolute;right:0;top:-8px">
          <i class="fa fa-fw fa-pencil "></i>
        </button>
      </div>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>

    </div>
  
  </div>
    <script type="text/javascript">
    
   $('#instaddr').keyup(function(){
   onpageputadd();
   });
   $('#instcon').keyup(function(){
   onpageputadd();
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

        $('#updatesliderfrom').submit();
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