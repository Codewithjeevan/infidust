<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		//echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.

	}
	else {
		//echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				//echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
	

}
else {
	//echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}
$userid = $_GET['userid'];
$custid = $_GET['custid'];
$instid = $_GET['instid'];


?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  
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
<?php if($_POST["STATUS"] == "TXN_SUCCESS"){ ?>
<div align="center"><img src="12.gif" width="50"></div>
<?php }else{ ?>
<div align="center"><img src="red-alert-icon.png" width="50"></div>
<?php } ?>
	
	
	
	<div style="font-family:arial;"><br><br><br>
	Amount:  <b><?php echo $_POST["TXNAMOUNT"];?> </b><br>
		Order Id: <?php echo $_POST["ORDERID"]?><br>
	   Txn. Id:  <?php echo substr($_POST["TXNID"], -12);?> <br>
	   Txn. date: <?php if($_POST["TXNDATE"]){echo $_POST["TXNDATE"];}else{echo NULL;} ?><br><br><br>
	</div>
	<div align="center">
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


<script type="text/javascript">
 window.onload = function exampleFunction() { 
	updatests();
}
function updatests(){
 var userid = '<?php echo $userid;?>';
 var custid = '<?php echo $custid;?>';
 var instid = '<?php echo $instid;?>';

 var orderid = '<?php echo $_POST["ORDERID"]?>';
 var mid = '<?php echo $_POST["MID"]?>';
 var txn_id = '<?php echo $_POST["TXNID"]?>';
 var txn_amt = '<?php echo $_POST["TXNAMOUNT"]?>';
 var pay_mod = '<?php if($_POST["PAYMENTMODE"]){echo $_POST["PAYMENTMODE"];}else{echo NULL;} ?>';
 var crncy = '<?php echo $_POST["CURRENCY"]?>';
 var txn_dt = '<?php if($_POST["TXNDATE"]){echo $_POST["TXNDATE"];}else{echo NULL;} ?>';
 var status = '<?php echo $_POST["STATUS"]?>';
 var res_code = '<?php echo $_POST["RESPCODE"]?>';
 var res_msg = '<?php echo $_POST["RESPMSG"]?>';
 var gat_wnm = '<?php if($_POST["GATEWAYNAME"]){echo $_POST["GATEWAYNAME"];}else{echo NULL;} ?>';
 var bank_txn_id = '<?php echo $_POST["BANKTXNID"]?>';
 var bank_nm = '<?php if($_POST["BANKNAME"]){echo $_POST["BANKNAME"];}else{echo NULL;} ?>';
 var hash = '<?php echo $_POST["CHECKSUMHASH"]?>';

var base_url = 'https://infidust.kamprik.com/';
// var base_url = 'http://localhost/infidust/';

   var dataString = 'userid='+ userid+'&custid='+ custid+'&instid='+ instid+'&orderid='+ orderid+'&mid='+ mid+'&txn_id='+ txn_id+'&txn_amt='+ txn_amt+'&pay_mod='+ pay_mod+'&crncy='+ crncy+'&txn_dt='+ txn_dt+'&status='+ status+'&res_code='+ res_code+'&res_msg='+ res_msg+'&gat_wnm='+ gat_wnm+'&bank_txn_id='+ bank_txn_id+'&bank_nm='+ bank_nm;
               
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
                // setTimeout(function(){  putautocheck(); }, 15000);
               // console.log('checking');
                 
                }
              },
              error: function (response) {
             // console.log('checking error');
                 // setTimeout(function(){  putautocheck(); }, 15000);
                  }

            }); 
}
</script>

</html>