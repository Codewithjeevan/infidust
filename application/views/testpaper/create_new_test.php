<style type="text/css">
  .catcheck {
    padding: 5px;
    width: 35px;
    position: absolute;
    right: 0;
  }

  .catnotchk i {
    opacity: 0.5
  }

  .catnotchk:hover i {
    opacity: 1;
  }

  .catischk i {
    color: green
  }
</style>
<div class="row body-data" style="padding-top:20px;position:relative; border-bottom:1px solid #ddd; height:70px;">
  <h3 style="font-family: 'Montserrat';">Create new test paper</h3>
  <div style="position:absolute; right:0;">
    <button id="open_testseries" type="button" class="btn btn-outline-secondary "><span style="color:#000; font-weight:bold;">CANCEL</span></button>
  </div>
</div>
<input type="hidden" id="paperid">
<div class="row" style="padding-top:20px">
  <!-- <div class="col-md-5">
    <div class="box-sdow" style="color:;padding:5% 3% 5% 1%;">
      <div class="col-md-12 body-data" style="padding-bottom:10px;"> <h3><i class="fa fa-fw fa-archive"></i> &nbsp; Select Publish Category</h3></div>
      <div class="col-md-12" style="height:300px; overflow-x:hidden;overflow-y:scroll;">
       <?php if ($test_catg) { ?>
        <input id="test_mcatid" type="hidden" value="<?php echo $test_catg_active['tpmc_id']; ?>">
        <div class="respopad40">
        <?php foreach ($test_catg as $key => $value) {
        ?>
         <div class="col-md-12" style="padding:5px 0px 5px 0px;border-bottom:1px solid #ddd; position:relative">
           <span id="mancatnm_<?php echo $value['tpmc_id']; ?>"><?php echo $value['mcatnm']; ?></span>
           <button id="<?php echo $value['tpmc_id']; ?>" class="btn catcheck <?php if ($value['is_active'] == 1) {
                                                                                echo 'catischk';
                                                                              } else {
                                                                                echo 'catnotchk';
                                                                              } ?>"><i class="fa fa-fw fa-check"></i></button>
         </div>
        <?php } ?>

        </div>
        <?php } else { ?>
        <div align="center" style="padding-top:120px">
        <input id="test_mcatid" type="hidden" value="">
          No Category Added!
        </div>
        <?php } ?>

      </div>
      <div class="col-md-12" style="height:25px;padding:0;">
        <span id="chkmsg" class="chkmsg">Already Exist!</span>
        <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#addcourse">+ NOT IN LIST ADD NEW</button>
      </div>

    </div>
  </div> -->
  <!-- <div class="col-md-1"></div> -->
  <input id="test_mcatid" type="hidden" value="<?php echo @$test_catg_active['tpmc_id']; ?>">
  <div class="col-md-4 bg-white" align="center" style="padding-top:6px">
    <div id="title-blk">
      <div class="form-group">
        <label for="entersub" class="" style="color:#000">Enter Paper title</label>
        <input type="text" class="form-control" id="newtitle" placeholder="Type here.." style="font-size:22px;">
        <small class="form-text text-muted">Ex. Bio. weekly test part 1</small>
      </div>
      <div class="col-md-12" style="padding:10px 0px 10px 0px">
        <button id="titleNext" class="btn btn-primary btn-raised btn-block">Next</button>
      </div>
    </div>
    <div id="cours-blk" style="display:none">
      <div class="form-group" align="left">
        <label for="entersub" class="" style="color:#000;font-size:.75rem;">Select course/class - subject</label>
        <div id="selectedcours" data-toggle="modal" data-target="#chossubj" style="font-size:22px; border-bottom:1px solid #ccc; height:40px; overflow:hidden">
          <span style="opacity:0.7;font-size:17px;">Select ..</span>
        </div>
        <input type="hidden" value="0" id="clasuid">
      </div>
      <div class="col-md-12" style="padding:10px 0px 10px 0px">
        <button id="coursNext" class="btn btn-primary btn-raised btn-block">Next</button>
      </div>
    </div>
    <div id="marks-blk" style="display:none">
      <div class="form-group">
        <label for="entersub" class="" style="color:#000">Enter Total marks </label>
        <input type="text" class="form-control" id="marknum" placeholder="Type here.." style="font-size:22px;">
        <small class="form-text text-muted">Ex. 100</small>
      </div>
      <div class="col-md-12" style="padding:10px 0px 10px 0px">
        <button id="markNext" class="btn btn-primary btn-raised btn-block">Next</button>
      </div>
    </div>
    <div id="tim-blk" style="display:none">
      <div class="form-group" align="left">
        <label for="entersub" class="" style="color:#000;font-size:.75rem;">Select Time</label>
        <div id="newtimesho" data-toggle="modal" data-target="#timemodal" style="font-size:22px; border-bottom:1px solid #ccc; height:40px;">
          <span style="opacity:0.7;font-size:17px;">Select time..</span>
        </div>
        <input type="hidden" value="0" id="clasuid">
      </div>
      <div class="col-md-12" style="padding:10px 0px 10px 0px">
        <button id="nextManage" class="btn btn-primary btn-raised btn-block">Next</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="chossubj" tabindex="-1" role="dialog" aria-labelledby="chossubj" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Select</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height:400px;overflow-y:scroll">
        <input type="hidden" id="coursid" value="">
        <input type="hidden" id="courstext" value="">

        <?php foreach ($mycourse as $key => $value) {
        ?>
          <div class="col-md-12" style="padding:0;">
            <?php echo $value['cours_nm'] ?>

            <div class="row" style="padding-bottom:30px; padding-left:50px; padding-top:5px">
              <?php
              $subjects = $this->db->get_where("ins_subject", array("for_memid" => $inst_id, "mycous_id" => $value['mycours_id']))->result_array();
              ?>
              <?php foreach ($subjects as $key => $values) {
              ?>
                <div class="col-md-12" style="padding:0;">

                  <div class="checkbox">
                    <label style="color:#000">
                      <input type="checkbox" id="<?php echo $value['mycours_id'] ?>_<?php echo $values['subj_id'] ?>" value="<?php echo $value['mycours_id'] ?>_<?php echo $values['subj_id'] ?>" class="allcoursub" data-course="<?php echo $value['cours_nm'] ?>" data-subj="<?php echo $values['subject_nm'] ?>"> <?php $subnm = $this->db->get_where("allsubject", array("sub_id" => $values['ins_allsubid']))->row_array();
                                                                                                                                                                                                                                                                                                                      if ($subnm) {
                                                                                                                                                                                                                                                                                                                        echo $subnm['sub_name'];
                                                                                                                                                                                                                                                                                                                      } else {
                                                                                                                                                                                                                                                                                                                        echo $values['subject_nm'];
                                                                                                                                                                                                                                                                                                                      }
                                                                                                                                                                                                                                                                                                                      ?>
                    </label>
                  </div>

                </div>
              <?php } ?>
            </div>

          </div>
        <?php } ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="timemodal" tabindex="-1" role="dialog" aria-labelledby="timemodal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Select</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height:400px;overflow-y:scroll">
        <input type="hidden" id="tst_time" value="">

        <div class="col-md-12" style="padding:0;">
          <div class="row" style="padding-bottom:30px; padding-left:50px; padding-top:5px">
            <div class="col-md-12" style="padding:0;">
              <div class="radio">
                <label style="color:#000">
                  <input type="radio" name="optionsTime" id="" value="0:15_15 min" class="alltime"> &nbsp;&nbsp;15 min
                </label>
              </div>
            </div>
            <div class="col-md-12" style="padding:0;">
              <div class="radio">
                <label style="color:#000">
                  <input type="radio" name="optionsTime" id="" value="0:30_30 min" class="alltime"> &nbsp;&nbsp;30 min
                </label>
              </div>
            </div>
            <div class="col-md-12" style="padding:0;">
              <div class="radio">
                <label style="color:#000">
                  <input type="radio" name="optionsTime" id="" value="0:45_45 min" class="alltime"> &nbsp;&nbsp;45 min
                </label>
              </div>
            </div>
            <div class="col-md-12" style="padding:0;">
              <div class="radio">
                <label style="color:#000">
                  <input type="radio" name="optionsTime" id="" value="1:00_1 hour" class="alltime"> &nbsp;&nbsp;1 hour
                </label>
              </div>
            </div>
            <div class="col-md-12" style="padding:0;">
              <div class="radio">
                <label style="color:#000">
                  <input type="radio" name="optionsTime" id="" value="1:15_1 hour 15 min" class="alltime"> &nbsp;&nbsp;1 hour 15 min
                </label>
              </div>
            </div>
            <div class="col-md-12" style="padding:0;">
              <div class="radio">
                <label style="color:#000">
                  <input type="radio" name="optionsTime" id="" value="1:30_1 hour 30 min" class="alltime"> &nbsp;&nbsp;1 hour 30 min
                </label>
              </div>
            </div>
            <div class="col-md-12" style="padding:0;">
              <div class="radio">
                <label style="color:#000">
                  <input type="radio" name="optionsTime" id="" value="1:45_1 hour 45 min" class="alltime"> &nbsp;&nbsp;1 hour 45 min
                </label>
              </div>
            </div>
            <div class="col-md-12" style="padding:0;">
              <div class="radio">
                <label style="color:#000">
                  <input type="radio" name="optionsTime" id="" value="2:00_2 hour" class="alltime"> &nbsp;&nbsp;2 hour
                </label>
              </div>
            </div>
            <div class="col-md-12" style="padding:0;">
              <div class="radio">
                <label style="color:#000">
                  <input type="radio" name="optionsTime" id="" value="2:15_2 hour 15 min" class="alltime"> &nbsp;&nbsp;2 hour 15 min
                </label>
              </div>
            </div>
            <div class="col-md-12" style="padding:0;">
              <div class="radio">
                <label style="color:#000">
                  <input type="radio" name="optionsTime" id="" value="2:30_2 hour 30 min" class="alltime"> &nbsp;&nbsp;2 hour 30 min
                </label>
              </div>
            </div>
            <div class="col-md-12" style="padding:0;">
              <div class="radio">
                <label style="color:#000">
                  <input type="radio" name="optionsTime" id="" value="2:45_2 hour 45 min" class="alltime"> &nbsp;&nbsp;2 hour 45 min
                </label>
              </div>
            </div>
            <div class="col-md-12" style="padding:0;">
              <div class="radio">
                <label style="color:#000">
                  <input type="radio" name="optionsTime" id="" value="3:00_3 hour" class="alltime"> &nbsp;&nbsp;3 hour
                </label>
              </div>
            </div>
          </div>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="addcourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new Test Publish Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input class="form-control" type="text" placeholder="Enter new .." id="newmcatnm">
      </div>
      <div class="modal-footer">
        <button id="catmdlcls" type="button" class="btn btn-secondary" id="dismismdl" data-dismiss="modal">Close</button>
        <button type="button" id="letsadnew" class="btn btn-info">Add new</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('div').bootstrapMaterialDesign();
  });
