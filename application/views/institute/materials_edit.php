<style type="text/css">
  .fix-iner-header {
    position: fixed;
    background: #fff;
    z-index: 9;
    border-bottom: 1px solid #eaeaea;
    margin-top: -30px;
  }

  .v-display-rit {
    border-radius: 4px;
    padding-bottom: 10px;
  }

  .littxt {
    opacity: 0.7
  }

  .mlisticonsedit img {
    position: relative;
    width: 70px;
    top: 40px
  }

  @media only screen and (min-width: 993px) and (max-width: 3000px) {

    .fix-iner-header {
      width: 83%;
      margin-left: -20px;
      padding: 30px 10px 10px 30px;
    }

    .right-btn-blk {
      position: absolute;
      right: 100px;
      top: 20px;
    }

    .res-vid-ratio {
      width: 370px;
      height: 215px;
    }

    .v-display-rit {
      width: 370px;
    }

    .back-btn-fix {
      position: absolute;
      top: 22px;
      left: 5px;
    }
  }

  @media only screen and (min-width: 260px) and (max-width: 992px) {
    .fix-iner-header {
      width: 100%;
      margin-left: 0px;
      padding: 30px 10px 10px 10px;
    }

    .right-btn-blk {
      position: absolute;
      right: 10px;
      top: 20px;
    }

    .v-display-rit {
      width: 100%;
    }

    .res-vid-ratio {
      width: 100%;
      height: 215px;
    }

    .back-btn-fix {
      position: absolute;
      top: 19px;
      left: 0px;
      width: 45px;
    }
  }
</style>
<div class="row body-data fix-iner-header" style="">
  <button id="open_materials_bk" class="btn back-btn-fix " style="position: absolute;"><i class="fa fa-fw fa-arrow-left"></i></button>
  <h3 style="font-family: 'Montserrat'; margin-left:40px">Materials details </h3>
  <div class="right-btn-blk" style="">
    <button id="savedata_mat" class="btn btn-primary btn-raised pull-right">SAVE</button>
  </div>
</div>

