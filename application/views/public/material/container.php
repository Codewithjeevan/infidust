<!DOCTYPE html>
<html lang="en" manifest="<?php echo base_url() ?>manifest.appcache">
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Infidust- Online Teaching Software</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="<?php echo base_url() . 'assets-public/' ?>dist/img/favicon.png" rel="shortcut icon" type="image/png">

  <meta itemprop="description" content="Are you looking for online teaching software, then Infidust is one stop solutions for your needs." />
  <meta property="og:title" content="Infidust- Online Teaching Software" />
  <meta property="og:image" content="/assets-public/dist/img/infidust-home.png" />
  <meta property="og:image:alt" content="online teaching software" />
  <meta property="og:url" content="https://infidust.com" />
  <meta name="twitter:image" content="/assets-public/dist/img/infidust-home.png" />
  <?php require_once('cssinclude.php'); ?>


</head>

<body class="hold-transition skin-blue sidebar-collapse" style="background:#f4f4f4;">


  <?php require_once('header.php'); ?>

  <div class="wapper-view" style="display:block">
    <!-- Main content -->
    <div id="datacontent" class="datac-pad" style=" background-color: #f4f4f4; ">


    </div>
  </div>
  <!-- /.content -->
  <?php require_once('footer.php'); ?>
  <script>
    $(document).ready(function() {
      var srch = "<?php if (!empty($srch)) {
                    echo $srch;
                  } else if (!empty($memid)) {
                    echo $memid;
                  }
                  ?>"
      <?php if (!empty($srch)) { ?>
        $("#datacontent").load('<?php echo base_url() . "publicsrch/matsrchlist/"; ?>' + srch);
      <?php } else if (!empty($memid)) { ?>
        $("#datacontent").load('<?php echo base_url() . "publicsrch/matprofiledata/"; ?>' + srch);
      <?php  }   ?>
    });
  </script>