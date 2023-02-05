 <style type="text/css">

  @media only screen and (min-width: 260px) and (max-width: 992px) {
.chat-side-blk {width: 250px;}

  .live-btn-blk { left: 10px; width: 50px;top: 70px;}
  }
  @media only screen and (min-width: 993px) and (max-width: 3000px) { 
.chat-side-blk {width: 330px;}
.live-btn-blk { left: 20px; width: 70px;top: 100px;}
  }
.live-btn-blk { position: fixed;}
 .fix-container-inner { position: absolute; width: 100%; height: 100%; background: #fff;  padding-top:60px; overflow-x: hidden;overflow-y: scroll; padding-bottom: 67px}
 .user-contnr { position: absolute; width: 100%; height: 100%; background: #fff; padding-top:40px; overflow-x: hidden;overflow-y: scroll; }
 .chat-side-blk { position: fixed; right: 0px;  height: 100%; background: #fff; top: 0px; z-index: 999; transition-timing-function: linear; transition:0.3s;}
  .top-btn-blk { position: absolute; top: 0px; width: 100%; right: 0px; background: #fff; border-bottom: 1px solid #ccc; z-index: 2;}
.top-btn-blk button { margin:0px;}
.userrond-img { width: 60px; height: 60px; border:1px solid #ddd; border-radius: 100%; overflow: hidden; text-align: center}
.userrond-img img { width: 100%;}
.liveusersp { margin-top: 10px; margin-bottom: 10px; }
.liveusersp h2 { font-size: 15px; color: #000 }
.liveusersp joineda { font-size: 12px; color: #fff; background: green; padding: 2px 10px 3px 6px; border-radius: 10px }
.liveusersp joinedd { font-size: 12px; color: #fff; background: #ccc; padding: 2px 10px 3px 6px; border-radius: 10px }


.selfmsgblk { background: ; margin: 0px 0px 10px 0px; padding-right: 15px; transition-timing-function: linear; transition:0.3s;}
.selfmsgblk msgdt { font-size: 10px; color: #adadad; position: relative; top: -3px; }
.selfmsgblk pending {margin-left: 5px; font-size: 12px; color: #adadad; position: relative; top: -3px; }
.selfmsgblk sentick {margin-left: 5px; position: relative; top: -3px; }
.selfmsgblk sentick img { width: 16px; }
.selfmsgblk unsentick {margin-left: 5px; position: relative; top: -3px; }
.selfmsgblk unsentick img { width: 16px; }
.selfmsgblk senttick {margin-left: 5px; position: relative; top: -3px; }
.selfmsgblk senttick img { width: 13px; }
.selfmsg { text-align: left;  background: #e8e8e8; max-width: 270px;min-width: 80px; width: fit-content; padding: 12px; border-radius: 20px; font-size: 15px; line-height: 18px; }
.selfmsg img{ width: 200px; border-radius: 5px;}
.selfmsgimg { text-align: left;  background: ; position: relative; right:-50%;   font-size: 15px; line-height: 18px; }
.selfmsgimg img{ border-radius: 5px;}
.selfmsgvideo { text-align: left;  background: ; position: relative; width: 200px; border-radius: 5px; overflow: hidden;   font-size: 15px; line-height: 18px; }


.usermsgblk { background: ; margin: 0px 0px 20px 0px; padding-left: 15px; position: relative;}
.usermsgblk msgdt { font-size: 10px; color: #adadad; position: relative; top: -3px; }
.userfmsg { text-align: left;  background: #1a73e8; border:1px solid #1a73e8; color: #fff; max-width: 270px;min-width: 80px; width: fit-content; padding: 12px; border-radius: 20px; font-size: 15px; line-height: 18px; }
.usermsgblk usernm { color: #000; position: absolute;top: 0px;left: 47px; font-size: 12px; font-family: 'Montserrat'; }
.userfmsg img{ width: 200px; border-radius: 5px;}
.userfmsgimg { text-align: left;  background: #fff;  border-radius: 20px; font-size: 15px; line-height: 18px; }
.userfmsgimg img{ border-radius: 5px;}
.userfmsgvideo { text-align: left;  background: #fff; overflow: hidden;width: 200px;  border-radius: 5px; font-size: 15px; line-height: 18px; }

 .chat-d-blk { position: absolute;width: 100%;  bottom: 0px; left: 0px; background: #fff; z-index: 99; padding: 5px 8px 5px 8px; }
  .chatinput-are { position: relative; min-height: 39px;  background: ; padding: 0px 50px 0px 15px; border-radius: 22px; border:1px solid #d7cfcf; max-height: 150px; overflow-x: hidden;overflow-y: scroll;}
.typemsg-txtar { width: 100%; position: relative;top: 4px; padding: 3px 3px 0px 0px; resize: none; border:none;  }
.typemsg-txtar:focus { outline: none}
.attc-btn { position: absolute; right: 10px; bottom: 11px; font-size:20px; width: 40px; height: 30px; border:none; background: none;  }
.attc-btn:focus { outline: none;}
.attc-btn i { position: relative; top: -1px;}
.csend-btn { position: absolute; right: 10px; bottom: 11px; font-size:22px; width: 40px; height: 30px; border:none; background: none;  color: var(--color-themec);}
.csend-btn:focus { outline: none;}
.csend-btn i { position: relative; top: -4px;left:-5px; transform: rotate(30deg);}
.cam-btn { position: absolute; left: 13px; bottom: 10px; font-size:16px; width: 29px; height: 29px; border:none; background:  var(--color-themec); border-radius: 100%;}
.cam-btn:focus { outline: none;}
.cam-btn i { position: relative; left: -2px; color: #fff; }
.post-btn { position: absolute; right: 15px; bottom: 10px; font-size:20px; width: 40px; height: 30px; border:none; background: none; font-size: 14px; }
.post-btn:focus { outline: none;}
.msg-rpic { width: 25px; height: 25px; border: 1px solid #ccc; border-radius: 100%;position: relative;top: -5px; overflow: hidden; text-align: center;}
.msg-rpic img { width: 100%;}
 </style>

<script type="text/javascript">
  var chatchalid = '<?php echo $clsuid; ?>';
  var mychatid = '<?php echo $this->session->userdata("memuid"); ?>';
  var mychatname = "<?php echo $profdata['teacher_nm']; ?>";
  var mychatimag = "<?php echo $profdata['pro_pic']; ?>";
</script>

 <div class="top-btn-blk">
        <table width="100%">
          <tr>
            <td>
             <button id="chat-abtn" type="button" class="btn btn-block active" style="margin:0px;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/message-square.svg"></button>
             <button id="chat-dbtn" type="button" class="btn btn-block " style="margin:0px;display:none"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/message-square.svg"></button>
             </td>
            <td>
            <button id="user-dbtn" type="button" class="btn btn-block" style="margin:0px;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/users.svg"></button>
            <button id="user-abtn" type="button" class="btn btn-block active" style="margin:0px;display:none;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/users.svg"></button>
            </td>
          </tr>
        </table>
         
      </div>
      <div class="user-contnr" style="display:none">
       <div class="row">

      <?php 
      if ($student) {
      ?>
      <?php 
      foreach ($student as $student) {
      ?>
        <div class="col-md-12 liveusersp">
          <table width="100%;">
            <tr>
              <td width="75">
              <div class="userrond-img">
               <?php if($student['pro_pic']){ ?>
                <img src="<?php echo base_url().'assets/' ?>pro-sml/<?php echo $student['pro_pic'] ?>">
                <?php } else { ?>
                <img src="<?php echo base_url() ?>assets-public/dist/img/icon/usert.svg" class="def-usr-img" style="opacity:0.4">
                <?php } ?>
              </div>
              </td>
              <td>
              <h2><?php echo $student['teacher_nm']?></h2>
              <joineda id="<?php echo $student['memuid']?>_<?php echo $student['clasuid']?>_ac" style="display:none"><i class="fa fa-fw fa-check"></i> Joined</joineda>
              <joinedd id="<?php echo $student['memuid']?>_<?php echo $student['clasuid']?>_de"><i class="fa fa-fw fa-check"></i> Not Joined</joinedd>
              </td>
            </tr>
          </table>
         </div>
        <?php } ?>
        <?php } else { ?>
        <div class="col-md-12" align="center"><br><br>No students in this class!</div>
        <?php } ?>
       

       </div>
      </div>

      <div class="fix-container-inner" style="display:; ">
            <div id="chatmsgcontainer" class="chat-full" style="display:">

             <!--   <div class="selfmsgblk" align="right">
                      <div class="selfmsg">
                       <span>this is test msd</span>
                      </div>
                    <msgdt>20/20</msgdt>
                    <sentick id="snt_"></sentick>
                  </div>

                    <div class="usermsgblk usrmsg_'+value.ch_uid+'">
                        <div class="msg-rpic"></div><usernm>kamal ghara</usernm>
                        <div class="userfmsg">
                         <span>test msg</span>
                        </div>
                      <msgdt>20/20</msgdt>
                    </div>
                    <div class="usermsgblk usrmsg_'+value.ch_uid+'">
                     <div class="msg-rpic"></div><usernm>kamal ghara</usernm>
                        <div class="userfmsg">
                         <span>test msg test msg test msg test msg test msg test msg test msg</span>
                        </div>
                      <msgdt>20/20</msgdt>
                    </div>
                    <div class="usermsgblk usrmsg_'+value.ch_uid+'">
                     <div class="msg-rpic"></div><usernm>kamal ghara</usernm>
                        <div class="userfmsg">
                         <span>test msg</span>
                        </div>
                      <msgdt>20/20</msgdt>
                    </div>
                    <div class="usermsgblk usrmsg_'+value.ch_uid+'">
                     <div class="msg-rpic"></div><usernm>kamal ghara</usernm>
                        <div class="userfmsg">
                         <span>test msg</span>
                        </div>
                      <msgdt>20/20</msgdt>
                    </div> -->
                   


            </div>
             <div id="tobtm"></div>
      </div>
<style type="text/css">
  ${autoExpand('textarea', 'height')}
 </style> 

      <div class="chat-d-blk">
  <div class="chatinput-are">
  <textarea id="chattype" class="typemsg-txtar" placeholder="Type in here" rows="1"></textarea>
  </div>
  <!-- <button class="attc-btn" style="display:"><i class="fa fa-fw fa-paperclip"></i></button> -->
  <button class="csend-btn" style="display:none"><i class="fa fa-fw fa-send-o"></i></button>
  <!-- <button class="cam-btn"><i class="fa fa-fw fa-camera"></i></button> -->
</div>
<script src="<?php echo base_url().'assets-public/' ?>dist/js/popper.js"></script>

<script src='<?php echo base_url().'assets-public/' ?>dist/js/jic.js'></script>
<script src='<?php echo base_url().'assets-public/' ?>dist/js/chat.js?v=472795'></script>
<script>
  // Your web app's Firebase configuration
  var firebaseConfigChat = {
    apiKey: "AIzaSyD8N3tADadr7bWViFQ4PLeqsMk96t-4tWw",
    authDomain: "kamchat-2a905.firebaseapp.com",
    databaseURL: "https://kamchat-2a905.firebaseio.com",
    projectId: "kamchat-2a905",
    storageBucket: "kamchat-2a905.appspot.com",
    messagingSenderId: "363261016450",
    appId: "1:363261016450:web:c40bf01f372539050e379b",
    measurementId: "G-CXL9QRSG66"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfigChat);
  var fdatabase = firebase.database();
  var rootRef = fdatabase.ref('users');
  //firebase.analytics();
</script>
<script>$(document).ready(function() {
  $('body').bootstrapMaterialDesign();
  
  });</script>
      <script type="text/javascript">
    $(document).on('click', '#user-dbtn', function(){  
        $("#user-dbtn").hide();
        $("#user-abtn").show();
        $("#chat-abtn").hide();
        $("#chat-dbtn").show();
         $(".fix-container-inner").hide();
         $(".chat-d-blk").hide();
        $(".user-contnr").show();

     });
   $(document).on('click', '#chat-dbtn', function(){  
        $("#chat-dbtn").hide();
        $("#chat-abtn").show();
        $("#user-abtn").hide();
        $("#user-dbtn").show();
        $(".user-contnr").hide();
        $(".fix-container-inner").show();
        $(".chat-d-blk").show();
     });
</script>


<script type="text/javascript">
// Auto Expand
let autoExpand = (selector, direction) => {

  let styles = ''
  let count = 0

  let autoWidth = tag => {

    let computed = getComputedStyle(tag)

    tag.style.width = 'inherit'

    let width = parseInt(computed.getPropertyValue('border-left-width'), 10)
                 + parseInt(computed.getPropertyValue('padding-left'), 10)
                 + tag.scrollWidth
                 + parseInt(computed.getPropertyValue('padding-right'), 10)
                 + parseInt(computed.getPropertyValue('border-right-width'), 10)

    tag.style.width = ''

    return `width: ${width}px;`

  }

  let autoHeight = tag => {

    let computed = getComputedStyle(tag)

    tag.style.height = 'inherit'

    let height = parseInt(computed.getPropertyValue('border-top-width'), 10)
                 + parseInt(computed.getPropertyValue('padding-top'), 10)
                 + tag.scrollHeight
                 + parseInt(computed.getPropertyValue('padding-bottom'), 10)
                 + parseInt(computed.getPropertyValue('border-bottom-width'), 10)

    tag.style.height = ''

    return `height: ${height}px;`

  }

  document.querySelectorAll(selector).forEach(tag => {

    let attr = selector.replace(/\W/g, '')
    let rule = ''

    tag.setAttribute(`data-${attr}`, count)

    switch(direction) {

      case 'width':
        rule += autoWidth(tag)
        break

      case 'height':
        rule += autoHeight(tag)
        break

      case 'both':
        rule += autoWidth(tag) + autoHeight(tag)
        break

    }

    styles += `${selector}[data-${attr}="${count}"] { ${rule} }\n`
    count++

  })

  return styles

}
</script>

<script type="text/javascript">
  
   $('#chattype').keyup(function(){
   var usermsg = $('#chattype').val();
   if(usermsg.length >= 1){
    $('.attc-btn').hide();
    $('.csend-btn').show();
   }else{
    $('.csend-btn').hide();
    $('.attc-btn').show();
   }
    $(this).addClass('thischg');
  });

   $('.attc-btn').click(function(){
    $('#oiconbk').fadeIn();
   $('.att-cam-btn').removeClass('at-cm-hid');
   $('.att-cam-btn').addClass('at-cm-sow');
   $('.att-cam-btn').removeClass('at-s-s0');
   $('.att-cam-btn').addClass('at-s-s2');

   $('.att-glry-btn').removeClass('at-glry-hid');
   $('.att-glry-btn').addClass('at-glry-sow');
   $('.att-glry-btn').removeClass('at-sg-s0');
   $('.att-glry-btn').addClass('at-sg-s2');

    setTimeout(function(){  
     $('.att-cam-btn').removeClass('at-s-s2');
     $('.att-cam-btn').addClass('at-s-s1');
    }, 200);
    setTimeout(function(){  
     $('.att-glry-btn').removeClass('at-sg-s2');
     $('.att-glry-btn').addClass('at-sg-s1');
    }, 300);
    $('.att-close-bk').show();
    
   
   });

    $('.att-close-bk').click(function(){
      $('.att-close-bk').hide();

      $('.att-cam-btn').removeClass('at-s-s1');
      $('.att-cam-btn').addClass('at-s-s2');

       $('.att-glry-btn').removeClass('at-sg-s1');
       $('.att-glry-btn').addClass('at-sg-s2');
       setTimeout(function(){ 
         $('.att-cam-btn').removeClass('at-cm-sow');
         $('.att-cam-btn').addClass('at-cm-hid');
         $('.att-cam-btn').removeClass('at-s-s2');
         $('.att-cam-btn').addClass('at-s-s0');
       }, 200);  
        setTimeout(function(){ 
         $('.att-glry-btn').removeClass('at-glry-sow');
         $('.att-glry-btn').addClass('at-glry-hid');
         $('.att-glry-btn').removeClass('at-sg-s2');
         $('.att-glry-btn').addClass('at-sg-s0');
       }, 300); 
        $('#oiconbk').fadeOut();

   });
</script>