 
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <script src="https://infidust.kamprik.com/assets-public/dist/js/jquery-3.1.1.min.js"></script>
  </head>
  <br><br>
  <textarea id="putmsg" row="3"></textarea>
  <br><br>
  <input id="thisnum" value="" style="font-size:25px; width:90%;"><br><br>
  <!--<a href="https://wa.me/918817945495">Send</a>-->
  <button id="sendmsg" style="font-size:25px; width:100%;">send</button>
     <script type="text/javascript">
    $('#sendmsg').click(function(){ 
       var thisnum = $('#thisnum').val();
       var putmsg = $('#putmsg').val();
     //  var mkurl = 
        window.location = 'https://wa.me/91'+thisnum+'?text=';
       });
        </script>
    </html>