</script>

<script type="text/javascript">
  var thismemtype = "<?php echo $this->session->userdata('mem_type') ?>";
  if (thismemtype == 'teacher') {
    var panelfor = 'teacher_panel';
  } else {
    var panelfor = 'institue_panel';
  }

  $('#open_testseries').click(function() {
    $("#datacontent").load('<?php echo base_url() . "testexam/test_dashboard"; ?>');
    if ($("#hidtgl").is(":visible") == true) {
      $('#hidtgl').click();
    }
    window.history.pushState('forward', null, './institue_panel#test_dashboard');
    nextstate('test_dashboard');
  });

  $('.catcheck').click(function() {
    var mncatid = this.id;
    $('#test_mcatid').val(mncatid);
    $('.catcheck').removeClass('catischk');
    $('.catcheck').addClass('catnotchk');
    $(this).removeClass('catnotchk');
    $(this).addClass('catischk');
    // var maincat_nm = $('#mancatnm_'+mncatid).html();
    maincatactive(mncatid);
  });

  $('#titleNext').click(function() {
    var newtitle = $('#newtitle').val();
    if (newtitle) {
      $('#title-blk').hide();
      $('#cours-blk').show();
    }
  });
  $('#coursNext').click(function() {
    var coursid = $('#coursid').val();
    if (coursid) {
      $('#cours-blk').hide();
      $('#marks-blk').show();
    }
  });
  $('#markNext').click(function() {
    var marknum = $('#coursid').val();
    if (marknum) {
      $('#marks-blk').hide();
      $('#tim-blk').show();
    }
  });

  $('.alltime').click(function() {
    var thisval = this.value;
    //console.log(thisval);
    var splitval = thisval.split("_");
    $('#tst_time').val(splitval[0]);
    $('#newtimesho').html(splitval[1]);
  });


  $('.allcoursub').click(function() {
    var strp_cours = $(this).attr('data-course');
    var strp_subj = $(this).attr('data-subj');
    var id = this.id;
    var thisarval = id;
    var hvtxtval = $('#courstext').val();
    var hvval = $('#coursid').val();
    var mkary = hvval + ',' + thisarval;
    var mkarytxt = hvtxtval + ',' + strp_cours + '-' + strp_subj;

    var checkBox = document.getElementById(id);
    if (checkBox.checked == true) {
      $('#coursid').val(mkary);
      $('#courstext').val(mkarytxt);
    } else {
      var rvval = ',' + thisarval;
      hvval = hvval.replace(rvval, '');
      $('#coursid').val(hvval);
      var rvvaltxt = ',' + strp_cours + '-' + strp_subj;
      hvtxtval = hvtxtval.replace(rvvaltxt, '');
      $('#courstext').val(hvtxtval);

    }
    var getmaintxt = $('#courstext').val();
    var getmaintxt = getmaintxt.substr(1);
    $('#selectedcours').html(getmaintxt);

  });



  $('#nextManage').click(function() {
    var maincatid = $('#test_mcatid').val();
    var newtitle = $('#newtitle').val();
    var coursid = $('#coursid').val();
    var courstext = $('#courstext').val();
    var marknum = $('#marknum').val();
    var testtime = $('#tst_time').val();
    var testtime_show = $('#newtimesho').html();


    if (!newtitle) {
      $('#fielderror2').show();
    } else {
      $('#fielderror').hide();
      $('#alert-err2').hide();
      $('#alert-wait').show();
      var dataString = 'newtitle=' + newtitle + '&coursid=' + coursid + '&courstext=' + courstext + '&marknum=' + marknum + '&testtime=' + testtime + '&testtime_show=' + testtime_show + '&courstext=' + courstext + '&maincatid=' + maincatid;
      jQuery.ajax({
        type: "POST",
        url: base_url + 'testexam/Create_new_paper',
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function(response) {
          if (response.status == 200) {
            // $('#putpath').val('institue_panel');
            // $('#loginFrom').submit();
            $('#alert-wait').slideUp();
            $("#datacontent").load('<?php echo base_url() . "testexam/test_manage/"; ?>' + response.new_pid);
          } else if (response.status == 203) {
            $('#alert-wait').slideUp();
          }
        },
        error: function(response) {
          $('#alert-wait').hide();
          $("#alert-err2").show()
          //location.reload();
        }
      });
    }
  });


  function maincatactive(e) {
    var getcatid = $('#test_mcatid').val();

    var med = $(this);
    // e.preventDefault();
    if (med.data('requestRunning')) {
      return;
    }
    med.data('requestRunning', true);


    var datastring = 'getcatid=' + getcatid;
    $.ajax({
      type: "POST",
      url: '<?php echo base_url(); ?>testexam/Update_active_maincat',
      data: datastring,
      dataType: 'json',
      cache: false,
      success: function(data) {



      },
      error: function(data) {
        console.log("error");
        console.log(data);
        //  $('#alert-wait').delay().slideUp(); 
        //   $('#alert-err').delay(2000).show().slideUp(); 

      },
      complete: function() {
        med.data('requestRunning', false);
      }
    });

  }

  $('#letsadnew').click(function(e) {
    var getcatname = $('#newmcatnm').val();
    if (getcatname) {
      var med = $(this);
      // e.preventDefault();
      if (med.data('requestRunning')) {
        return;
      }
      med.data('requestRunning', true);

      $('#alert-wait').show();
      var datastring = 'getcatname=' + getcatname;
      $.ajax({
        type: "POST",
        url: '<?php echo base_url(); ?>testexam/New_maincat',
        data: datastring,
        dataType: 'json',
        cache: false,
        success: function(data) {
          $('#alert-wait').slideUp();
          $('#catmdlcls').click();
          setTimeout(function() {
            $("#datacontent").load('<?php echo base_url() . "testexam/Create_new_test"; ?>');
          }, 400);

        },
        error: function(data) {
          console.log("error");
          console.log(data);
          //  $('#alert-wait').delay().slideUp(); 
          //   $('#alert-err').delay(2000).show().slideUp(); 

        },
        complete: function() {
          med.data('requestRunning', false);
        }
      });
    }
  });
</script>