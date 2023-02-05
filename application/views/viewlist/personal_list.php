<style type="text/css">

 .list-thumb-blk {  border:0px solid #ccc; border-radius: 4px; overflow: hidden; position: relative;}
  .list-details-blk {  background: ; padding-top: 12px;}
  .list-details-blk h2 {font-family: 'Montserrat Medium'; }  

  .list-up-by-pic { width: 36px; height: 36px; border-radius: 100%; background: #ddd;overflow: hidden; position: relative;}
  .list-thumb-blk img { width: 100%; position: absolute; top: 50%; transform: translateY(-50%);}
  .list-up-by-pic img { width: 100%;}

  @media only screen and (min-width: 993px) and (max-width: 3000px) { 
  	 .list-thumb-blk { width: 100%; height: 145px;}
  	   .list-details-blk p {font-size: 14px; line-height: 17px; opacity: 0.8 } 
  .list-details-blk .sml-txt {font-size: 13px; line-height: 17px;  }  
  .list-details-blk h2 {font-size: 14px; line-height: 20px;}
  .list-details-blk { width: 100%; height: 130px;}
  }

   @media only screen and (min-width: 260px) and (max-width: 992px) {
   	 .list-thumb-blk { width: 100%; height: 185px;}
   	   .list-details-blk p {font-size: 13px; line-height: 15px; opacity: 0.8 } 
  .list-details-blk .sml-txt {font-size: 11px; line-height: 15px;  } 
  .list-details-blk h2 {font-size: 13px; line-height: 14px;}
  .list-details-blk { width: 100%; height: 70px;}
   }
</style>
<div class="row" style="margin-left:-20px;margin-right:-20px;">


<?php
if($this->session->userdata("crent_viewid")){
 ?>


<?php }else{ ?>
<div class="col-md-12" align="center" style="padding:20px 20px 40px 20px;">
  You are in not any institute/school!<br>
  Go to My first institute and select one or join now.
</div>
<?php } ?>
 <?php foreach ($materials as $key => $value) {
 	$tempfiletyp = explode("/", $value['file_type']);
    $file_exten = end($tempfiletyp);
 	?>
	<div onclick="watchthisitem('<?php echo $value['file_url'] ?>')" class="col-md-3" style="padding:10px;cursor: pointer;">
	 <?php if($value['file_type'] == 'video/mp4'){ ?>
		<div class="list-thumb-blk bg-black">
			<img src="<?php echo base_url() ?>assets/vthumb/<?php echo $value['thumb'] ?>">
		</div>
	 <?php } else { ?>
	  <div class="list-file-blk mlisticons2 bg-gray">
                  <?php if($file_exten == 'pdf'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/pdf.svg" class="mlisticons2">
                  <?php } else if($file_exten == 'doc' || $file_exten == 'docx'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/word.svg" class="mlisticons2">
                  <?php } else if($file_exten == 'zip'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/zip.svg" class="mlisticons2">
                  <?php } else if($file_exten == 'xlsx' || $file_exten == 'xls'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/excel.svg" class="mlisticons2">
                  <?php } else if($file_exten == 'pptx' || $file_exten == 'ppt' || $file_exten == 'pptm'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/powerpoint.svg" class="mlisticons2">
                  <?php } else if($file_exten == 'JPG' || $file_exten == 'png' || $file_exten == 'jpeg' || $file_exten == 'jpg'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/photo.svg" class="mlisticons2">
                  <?php } else { ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/gdocs.svg" class="mlisticons2">
                  <?php }  ?>
                  </div>
	 <?php } ?>
		<div class="list-details-blk">
			<table width="100%">
				<td width="50" valign="top"><div class="list-up-by-pic"><img src="<?php echo base_url() ?>assets/pro-sml/<?php echo $value['pro_pic'] ?>"></div></td>
				<td>
				<h2 class="forbig"><?php 
				$titlecount = strlen($value['title']);
				if($titlecount > 44){
					echo substr($value['title'], 0, 45)."..." ; 
				}else{
					echo $value['title']; 
				}
				 
				?></h2>
				<h2 class="for-small"><?php 
				$titlecount = strlen($value['title']);
				if($titlecount > 36){
					echo substr($value['title'], 0, 37)."..." ; 
				}else{
					echo $value['title']; 
				}
				 
				?></h2>
				<p>
				<?php 
				$mncount = strlen($value['teacher_nm']);
				if($mncount > 23){
					echo substr($value['teacher_nm'], 0, 24).".." ; 
				}else{
					echo $value['teacher_nm']; 
				}
				 ?><br>
				 <span class="sml-txt">0 views | 
				 <?php
				 $today = date('Y-m-d');
				
				 $datetime1 = new DateTime($value['up_date']);
					$datetime2 = new DateTime($today);
					$interval = $datetime1->diff($datetime2);
					if($interval->days > 365){
						echo $interval->y . " years ago";
					}else if($interval->days > 30){
						echo $interval->m . " months ago";
					}else if($interval->days > 6){
						echo 1 . " week ago";
					}else if($interval->days >= 1){
						echo $interval->days . " days ago";
					}else{
						//$date = strtotime($value['created_at']);
					//	echo date('H:i:s', $date); echo date('H:i:s');
						// $nowtime= date('H:i:s');
						// $differenceTim = round(abs($nowtime - $date) / 3600,2);
						//echo $differenceTim;
						echo "Today";
					}
					
				  ?></span> 
				</p>
				</td>
			</table>
		</div>
	</div>
	<?php } ?>
</div>

<script type="text/javascript">
	function watchthisitem(id){
	
		window.location.href = "<?php echo base_url()?>watchm?v="+id;
	}
	
</script>