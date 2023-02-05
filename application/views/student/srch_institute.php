<div class="row" style="padding-bottom:30px;">
    <div class="col-md-8" style="">
          <div class="" style="position:relative;padding-bottom:15px;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/search.svg" class="srch-icon"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/x-circle.svg" id="srch-close" class="srch-close"><div class="srch-loader"><div class="sbl-circ-path3"></div></div>
            <input id="getthisinst" type="text" class="cus-srch-input" placeholder="Search..">
          </div>
          </div>
          <div class="col-md-4" style="">
           <button id="getmyinsti" type="button" class="btn btn-primary btn-raised btn-block ">Search</button>
           </div>
</div>


<div class="row" id="getsrchinst">
  
</div>

<script type="text/javascript">
  $('#getmyinsti').click(function(){ 
   var srchval = $('#getthisinst').val();
   if(!srchval){

   }else{
    $("#getsrchinst").load('<?php echo base_url()."student/reslt_insti/"; ?>'+srchval);
   }
   
  });




  function joinreq(){
  var instid = this.id;
  //console.log(catid);
      var dataString = 'instid='+ instid;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'student/Requestjoins',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){ 
                
                }else if(response.status == 204){
                  $('#alert-toast').show(); 
                  $('#alert-msg').html('already added/requested!'); 
                   $('#alert-toast').show().delay(5000).slideUp();
                 
                }
              },
              error: function (response) {
            
                 // $('#alert-wait').delay().slideUp(); 
                  //  $('#alert-err').delay(2000).show().slideUp();
                  }

            }); 
}

</script>