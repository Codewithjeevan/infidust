  <div class="row box-sdow">
      <div class="col-md-6 hder-data" align="" style="color:;padding:7% 3% 5% 5%">

       <h3>You are not live yet!</h3>
       <?php if($profdata['pro_pic'] && $profdata['address'] && $profdata['city'] && $profdata['state']){ ?>
          <h2><i class="fa fa-fw fa-check-circle" style="color:green"></i> Profile</h2>
       <?php }else{ ?>
          <h2><i class="fa fa-fw fa-check-circle-o" style="color:#ccc"></i> Profile</h2>
       <?php } ?>
       
       
    <?php if($mycourse){ ?>
       <h2><i class="fa fa-fw fa-check-circle" style="color:green"></i> Courses</h2>
       <?php }else{ ?>
       <h2><i class="fa fa-fw fa-check-circle-o" style="color:#ccc"></i> Courses</h2>
       <?php } ?>
       
    <?php if($ins_subject){ ?>
       <h2><i class="fa fa-fw fa-check-circle" style="color:green"></i> Subject</h2>
       <?php }else{ ?>
       <h2><i class="fa fa-fw fa-check-circle-o" style="color:#ccc"></i> Subject</h2>
       <?php } ?>

    <?php if($class_slot){ ?>
       <h2><i class="fa fa-fw fa-check-circle" style="color:green"></i> Class Room</h2>
       <?php }else{ ?>
       <h2><i class="fa fa-fw fa-check-circle-o" style="color:#ccc"></i> Class Room</h2>
       <?php } ?>

    <?php if($my_institute){ ?>
       <h2><i class="fa fa-fw fa-check-circle" style="color:green"></i> Join Teachers</h2>
       <?php }else{ ?>
       <h2><i class="fa fa-fw fa-check-circle-o" style="color:#ccc"></i> Join Teachers</h2>
       <?php } ?>

      
<!-- 
       <h2><i class="fa fa-fw fa-check-circle" style="color:green"></i> Class Allotment</h2>
       <h2><i class="fa fa-fw fa-check-circle-o"></i> Class Allotment</h2> -->

       <h2><i class="fa fa-fw fa-check-circle-o" style="color:#ccc"></i> In Review</h2>
<br>
      <button id="" type="" class="btn btn-primary btn-raised btn-lg open_ins_pro">Let's complete</button>
      </div>
      <div class="col-md-6" style="padding-top:4%" align="center">
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/notprofi.png" width="70%">
      </div> 
    </div>

    <!-- <button id="rzp-button1">Pay</button> -->

<script>

var options = {
    "key": "rzp_live_Kj6U4qE51nj7yp", // Enter the Key ID generated from the Dashboard
    "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Acme Corp",
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        alert(response.razorpay_payment_id);
        alert(response.razorpay_order_id);
        alert(response.razorpay_signature)
    },
    "prefill": {
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "9999999999"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#F37254"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>