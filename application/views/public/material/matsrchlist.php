<div class="row">
    <div class="col-md-12 bg-white p-5 box-sdow" style="padding:5px;">
    <h4 class="mb-3">Your search <?php echo @$srch ?></h4>
        <table class="table table-striped table-hover">
            <tr>
                <th>Institute Pro</th>
                <th>Title</th>
                <th>Material Type</th>
                <th>Institute</th>
                <th>City/State</th>
            </tr>
            <?php if (@$matsrchlist) {            
                foreach ($matsrchlist as $value) { ?>
                    <tr style="cursor:pointer; " class="viewprof" id="<?php echo $value['mem_id'] ?>">
                        <td><?php if ($value['pro_pic']) { ?>
                            <img src="<?php echo base_url() ?>assets/pro-mid/<?php echo $value['pro_pic'] ?>" alt="img" style="width: 30px;" class="rounded">
                        <?php } else { ?>
                            <img src="<?php echo base_url() ?>assets-public/dist/img/instlogo.png" class="rounded" style="width:40px ;" alt="">
                      <?php  }
                         ?>
                            </td>
                            <td><?php echo @$value['title']; ?></td>
                            <td><?php echo @$value['file_type']; ?></td>
                        <td><?php echo $value['insti_nm']; ?></td>
                        <td><?php echo $value['city'];
                            if (@$value['state']) {
                                echo '/' . $value['state'];
                            } ?></td>
                    </tr>
            <?php }
            } else {
                echo  '<tr><td>Courses does not exist! <td></tr>';
            } ?>
        </table>
    </div>
</div>
<script>
$('.viewprof').click(function() {
        // var memid = $(this).attr('id');
        // var url = '<?php echo base_url() ?>institute/' + memid;
        // window.location.href = url;
        var url = '<?php echo base_url() ?>login';
        window.location.href = url;
    });
</script>