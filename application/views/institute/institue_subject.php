  <style type="text/css">

  </style>

  <div class="row ">

    <div class="col-md-6 " align="" style="color:;padding:0% 2% 5% 0%;">
      <div class="box-sdow" align="" style="color:;padding:5% 3% 5% 1%;">
        <div class="col-md-12 body-data" style="padding-bottom:10px;">
          <h3><i class="fa fa-fw fa-archive"></i> &nbsp;&nbsp;Setup subjects</h3>
        </div>



        <div id="" class="col-md-12 " align="" style="height:192px; overflow-x:hidden;overflow-y:scroll; display:;">
          <div class="respopad40">

            <div class="form-group" style="padding-top:10px;">
              <span id="graysub" type="" data-toggle="modal" data-target="#chossubj" style="color:#606060;cursor: pointer;"><i class="fa fa-fw fa-check-circle"></i> Select courses <i class="fa fa-fw fa-chevron-down" style="font-size:12px"></i></span>
              <span id="grnsub" type="" data-toggle="modal" data-target="#chossubj" style="display:none;cursor: pointer;"><i class="fa fa-fw fa-check-circle" style="color:#399700;"></i> Select courses <i class="fa fa-fw fa-chevron-down" style="font-size:12px"></i></span>

            </div>


            <input type="hidden" value="0" id="thisubid">


            <div class="form-group">
              <label for="entersub" class="">Enter Subject Name</label>
              <input type="text" class="form-control" id="entersub" placeholder="Type here">
              <div style="position: absolute; width: 100%;z-index: 99;" id="subsearch" class="bg-white border rounded ">

              </div>
              <span class="bmd-help">Please do not enter multiple at onece, add one by one</span>
            </div>
            <button id="letsadsub" class="btn btn-primary btn-raised" style="z-index:1">Submit</button>
          </div>
        </div>

      </div>
      <div id="loadhashpg" class="col-md-12 box-sdow mt-2 p-3" align="" style="height:auto; overflow-x:hidden;overflow-y:scroll; display:; ">

      </div>
    </div>

    <div class="col-md-6" align="" style="color:;padding:0% 0% 5% 0%; ">
      <div class="box-sdow" align="" style="color:;padding:5% 0% 5% 1%;">
        <div class="col-md-12 body-data" style="padding-bottom:10px;">
          <h3><i class="fa fa-fw fa-magic"></i> &nbsp;&nbsp;Settled subject </h3>
        </div>
        <div id="mycourselist" class="col-md-12  " align="" style="height:460px; overflow-x:hidden;overflow-y:scroll;">


        </div>
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
          <input type="hidden" id="getsubjectary">
          <?php foreach ($mycourse as $mycourse) {
          ?>

            <div class="col-md-12" style="padding:5px 0px 0px 50px;">
              <div class="checkbox">
                <label style="color:#000">
                  <input type="checkbox" value="<?php echo $mycourse['mycours_id']; ?>" id="takec_<?php echo $mycourse['mycours_id']; ?>" onclick="takecourses(<?php echo $mycourse['mycours_id']; ?>);"> <?php echo $mycourse['cours_nm']; ?>
                </label>
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

  <script>
    $(document).ready(function() {
      $('div').bootstrapMaterialDesign();
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {

      // $("#allcours-val").load('<?php echo base_url() . "dashboard/institue_allcourdef/0"; ?>');
      $("#mycourselist").load('<?php echo base_url() . "dashboard/institue_mysubject"; ?>');
        var hashtyp = 2;
        $("#loadhashpg").load('<?php echo base_url() . "hashtag/loadhashpg/" ?>' + hashtyp + '/0');
      
    });

    $('#subsearch').hide();
    $(document).on('click', '.changcatgo', function() {
      var catid = this.id;
      $("#allcours-val").html('');
      $("#allcours-val").load('<?php echo base_url() . "dashboard/institue_allcourdef/"; ?>' + catid);
    });

    $(document).on('click', '.catitemid', function() {
      var catid = this.id;
      $('.addthiscatitems_' + catid).show();
    });
    $(document).on('click', '.canclethiscat', function() {
      var catid = this.id;
      $('.addthiscatitems_' + catid).hide();
    });
    $('#letsadsub').click(function() {
      var newrsub = $('#entersub').val();
      // var mycours = $('#mycours').val();
      var thisubid = $('#thisubid').val();
      var getsubjectary = $('#getsubjectary').val();

      if (!newrsub || !getsubjectary) {

      } else {

        $('#fielderror').hide();
        $('#chkmsg').hide();
        $('#alert-wait').show();
        var dataString = 'newrsub=' + newrsub + '&getsubjectary=' + getsubjectary + '&thisubid=' + thisubid;

        jQuery.ajax({
          type: "POST",
          url: base_url + 'dashboard/Addnewsubjet',
          data: dataString,
          dataType: 'json',
          cache: false,
          success: function(response) {
            if (response.status == 200) {

              $("#mycourselist").load('<?php echo base_url() . "dashboard/institue_mysubject"; ?>');
              $('#thisubid').val('0');
              $('#alert-wait').delay().slideUp();
              $('#alert-suc').delay(2000).show().slideUp();
              $('#entersub').val('');

            } else if (response.status == 204) {
              $('#chkmsg').show().delay(2000).fadeOut();
              $('#alert-wait').delay().slideUp();

            }
          },
          error: function(response) {

            $('#alert-wait').delay().slideUp();
            $('#alert-err').delay(2000).show().slideUp();
          }

        });
      }
    });

    $(document).on('click', '.remvmysub', function() {

      var catid = this.id;
      //console.log(catid);
      $('#fielderror').hide();
      $('#chkmsg').hide();
      $('#alert-wait').show();
      var dataString = 'catid=' + catid;

      jQuery.ajax({
        type: "POST",
        url: base_url + 'dashboard/Revmysub',
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function(response) {
          if (response.status == 200) {

            $("#mycourselist").load('<?php echo base_url() . "dashboard/institue_mysubject"; ?>');

            $('#alert-wait').delay().slideUp();
            $('#alert-suc').delay(2000).show().slideUp();

          } else if (response.status == 204) {
            $('#chkmsg').show();
            $('#alert-wait').delay().slideUp();

          }
        },
        error: function(response) {

          $('#alert-wait').delay().slideUp();
          $('#alert-err').delay(2000).show().slideUp();
        }

      });
    });


    $(document).on('click', '.modirysub', function() {
      var id = this.id;
      var splitid = id.split("*");
      var subjid = splitid[0];
      var mycrsid = splitid[1];
      var subjectnm = splitid[2];
      $('#mycours').val(mycrsid).trigger('change');
      $('#entersub').val(subjectnm);
      $('#thisubid').val(subjid);
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

    var typingTimer; //timer identifier
    var doneTypingInterval = 1000; //time in ms, 5 second for example
    var $input = $('#entersub');

    $input.on('keyup', function() {
      clearTimeout(typingTimer);
      typingTimer = setTimeout(doneTypingnm, doneTypingInterval);
      // $(".srch-loader").show();
      // $("#srch-closee").show();
    });
    //on keydown, clear the countdown 
    $input.on('keydown', function() {
      clearTimeout(typingTimer);

    });

    //user is "finished typing," do something  srch-loader
    function doneTypingnm() {
      var searchval = $("#entersub").val();
      if (searchval) {
        $("#subsearch").show();
        $("#subsearch").load('<?php echo base_url() . "dashboard/searchsub/"; ?>' + searchval);
      } else {
        $("#subsearch").hide();
      }
    }
  </script>