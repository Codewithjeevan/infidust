<?php
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="hY2Ppvbxly";

// Salt should be same Post Request 

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash("sha512", $retHashSeq);
       if ($hash != $posted_hash) {
	     //  echo "Invalid Transaction. Please try again";
		   } else {
         // echo "<h3>Thank You. Your order status is ". $status .".</h3>";
         // echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
         // echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";
		   }


$userid = $_GET['userid'];
$custid = $_GET['custid'];
$instid = $_GET['instid'];
?>	

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>INFIDUST: Live Online Classes</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<style type="text/css">
  .loaderblk {position: fixed;width: 100%; height: 100%; background: #fff;top: 0;left: 0; text-align: center}
  .paybtn {background:#007dfc; color:#fff; border:none; font-size:18px; padding:10px 40px 10px 40px; border-radius:30px;}
  .paybtn:focus{ outline: none;}
  .sbl-circ-path2 {
  height: 38px;
  width: 38px;
  color: rgba(0, 0, 0, 0.2);
  position: relative;
  display: inline-block;
  border: 3px solid;
  border-radius: 50%;
  border-right-color: #1969e1;
  animation: rotate 1s linear infinite; 
  top: 45%; 
  transform: translateY(-50%);left: 0%; 
  transform: translateX(-50%);
}
@keyframes rotate {
  0% {
    transform: rotate(0); }
  100% {
    transform: rotate(360deg); } }
</style>
</head>
<div class="loaderblk" align="center">
  <div class="sbl-circ-path2"></div>
</div>

<script src="jquery-3.1.1.min.js"></script>

<div id="tx-msg" align="" style="padding:5%;display:none">
<?php if($_POST["status"] == "success"){ ?>
<div align=""><img src="12.gif" width="50"></div>
<?php }else{ ?>
<div align=""><img src="red-alert-icon.png" width="50"></div>
<?php } ?>
  
  
  
  <div style="font-family:arial;"><br><br><br>
  Amount:  <b><?php echo $_POST["amount"];?> </b><br>
     Txn. Id:  <?php echo $_POST["txnid"];?> <br>
     Txn. date: <?php echo date('Y-m-d h:i:s') ?><br><br><br>
  </div>
  <div align="">
    <button id="goback" class="paybtn"  type="button" onclick="CloseMySelf()">Done</button>
     
  </div>
</div>



<!-- <a href="#" result="allow" onclick="return CloseMySelf(this);">Allow</a> -->

<script type="text/javascript">

  function CloseMySelf() {
   var instid = '<?php echo $instid;?>';
    try {
        window.opener.HandlePopupResult(instid);
    }
    catch (err) {}
    window.close();
    return false;
}
</script>

<?php  if ($hash != $posted_hash) { ?>
  
  <?php } else {?>
<script type="text/javascript">
 window.onload = function exampleFunction() { 

    updatests();
   
}
function updatests(){
 var userid = '<?php echo $userid;?>';
 var custid = '<?php echo $custid;?>';
 var instid = '<?php echo $instid;?>';


 var txn_id = '<?php echo $_POST["txnid"]?>';
 var txn_amt = '<?php echo $_POST["amount"]?>';

 var status = '<?php echo $_POST["status"]?>';
 var hash = '<?php echo $_POST["hash"]?>';

 var base_url = 'http://infidust.kamprik.com/';
//var base_url = 'http://localhost/infidust/';

   var dataString = 'userid='+ userid+'&custid='+ custid+'&instid='+ instid+'&txn_id='+ txn_id+'&txn_amt='+ txn_amt+'&status='+ status+'&hash='+ hash;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'student/Putpayment_details',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){ 
                 $('.loaderblk').hide();
                 $('#tx-msg').show();
                  // $('#pay-suc-blk_'+instid).show();
                }else if(response.status == 203){
                 // $('.loaderblk').hide();
               //  $('#tx-msg').show();
                // setTimeout(function(){  putautocheck(); }, 15000);
               // console.log('checking');
                 
                }
              },
              error: function (response) {
                $('.loaderblk').hide();
                 $('#tx-msg').show();
             // console.log('checking error');
                 // setTimeout(function(){  putautocheck(); }, 15000);
                  }

            }); 
}
</script>
 <?php } ?>
</html>