<form name="photo" id="updatematirefrom" enctype="multipart/form-data" action="<?php echo base_url(); ?>materials/Matdetailsupdate" method="post">
  <div class="row" style="margin-top:60px; ">
    <div class="col-md-7" style="padding:0;">
      <div class="col-md-12 box-sdow fix-pad">
        <div class="form-group bmd-form-group">
          <label for="entersub" class="bmd-label-static" style="padding-bottom:10px;">Title(required)</label>
          <textarea class="form-control" id="title" name="title" rows="3" placeholder="Add title that describe your video/docs"><?php echo $materials['title'] ?></textarea>
          <!-- <small class="form-text text-muted">Ex. Bio. batch 1</small> -->
          <input type="hidden" value="<?php echo $materials['md_id'] ?>" id="meditid" name="meditid">
          <input type="hidden" value="<?php echo $materials['vmid'] ?>" id="meditid" name="meditvmid">
        </div><br>
        <div class="form-group bmd-form-group">
          <label for="entersub" class="bmd-label-static">Description</label>
          <textarea class="form-control" id="description" rows="10" name="description" placeholder="More about your video/docs"><?php echo $materials['descp'] ?></textarea>
          <!-- <small class="form-text text-muted">Ex. Bio. batch 1</small> -->

        </div>
      </div>
      <div style="height:20px"></div>
      <div class="col-md-12 box-sdow fix-pad" style="margin-bottom:30px;">
        <span class="sml2 littxt">Visibility</span>
        <div style="height:10px"></div>
        <input type="hidden" value="1" id="for_visibl_val" name="for_visibl_val">
        <div class="radio" style="width:100px;display:inline-block">
          <input id="chk_visb" type="hidden" value="<?php echo $materials['visibility'] ?>">
          <label>
            <input type="radio" name="for_visibl" id="pub-chk" value="1" onclick="" class="allchekb" <?php if ($materials['visibility'] == 1) {
                                                                                                        echo 'checked';
                                                                                                      } ?>>
            <span style="color:#000;position:relative;top:-2px"> &nbsp;&nbsp;Public</span>
          </label>
        </div>
        <div class="radio" style="width:100px;display:inline-block">
          <label>
            <input type="radio" name="for_visibl" id="pvt-chk" value="2" onclick="" class="allchekb" <?php if ($materials['visibility'] == 2) {
                                                                                                        echo 'checked';
                                                                                                      } ?>>
            <span style="color:#000;position:relative;top:-2px"> &nbsp;&nbsp;Private</span>
          </label>
        </div>
        <div style="height:20px"></div>
        <div id="pvt-blk" style="display:<?php if ($materials['visibility'] == 1 || $materials['visibility'] == 0) {
                                            echo 'none';
                                          } ?>">
          <span class="sml2 littxt">Make Private for (courses)</span>
          <div style="height:10px"></div>
          <div class="form-group" style="padding-top:10px;">
            <span id="graysub" type="" data-toggle="modal" data-target="#chossubj" style="color:#606060;cursor: pointer;"><i class="fa fa-fw fa-check-circle"></i> Select courses <i class="fa fa-fw fa-chevron-down" style="font-size:12px"></i></span>
            <span id="grnsub" type="" data-toggle="modal" data-target="#chossubj" style="display:none;cursor: pointer;"><i class="fa fa-fw fa-check-circle" style="color:#399700;"></i> Select courses <i class="fa fa-fw fa-chevron-down" style="font-size:12px"></i></span>

          </div>
        </div>
      </div>
    </div>
    <div class="col-md-5 " style="padding-left:3%">
      <div class="v-display-rit box-sdow">
        <?php if ($materials['file_type'] == 'video/mp4') { ?>
          <video id="snpvideo" class="video-js vjs-fluid vjs-tech res-vid-ratio" controls="controls" data-setup="{}" poster="<?php echo base_url() . 'assets/vthumb/' . $materials['thumb'] ?>">
            <source id="" src="<?php echo base_url() . 'assets/videos/' . $materials['filenm'] ?>" type="video/mp4" />
          </video>
        <?php } else { ?>
          <div class="mlisticonsedit" style="width:370px; height:150px;background:#ddd" align="center">
            <?php
            $tempfiletyp = explode("/", $materials['file_type']);
            $file_exten = end($tempfiletyp); ?>
            <?php if ($file_exten == 'pdf') { ?>
              <img src="<?php echo base_url() . 'assets-public/' ?>dist/img/icon/pdf.svg" class="mlisticons">
            <?php } else if ($file_exten == 'doc' || $file_exten == 'docx') { ?>
              <img src="<?php echo base_url() . 'assets-public/' ?>dist/img/icon/word.svg" class="mlisticons">
            <?php } else if ($file_exten == 'zip') { ?>
              <img src="<?php echo base_url() . 'assets-public/' ?>dist/img/icon/zip.svg" class="mlisticons">
            <?php } else if ($file_exten == 'xlsx' || $file_exten == 'xls') { ?>
              <img src="<?php echo base_url() . 'assets-public/' ?>dist/img/icon/excel.svg" class="mlisticons">
            <?php } else if ($file_exten == 'pptx' || $file_exten == 'ppt' || $file_exten == 'pptm') { ?>
              <img src="<?php echo base_url() . 'assets-public/' ?>dist/img/icon/powerpoint.svg" class="mlisticons">
            <?php } else if ($file_exten == 'JPG' || $file_exten == 'png' || $file_exten == 'jpeg' || $file_exten == 'jpg') { ?>
              <img src="<?php echo base_url() . 'assets-public/' ?>dist/img/icon/photo.svg" class="mlisticons">
            <?php } else { ?>
              <img src="<?php echo base_url() . 'assets-public/' ?>dist/img/icon/gdocs.svg" class="mlisticons">
            <?php }  ?>

          </div>
        <?php }  ?>
        <div class="col-md-12" style="">
          <?php if ($materials['file_type'] == 'video/mp4') { ?>
            <span class="sml2">Video link</span>
          <?php } else { ?>
            <span class="sml2">Docs link</span>
          <?php }  ?>
          <span class="sml2"><a target="_blank" href="<?php echo base_url() . 'watchm?v=' ?><?php echo $materials['file_url'] ?>" style="color:#1a73e8;text-decoration: none;"> <?php echo base_url(); ?>view/<?php echo $materials['file_url'] ?></a></span>
        </div>
      </div>
    
      <div id="loadhashpg" class="col-md-12 box-sdow mt-2 p-3" align="" style="height:auto; overflow-x:hidden;overflow-y:scroll;">

      </div>
    </div>
  </div>



  <!-- Modal -->
  <div class="modal fade" id="chossubj" tabindex="-1" role="dialog" aria-labelledby="chossubj" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Choose subject</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="mysublist" style="height:400px; overflow-x:hidden;overflow-y:scroll;">
          <input type="hidden" id="getsubjectary" name="coursary" value="<?php if ($materials['for_private_cors']) {
                                                                            echo ',' . $materials['for_private_cors'];
                                                                          } ?>">
          <?php
          $coursarry = explode(',', $materials['for_private_cors']);
          ?>
          <?php if ($this->session->userdata("mem_type") == 'teacher') {
            $shoclasary =  explode(',', $teacher_cls_ary); ?>
            <?php foreach ($mycourse as $mycourse) {
            ?>
              <?php if (in_array($mycourse['mycours_id'], $shoclasary)) { ?>
                <div class="col-md-12" style="padding:5px 0px 0px 50px;">
                  <div class="checkbox">
                    <label style="color:#000">
                      <input type="checkbox" <?php if (in_array($mycourse['mycours_id'], $coursarry)) {
                                                echo 'checked';
                                              } ?> value="<?php echo $mycourse['mycours_id']; ?>" id="takec_<?php echo $mycourse['mycours_id']; ?>" onclick="takecourses(<?php echo $mycourse['mycours_id']; ?>);"> <?php echo $mycourse['cours_nm']; ?>
                    </label>
                  </div>
                </div>
              <?php } ?>
            <?php } ?>


          <?php } else { ?>

            <?php foreach ($mycourse as $mycourse) {
            ?>
              <div class="col-md-12" style="padding:5px 0px 0px 50px;">
                <div class="checkbox">
                  <label style="color:#000">
                    <input type="checkbox" <?php if (in_array($mycourse['mycours_id'], $coursarry)) {
                                              echo 'checked';
                                            } ?> value="<?php echo $mycourse['mycours_id']; ?>" id="takec_<?php echo $mycourse['mycours_id']; ?>" onclick="takecourses(<?php echo $mycourse['mycours_id']; ?>);"> <?php echo $mycourse['cours_nm']; ?>
                  </label>
                </div>
              </div>
            <?php } ?>
          <?php } ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>

