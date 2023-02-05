<style type="text/css">
 .tdhover tr:hover td { background: #f3f3f3;}
 .tdhover tr:hover .mati-opt-blk { opacity: 1}
 .mlisticons img { position:relative; width:40px;top:15px}

  .user-sh-blk { width: 50px; height: 50px;  border-radius: 100%; overflow: hidden;text-align: center; color: #fff; }
 .def-usr-img { width: 30px; position: relative; top: 8px; opacity: 0.4}
  .user-sh-blk i{ font-size: 23px; color: #fff; margin-top: 20px; position: relative;}
.data-aro { width: 36px; height: 36px; border-radius: 100%; padding: 0px 5px;}
.data-aro i { opacity: 0.7;}
.filterdisplay { border:1px solid #ccc; padding: 5px 5px 5px 7px; top: 2px; position: relative; border-radius: 20px; font-size: 13px}
.sml-cls {padding: 0; margin-left: 10px; border-radius: 8px;}
.display-window { position: absolute; width: 260px; height: 330px; background: #fff; z-index: 99; top: 10px; left: 70px; }
.display-window .hdr { position: absolute; width: 260px; height: 50px; background: #343434;}
.display-window .foter { position: absolute; width: 260px; height: 37px; background: #fff; bottom: 0;}
.display-window .inrcontent { position: absolute; width: 260px; height: 240px; top: 50px; background:;overflow-y: scroll; overflow-x: hidden;}
.display-window .hdr h3 { color: #fff; font-size: 16px; margin: 15px 10px;}
.display-window .hdr i { position: absolute; right: 0; top: 14px; right: 7px; color: #fff; font-size: 18px; }
.filted-rit-data {position:absolute; right:0px; top:0; height:50px; width:210px; background:#fff;padding:17px 20px;font-size:15px; display: none}
.nm-srch-blk { height: 40px; background: red; position: absolute; top: 8px; display: block; width: 93%; left: 0; z-index: 99; margin-left: 70px;}
.nm-srch-input { width: 100%; height: 40px; border:0px solid #ccc; padding-left: 28px; padding-right: 60px}
.nm-srch-input:focus { outline: none}
.nm-searchi{ position: absolute; z-index: 99; font-size: 18px; top: 11px; opacity: 0.5}
.nm-srch-cls { position: absolute; right: 8px;z-index: 99;}
</style>
<div class="row body-data" style="padding-top:20px;position:relative">
  <h3 style="font-family: 'Montserrat';">All Students</h3>
  <div style="position:absolute; right:0;">
  <!-- <button id="crt-vid-pop" type="button" class="btn btn-outline-secondary "><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/plus-v.png" width="21"> &nbsp;<span style="color:#000; font-weight:bold;">CREATE VIDEO</span></button> -->
  </div>
</div>
<br>
<div class="row box-sdow">
  <div class="col-md-12 fix-pad" style="position:relative">
  <div style="width:50px; display:inline-block">
  <button type="button" class="btn" id="filterblk" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin:0;"><i class="fa fa-fw fa-filter"></i></button>
           <div class="dropdown-menu dropdown-menu-left" aria-labelledby="filterblk" style=" width:250px;">
        <a class="dropdown-item" id="flt-by-cours" style="max-width:250px;">Course and class</a>
        <a class="dropdown-item" id="flt-by-name" style="max-width:250px;">Names</a>
      </div>
  </div>
    <span id="def-f-txt" class="gray sml1">Filter</span> <span class="filterdisplay" style="display:none"><div style="max-width:160px;display:inline-block;overflow:hidden;white-space: nowrap;position:relative;top:5px;"><span id="show-cours-txt"></span></div><span class="btn sml-cls"><i id="cls-cour-flt" class="fa fa-fw fa-close"></i></span></span>

    <div class="row nm-srch-blk" style="display: none;">
    <i class="fa fa-fw fa-search nm-searchi" ></i>
    <button class="btn btn-defult active nm-srch-cls"><i class="fa fa-fw fa-close" ></i></button>
    <input type="text" id="nmsearch" class="nm-srch-input" placeholder="Search...">
    </div>

    <div class="display-window box-sdow" style="display:none">
      <div class="hdr"><h3>Course/Class</h3><i id="clsd-win" class="fa fa-fw fa-close"></i>
      <input id="filterval" type="hidden"><input id="courstext" type="hidden"></div>
      <div class="inrcontent">
        <?php foreach ($mycourse as $mycourse) { 
                 ?>
            <div class="col-md-12" style="padding:5px 0px 0px 15px;">
                      <div class="checkbox">
                        <label style="color:#000">
                          <input type="checkbox" value="<?php echo $mycourse['cours_nm']; ?>" id="takec_<?php echo $mycourse['mycours_id']; ?>" data-course="<?php echo $mycourse['mycours_id']; ?>" data-courstxt="<?php echo $mycourse['cours_nm']; ?>" class="allcoursub"> <?php echo $mycourse['cours_nm']; ?>
                        </label>
                      </div>
            </div>
         <?php } ?>
      </div>
      <div class="foter"> <button id="cours-flt-aply" class="btn btn-small pull-right btn-info">APPLY</button></div>
    </div>

   <input type="hidden" value="<?php echo $tot_student; ?>" id="totdata">
   <input type="hidden" value="<?php if($tot_student > 49){echo '50';}else {echo $tot_student;} ?>" id="nextdata">
   <input type="hidden" value="" id="leftdata">
   <button id="load_next" type="button" class="btn pull-right data-aro" style="margin:0;"><i class="fa fa-fw fa-chevron-right"></i></button>
   <button id="load_prevd" type="button" class="btn pull-right data-aro" style="margin:0;"><i class="fa fa-fw fa-chevron-left"></i></button>
   <span class="pull-right gray sml1" style="margin-top:8px; margin-right:10px;">
   <span id="fromdval">1</span> - <span id="todval"><?php if($tot_student > 49){echo '50';}else {echo $tot_student;} ?></span>
    of <?php echo $tot_student ?> </span> 
    <div class="gray filted-rit-data" style="" align="right"></div>
  </div>
  <div class="col-md-12 hir-lin"></div>

 <div id="showmemberdata" style="width:100%;">
    
 </div>


</div>
<script>$(document).ready(function() { $('div').bootstrapMaterialDesign(); });</script>
<script type="text/javascript">
    $(document).ready(function() {
          $("#showmemberdata").load('<?php echo base_url()."dashboard/allstudent_data?456"; ?>');
          
        });
var coursfilter = 0;
$('#load_next').click(function(){
  var havecount = $('#nextdata').val();
  var havecountDisp = $('#todval').html();
  var totdata = $('#totdata').val();

    if(totdata > 50){
      var lastleftdata = parseInt(totdata) - parseInt(havecount);
      console.log(lastleftdata);
        if(lastleftdata == 0){
          console.log('1');
        }else if(lastleftdata <= 50){
             $("#showmemberdata").load('<?php echo base_url()."dashboard/allstudent_data/"; ?>'+havecount);
             var newcount = parseInt(havecount) + parseInt(lastleftdata);
             $('#nextdata').val(newcount);
             $('#fromdval').html(havecount);
                $('#todval').html(newcount);
                $('#leftdata').val(lastleftdata);
              console.log('2');
        }else if(lastleftdata > 50){
           
            $("#showmemberdata").load('<?php echo base_url()."dashboard/allstudent_data/"; ?>'+havecount);
             var newcount = parseInt(havecount) + parseInt(50);

            $('#nextdata').val(newcount);
            $('#fromdval').html(havecount);
            $('#todval').html(newcount);
            console.log('3');
        }
        console.log('left');
    }

     
  
});


$('#load_prevd').click(function(){
  var havecount = $('#nextdata').val();
  var leftdata =  $('#leftdata').val();
  var totdata = $('#totdata').val();
  if(havecount > 50){
    if(leftdata){
      
      var maincnt = parseInt(totdata) - parseInt(leftdata);
      var newcount = parseInt(maincnt) - parseInt(50);
       $("#showmemberdata").load('<?php echo base_url()."dashboard/allstudent_data/"; ?>'+newcount);
       $('#nextdata').val(maincnt);
       $('#fromdval').html(newcount);
      $('#todval').html(maincnt);
      $('#leftdata').val('');
      console.log('leftdata');
    }else{
        var newcount = parseInt(havecount) - parseInt(50);
        var newcounthit = parseInt(newcount) - parseInt(50);
       $("#showmemberdata").load('<?php echo base_url()."dashboard/allstudent_data/"; ?>'+newcounthit);
        $('#nextdata').val(newcount);
        $('#fromdval').html(parseInt(newcount) - parseInt(50));
        $('#todval').html(newcount);
    }
      // var newcount = parseInt(havecount) - parseInt(15);
      // $('#nextdata').val(newcount);
      // $("#showmemberdata").load('<?php echo base_url()."dashboard/allstudent_data/"; ?>'+newcount);

      // var oldcnt = parseInt(newcount) - parseInt(15);
      // if(oldcnt == 0){
      //   oldcnt = 1;
      // }else{
      //   oldcnt = parseInt(newcount) - parseInt(15);
      // }
      // $('#fromdval').html(oldcnt);
      // $('#todval').html(newcount);
 }

});

$('#clsd-win').click(function(){
  $('.display-window').hide();
});
$('#flt-by-cours').click(function(){
  $(".nm-srch-blk").hide();
  $('.display-window').show();
});


  $('.allcoursub').click(function(){
    var strp_cours = $(this).attr('data-course');
    var strp_cours_nm = $(this).attr('data-courstxt');
  var id = this.id;
   var hvtxtval = $('#courstext').val();
  var hvval = $('#filterval').val();
  var mkary = hvval+','+strp_cours;
   var mkarytxt = hvtxtval+','+strp_cours_nm;

  var checkBox = document.getElementById(id);
   if(checkBox.checked == true){
      $('#filterval').val(mkary); 
     $('#courstext').val(mkarytxt); 
     
   }else{
      var rvval = ','+strp_cours;
          hvval = hvval.replace(rvval, '');   
          $('#filterval').val(hvval); 
       var rvvaltxt = ','+strp_cours_nm;
           hvtxtval = hvtxtval.replace(rvvaltxt, ''); 
             $('#courstext').val(hvtxtval); 
    
   }
  var getmaintxt = $('#courstext').val(); 
   var getmaintxt = getmaintxt.substr(1);
   if(getmaintxt){
    $('#show-cours-txt').html(getmaintxt); 
   }else{
    
   }
 
});

$('#show-cours-txt').click(function(){
  $('.display-window').show();
});
$('#cls-cour-flt').click(function(){
  $('.allcoursub').prop('checked', false);
  $('.filterdisplay').hide(); 
   $('#def-f-txt').show(); 
   $('#courstext').val('');
   $('#filterval').val('');
   $("#showmemberdata").load('<?php echo base_url()."dashboard/allstudent_data/"; ?>');
   coursfilter = 0;
});
$('#cours-flt-aply').click(function(){
 var crsids =  $('#filterval').val();
  if(crsids){
     $('#def-f-txt').hide(); 
    $('.filterdisplay').show(); 
    $("#showmemberdata").load('<?php echo base_url()."dashboard/allstudent_data/0/1/"; ?>'+crsids);
    coursfilter = 1;
   }else{
    $('.filterdisplay').hide(); 
    $('#def-f-txt').show(); 
   }
   
});

$("#flt-by-name").click(function(){
  $('#cls-cour-flt').click();
   $('.display-window').hide();
   $(".nm-srch-blk").show();
});

$('.nm-srch-cls').click(function(){
  $(".nm-srch-blk").hide();
  $("#nmsearch").val('');
   $("#showmemberdata").load('<?php echo base_url()."dashboard/allstudent_data/"; ?>');
});


var typingTimer;                //timer identifier
var doneTypingInterval = 1000;  //time in ms, 5 second for example
var $input = $('#nmsearch');

$input.on('keyup', function () {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(doneTypingnm, doneTypingInterval);
});
//on keydown, clear the countdown 
$input.on('keydown', function () {
  clearTimeout(typingTimer);
});

//user is "finished typing," do something
function doneTypingnm () {
 var searchval = $("#nmsearch").val();
  $("#showmemberdata").load('<?php echo base_url()."dashboard/allstudent_data/0/2/"; ?>'+searchval);
}
</script>