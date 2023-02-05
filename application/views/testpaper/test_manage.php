

<style type="text/css">
	.cus-test-inp { width: 100%; background: none;border:none; }
	.cus-test-inp:focus {outline: none; }
	.cus-test-inp2 { width: 100%; background: none;border:none; font-size: 14px }
	.cus-test-inp2:focus {outline: none; }
	.cus-test-inblk { background: #ededed; padding: 28px 10px 5px 10px; border-radius: 5px; position: relative; margin-bottom: 10px;}
	.cus-test-inblk label { position: absolute;top: 8px; left: 10px; font-size: 12px}
	.cus-test-inblk2 { background: #fff; border:1px solid #ccc; padding: 28px 10px 10px 10px; border-radius: 5px; position: relative; margin-bottom: 10px;}
	.cus-test-inblk2 label { position: absolute;top: 8px; left: 10px; font-size: 12px}

	.cus-test-inblk3 { background: #fff; border:1px solid #ccc; padding: 5px 10px 10px 10px; border-radius: 5px; position: relative; margin-bottom: 10px;}
	.test-ab-btn { position: absolute; right: 0; top: 0; padding: 5px}
	.body-title { position: relative;}
	.body-title h3 {font-family: 'Montserrat'; font-size: 16px; padding: 15px 0px 10px 0px;}
	.body-title .rit-btn-blk { position: absolute; right: 15px; top: 7px;}
	.activechk { background-color: green; color: #fff;}
	.activechk:hover { background-color: green; color: #fff;}
	.activechk:focus { background-color: green; color: #fff;}
	.litchk i { opacity: 0.8;}
	.photo-blk { width: 100px; height: 70px; background: #ededed; border-radius: 5px; overflow: hidden; position: relative;}
	.photo-blk:hover { background: #e6e5e5;}
	.photo-blk i{ position: absolute; top: 25px; left: 40px;}
	.photo-blk img { width: 100%;}
	.photo-input { position: absolute;width: 100px; height: 70px; opacity: 0;}
	.optin-col {padding-top:10px; padding-left:50px;position:relative}
	.optn-num {position: absolute;top: 20px;left: 18px;}
	.optchkactiv i { opacity: 1; }
	.optchkdeactiv i { opacity: 0; }

	
</style>



 

<div class="row body-data fix-iner-header" style="">
  <button id="back_dash" class="btn back-btn-fix " style="position:absolute"><i class="fa fa-fw fa-arrow-left"></i></button><h3 style="font-family: 'Montserrat'; margin-left:40px">Paper Questions </h3>
  <div class="right-btn-blk" style="">
  <button id="savedata_paper" class="btn btn-primary btn-raised pull-right">SAVE DRAFT</button>
  <button id="paperViewOpn" class="btn active pull-right" style="margin-right:10px;font-size:17px;padding:7px 10px 5px 10px;"><i class="fa fa-fw fa-external-link"></i></button>
  <button id="paperSetting" class="btn active pull-right" style="margin-right:10px;font-size:18px; padding:5px 10px 5px 10px;"><i class="fa fa-fw fa-gear"></i></button>

  </div>
</div>
<div class="row full-wpage" style="padding-top:80px;min-height:700px">
	<div class="col-md-8">
	  <div class="row">
	  <form id="updatepaper" enctype="multipart/form-data" method="post">


	   <div class="row">
	  	<div class="col-md-12">
	  		<div class="cus-test-inblk">
		   <button type="button" id="edittitle" class="test-ab-btn btn"><i class="fa fa-fw fa-pencil"></i></button>
			<label>Title</label>
			 <input class="cus-test-inp" name="newtitle" id="newtitle" value="<?php echo $paper['title'] ?>">
			 <input type="hidden" name="testpaperid" id="testpaperid" value="<?php echo $paper['tp_mid'] ?>">
		   </div>
	  	</div>

		<div class="col-md-12">
		<div class="cus-test-inblk ">
		   <button type="button" id="editcorse" class="test-ab-btn btn"><i class="fa fa-fw fa-pencil"></i></button>
			<label>Courses/Class/Subject</label>
			 <input id="selectedcours" data-toggle="modal" data-target="#chossubj" class="cus-test-inp" value="<?php echo ltrim($paper['show_cours_txt'], ',')  ?>">
			 <input type="hidden" name="coursid" id="coursid" value="<?php echo $paper['show_cours_ids'] ?>">
			 <input type="hidden" name="courstext" id="courstext" value="<?php echo $paper['show_cours_txt'] ?>">
		</div>
		</div>
		<div class="col-md-6 col-sm-6">
		<div class="cus-test-inblk " style="">
		   <button type="button" id="edittim" class="test-ab-btn btn"><i class="fa fa-fw fa-pencil"></i></button>
			<label>Paper timing</label>
			 <input id="newtimesho" data-toggle="modal" data-target="#timemodal" name="testtime_show" class="cus-test-inp" value="<?php echo $paper['time_show'] ?>">
			 <input type="hidden" id="tst_time" name="testtime" value="<?php echo $paper['time'] ?>">
		</div>
		</div>
		<div class="col-md-6 col-sm-6">
		<div class="cus-test-inblk ">
		   <button type="button" id="edimaks" class="test-ab-btn btn"><i class="fa fa-fw fa-pencil"></i></button>
			<label>Total marks</label>
			 <input class="cus-test-inp" name="marknum" id="marknum" value="<?php echo $paper['tot_marks'] ?>">
		</div>
		</div>
		</div>
		</form>
		<div class="col-md-12" style="height:10px;"></div>
		<div class="col-md-12 body-title" style=""><h3 class="forbig">Questions,Question blocks</h3><h3 class="for-small">Q+</h3>
			<div class="rit-btn-blk">
			<button id="ques-blk" class="btn btn-raised litchk"><i class="fa fa-fw fa-chevron-down"></i> Question</button>
			<button id="quesblock-blk" class="btn btn-raised activechk"><i class="fa fa-fw fa-chevron-down"></i> Q. Block</button>
			</div>
		<div style="border-bottom:1px solid #ddd"></div>
		</div>
		
		<form id="updatequostion" enctype="multipart/form-data" method="post">
		<input type="hidden" name="question_id" value="0">
		<div id="ques-blk-area" class="row" style="display:none">
		<div class="col-md-2" style="padding-top:20px;padding-right:0;">
			<div class="cus-test-inblk2">
			<label>#*</label>
			<input type="text" class="cus-test-inp2" name="slnum" id="slnum" placeholder="ex.1/A" >
			 <input type="hidden" id="" name="testpaperid" value="<?php echo $paper['tp_mid'] ?>">
			 <input type="hidden" id="forqs_tid" name="quesid" value="0">
		    </div>
		</div>
		  <style type="text/css">
  #cke_11 {}
   </style>
		<div class="col-md-10" style="padding-top:20px;">
			<div class="cus-test-inblk2">
			<label>Question* </label>
			<textarea type="text" class="cus-test-inp2" name="question" id="question" placeholder="Type question.." style="display:none"></textarea>
		    <textarea cols="10" id="editor1" name="editor1" data-sample-short rows="3" ></textarea>
		    </div>
		</div>
		<div class="col-md-12" style="padding-top:5px;position:relative;">
			<div class="photo-blk">
			 <img id="outpuimg" src="" class="output-pic" style="display:none">
				<i class="fa fa-fw fa-file-image-o"></i>
				<input id="qes_img" type="file" name="file" class="photo-input" accept="image/*" onchange="loadFile(event)">
			</div> 
			<span style="position:absolute; top:55px;left:130px;font-size:12px;">Add image..</span>
		</div>

		<div class="col-md-12" style="padding-top:20px;">
		Options*
		</div>
		<div class="col-md-12 optin-col" style=""><span class="optn-num">I.</span>
			<div class="cus-test-inblk3"><span style="font-size:12px">Type Option I</span>
			<textarea class="cus-test-inp2" name="op1" id="op1" placeholder="Type option I.." style="display:none"></textarea>
			<textarea cols="10" id="editor2" name="editor2" data-sample-short rows="3" ></textarea>
		    </div>
		</div>
		<div class="col-md-12 optin-col" style=""><span class="optn-num">II.</span>
			<div class="cus-test-inblk3"><span style="font-size:12px">Type Option II(if any)</span>
			<textarea class="cus-test-inp2" name="op2" id="op2" placeholder="Type option II..(if any)" style="display:none"></textarea>
			<textarea cols="10" id="editor3" name="editor3" data-sample-short rows="3" ></textarea>
		    </div>
		</div>
		<div class="col-md-12 optin-col" style=""><span class="optn-num">III.</span>
			<div class="cus-test-inblk3"><span style="font-size:12px">Type Option III(if any)</span>
			<textarea class="cus-test-inp2" name="op3" id="op3" placeholder="Type option III..(if any)" style="display:none"></textarea>
			<textarea cols="10" id="editor4" name="editor4" data-sample-short rows="3" ></textarea>
		    </div>
		</div>
		<div class="col-md-12 optin-col" style=""><span class="optn-num">IV.</span>
			<div class="cus-test-inblk3"><span style="font-size:12px">Type Option IV(if any)</span>
			<textarea class="cus-test-inp2" name="op4" id="op4" placeholder="Type option IV..(if any)" style="display:none"></textarea>
			<textarea cols="10" id="editor5" name="editor5" data-sample-short rows="3" ></textarea>
		    </div>
		</div>
		<div class="col-md-12 optin-col" style=""><span class="optn-num">V.</span>
			<div class="cus-test-inblk3"><span style="font-size:12px">Type Option V(if any)</span>
			<textarea class="cus-test-inp2" name="op5" id="op5" placeholder="Type option V..(if any)" style="display:none"></textarea>
			<textarea cols="10" id="editor6" name="editor6" data-sample-short rows="3" ></textarea>
		    </div>
		</div>
		<div class="col-md-12 optin-col" style=""><span class="optn-num">VI.</span>
			<div class="cus-test-inblk3"><span style="font-size:12px">Type Option VI(if any)</span>
			<textarea class="cus-test-inp2" name="op6" id="op6" placeholder="Type option VI..(if any)" style="display:none"></textarea>
		    <textarea cols="10" id="editor7" name="editor7" data-sample-short rows="3" ></textarea>
		    </div>
		</div>
		<div class="col-md-3"><sapn style="font-size:13px;">Select Correct Ans*</span><br>
			<input type="hidden" name="crt_ans" id="crt_ans" value="">
			<button class="btn btn-raised " id="notifblk" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background:#aa4de0;color:#fff;" onclick="getallopt();"><i class="fa fa-fw fa-check"></i> Optiopn <span id="showopttxt">0</span></button>
			
           <div class="dropdown-menu dropdown-menu-left" aria-labelledby="notifblk" style=" left:-250px; width:250px;">
	        <a id="I" class="dropdown-item optans optchkdeactiv opchk_1" style="max-width:250px;">
	        <i class="fa fa-fw fa-check"></i> &nbsp;&nbsp;Option I
	        </a>
	        <a id="II" class="dropdown-item optans optchkdeactiv opchk_2" style="max-width:250px;"><i class="fa fa-fw fa-check"></i> &nbsp;&nbsp;Option II</a>
	        <a id="III" class="dropdown-item optans optchkdeactiv opchk_3" style="max-width:250px;"><i class="fa fa-fw fa-check"></i> &nbsp;&nbsp;Option III</a>
	        <a id="IV" class="dropdown-item optans optchkdeactiv opchk_4" style="max-width:250px;"><i class="fa fa-fw fa-check"></i> &nbsp;&nbsp;Option IV</a>
	        <a id="V" class="dropdown-item optans optchkdeactiv opchk_5" style="max-width:250px;"><i class="fa fa-fw fa-check"></i> &nbsp;&nbsp;Option V</a>
	        <a id="VI" class="dropdown-item optans optchkdeactiv opchk_6" style="max-width:250px;"><i class="fa fa-fw fa-check"></i> &nbsp;&nbsp;Option VI</a>
	      </div>
		</div>

		<div class="col-md-4" style="padding-top:10px;">
			<div class="cus-test-inblk2">
			<label>Marks for this question*</label>
			<input type="text" class="cus-test-inp2" name="s_marks" id="s_marks" placeholder="Enter marks">
			<input type="hidden" name="qs_typ" value="q">
		    </div>
		</div>
		<div class="col-md-12" style="padding-top:10px; border-top:1px solid #ddd; font-size:12px" align=""><span style="margin-top:5px">* Check properly before add this question! </span>
			<button type="button"  id="cancle_ques" class="btn btn-defult active pull-right" style="margin-left:10px;display:none">Cancel</button>
			<button type="button"  id="savedata_ques" class="btn btn-primary btn-raised pull-right">Save question</button>
			
		</div>
		
		</div>
		</form>
		<form class="col-md-12" id="updatequostionblock" enctype="multipart/form-data" method="post" style="padding:0;">
		<input type="hidden" name="question_id" value="0">
		<div id="quesblock-blk-area" class="row" style="display:">
			<div class="col-md-2" style="padding-top:20px;padding-right:0;">
			<div class="cus-test-inblk2">
			<label>#*</label>
			<input type="text" class="cus-test-inp2" name="slnum_blk" id="slnum_blk" placeholder="ex.1/A" >
			 <input type="hidden" id="" name="testpaperid" value="<?php echo $paper['tp_mid'] ?>">
			 <input type="hidden" id="forqsblk_tid" name="quesid" value="0">
		    </div>
		</div>
		<div class="col-md-10" style="padding-top:20px;padding-bottom:10px;">
			<div class="cus-test-inblk2">
			<label>Question block* </label>
			<textarea type="text" class="cus-test-inp2" name="question_blk" id="question_blk" placeholder="Type block details.."></textarea>
			<input type="hidden" name="qs_typ" value="t">
		    </div>
		</div>

		<div class="col-md-12" style="padding-top:10px; border-top:1px solid #ddd; font-size:12px" align=""><span style="margin-top:5px">* Check properly before add this question block! </span>
			<button type="button"  id="cancle_quesblk" class="btn btn-defult active pull-right" style="margin-left:10px;display:none">Cancel</button>
			<button type="button"  id="savedata_quesblock" class="btn btn-primary btn-raised pull-right">Save question block</button>
		</div>
		</div>
		</form>
		</div>
	</div>
	<div class="col-md-4" style="">
		<div id="question_list"></div>
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
      <input type="hidden" id="coursid_alt" value="<?php echo $paper['show_cours_ids'] ?>">
      <input type="hidden" id="courstext_alt" value="<?php echo $paper['show_cours_txt'] ?>">

      <?php foreach ($mycourse as $key => $value) {
      ?>
      <div class="col-md-12" style="padding:0;">
        <?php echo $value['cours_nm']?>

        <div class="row" style="padding-bottom:30px; padding-left:50px; padding-top:5px">
         <?php 
         $subjects = $this->db->get_where("ins_subject", array("for_memid" =>$inst_id, "mycous_id" =>$value['mycours_id']))->result_array();
          ?>
           <?php foreach ($subjects as $key => $values) {
          ?>
           <div class="col-md-12" style="padding:0;">
            <?php 
            $thiscoursids = $value['mycours_id'].'_'.$values['subj_id'];
             $coursarry = explode(',',$paper['show_cours_ids']);
             ?>
                <div class="checkbox">
                      <label style="color:#000">
                        <input type="checkbox" id="<?php echo $value['mycours_id']?>_<?php echo $values['subj_id']?>" value="<?php echo $value['mycours_id']?>_<?php echo $values['subj_id']?>" class="allcoursub" data-course ="<?php echo $value['cours_nm']?>" data-subj ="<?php echo $values['subject_nm']?>" <?php if (in_array($thiscoursids, $coursarry)) {echo 'checked';} ?>> <?php echo $values['subject_nm']?>
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



    <!-- time Modal -->
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
      <input type="hidden" id="tst_time_alt" value="<?php echo $paper['time'] ?>">

      <div class="col-md-12" style="padding:0;">
        <div class="row" style="padding-bottom:30px; padding-left:50px; padding-top:5px">
       
           <div class="col-md-12" style="padding:0;">
                   <div class="radio">
                      <label style="color:#000">
                        <input type="radio" name="optionsTime" id="" value="0:15_15 min" class="alltime" <?php if($paper['time'] == '0:15'){echo 'checked';} ?>> &nbsp;&nbsp;15 min
                      </label>
                   </div>
           </div>
           <div class="col-md-12" style="padding:0;">
                   <div class="radio">
                      <label style="color:#000">
                        <input type="radio" name="optionsTime" id="" value="0:30_30 min" class="alltime" <?php if($paper['time'] == '0:30'){echo 'checked';} ?>> &nbsp;&nbsp;30 min
                      </label>
                   </div>
           </div>
           <div class="col-md-12" style="padding:0;">
                   <div class="radio">
                      <label style="color:#000">
                        <input type="radio" name="optionsTime" id="" value="0:45_45 min" class="alltime" <?php if($paper['time'] == '0:45'){echo 'checked';} ?>> &nbsp;&nbsp;45 min
                      </label>
                   </div>
           </div>
           <div class="col-md-12" style="padding:0;">
                   <div class="radio">
                      <label style="color:#000">
                        <input type="radio" name="optionsTime" id="" value="1:00_1 hour" class="alltime" <?php if($paper['time'] == '1:00'){echo 'checked';} ?>> &nbsp;&nbsp;1 hour
                      </label>
                   </div>
           </div>
           <div class="col-md-12" style="padding:0;">
                   <div class="radio">
                      <label style="color:#000">
                        <input type="radio" name="optionsTime" id="" value="1:15_1 hour 15 min" class="alltime" <?php if($paper['time'] == '1:15'){echo 'checked';} ?>> &nbsp;&nbsp;1 hour 15 min
                      </label>
                   </div>
           </div>
           <div class="col-md-12" style="padding:0;">
                   <div class="radio">
                      <label style="color:#000">
                        <input type="radio" name="optionsTime" id="" value="1:30_1 hour 30 min" class="alltime" <?php if($paper['time'] == '1:30'){echo 'checked';} ?>> &nbsp;&nbsp;1 hour 30 min
                      </label>
                   </div>
           </div>
           <div class="col-md-12" style="padding:0;">
                   <div class="radio">
                      <label style="color:#000">
                        <input type="radio" name="optionsTime" id="" value="1:45_1 hour 45 min" class="alltime" <?php if($paper['time'] == '1:45'){echo 'checked';} ?>> &nbsp;&nbsp;1 hour 45 min
                      </label>
                   </div>
           </div>
           <div class="col-md-12" style="padding:0;">
                   <div class="radio">
                      <label style="color:#000">
                        <input type="radio" name="optionsTime" id="" value="2:00_2 hour" class="alltime" <?php if($paper['time'] == '2:00'){echo 'checked';} ?>> &nbsp;&nbsp;2 hour
                      </label>
                   </div>
           </div>
           <div class="col-md-12" style="padding:0;">
                   <div class="radio">
                      <label style="color:#000">
                        <input type="radio" name="optionsTime" id="" value="2:15_2 hour 15 min" class="alltime" <?php if($paper['time'] == '2:15'){echo 'checked';} ?>> &nbsp;&nbsp;2 hour 15 min
                      </label>
                   </div>
           </div>
           <div class="col-md-12" style="padding:0;">
                   <div class="radio">
                      <label style="color:#000">
                        <input type="radio" name="optionsTime" id="" value="2:30_2 hour 30 min" class="alltime" <?php if($paper['time'] == '2:30'){echo 'checked';} ?>> &nbsp;&nbsp;2 hour 30 min
                      </label>
                   </div>
           </div>
           <div class="col-md-12" style="padding:0;">
                   <div class="radio">
                      <label style="color:#000">
                        <input type="radio" name="optionsTime" id="" value="2:45_2 hour 45 min" class="alltime" <?php if($paper['time'] == '2:45'){echo 'checked';} ?>> &nbsp;&nbsp;2 hour 45 min
                      </label>
                   </div>
           </div>
           <div class="col-md-12" style="padding:0;">
                   <div class="radio">
                      <label style="color:#000">
                        <input type="radio" name="optionsTime" id="" value="3:00_3 hour" class="alltime" <?php if($paper['time'] == '3:00'){echo 'checked';} ?>> &nbsp;&nbsp;3 hour
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



<style type="text/css">
	
</style>

   <!-- Modal -->
<div class="cus-modal-window " id="paper-view" style="display:none">
  <div class="cus-modl-view-full" style="" align="center">
    <div class="cus-modal-content">
      <div class="cus-modal-body" id="demoQpreview">
  
      </div>
      </div>
       <div class="cus-modal-ftr-fix"><button id="cls-paper-view" class="btn btn-primary btn-raised">Close</button></div>
  </div>
</div>   

  



 <!-- Modal -->
<div class="cus-modal-window " id="paper-setting" style="display:none">
  <div class="cus-modl-view-right" style="" align="center">
  	<div class="cus-modl-hdr">
  	<h3 class="pull-left">Paper Settings</h3>
  	<button id="cls-paper-seting" class="btn pull-right"><i class="fa fa-fw fa-close"></i></button></div>
    <div class="cus-modal-content">
      <div class="cus-modal-body" id="demoQpreview" style="padding-top:70px;" align="left">
  		 
      </div>
      </div>
       
  </div>
</div>


<script>$(document).ready(function() { $('div').bootstrapMaterialDesign(); });</script>
<script>
    CKEDITOR.replace('editor1', {
      extraPlugins: 'mathjax',
      mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
      height: 100
    });
    CKEDITOR.replace('editor2', {
      extraPlugins: 'mathjax',
      mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
      height: 70
    });
    CKEDITOR.replace('editor3', {
      extraPlugins: 'mathjax',
      mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
      height: 70
    });
    CKEDITOR.replace('editor4', {
      extraPlugins: 'mathjax',
      mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
      height: 70
    });
    CKEDITOR.replace('editor5', {
      extraPlugins: 'mathjax',
      mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
      height: 70
    });
    CKEDITOR.replace('editor6', {
      extraPlugins: 'mathjax',
      mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
      height: 70
    });
    CKEDITOR.replace('editor7', {
      extraPlugins: 'mathjax',
      mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML',
      height: 70
    });

    if (CKEDITOR.env.ie && CKEDITOR.env.version == 8) {
      document.getElementById('ie8-warning').className = 'tip alert';
    }
  </script>
    <script>
       
         $('#datepicker').datetimepicker({ footer: true, modal: true });
    </script>
<script type="text/javascript">
$(document).ready(function() {



	var testpaperid = $('#testpaperid').val();
          $("#question_list").load('<?php echo base_url()."testexam/questionlist/"; ?>'+testpaperid);
         

          $('#back_dash').click(function() { 
          $("#datacontent").load('<?php echo base_url()."testexam/test_dashboard"; ?>');
            if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
         window.history.pushState('forward', null, './institue_panel#test_dashboard');
         nextstate('test_dashboard');
     }); 

      $('#paperSetting').click(function() { 
      	var testpaperid = $('#testpaperid').val();
         $("#datacontent").load('<?php echo base_url()."testexam/test_setting/"; ?>'+testpaperid);
            if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
         window.history.pushState('forward', null, './institue_panel#test_setting');
         nextstate('test_setting');
     });
          
        });
  var loadFile = function(event) {
    var outpuimg = document.getElementById('outpuimg');
    outpuimg.src = URL.createObjectURL(event.target.files[0]);
     $('#outpuimg').show();
  };
function getallopt(){
	 var mques = CKEDITOR.instances['editor1'].getData();
   	var op1 = CKEDITOR.instances['editor2'].getData();
   	var op2 = CKEDITOR.instances['editor3'].getData();
   	var op3 = CKEDITOR.instances['editor4'].getData();
   	var op4 = CKEDITOR.instances['editor5'].getData();
   	var op5 = CKEDITOR.instances['editor6'].getData();
   	var op6 = CKEDITOR.instances['editor7'].getData();
   	$('#question').val(mques);
   	$('#op1').val(op1);
   	$('#op2').val(op2);
   	$('#op3').val(op3);
   	$('#op4').val(op4);
   	$('#op5').val(op5);
   	$('#op6').val(op6);
}
 $(document).ready(function() {

   $('#paperViewOpn').click(function() {
   	$('#paper-view').fadeIn('fast');
   	var testpaperid = $('#testpaperid').val();
   	 $("#demoQpreview").load('<?php echo base_url()."testexam/teacherpreview/"; ?>'+testpaperid);
   	 });
   $('#cls-paper-view').click(function() {
   	$('#paper-view').fadeOut('fast');
   	 });

   // $('#paperSetting').click(function() {
   // 	$('#paper-setting').fadeIn('fast');
   // 	 });
   // $('#cls-paper-seting').click(function() {
   // 	$('#paper-setting').fadeOut('fast');
   // 	 });

   $('#edittitle').click(function() {
   	$('#newtitle').focus();
   	 });
   $('#edimaks').click(function() { 
   	$('#marknum').focus();
   	 });

   $('#editcorse').click(function() { 
   	$('#chossubj').modal('show');
   	 });
   $('#edittim').click(function() {  
   	$('#timemodal').modal('show');
   	 });


   $('#ques-blk').click(function() {
  // 	$(".cke_toolbox").find('span:first').hide();
   	// $(".cke_toolbox").children('span').eq(1).hide();
   	$(".cke_toolbox").find(".cke_toolbar:nth-child(1)").hide();
   	$(".cke_toolbox").find(".cke_toolbar:nth-child(2)").hide();
   	$(".cke_toolbox").find(".cke_toolbar:nth-child(3)").hide();
   	$(".cke_toolbox").find(".cke_toolbar:nth-child(5)").hide();
   	$(".cke_toolbox").find(".cke_toolbar:nth-child(6)").hide();
   	$(".cke_toolbox").find(".cke_toolbar:nth-child(9)").hide();
   	$(".cke_toolbox").find(".cke_toolbar:nth-child(10)").hide();
   	$(".cke_toolbox").find(".cke_toolbar:nth-child(11)").hide();
   	$(".cke_toolbox").find(".cke_toolbar_break").hide();

   	$(this).removeClass('litchk');
   	$(this).addClass('activechk');
   	$('#quesblock-blk').removeClass('activechk');
   	$('#quesblock-blk').addClass('litchk');
   $('#ques-blk-area').show();
   	$('#quesblock-blk-area').hide();
   });
   $('#quesblock-blk').click(function() {
   	$(this).removeClass('litchk');
   	$(this).addClass('activechk');
   	$('#ques-blk').removeClass('activechk');
   	$('#ques-blk').addClass('litchk');
   	$('#ques-blk-area').hide();
   	$('#quesblock-blk-area').show();
   });

   $('.optans').click(function() {
   	var optval = this.id;
   	
   	var optdata=0;
   	if(optval == 'I'){
   		optdata=1;
   	}else if(optval == 'II'){
   		optdata=2;
   	}else if(optval == 'III'){
   		optdata=3;
   	}else if(optval == 'IV'){
   		optdata=4;
   	}else if(optval == 'V'){
   		optdata=5;
   	}else if(optval == 'VI'){
   		optdata=6;
   	}
   		
    var thisval =  $('#op'+optdata).val();
   	if(!thisval){
   		 $('#alert-msg').html("Enter this option value!");
   	     $('#alert-toast').show().delay(2000).slideUp();
   	}else{

   	$('#showopttxt').html(optval); 
   	$('.optans').removeClass('optchkactiv'); 
   	$('.optans').addClass('optchkdeactiv'); 
   	$(this).removeClass('optchkdeactiv'); 
   	$(this).addClass('optchkactiv'); 

   	$('#crt_ans').val(optdata); 
   	

   	}

   });

  $('.alltime').click(function(){
       var thisval = this.value;
        //console.log(thisval);
        var splitval = thisval.split("_");
        $('#tst_time_alt').val(splitval[0]);
        $('#tst_time').val(splitval[0]);
        $('#newtimesho').val(splitval[1]);
    });


   $('#savedata_ques').click(function(e) {
   var mques = CKEDITOR.instances['editor1'].getData();
   	var op1 = CKEDITOR.instances['editor2'].getData();
   	var op2 = CKEDITOR.instances['editor3'].getData();
   	var op3 = CKEDITOR.instances['editor4'].getData();
   	var op4 = CKEDITOR.instances['editor5'].getData();
   	var op5 = CKEDITOR.instances['editor6'].getData();
   	var op6 = CKEDITOR.instances['editor7'].getData();
   	$('#question').val(mques);
   	$('#op1').val(op1);
   	$('#op2').val(op2);
   	$('#op3').val(op3);
   	$('#op4').val(op4);
   	$('#op5').val(op5);
   	$('#op6').val(op6);
   	
   	var testpaperid = $('#testpaperid').val();
   var slnum = $('#slnum').val();
   // var question = $('#question').val();
   var question = $('#question').val();
   var op1 = $('#op1').val();
   var crt_ans = $('#crt_ans').val();
   var s_marks = $('#s_marks').val();
   if(!slnum || !question || !op1 || !crt_ans || !s_marks){
   	 $('#alert-msg').html("Enter mandatory fields !");
   	 $('#alert-toast').show().delay(2000).slideUp();
   }else{
    var me = $(this);
    e.preventDefault();
    if ( me.data('requestRunning') ) {
        return;
    }
    me.data('requestRunning', true);
    $('#alert-wait').show();
     // var formData = new FormData($('#updatequostion')[0]);
     var formData = new FormData($('#updatequostion')[0]);
    $.ajax({
        type: "POST",
        url: '<?php echo base_url();?>testexam/Save_question',
        data: formData,
        cache:false,
            contentType: false,
            processData: false,
        success: function(msg) {
                $('#alert-wait').delay().slideUp(); 
                $('#alert-suc').delay(2000).show().slideUp(); 

                   $('#slnum').val('');
				   CKEDITOR.instances['editor1'].setData('');
				   CKEDITOR.instances['editor2'].setData('');
				   CKEDITOR.instances['editor3'].setData('');
				   CKEDITOR.instances['editor4'].setData('');
				   CKEDITOR.instances['editor5'].setData('');
				   CKEDITOR.instances['editor6'].setData('');
				   CKEDITOR.instances['editor7'].setData('');
				   $('#op1').val('');
				   $('#op2').val('');
				   $('#op3').val('');
				   $('#op4').val('');
				   $('#op5').val('');
				   $('#op6').val('');
				   $('#crt_ans').val('');
				   $('#s_marks').val('');
				   $('#showopttxt').html('0');
				   	$('.optans').removeClass('optchkactiv'); 
                 	$('.optans').addClass('optchkdeactiv'); 
                 	$('#outpuimg').hide();
                 	$('#qes_img').val('');
                 	$('#forqs_tid').val('0');
                 	$('#cancle_ques').hide();
          $("#question_list").load('<?php echo base_url()."testexam/questionlist/"; ?>'+testpaperid);
        },
         error: function(data){
                console.log("error");
                console.log(data);
                  $('#alert-wait').delay().slideUp(); 
                $('#alert-err').delay(2000).show().slideUp(); 
            },
            complete: function() {
            me.data('requestRunning', false);
        }
     }); 
    }     
}); 


   $('#savedata_quesblock').click(function(e) {
   		var testpaperid = $('#testpaperid').val();
   var slnum = $('#slnum_blk').val();
   var question = $('#question_blk').val();
  
   if(!slnum || !question){
   	 $('#alert-msg').html("Enter mandatory fields !");
   	 $('#alert-toast').show().delay(2000).slideUp();
   }else{
    var med = $(this);
    e.preventDefault();
    if ( med.data('requestRunning') ) {
        return;
    }
    med.data('requestRunning', true);
    $('#alert-wait').show();
    $.ajax({
        type: "POST",
        url: '<?php echo base_url();?>testexam/Save_question_block',
        data: $("#updatequostionblock").serialize(),
        success: function(msg) {
                $('#alert-wait').delay().slideUp(); 
                $('#alert-suc').delay(2000).show().slideUp(); 

                   $('#slnum_blk').val('');
				   $('#question_blk').val('');
				   $('#forqsblk_tid').val('0');
          $("#question_list").load('<?php echo base_url()."testexam/questionlist/"; ?>'+testpaperid);
          $('#cancle_quesblk').hide();
        },
         error: function(data){
                console.log("error");
                console.log(data);
                  $('#alert-wait').delay().slideUp(); 
                $('#alert-err').delay(2000).show().slideUp(); 
            },
            complete: function() {
            med.data('requestRunning', false);
        }
     }); 
    }     
}); 


   $('#savedata_paper').click(function(e) {
   var newtitle = $('#newtitle').val();
   var coursid = $('#coursid').val();
   var tst_time = $('#tst_time').val();
   var marknum = $('#marknum').val();
  
   if(!newtitle || !coursid || !tst_time || !marknum){
   	 $('#alert-msg').html("Enter mandatory fields !");
   	 $('#alert-toast').show().delay(2000).slideUp();
   }else{
    var med = $(this);
    e.preventDefault();
    if ( med.data('requestRunning') ) {
        return;
    }
    med.data('requestRunning', true);
    $('#alert-wait').show();
    $.ajax({
        type: "POST",
        url: '<?php echo base_url();?>testexam/Create_new_paper',
        data: $("#updatepaper").serialize(),
        success: function(msg) {
                $('#alert-wait').delay().slideUp(); 
                $('#alert-suc').delay(2000).show().slideUp(); 

        },
         error: function(data){
                console.log("error");
                console.log(data);
                  $('#alert-wait').delay().slideUp(); 
                $('#alert-err').delay(2000).show().slideUp(); 
            },
            complete: function() {
            med.data('requestRunning', false);
        }
     }); 
    }     
}); 



});



  $('.allcoursub').click(function(){
    var strp_cours = $(this).attr('data-course');
    var strp_subj = $(this).attr('data-subj');
  var id = this.id;
  var thisarval = id;
  var hvtxtval = $('#courstext_alt').val();
  var hvval = $('#coursid_alt').val();
  var mkary = hvval+','+thisarval;
  var mkarytxt = hvtxtval+','+strp_cours+'-'+strp_subj;

  var checkBox = document.getElementById(id);
   if(checkBox.checked == true){
      $('#coursid_alt').val(mkary); 
      $('#courstext_alt').val(mkarytxt); 
   }else{
      var rvval = ','+thisarval;
          hvval = hvval.replace(rvval, '');   
        $('#coursid_alt').val(hvval); 
        $('#coursid_alt').val(hvval); 
      var rvvaltxt = ','+strp_cours+'-'+strp_subj;
          hvtxtval = hvtxtval.replace(rvvaltxt, '');   
        $('#courstext_alt').val(hvtxtval); 
    
   }
   var getmaintxt = $('#courstext_alt').val(); 
   var getmaintxt = getmaintxt.substr(1);
  $('#selectedcours').val(getmaintxt); 
  $('#coursid').val($('#coursid_alt').val()); 
  $('#courstext').val($('#courstext_alt').val()); 

});

</script>