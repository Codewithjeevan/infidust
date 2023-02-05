<form action="" method="POST"> // Replace this with your website's success callback URL
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="rzp_test_iHvQRxlm0B5BAz" // Enter the Key ID generated from the Dashboard
    data-amount="50000" // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    data-currency="INR"
    data-order_id="order_CgmcjRh9ti2lP7"//This is a sample Order ID. Pass the `id` obtained in the response of the previous step.
    data-buttontext="Pay with Razorpay"
    data-name="Acme Corp"
    data-description="Test transaction"
    data-image="https://example.com/your_logo.jpg"
    data-prefill.name="Gaurav Kumar"
    data-prefill.email="gaurav.kumar@example.com"
    data-prefill.contact="9999999999"
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>