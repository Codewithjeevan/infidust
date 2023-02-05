  <!-- https://gijgo.com/ -->



  <style>
  	.switch-cus {
  		position: relative;
  		display: inline-block;
  		width: 60px;
  		height: 34px;
  	}

  	.switch-cus input {
  		opacity: 0;
  		width: 0;
  		height: 0;
  	}

  	.slider {
  		position: absolute;
  		cursor: pointer;
  		top: 0;
  		left: 0;
  		right: 0;
  		bottom: 0;
  		background-color: #ccc;
  		-webkit-transition: .4s;
  		transition: .4s;
  	}

  	.slider:before {
  		position: absolute;
  		content: "";
  		height: 26px;
  		width: 26px;
  		left: 4px;
  		bottom: 4px;
  		background-color: white;
  		-webkit-transition: .4s;
  		transition: .4s;
  	}

  	input:checked+.slider {
  		background-color: #2196F3;
  	}

  	input:focus+.slider {
  		box-shadow: 0 0 1px #2196F3;
  	}

  	input:checked+.slider:before {
  		-webkit-transform: translateX(26px);
  		-ms-transform: translateX(26px);
  		transform: translateX(26px);
  	}

  	/* Rounded sliders */
  	.slider.round {
  		border-radius: 34px;
  	}

  	.slider.round:before {
  		border-radius: 50%;
  	}

  	.user-sh-blk {
  		width: 50px;
  		height: 50px;
  		border-radius: 100%;
  		overflow: hidden;
  		text-align: center;
  		color: #fff;
  	}

  	.def-usr-img {
  		width: 30px;
  		position: relative;
  		top: 8px;
  		opacity: 0.4
  	}

  	.user-sh-blk i {
  		font-size: 23px;
  		color: #fff;
  		margin-top: 20px;
  		position: relative;
  	}
  </style>




  <div class="row body-data fix-iner-header" style="">
  	<button id="back_dash" class="btn back-btn-fix " style="position:absolute"><i class="fa fa-fw fa-arrow-left"></i></button>
  	<h3 style="font-family: 'Montserrat'; margin-left:40px">Paper Setting</h3>
  	<div class="right-btn-blk" style="">
  		<label style="font-size:18px;font-weight:bold;position: relative;bottom: 1rem;" for="">Public</label>
  		<label class="switch-cus mr-2" style="">
  			<input type="checkbox" id="pubbut" style="position:absolute;width:60px; height:35px;z-index:99;cursor: pointer;" <?php if ($paper['tp_ispublish'] == '1') {
																																	echo 'checked';
																																} else {
																																	echo '';
																																}
																																?>>
  			<span class="slider round"></span>
  		</label>
  		<button id="savedata_paper" class="btn btn-primary btn-raised pull-right">SAVE</button>
  	</div>
  </div>
  <form id="setting_form" enctype="multipart/form-data" method="post">
  	<input type="hidden" name="hshtyp" value="testpaper">
  	<div class="row full-wpage" style="padding-top:80px;min-height:700px">
  		<div class="col-md-4">
  			<div class="row">
  				<input type="hidden" name="paperid" id="paperid" value="<?php echo $paper['tp_mid'] ?>">
  				<table width="100%">
  					<tr>
  						<td height="20">
  							<input type="radio" id="pre_pap" name="paper" value="1">
  							<label for="paper2">Premium Paper</label><br>
  						</td>
  						<td height="20">
  							<input type="radio" id="paper2" name="paper" value="2">
  							<label for="paper2">Free Paper</label><br>
  						</td>
  					</tr>
  					<tr>
  						<td class="py-3 " id="setpric">
  							<div class="c-title2">Set Paper Price</div>
  							<input name="papprice" class="form-control" id="papprice" width="100%" placeholder="200 INR" />
  						</td>
  					</tr>
  					<tr>
  						<td>
  							<!-- document.addEventListener("visibilitychange", onchange); -->
  							<div class="c-title2">User's visible date*</div>
  						</td>
  					</tr>
  					<tr>
  						<td> <input id="datepicker" name="visible" id="visible" width="100%" placeholder="19:26 YYYY-MM-DD" value="<?php echo $paper['visb_systm'] ?>" /></td>
  					</tr>
  					<tr>
  						<td height="20"></td>
  					</tr>
  					<tr>
  						<td>
  							<div class="c-title2">Exam date*</div>
  						</td>
  					</tr>
  					<tr>
  						<td> <input id="datepicker2" name="exam" id="exam" width="100%" placeholder="19:26 YYYY-MM-DD" value="<?php echo $paper['exm_system'] ?>" /></td>
  					</tr>
  				</table>
  				<table width="100%">
  					<tr>
  						<td height="30"></td>
  						<td height="30"></td>
  					</tr>
  					<tr>
  						<td style="font-size:18px;padding-top:10px">Instant result</td>
  						<td align="right">
  							<div class="checkbox" style="position:relative; top:-4px">
  								<label style="color:#000">
  									<input type="checkbox" name="instresult" id="instresult" value="1" <?php if ($paper['instant_r'] == 1) {
																												echo 'checked';
																											} ?> <?php if ($paper['is_released'] == 1) {
																														echo 'disabled';
																													} ?>> <span class="opt-num-txt"></span>
  								</label>
  							</div>
  							<input type="hidden" id="maual_res_re" name="maual_res_re" value="<?php echo $paper['result_release'] ?>">
  						</td>
  					</tr>
  				</table>

  				<div class="col-md-12" style="background:#f4f4f4;padding:10px; margin-top:20px">
  					<table width="100%">

  						<tr>
  							<td style="font-size:18px;font-weight:bold"><span id="">Paper Release</span></td>
  							<td align="right">
  								<label class="switch-cus">
  									<div id="makerelease" style="position:absolute;width:60px; height:35px;z-index:99;"></div>
  									<input type="checkbox" id="makerelease_btn" <?php if ($paper['is_released'] == 1) {
																						echo 'checked';
																					} ?>>
  									<span class="slider round"></span>
  								</label>

  							</td>
  						</tr>
  					</table>
  				</div>

  				<div class="col-md-12" style="background:#ebf0f6;padding:10px; margin-top:20px">
  					<table width="100%">

  						<tr>
  							<td style="font-size:18px;font-weight:bold"><span id="">Result Release</span></td>
  							<td align="right">
  								<label class="switch-cus">
  									<div id="makeresult" style="position:absolute;width:60px; height:35px;z-index:99;"></div>
  									<input type="checkbox" id="makeresult_btn" <?php if ($paper['result_release'] == 1) {
																						echo 'checked';
																					} ?>>
  									<span class="slider round"></span>
  								</label>

  							</td>
  						</tr>
  					</table>
  				</div>

  			</div>
  		</div>

  		<div class="col-md-1">

  		</div>
  		<div class="col-md-4">
  			Managed By<br><br>
  			<div class="respopad40" style="position:relative;padding-bottom:15px;padding-left:0">
  				<img src="<?php echo base_url() ?>assets-public/dist/img/icon/search.svg" class="srch-icon">
  				<img src="<?php echo base_url() ?>assets-public/dist/img/icon/x-circle.svg" id="srch-close" class="srch-close" style="z-index:99;">
  				<div class="srch-loader" style="z-index:99;display:none">
  					<div class="sbl-circ-path3"></div>
  				</div>
  				<input type="text" id="srchmanage" class="cus-srch-input" placeholder="Search & change..">

  			</div>
  			<div id="managperson" style="border:1px solid green; padding:5px; border-radius:5px;position:relative;display:none">

  			</div>
  			<div id="reslut_managperson" style="">

  			</div>
  			<br><br>
  			<div id="loadhashpg" class="col-md-12 box-sdow mt-2 p-3" align="" style="height:auto; overflow-x:hidden;overflow-y:scroll;">

  			</div>
  			<div id="managperson" style="border:1px solid green; padding:5px; border-radius:5px;position:relative;display:none">

  			</div>
  			<div id="reslut_managperson" style="">

  			</div>
  		</div>

  	</div>
  </form>




  <script>
  	$('#pubbut').change(function(e) {
  		var pepid = $('#paperid').val();
  		if (this.checked == true) {
  			var med = $(this);
  			e.preventDefault();
  			if (med.data('requestRunning')) {
  				return;
  			}
  			med.data('requestRunning', true);
  			$('#alert-wait').show();
  			var datastring = 'paperid=' + pepid;
  			$.ajax({
  				type: "POST",
  				url: '<?php echo base_url(); ?>testexam/ispublish',
  				data: datastring,
  				success: function(msg) {
  					$('#alert-wait').delay().slideUp();
  					$('#alert-suc').delay(2000).show().slideUp();

  				},
  				error: function(data) {
  					console.log("error");
  					console.log(data);
  					$('#alert-wait').delay().slideUp();
  					$('#alert-err').delay(2000).show().slideUp();
  				},
  				complete: function() {
  					med.data('requestRunning', false);
  				}
  			});
  		} else {

  			var med = $(this);
  			e.preventDefault();
  			if (med.data('requestRunning')) {
  				return;
  			}
  			med.data('requestRunning', true);
  			$('#alert-wait').show();
  			var datastring = 'paperid=' + pepid;
  			$.ajax({
  				type: "POST",
  				url: '<?php echo base_url(); ?>testexam/isnotpub',
  				data: datastring,
  				success: function(msg) {
  					$('#alert-wait').delay().slideUp();
  					$('#alert-suc').delay(2000).show().slideUp();

  				},
  				error: function(data) {
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

  	// $("#shosearchhash").show();
  	// $('.hshadd').click(function(e) {
  	// 	$('.rmhshn').hide();
  	// 	var hshval = $('#srchhashtags').val();
  	// 	var hsh = "";
  	// 	var ids = (new Date().getTime()).toString(36)

  	// 	var txt = $('#search-criteria').val();
  	// 	var aa = $('.hsh-name:contains("' + hshval + '")')

  	// 	if (!hshval) {
  	// 		$('#alert-msg').html("Please Add Text!");
  	// 		$('#alert-toast').show().delay(2000).slideUp();
  	// 	} else if (aa.length > 0) {
  	// 		$('#alert-msg').html("#Tag Already Exists");
  	// 		$('#alert-toast').show().delay(2000).slideUp();
  	// 	} else {

  	// 		$('#apphsh').append(`<input type="" id='rm` + ids + `' class="apphsh" name="apphshval" value="` + hshval + `,">`);
  	// 		$('#shohashtags').append(`<span style='font-size: 12px; padding:3px' id='rm` + ids + `' class='btn btn-outline-secondary'>
    //         <i class='fa fa-hashtag ' aria-hidden='true' ></i>
    //         <p class='pr-1 d-inline'>` + hshval + `</p>
    //         <i class='fa fa-times p-1 text-dark' style='cursor:pointer; font-size: 15px; ' onclick=clcid('` + (ids) + `') aria-hidden='true'></i>
    //     </span> `);
  	// 		$('#srchhashtags').val('');
  	// 	}
  	// });

  	function clcid(ids) {
  		$('#rm' + ids + '').remove();
  		setTimeout(function() {
  			$('#rm' + ids + '').remove();
  		}, 1);
  	}

  	$(document).ready(function() {
  		$('div').bootstrapMaterialDesign();
  		$('#setpric').hide();
  		var hashtyp = 1;
		var pepid = $('#paperid').val();
  		$("#loadhashpg").load('<?php echo base_url() . "hashtag/loadhashpg/" ?>' + hashtyp + '/' + pepid);
  	});
  	$('#pre_pap').change(function(e) {
  		if ($("#pre_pap:checked")) {
  			$('#setpric').show();
  		}
  	});
  	$('#paper2').change(function(e) {
  		if ($("#paper2:checked")) {
  			$('#setpric').hide();
  		}
  	});
  	// $(document).ready(function(e) {
  	// 	var pepid = $('#paperid').val();

  	// $('#shohashtags').load('<?php echo base_url(); ?>testexam/showhashtags/' + pepid);
  	// })
  </script>

  <script>
  	$('#datepicker').datetimepicker({
  		footer: true,
  		modal: true,
  		format: 'HH:MM yyyy-mm-dd'
  	});
  	$('#datepicker2').datetimepicker({
  		footer: true,
  		modal: true,
  		format: 'HH:MM yyyy-mm-dd'
  	});
  </script>
  <script type="text/javascript">
  	$(document).ready(function() {
  		var testpaperid = $('#paperid').val();

  		$("#managperson").load('<?php echo base_url() . "testexam/Paper_manage_person/"; ?>' + testpaperid);
  		$('#back_dash').click(function() {

  			$("#datacontent").load('<?php echo base_url() . "testexam/test_manage/"; ?>' + testpaperid);
  			if ($("#hidtgl").is(":visible") == true) {
  				$('#hidtgl').click();
  			}
  			window.history.pushState('forward', null, './institue_panel#test_manage');
  			nextstate('test_manage');
  		});

  	});


  	$(document).ready(function() {


  		$('#instresult').click(function(e) {
  			var isresultre = $('#maual_res_re').val();
  			var x = document.getElementById('instresult');
  			var x1 = document.getElementById('makeresult_btn');
  			if (x.checked == true) {
  				if (x1.checked == false) {
  					if (isresultre == 0) {
  						$('#makeresult_btn').click();
  						$('#maual_res_re').val('1');
  					}
  				}
  			} else {
  				if (x1.checked == true) {
  					$('#makeresult_btn').click();
  					$('#maual_res_re').val('0');
  				}
  			}

  		});

  		$('#savedata_paper').click(function(e) {
  			var datepicker = $('#datepicker').val();
  			var datepicker2 = $('#datepicker2').val();
  			// $('#apphshval').val($('#apphsh').html());
  			console.log($('.apphsh').val());
  			var cnt = '';
  			$("[name='apphshval']").each(function() {
  				cnt += this.value;
  			});
  			$("#txtval").val(cnt);
  			if (!datepicker || !datepicker2) {
  				$('#alert-msg').html("Enter mandatory fields !");
  				$('#alert-toast').show().delay(2000).slideUp();
  			} else {
  				var med = $(this);
  				e.preventDefault();
  				if (med.data('requestRunning')) {
  					return;
  				}
  				med.data('requestRunning', true);
  				$('#alert-wait').show();
  				$.ajax({
  					type: "POST",
  					url: '<?php echo base_url(); ?>testexam/Setting_save',
  					data: $("#setting_form").serialize(),
  					success: function(msg) {
  						$('#alert-wait').delay().slideUp();
  						$('#alert-suc').delay(2000).show().slideUp();

  					},
  					error: function(data) {
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


  		$('#makerelease').click(function(e) {
  			var paperid = $('#paperid').val();
  			$('#makerelease_btn').click();
  			var x = document.getElementById('makerelease_btn');
  			if (x.checked == true) {
  				$('#makerelease_btn').prop('checked', true);
  				var med = $(this);
  				e.preventDefault();
  				if (med.data('requestRunning')) {
  					return;
  				}
  				med.data('requestRunning', true);
  				$('#alert-wait').show();
  				var datastring = 'paperid=' + paperid;
  				$.ajax({
  					type: "POST",
  					url: '<?php echo base_url(); ?>testexam/Make_release',
  					data: datastring,
  					success: function(msg) {
  						$('#alert-wait').delay().slideUp();
  						$('#alert-suc').delay(2000).show().slideUp();

  					},
  					error: function(data) {
  						console.log("error");
  						console.log(data);
  						$('#alert-wait').delay().slideUp();
  						$('#alert-err').delay(2000).show().slideUp();
  					},
  					complete: function() {
  						med.data('requestRunning', false);
  					}
  				});
  			} else {

  			}
  		});

  		$('#makeresult').click(function(e) {
  			var paperid = $('#paperid').val();


  			$('#makeresult_btn').click();
  			var x = document.getElementById('makeresult_btn');
  			if (x.checked == true) {
  				$('#makeresult_btn').prop('checked', true);
  				$('#maual_res_re').val('1');
  				var med = $(this);
  				e.preventDefault();
  				if (med.data('requestRunning')) {
  					return;
  				}
  				med.data('requestRunning', true);
  				$('#alert-wait').show();
  				var datastring = 'paperid=' + paperid;
  				$.ajax({
  					type: "POST",
  					url: '<?php echo base_url(); ?>testexam/Make_release_result',
  					data: datastring,
  					success: function(msg) {
  						$('#alert-wait').delay().slideUp();
  						$('#alert-suc').delay(2000).show().slideUp();

  					},
  					error: function(data) {
  						console.log("error");
  						console.log(data);
  						$('#alert-wait').delay().slideUp();
  						$('#alert-err').delay(2000).show().slideUp();
  					},
  					complete: function() {
  						med.data('requestRunning', false);
  					}
  				});
  			} else {
  				$('#maual_res_re').val('0');
  			}
  		});

  	});


  	var typingTimer; //timer identifier
  	var doneTypingInterval = 1000; //time in ms, 5 second for example
  	var $input = $('#srchmanage');

  	$input.on('keyup', function() {
  		clearTimeout(typingTimer);
  		typingTimer = setTimeout(doneTypingnm, doneTypingInterval);
  		$(".srch-loader").show();
  		$("#srch-close").show();
  	});
  	//on keydown, clear the countdown 
  	$input.on('keydown', function() {
  		clearTimeout(typingTimer);

  	});

  	//user is "finished typing," do something  srch-loader
  	function doneTypingnm() {
  		var searchval = $("#srchmanage").val();
  		$("#reslut_managperson").load('<?php echo base_url() . "testexam/Paper_manage_search/"; ?>' + searchval);
  		$("#reslut_managperson").show();
  	}
  	$('#srch-close').click(function() {
  		var testpaperid = $('#paperid').val();
  		$(".srch-loader").hide();
  		$("#srch-close").hide();
  		$("#reslut_managperson").hide();
  		$("#managperson").show();
  		$("#srchmanage").val('');
  		$("#managperson").load('<?php echo base_url() . "testexam/Paper_manage_person/"; ?>' + testpaperid);
  	});


  	/// search hash tag
  	var typingTimer; //timer identifier
  	var doneTypingInterval = 1000; //time in ms, 5 second for example
  	var $input = $('#srchhashtags');

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
  		var testpaperid = $('#paperid').val();
  		var searchval = $("#srchhashtags").val();
  		if (searchval) {
  			$("#shosearchhash").show();
  			$("#shosearchhash").load('<?php echo base_url() . "testexam/showhashtags/"; ?>' + testpaperid + '/' + searchval);
  		} else {
  			$("#shosearchhash").hide();
  		}
  	}
  	// $('#srch-close').click(function() {
  	// 	var testpaperid = $('#paperid').val();
  	// 	// $(".srch-loader").hide();
  	// 	// $("#srch-close").hide();
  	// 	// $("#reslut_managperson").hide();
  	// 	$("#managperson").show();
  	// 	$("#srchhashtags").val('');
  	// 	$("#managperson").load('<?php echo base_url() . "testexam/Paper_manage_person/"; ?>' + testpaperid);
  	// });
  </script>