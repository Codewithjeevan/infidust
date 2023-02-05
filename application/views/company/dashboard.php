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
     <div class="row">
      <div class="col-md-12 box-sdow card-data" style="padding:0px 0px 0px 0px;">
        <div class="card-iner">
          <table width="100%">
            <tr>
              <td width="40" valign="top" align="center"><i class="fa fa-fw fa-server"></i></td>
              <td valign="top"><h2>Members</h2></td>
            </tr>
            <tr>
            <td></td>
              <td height="" style="padding:10px 10px 30px 0px;">
              
                <div class="c-title">Total members - <b><?php echo $tot_members ?></b></div>
                <div class="c-title">Total institute - <b><?php echo $tot_institute ?></b></div>
                <div class="c-title">Total student - <b><?php echo $tot_student ?></b></div>
              
              </td>
            </tr>
          </table>
        </div>
        <div class="dropdown-divider" style="margin:0;"> </div>
         <button class="btn btn-block btn-default aro-btn open_allteacher" >
         <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/arrow-right.svg"> &nbsp;&nbsp;View all
              </button>
      </div>
    </div>
  
  </div>
  <div class="col-md-4" style="padding:5px;">


<!-- <div class="col-md-12" style="height:10px"></div> -->


    <div class="row">
      <div class="col-md-12 box-sdow card-data" style="padding:0px 0px 0px 0px;">
        <div class="card-iner">
          <table width="100%">
            <tr>
              <td width="40" valign="top" align="center"><i class="fa fa-fw fa-server"></i></td>
              <td valign="top"><h2>Visitor</h2></td>
            </tr>
            <tr>
            <td></td>
              <td height="100" >
              
                <div class="c-title">Total visitor - <b><?php echo $visitor['count'] ?></b></div>
              
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