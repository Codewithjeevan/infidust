<?php if (empty($hshtag['hashtag'])) { ?>
    <p class="rmhshn">#Tag Not Exisit!</p>
<?php }
else if (@$hshtag) {
    $rtr = rtrim($hshtag['hashtag'], ",");
    $hsh = explode(',',$rtr);
    foreach ($hsh as $value) {  if (empty($value)) {
        echo '';
    } else { ?>
           
        <span style="font-size: 12px; padding:3px" class="btn btn-outline-secondary">
            <i class="fa fa-hashtag d-inline " aria-hidden="true"></i>
            <p class="pr-1 d-inline" ><?php echo $value ?></p>
            <i class="fa fa-times p-1 text-dark delhsh d-inline" id="<?php echo $value ?>" style="cursor:pointer; font-size: 15px;" aria-hidden="true"></i>
        </span>
    <?php } }
} else { ?>
    <p>#Tag Not Exisit!</p>
<?php } ?>

<input type="hidden" id="byid" value="<?php if ($hshtyp  == 1) {
    echo @$hshtag['tp_mid'];
} else if($hshtyp  == 2) {
    echo $hshtag['for_memid'];
}else if($hshtyp  == 3) {
    echo $hshtag['for_memid'];
}else if($hshtyp  == 4) {
    echo @$hshtag['md_id'];
}
  ?>">
<input type="hidden" id="hshtyp" value="<?php if ($hshtyp  == 1) {
    echo $hshtyp;
} else if($hshtyp  == 2) {
    echo $hshtyp;
}else if($hshtyp  == 3) {
    echo $hshtyp;
}else if($hshtyp  == 4) {
    echo $hshtyp;
}
  ?>">
<script>
    $('.delhsh').click(function(e) {
        e.preventDefault();
        var memid = $('#byid').val();
        var hshtyp = $('#hshtyp').val();
        var hsval = $(this).attr('id');
        console.log(hsval);
        var med = $(this);
        e.preventDefault();
        if (med.data('requestRunning')) {
            return;
        }
        med.data('requestRunning', true);
        $('#alert-wait').show();
        var datastring = 'memid=' + memid + '&hsval=' + hsval + '&hshtyp=' + hshtyp;
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>hashtag/remhstg',
            dataType:'json',
            data: datastring,
            success: function(msg) {
                $('#alert-wait').delay().slideUp();
                $('#alert-suc').delay(2000).show().slideUp();
                $('#paperSetting').click();
            },
            error: function(data) {
                console.log("error");
                console.log(data);
                $('#alert-wait').delay().slideUp();
                $('#alert-err').delay(2000).show().slideUp();
            },
            complete: function() {
                med.data('requestRunning', false);
            }
        });
    });
</script>