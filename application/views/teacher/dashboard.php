<!-- <div class="row">
  
</div> -->
<style type="text/css">
 
  .card-iner { padding-top: 20px; padding-left: 10px}
  .card-iner h2 { font-size: 18px}
  .card-iner h3 { font-size: 15px}
  .card-iner i { font-size: 24px; position: relative; top: -2px; opacity: 0.7}
  .card-data-btn { padding:5px 0px 5px 10px; text-align: left; border-radius: 4px;position: relative;left:-5px; }
  .c-title { color: #000; font-size: 14px;}
  .c-sml { font-size: 12px}
  .aro-btn {margin:0; text-align:left;padding-top:13px;padding-bottom:13px; color: #000}
  .aro-btn img { opacity: 0.7}
</style>
<div class="row">
  <div class="col-md-4" style="padding:5px;">

         <?php if($members['is_live'] == 0){ ?>
          <div class="row">
             <div class="col-md-12 box-sdow card-data" style="padding:0px 0px 0px 0px;">
              <div class="card-iner">
                <table width="100%">
                  <tr>
                    <td width="40" valign="top" align="center"><i class="fa fa-fw fa-rocket" style="color:red"></i></td>
                    <td valign="top"><h2 style="color:red">You are not live yet!</h2></td>
                  </tr>
                  <tr>
                  <td></td>
                    <td height="70" >
                    
                      <div class="c-title">Complete these steps for coming live!</div>
                    
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>
                                    <?php if($profdata['pro_pic'] && $profdata['address'] && $profdata['city'] && $profdata['state']){ ?>
                                    <h3><i class="fa fa-fw fa-check-circle" style="color:green;font-size:16px;"></i> Profile</h3>
                                 <?php }else{ ?>
                                    <h3><i class="fa fa-fw fa-check-circle-o" style="color:#ccc;font-size:16px;"></i> Profile</h3>
                                 <?php } ?>
                                 
                               

                                
                          <!-- 
                                 <h2><i class="fa fa-fw fa-check-circle" style="color:green"></i> Class Allotment</h2>
                                 <h2><i class="fa fa-fw fa-check-circle-o"></i> Class Allotment</h2> -->

                                 <h3><i class="fa fa-fw fa-check-circle-o" style="color:#ccc;font-size:16px;"></i> In Review</h3>


                    </td>
                  </tr>
                </table>
              </div>
            <div class="dropdown-divider" style="margin:0;"> </div>
             <button class="btn btn-block btn-danger btn-raised aro-btn open_ins_pro" >
             <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/arrow-right-w.svg"> &nbsp;&nbsp;Goto profile setting
             </button>
          </div>
<div class="col-md-12" style="height:10px"></div>
</div>
<?php } ?>

    <div class="row">
      <div class="col-md-12 box-sdow card-data" style="padding:0px 0px 0px 0px;">

        <div class="card-iner">
          <table width="100%">
            <tr>
              <td width="40" valign="top" align="center"><i class="fa fa-fw fa-cube"></i></td>
              <td valign="top"><h2>Start live class</h2></td>
            </tr>
            <tr>
            <td valign="top"><div class="lived" id="_sts_0">LIVE</div></td>
              <td>
              <button class="btn btn-block btn-primary btn-raised card-data-btn openliveclass" id="<?php echo rand(9999999,1000000); ?>_allday">
              <div class="c-title" style="color:#fff">Live class [ Click to Test Preview ]</div>
              <div class="c-sml">00:00 | 00:00</div>
              <div class="c-sml">Teacher  </div>
              </button>
              
              <div class="card-data-btn " id="00_00">
              <div class="c-title">You have no class batch!</div>
              </div>
            
              
              </td>
            </tr>
          </table>
        </div>
        <div class="dropdown-divider" style="margin:0;"> </div>
         <button class="btn btn-block btn-default aro-btn open_class_slot" >
         <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/arrow-right.svg"> &nbsp;&nbsp;Goto class batch settings
              </button>
      </div>
    </div>
  </div>
  <div class="col-md-4" style="padding:5px;">

    <div class="row">
      <div class="col-md-12 box-sdow card-data" style="padding:0px 0px 0px 0px;">
        <div class="card-iner">
          <table width="100%">
            <tr>
              <td width="40" valign="top" align="center"><i class="fa fa-fw fa-server"></i></td>
              <td valign="top"><h2>Study Material</h2></td>
            </tr>
            <tr>
            <td></td>
              <td height="100" >
              
                <div class="c-title">No Study  Materials found!</div>
              
              </td>
            </tr>
          </table>
        </div>
        <div class="dropdown-divider" style="margin:0;"> </div>
         <button class="btn btn-block btn-default aro-btn notliveotast" >
         <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/arrow-right.svg"> &nbsp;&nbsp;Goto videos & notes
              </button>
      </div>
    </div>


  </div>
  <div class="col-md-4" style="padding:5px;">


    <div class="row">
     <div class="col-md-12 box-sdow card-data" style="padding:0px 0px 0px 0px;">
       <div class="card-iner">
          <table width="100%">
            <tr>
              <td width="40" valign="top" align="center"><i class="fa fa-fw fa-bell-o"></i></td>
              <td valign="top"><h2>Institute Notification</h2></td>
            </tr>
            <tr>
            <td></td>
              <td height="100" align="">
                  <!-- <div class="gray">Comming soon</div> -->
                 <div class="c-title">Go live to Publish notification!</div>
              
              </td>
            </tr>
          </table>
        </div>
        <div class="dropdown-divider" style="margin:0;"> </div>
         <button class="btn btn-block btn-default aro-btn notliveotast" >
         <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/arrow-right.svg"> &nbsp;&nbsp;Publish notice
              </button>
      </div>
    </div>
<!--     <div class="row" style="padding-top:15px">
     <div class="col-md-12 box-sdow card-data" style="padding:0px 0px 0px 0px;">
       <div class="card-iner">
          <table width="100%">
            <tr>
              <td width="40" valign="top" align="center"><i class="fa fa-fw fa-hand-o-right"></i></td>
              <td valign="top"><h2>What you get!</h2></td>
            </tr>
            <tr>
            <td></td>
              <td height="70" align="">
                  <div class="gray c-sml" style="padding-right:10px">Read all the points, what Infidust can do for you or your institute!</div>
             
              
              </td>
            </tr>
          </table>
        </div>
        <div class="dropdown-divider" style="margin:0;"> </div>
         <button class="btn btn-block btn-default aro-btn" >
         <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/arrow-right.svg"> &nbsp;&nbsp;Read More
              </button>
      </div>
    </div> -->
  </div>
</div>