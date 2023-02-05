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
     
            <tr id="<?php echo $allmysntlist['instu_id'] ?>" class="openmyinsti">
              <td></td>
              <td >
               <?php 
               if($allmysntlist['curent_view'] == 0){
               ?>
              
               <?php }else{ ?>
               <i class="fa fa-fw fa-check"></i>
               <?php } ?>
              
              </td>
              <td ><i class="fa fa-fw fa-graduation-cap"></i></td>
              <td><?php echo $allmysntlist['insti_nm'] ?></td>
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