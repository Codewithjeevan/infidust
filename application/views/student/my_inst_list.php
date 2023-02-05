   <table width="100%" class="trborder">
            <tr>
              <td width="20"></td>
              <td width="20"></td>
              <td width="35"></td>
              <td>Name</td>
              <td width="40%">Status</td>
            </tr>
            <?php 
           
            foreach ($allmysntlist as $allmysntlist) { 
            ?>
     
            <tr  >
              <td></td>
              <td >
               <?php 
               if($allmysntlist['curent_view'] == 0){
               ?>
                <i class="fa fa-fw fa-check" id="crntchk_<?php echo $allmysntlist['instu_id'] ?>" style="display:none"></i>
               <?php }else{ ?>
               <i class="fa fa-fw fa-check" id="crntchk_<?php echo $allmysntlist['instu_id'] ?>"></i>
               <?php } ?>
                 
              </td>
              <td ><i class="fa fa-fw fa-graduation-cap"></i></td>
              <td  style="position:relative">
               <?php 
               if($allmysntlist['is_active'] == 1){
               ?>
              <div class="openmyinsti" id="<?php echo $allmysntlist['instu_id'] ?>" style="position:absolute; width:100%;height:29px;top:0; background:;"></div>
              <?php } ?>
              <?php echo $allmysntlist['insti_nm'] ?>
              </td>
              <td>
              <?php 
               if($allmysntlist['is_active'] == 0){
               ?>
              Admission In process!
               <?php }else{ ?>
               Active
               <?php } ?>
              </td>
            </tr>
             <?php } ?>
          </table>

        