</form>

<script>
  $(document).ready(function() {
    $('div').bootstrapMaterialDesign();
  });
</script>


<script type="text/javascript">
  $(document).ready(function() {
    var hashtyp = 4; 
    var pepid = $('#meditid').val();
    $("#loadhashpg").load('<?php echo base_url() . "hashtag/loadhashpg/" ?>' + hashtyp + '/' + pepid);
  });

  $('#open_materials_bk').click(function() {
    $("#datacontent").load('<?php echo base_url() . "materials/materials_dashboard"; ?>');
    if ($("#hidtgl").is(":visible") == true) {
      $('#hidtgl').click();
    }
    window.history.pushState('forward', null, './institue_panel#materials_dashboard');
    nextstate('materials_dashboard');
  });

  $(document).ready(function() {

    var haspvt = $('#chk_visb').val();
    console.log(haspvt);
    if (haspvt == '2') {
      $('#grnsub').show();
      $('#graysub').hide();
    } else {

    }



    $('#savedata_mat').click(function() {

      $('#updatematirefrom').submit();
    });
    $(document).ready(function(e) {

      $('#updatematirefrom').on('submit', (function(e) {
        e.preventDefault();
        var formData = new FormData(this);


        // $('#fielderror').hide();
        //   $('#chkmsg').hide();
        $('#alert-wait').show();
        $.ajax({
          type: 'POST',
          url: $(this).attr('action'),
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
            // console.log("success");
            //console.log(data);
            //$('#alert-wait').hide();
            //   $("#alert-suc").show().delay(5000).fadeOut();
            // $("#prolists").load('<?php echo base_url() . "products/Productlist/"; ?>'+forbrn);

            $('#alert-wait').delay().slideUp();
            $('#alert-suc').delay(2000).show().slideUp();


          },
          error: function(data) {
            console.log("error");
            console.log(data);
            $('#alert-wait').delay().slideUp();
            $('#alert-err').delay(2000).show().slideUp();

          }
        });


      }));


    });

  });

  function takecourses(id) {
    var thisarval = id;
    var hvval = $('#getsubjectary').val();
    var mkary = hvval + ',' + thisarval;

    var checkBox = document.getElementById("takec_" + id);
    if (checkBox.checked == true) {
      $('#getsubjectary').val(mkary);
    } else {
      var rvval = ',' + thisarval;
      hvval = hvval.replace(rvval, '');
      $('#getsubjectary').val(hvval);

    }

    var chkval = $('#getsubjectary').val();
    if (chkval) {
      $('#grnsub').show();
      $('#graysub').hide();
    } else {
      $('#grnsub').hide();
      $('#graysub').show();
    }

  }

  $('#pub-chk').click(function() {
    $('#pvt-blk').hide();
  });
  $('#pvt-chk').click(function() {
    $('#pvt-blk').show();
  });
</script>