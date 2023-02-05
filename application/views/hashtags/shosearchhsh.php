<?php if ($hshsrch) {
    foreach ($hshsrch as  $value) { ?>
        <span style="font-size: 13px;  display:block; border:1px solid" onclick="gettxt('<?php echo $value['hsh_nm']; ?>')" data-nm="<?php echo $value['hsh_nm']; ?>" class="w-100 btn btn-secondary text-left m-0 gettxt">
            <i class="fa fa-hashtag " aria-hidden="true"></i>
            <p class="pr-1 d-inline" id="hsh_nm"><?php echo $value['hsh_nm']; ?> </p>
            <!-- <i class="fa fa-times p-1 text-dark" style="cursor:pointer; font-size: 15px; " aria-hidden="true"></i> -->
        </span>
<?php }
} ?>

<script>
   function gettxt(hshnm) { 
    $('#srchhashtags').val(hshnm);
    $('.gettxt').hide();
    }
</script>