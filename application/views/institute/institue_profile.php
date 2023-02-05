  <div class="row ">
    <div class="col-md-4" align="center">
      <form name="photo" id="updatepicfrom" enctype="multipart/form-data" action="<?php echo base_url(); ?>dashboard/Updateprofile_pic" method="post">
        <div class="round-problk">
          <div class="iner-round smth-sdwo">

            <img src="<?php echo base_url() . 'assets-public/' ?>dist/img/def-ins.png" class="def-ins-pic">
            <?php if ($profdata['pro_pic']) { ?>
              <img src="<?php echo base_url() . 'assets/' ?>pro-mid/<?php echo @$profdata['pro_pic'] ?>" class="output-pic">
            <?php } ?>
            <img id="outpuimg" src="" class="output-pic">
          </div>
          <div class="addpic1"><img src="<?php echo base_url() . 'assets-public/' ?>dist/img/addpi1.png"></div>
          <input type="file" name="file" class="pro-big-in" accept="image/*" onchange="loadFile(event)">
        </div>
      </form>
    </div>
    <div class="col-md-8 body-data" style="padding-top:20px;">
      <h1 class="showbrnnm">
        <?php if ($profdata['insti_nm']) { ?>
          <?php echo @$profdata['insti_nm'] ?>
        <?php } else { ?>
          Your Brand name
        <?php } ?>
      </h1>
      <?php if ($profdata['address']) { ?>
        <h2 class="showaddr"><?php echo @$profdata['address'] ?></h2>
      <?php } else { ?>
        <h2 class="showaddr">Full address</h2>
      <?php } ?>
      <?php if ($profdata['phone_no']) { ?>
        <h2 class="showphn"><?php echo @$profdata['phone_no'] ?></h2>
      <?php } else { ?>
        <h2 class="showphn">8888888888, 8888888888</h2>
      <?php } ?>

    </div>
  </div>
  <div class="row" style="height:50px;"></div>

  <div class="row box-sdow">
    <div class="col-md-12">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a style="cursor: pointer;" class="nav-link active prodt ">Profile Data</a>
        </li>
        <li class="nav-item">
          <a style="cursor: pointer;" class="nav-link active podt ">Premium Setting</a>
        </li>
        <!-- <li class="nav-item">
          <a style="cursor: pointer;" class="nav-link active  ">Connected People</a>
        </li>
        <li class="nav-item">
          <a style="cursor: pointer;" class="nav-link active  phdt">Photo</a>
        </li>
        <li class="nav-item">
          <a style="cursor: pointer;" class="nav-link active  viddt">Video</a>
        </li> -->
        <!--  <li class="nav-item">
    <a class="nav-link" href="#">Personal Data</a>
   </li> -->
      </ul>
    </div>
  </div>
  <div class="row box-sdow profildt">
    <div class="col-md-6 " align="" style="color:; padding:3% 3% 5% 5%">

      <form id="updateproffrom" enctype="multipart/form-data" action="<?php echo base_url(); ?>dashboard/Updateprofile" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">
            <?php if ($profdata['mem_sub_typ'] == 'institute') {
              echo "Institute Name";
            } else if ($profdata['mem_sub_typ'] == 'ind-tea') {
              echo "Brand name";
            } else if ($profdata['mem_sub_typ'] == 'tution') {
              echo "Tution name";
            } else if ($profdata['mem_sub_typ'] == 'academy') {
              echo "Academy name";
            } else if ($profdata['mem_sub_typ'] == 'school') {
              echo "School name";
            } ?>

          </label>
          <input type="text" class="form-control" name="instnm" id="instnm" aria-describedby="innm" placeholder="Enter Name" value="<?php echo @$profdata['insti_nm'] ?>">
          <small id="innm" class="form-text text-muted">Visible for the public </small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Address</label>
          <input type="text" class="form-control" name="instaddr" id="instaddr" placeholder="Full address" value="<?php echo @$profdata['address'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">City</label>
          <input type="text" class="form-control" name="instcity" id="instcity" placeholder="Enter city" value="<?php echo @$profdata['city'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">State</label>
          <input type="text" class="form-control" name="inststat" id="inststat" placeholder="Enter state" value="<?php echo @$profdata['state'] ?>">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Contact No.</label>
          <input type="text" class="form-control" name="instcon" id="instcon" placeholder="8888888888, 8888888888" value="<?php echo @$profdata['phone_no'] ?>">
          <small id="innm" class="form-text text-muted">Visible for the public </small>
        </div>
        <br><br>


        <button id="updateprodata" type="submit" class="btn btn-primary btn-raised">Submit</button>
      </form>
    </div>
    <div class="col-md-6" style="padding-top:4%" align="center">
      <img src="<?php echo base_url() . 'assets-public/' ?>dist/img/notprofi.png" width="70%">
    </div>
  </div>
  <div class="row box-sdow postdt">
    <div class="col-md-12 " id="postdt" align="" style="color:; padding:3% 3% 5% 5%">
      
    </div>
  </div>
  <div class="row box-sdow photodt">
    <div class="col-md-6 " id="picdt" align="" style="color:; padding:3% 3% 5% 5%">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus obcaecati, illo amet quas deserunt veniam exercitationem reiciendis expedita porro ab quae non, adipisci laudantium qui ipsam libero. Tempore doloribus molestias labore ea possimus! Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique beatae repudiandae animi minima delectus laboriosam aliquam! Culpa voluptatum libero praesentium pariatur magni.
    </div>
  </div>
  <div class="row box-sdow  videodt">
    <div class="col-md-6 " align="" id="viddt" style="color:; padding:3% 3% 5% 5%">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus obcaecati, illo amet quas deserunt veniam exercitationem.
    </div>
  </div>

  <script type="text/javascript">
    $('.postdt').hide();
    $('.photodt').hide();
    $('.videodt').hide();

    $('.prodt').click(function() {
      $('.postdt').hide();
      $('.profildt').show();
      $('.photodt').hide();
      $('.videodt').hide();
    });
    $('.podt').click(function() {
      $('.postdt').show();
      $('#postdt').load('<?php echo base_url(); ?>institute/bus_pre');
      $('.profildt').hide();
      $('.photodt').hide();
      $('.videodt').hide();
    });
    $('.phdt').click(function() {
      $('.postdt').hide();
      $('.profildt').hide();
      $('.photodt').show();
      $('.videodt').hide();
      $('#picdt').load('<?php echo base_url(); ?>dashboard/phodt');
    });
    $('.viddt').click(function() {
      $('.postdt').hide();
      $('.profildt').hide();
      $('.photodt').hide();
      $('.videodt').show();
      $('#viddt').load('<?php echo base_url(); ?>dashboard/viddt');
    });

    $('#instaddr').keyup(function() {
      onpageputadd();
    });
    $('#instcon').keyup(function() {
      onpageputadd();
    });
    $('#instnm').keyup(function() {
      onpageputadd();
    });

    function onpageputadd() {
      var bndnm = $('#instnm').val();
      var addre = $('#instaddr').val();
      var phonn = $('#instcon').val();
      var city = $('#instcity').val();
      var state = $('#inststat').val();
      $('.showbrnnm').html(bndnm);
      $('.showaddr').html(addre);
      $('.showphn').html(phonn);
    }

    $('#updateprodata').click(function() {

      $('#updatesliderfrom').submit();
    });
    $(document).ready(function(e) {

      $('#updateproffrom').on('submit', (function(e) {
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

    var loadFile = function(event) {
      var outpuimg = document.getElementById('outpuimg');
      outpuimg.src = URL.createObjectURL(event.target.files[0]);
      $('#updatepicfrom').submit();
    };

    $(document).ready(function(e) {

      $('#updatepicfrom').on('submit', (function(e) {
        e.preventDefault();
        var formData = new FormData(this);

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
  </script>