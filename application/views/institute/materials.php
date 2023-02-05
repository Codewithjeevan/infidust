<style type="text/css">
 .tdhover tr:hover td { background: #f3f3f3;}
 .tdhover tr:hover .mati-opt-blk { opacity: 1}
 .mlisticons img { position:relative; width:40px;top:15px}
   .cus-table { border:none;}
  .cus-table td { border:none; padding: 0;}
  @media only screen and (min-width: 993px) and (max-width: 3000px) { 
  .hdr-res-pad {padding-top:20px;}
  .hdr-res-pad2 {padding-top:0px;}
  .res-clrfix { height: 30px;}
  }

   @media only screen and (min-width: 260px) and (max-width: 992px) {
    .hdr-res-pad {padding-top:0px;}
    .hdr-res-pad2 {padding-top:25px;}
    .forbig-b {display: none}
    .res-clrfix { height: 50px;}
   }

</style>
<div class="row body-data hdr-res-pad" style="position:relative">
  <h3 style="font-family: 'Montserrat';">Materials Videos | Notes | Pdf | Docs</h3>
  <div class="hdr-res-pad2" style="position:absolute; right:0;">
  <button id="crt-vid-pop" type="button" class="btn btn-outline-secondary "><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/plus-v.png" width="21"> <span class="forbig-b" style="color:#000; font-weight:bold;">&nbsp;CREATE VIDEO</span></button>
  <button id="crt-docs-pop" type="button" class="btn btn-outline-secondary "><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/plus-d.png" width="21"> <span class="forbig-b" style="color:#000; font-weight:bold;">&nbsp;CREATE DOCS</span></button>
  </div>
</div>
<div class="res-clrfix"></div>
<div class="row box-sdow">
  <div class="col-md-12 fix-pad">
   <button type="button" class="btn" style="margin:0;"><i class="fa fa-fw fa-filter"></i></button> <span class="gray sml1">Filter</span>
  </div>
  <div class="col-md-12 hir-lin"></div>

 <table class="table sml1 tdhover">
  <thead>
    <tr >
      <!-- <th scope="col" width="16"></th> -->
      <th scope="col" style="font-size:12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Materials</th>
      <th scope="col" style="font-size:12px;">Visibility</th>
      <th scope="col" style="font-size:12px;">Date</th>
      <th scope="col" style="font-size:12px;">P.By</th>
      <th scope="col" style="font-size:12px;" width="50">Comments</th>
      <th scope="col" style="font-size:12px; text-align:right;" width="80">Likes</th>
      <th scope="col" style="font-size:12px; text-align:right;" width="40"></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($materials as $key => $value) {
    $tempfiletyp = explode("/", $value['file_type']);
    $file_exten = end($tempfiletyp);
     ?>
    <tr>
      <!-- <th scope="row"></th> -->
      <td style="padding-left:30px" width="500">
        <div class="file-conter">
         <div class="mati-opt-blk">
           <i class="fa fa-fw fa-pencil open_materials_edit" id="<?php echo $value['md_id'] ?>"></i> <i class="fa fa-fw fa-comments"></i> 
            <?php if($value['file_type'] == 'video/mp4'){ ?>
           <i class="fa fa-fw fa-play-circle"></i>
           <?php } else { ?>
           <a target="_blank" href="<?php echo base_url().'assets/videos/' ?><?php echo $value['filenm'] ?>" style="color:#3e4042;text-decoration: none;"><i class="fa fa-fw fa-external-link" style="font-size:18px"></i></a>
           <?php } ?>
         </div>
          <table class="cus-table">
            <tr>
              <td>
              <?php if($value['file_type'] == 'video/mp4'){ ?>
                <div class="file-sh-blk bg-black"><img src="<?php echo base_url().'assets/' ?>vthumb/<?php echo $value['thumb'] ?>"></div>
                <?php } else { ?>
                   <div class="file-sh-blk mlisticons bg-gray">
                  <?php if($file_exten == 'pdf'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/pdf.svg" class="mlisticons">
                  <?php } else if($file_exten == 'doc' || $file_exten == 'docx'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/word.svg" class="mlisticons">
                  <?php } else if($file_exten == 'zip'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/zip.svg" class="mlisticons">
                  <?php } else if($file_exten == 'xlsx' || $file_exten == 'xls'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/excel.svg" class="mlisticons">
                  <?php } else if($file_exten == 'pptx' || $file_exten == 'ppt' || $file_exten == 'pptm'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/powerpoint.svg" class="mlisticons">
                  <?php } else if($file_exten == 'JPG' || $file_exten == 'png' || $file_exten == 'jpeg' || $file_exten == 'jpg'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/photo.svg" class="mlisticons">
                  <?php } else { ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/gdocs.svg" class="mlisticons">
                  <?php }  ?>
                  </div>
                <?php }  ?>
              </td>
              <td>
                  <div class="file-data-blk">
                  <?php if($value['title']){ ?>
                   <h2><?php echo substr($value['title'], 0, 34)."..." ; ?></h2>
                   <p><?php echo substr($value['descp'], 0, 70)."..." ; ?></p>
                  <?php } else{ ?>
                  - - - -<br>
                  - - - - - - 
                  <?php } ?>
                  </div>
              </td>
            </tr>
          </table>
        </div>
      </td>
      <td style="font-size:12px;">
        <?php if($value['visibility'] == 0){ ?>
         --
        <?php } else if($value['visibility'] == 1){ ?>
                  Public
         <?php } else { ?>
         Private
                  <?php } ?>
      </td>
      <td style="font-size:12px;"><?php echo $value['up_date_show'] ?></td>
      <td style="font-size:12px;"><?php echo $value['teacher_nm'] ?></td>
      <td style="font-size:12px;" align="right">--</td>
      <td style="font-size:12px;" align="right">--</td>
      <td style="font-size:12px;" align="right"></td>
    </tr>
    <?php } ?>

   <!--  <tr>
     
      <td style="padding-left:30px" width="500">
        <div class="file-conter">
         <div class="mati-opt-blk">
           <i class="fa fa-fw fa-pencil"></i> <i class="fa fa-fw fa-comments"></i> <i class="fa fa-fw fa-play-circle"></i>
         </div>
          <table class="cus-table">
            <tr>
              <td>
                <div class="file-sh-blk bg-pblue"><i class="fa fa-fw fa-file-pdf-o"></i>PDF</div>
              </td>
              <td>
                  <div class="file-data-blk">
                   <h2>My new first infidust tutorial video</h2>
                   <p>My new first infidust tutorial video sdf tutorial video sdf tutorial video sdf</p>
                  </div>
              </td>
            </tr>
          </table>
        </div>
      </td>
      <td style="font-size:12px;">Public</td>
      <td style="font-size:12px;">Mar 20 2020</td>
      <td style="font-size:12px;" align="right">10</td>
      <td style="font-size:12px;" align="right">10</td>
      <td style="font-size:12px;" align="right"></td>
    </tr> -->
   
  </tbody>
</table>


</div>





 <script>$(document).ready(function() { $('div').bootstrapMaterialDesign(); });</script>

