<div class="row">
    <div class="col-md-12 bg-white p-5 box-sdow" style="padding:5px;">
        <div><i class="fa fa-arrow-left backl" 
        style="font-size: 22px;cursor:pointer "  onclick="history.back();" aria-hidden="true"></i></div>
        <?php if (!empty($profile)) { ?>
            <div class="d-flex">
                <?php if (!empty($profile['pro_pic'])) { ?>
                    <img src="<?php echo base_url() ?>assets/pro-mid/<?php echo $profile['pro_pic'] ?>" class="m-5 loginp" style="width:100px ;cursor:pointer" alt="logo">
                <?php } else { ?>
                    <img src="<?php echo base_url() ?>assets-public/dist/img/instlogo.png" style="width:100px ;" class="rounded-circle" alt="">
                <?php } ?>
                <div class="m-auto loginp" style="cursor:pointer">
                    <h4><?php echo $profile['insti_nm'] ?></h4>
                    <span><?php if ($profile['city'] || $profile['state']) {
                                echo 'From ';
                            }
                            echo $profile['city'] . ' ' . $profile['state']; ?></span>
                </div>
            </div>

            <h4>Affilted courses</h4>
            <table class="table table-striped table-hover">
                <tr>
                    <th>Sr no.</th>
                    <th>Course Name</th>
                </tr>
                <?php $i = 1;
                if (@$profcours) {
                    foreach ($profcours as $value) { ?>
                        <tr style="cursor:pointer;" class="loginp">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $value['cours_nm']; ?></td>
                        </tr>
                <?php $i++;
                    }
                } else {
                    echo  '<tr><td>Order not found! <td></tr>';
                } ?>
            </table>
        <?php } else {
            echo 'Oops data does not exist!';
        } ?>

    </div>
</div>
<script>
    $('.loginp').click(function() {
        var url = '<?php echo base_url() ?>login';
        window.location.href = url;
    });
  
</script>