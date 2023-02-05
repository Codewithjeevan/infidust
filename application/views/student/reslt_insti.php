<style type="text/css">
  .fe-sho-blk { border:1px solid #474747; padding: 14px 5px 12px 8px; border-radius: 3px; background: #fff;}
</style>
<?php 
           
            foreach ($allmysntlist as $allmysntlist) { 
            ?>
  <div class="col-md-6" style="padding-bottom:30px">
    <div class="box-sdow body-data box-data ">
      <div class="col-md-12" align="center">
        <div class="mid-dis-img">
              <img src="<?php echo base_url().'assets/pro-sml/' ?><?php echo $allmysntlist['pro_pic'] ?>">
            </div>
      </div>
      <div class="col-md-12" align="center">
        <div class="insti-thum">
            <h5><?php echo $allmysntlist['insti_nm'] ?></h5>
            <p><i class="fa fa-fw fa-map-marker"></i><br><?php echo $allmysntlist['address'] ?>, <?php echo $allmysntlist['city'] ?>, <?php echo $allmysntlist['state'] ?>, </p>

<?php
$thisistid = $allmysntlist['mem_id'];
$thisinst = $this->db->get_where("my_institute", array("mymemid" =>$memid, "instu_id" =>$thisistid))->row_array();
 if(!$thisinst){ ?>
            <div align="center" style="height:80px">
            <div id="join-pay-blk_<?php echo $allmysntlist['mem_id'] ?>" class="fe-sho-blk" style=" display:;">
              Joining fee Rs. 500 &nbsp;&nbsp; <button type="button" id="<?php echo $allmysntlist['mem_id'] ?>" class="btn btn-raised btn-info requstjoin">PAY & JOIN</button>
             </div>
             <div id="wait-pay-blk_<?php echo $allmysntlist['mem_id'] ?>" class="fe-sho-blk" style=" display:none;">
           
                 Waiting for payment.. 
                 
                        <div class="progress" style="width:70px; height:17px; border-radius:4px;">
                          <div class="progress-bar progress-bar-striped bg-info progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                        </div>
                 
             </div>
                       <span id="pay-suc-blk_<?php echo $allmysntlist['mem_id'] ?>" class="" style="color:green;display:none">
                         <i class="fa fa-fw fa-check" ></i> Admission request sent, wait for approval.
                       </span>

            </div>
<?php } else { ?>
             <div align="center" style="height:60px;padding-top:0px">
             <div class="fe-sho-blk">
             You are already added! &nbsp;&nbsp;<i class="fa fa-fw fa-check" style="color:green"></i>
                </div> 

               
             </div>
<?php } ?>

         </div>
      </div>

    </div>
  </div>

 <?php } ?>


<script type="text/javascript">
  $(document).on('click', '.requstjoin', function(){ 
    if(MyPopUp && !MyPopUp.closed )
  {
   //MyPopUp.focus(); //If already Open Set focus
  }
  else
  {
  var instid= this.id; 
    $('#join-pay-blk_'+instid).hide();
    $('#wait-pay-blk_'+instid).show();
    
    var userid = '<?php echo $this->session->userdata("mem_id");?>';
    var custid = 'CUST'+'<?php echo $this->session->userdata("memuid");?>';
    var fname = '<?php echo $this->session->userdata("cus_fname");?>';
    var lname = '<?php echo $this->session->userdata("cus_lname");?>';
    var contact = '<?php echo $this->session->userdata("contact");?>';
    var email = '<?php echo $this->session->userdata("email");?>';

      var getsrnwidth = $(window).width();
         var getsrnheight = $(window).height();//parseInt(limitdata) + parseInt(15);
         var leftheit = parseInt(getsrnheight) - parseInt(550);
         var leftwidth = parseInt(getsrnwidth) - parseInt(900);
         var mkheight = parseInt(leftheit) / parseInt(2);
         var mkwidth = parseInt(leftwidth) / parseInt(2);
         var makestring = 'directories=no,titlebar=no,toolbar=no,location=center,status=no,menubar=no,scrollbars=no,resizable=no,width=900,height=500,left='+mkwidth+',top=80';
        // var makeurl = '<?php echo base_url()."paytmpay/Txn.php?userid='+userid+'&custid='+custid+'&instid='+instid+'"; ?>';
         var makeurl = '<?php echo base_url()."payumoney/PayUMoney_form.php?userid='+userid+'&custid='+custid+'&instid='+instid+'&fname='+fname+'&lname='+lname+'&contact='+contact+'&email='+email+'"; ?>';
         // var makeurl = 'https://rzp.io/i/huY1w2l';
       MyPopUp = window.open(makeurl,'winname',makestring);

        crnt_pay = 1;
        crnt_pay_inst = instid;
        setTimeout(function(){  putautocheck(); }, 20000);
  }
  });

function HandlePopupResult(result) {
   // alert("result of popup is: " + result);
   var instid = result;
     var dataString = 'instid='+ instid;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'student/Requestjoins_chck',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){ 
                   $('#wait-pay-blk_'+instid).hide();
                 $('#pay-suc-blk_'+instid).show();
                 crnt_pay = 0;
                 crnt_pay_inst = 0;
                 MyPopUp = false;
                }else if(response.status == 203){
                 $('#wait-pay-blk_'+instid).hide();
                 $('#join-pay-blk_'+instid).show(); 
                  crnt_pay = 0;
                 crnt_pay_inst = 0;
                 MyPopUp = false;
                 
                }
              },
              error: function (response) {
            
                 // $('#alert-wait').delay().slideUp(); 
                  //  $('#alert-err').delay(2000).show().slideUp();
                  }

            }); 
}

var MyPopUp = false;
var crnt_pay = 0;
var crnt_pay_inst = 0;

function putautocheck(){
  if(MyPopUp && !MyPopUp.closed && crnt_pay == 1 && crnt_pay_inst)
  {
    autocheck();  //winPop.focus(); //If already Open Set focus
  }
  else
  {
      setdefchk();
  }
}
function autocheck(){
 var instid = crnt_pay_inst;
   var dataString = 'instid='+ instid;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'student/Requestjoins_chck',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){ 
                    $('#wait-pay-blk_'+instid).hide();
                    $('#pay-suc-blk_'+instid).show();
                     crnt_pay = 0;
                     crnt_pay_inst = 0;
                     MyPopUp = false;
                }else if(response.status == 203){
                 setTimeout(function(){  putautocheck(); }, 15000);
                console.log('checking');
                 
                }
              },
              error: function (response) {
              console.log('checking error');
                  setTimeout(function(){  putautocheck(); }, 15000);
                  }

            }); 
}
function setdefchk(){
  $('#wait-pay-blk_'+crnt_pay_inst).hide();
 $('#join-pay-blk_'+crnt_pay_inst).show();
    

  MyPopUp = false;
 crnt_pay = 0;
  crnt_pay_inst = 0;
  console.log(crnt_pay_inst);
}
</script>