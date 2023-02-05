  <style type="text/css">

  </style>

  <div class="row ">

    <div class="col-md-7 cours-pad" align="" style="color:;">
      <div class="box-sdow" align="" style="color:;padding:5% 3% 5% 1%;">
        <div class="col-md-12 body-data" style="padding-bottom:10px;">
          <h3><i class="fa fa-fw fa-archive"></i> &nbsp;&nbsp;Choose your courses/type</h3>
        </div>
        <div class="col-md-12 " style=" padding-right:110px; position:relative;">
          <div class="catgoblk">

            <button type="button" class="btn btn-block btn-outline-info" id="corcatgo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:13px; font-weight:normal;">Categories</button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="corcatgo" style=" left:-164px; width:200px;">
              <a class="dropdown-item changcatgo" id="1">Exam Prep.</a>
              <a class="dropdown-item changcatgo" id="2">Tuition</a>
              <a class="dropdown-item changcatgo" id="3">IT Courses </a>
              <a class="dropdown-item changcatgo" id="4">Languages </a>
              <a class="dropdown-item changcatgo" id="5">Music </a>
              <a class="dropdown-item changcatgo" id="6">Dance </a>
              <br>
            </div>
          </div>
          <div class="respopad40" style="position:relative;padding-bottom:15px;"><img src="<?php echo base_url() . 'assets-public/' ?>dist/img/icon/search.svg" class="srch-icon"><img src="<?php echo base_url() . 'assets-public/' ?>dist/img/icon/x-circle.svg" id="srch-close" class="srch-close">
            <div class="srch-loader">
              <div class="sbl-circ-path3"></div>
            </div>
            <input type="text" class="cus-srch-input" placeholder="Search..">

          </div>
        </div>

        <div id="allcours-val" class="col-md-12 " align="" style="height:330px; overflow-x:hidden;overflow-y:scroll;">

        </div>

        <div id="coursesrch-val" class="col-md-12 " align="" style="height:330px; overflow-x:hidden;overflow-y:scroll; display:none;">

        </div>

        <div class="col-md-12" style="height:25px;padding:0;">
          <span id="chkmsg" class="chkmsg">Already Exist!</span>
          <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#addcourse">+ NOT IN LIST ADD NEW</button>
        </div>
      </div>
      <div id="loadhashpg" class="col-md-12 box-sdow mt-1 p-3" align="" style="height:auto; overflow-x:hidden;overflow-y:scroll; display:; ">

      </div>
    </div>

    <div class="col-md-5 cours-pad2" align="" style="color:; ">
      <div class="box-sdow" align="" style="color:;padding:5% 0% 5% 1%;">
        <div class="col-md-12 body-data" style="padding-bottom:10px;">
          <h3><i class="fa fa-fw fa-magic"></i> &nbsp;&nbsp;Our available Courses </h3>
        </div>
        <div id="mycourselist" class="col-md-12  " align="" style="height:420px; overflow-x:hidden;overflow-y:scroll;">


        </div>
      </div>

    </div>
  </div>



  <!-- Modal -->
  <div class="modal fade" id="addcourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add new type/course</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input class="form-control" type="text" placeholder="Enter type/courses" id="newmemcourse">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="dismismdl" data-dismiss="modal">Close</button>
          <button type="button" id="letsadnew" class="btn btn-info">Add new</button>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      var hashtyp = 3;
      $("#loadhashpg").load('<?php echo base_url() . "hashtag/loadhashpg/" ?>' + hashtyp + '/0');
    });

    $(document).ready(function() {
      $("#allcours-val").load('<?php echo base_url() . "dashboard/institue_allcourdef/0"; ?>');
      $("#mycourselist").load('<?php echo base_url() . "dashboard/institue_mycourse"; ?>');
    });

    // window.onload = function afterload() { 
    //     $("#allcours-val").load('<?php echo base_url() . "dashboard/institue_allcourdef/0"; ?>');
    //     $("#mycourselist").load('<?php echo base_url() . "dashboard/institue_mycourse"; ?>');
    // }

    // $(document).on('click', '.changcatgo', function(){  
    $(".changcatgo").on("click", function() {
      var catid = this.id;
      $("#allcours-val").html('');
      $("#allcours-val").load('<?php echo base_url() . "dashboard/institue_allcourdef/"; ?>' + catid);
    });

    function catitemid(catid) {
      // $(document).on('click', '.catitemid', function(){ 
      // $(".catitemid").click(function(){
      // $(".catitemid").on("click", function() { 
      // var catid = this.id;
      $('.addthiscatitems_' + catid).show();
    }
    $(document).on('click', '.canclethiscat', function() {
      var catid = this.id;
      $('.addthiscatitems_' + catid).hide();
    });


    function catthisaddid(ids) {
      var id = ids;
      var splitid = id.split("_");
      var catid = splitid[0];
      var maincatid = splitid[1];
      $('.addthiscatitems_' + catid).hide();
      $('#fielderror').hide();
      $('#chkmsg').hide();
      $('#alert-wait').show();
      var dataString = 'catid=' + catid + '&maincatid=' + maincatid;

      jQuery.ajax({
        type: "POST",
        url: base_url + 'dashboard/Addnewcourse',
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function(response) {
          if (response.status == 200) {

            $("#mycourselist").load('<?php echo base_url() . "dashboard/institue_mycourse"; ?>');

            $('#alert-wait').delay().slideUp();
            $('#alert-suc').delay(2000).show().slideUp();

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

    // $(".remvmycorse").on("click", function() { 
    $(document).on('click', '.remvmycorse', function() {
      var catid = this.id;
      //console.log(catid);
      $('#fielderror').hide();
      $('#chkmsg').hide();
      $('#alert-wait').show();
      var dataString = 'catid=' + catid;

      jQuery.ajax({
        type: "POST",
        url: base_url + 'dashboard/Revmycourse',
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function(response) {
          if (response.status == 200) {

            $("#mycourselist").load('<?php echo base_url() . "dashboard/institue_mycourse"; ?>');

            $('#alert-wait').delay().slideUp();
            $('#alert-suc').delay(2000).show().slideUp();
            $('.addthiscatitems_' + catid).hide();
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
    // $(document).on('click', '#letsadnew', function(){  
    $("#letsadnew").on("click", function() {
      var newcsval = $('#newmemcourse').val();
      //console.log(catid);
      $('#fielderror').hide();
      $('#chkmsg').hide();
      $('#alert-wait').show();
      var dataString = 'newcsval=' + newcsval;

      $.ajax({
        type: "POST",
        url: base_url + 'dashboard/Addnewcouruser',
        data: dataString,
        dataType: 'json',
        cache: false,
        success: function(response) {
          if (response.status == 200) {

            $("#mycourselist").load('<?php echo base_url() . "dashboard/institue_mycourse"; ?>');

            $('#alert-wait').delay().slideUp();
            $('#alert-suc').delay(2000).show().slideUp();
            $('#dismismdl').click();
            $('#newmemcourse').val('');
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

    $('.cus-srch-input').keyup(function() {
      var srchval = $('.cus-srch-input').val();
      var putsrchval = srchval.split(/[ ,]+/).join('+');
      console.log(putsrchval);
      if (!srchval) {
        $('.srch-close').hide();
        $('.srch-loader').hide();
        $('#allcours-val').show();
        $('#coursesrch-val').hide();
      } else {
        $('.srch-close').show();
        $('.srch-loader').show();
        $('#allcours-val').hide();
        $('#coursesrch-val').show();

        $("#coursesrch-val").load('<?php echo base_url() . "dashboard/Institue_allcoursesrch/"; ?>' + putsrchval);
      }
    });

    $(document).on('click', '.srch-close', function() {
      $('.srch-close').hide();
      $('.srch-loader').hide();
      $('#allcours-val').show();
      $('#coursesrch-val').hide();
      $('.cus-srch-input').val('');
    });
  </script>