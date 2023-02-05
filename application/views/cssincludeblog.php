<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $b_thumb['p_title']; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="<?php echo base_url().'assets-public/' ?>dist/img/favicon.png" rel="shortcut icon" type="image/png">
  <meta name="description" content="<?php echo @$b_thumb['p_des']; ?>"/>
  <meta name="keywords" content="<?php echo @$b_thumb['p_keywords']; ?>" />
  <link rel="canonical" href="<?php echo base_url().$canonical ?>" />
  <?php echo @$b_thumb['oth_keywords']; ?>
 
  <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>dist/css/cus.css">
   <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>dist/css/bootstrap-material-design.min.css"> 

  
    <script type="text/javascript"> var base_url = '<?php echo base_url()?>';</script>
 
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119776712-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-119776712-2');
    </script>
    <script>
    document.documentElement.className = "js";
    var supportsCssVars = function() { var e, t = document.createElement("style"); return t.innerHTML = "root: { --tmp-var: bold; }", document.head.appendChild(t), e = !!(window.CSS && window.CSS.supports && window.CSS.supports("font-weight", "var(--tmp-var)")), t.parentNode.removeChild(t), e };
    supportsCssVars() || alert("Please view this demo in a modern browser that supports CSS Variables.");
    </script>