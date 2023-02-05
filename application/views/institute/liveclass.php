

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

  <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>dist/css/cus.css">
   <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>dist/css/bootstrap-material-design.min.css">
     <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>bower_components/font-awesome/css/font-awesome.min.css"> 
   <script src="<?php echo base_url().'assets-public/' ?>dist/js/jquery-3.1.1.min.js"></script>
  <script src="<?php echo base_url().'assets-public/' ?>dist/js/pace.js"></script>
  <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase.js"></script>
  
    <script type="text/javascript"> var base_url = '<?php echo base_url()?>';</script>
    <style type="text/css">

  @media only screen and (min-width: 260px) and (max-width: 992px) {
.cus-livrow {height:100%; margin:5px 255px 5px 5px;position:relative;transition-timing-function: linear; transition:0.3s;}
  .live-btn-blk {  width: 50px;top: 60px;}
  .video-feature-blk { position: fixed; bottom: 0px; z-index: 999;  left: 70px; padding-right: 10px;padding-left: 10px;}
    .cus-fab { width: 30px; height: 30px;}
 .cus-fab img { width: 20px;}
 .startopt { padding: 7px; font-size: 12px}
 .left-hid-btn { position: fixed; top: 43px; width: 63px; border-radius: 3px; text-align: center; background: #000;color: #fff;left: -3px;padding-top: 2px; opacity: 0.5;}
  }
  @media only screen and (min-width: 993px) and (max-width: 3000px) { 
.cus-livrow {height:100%; margin:15px 350px 100px 90px;position:relative;}
.live-btn-blk { left: 20px; width: 70px;top: 100px;}
.video-feature-blk { position: absolute;width: 100%;}
 .cus-fab { width: 40px; height: 40px;}
 .cus-fab img { width: 28px;}
  .left-hid-btn { display: none;}
  .mid-hid-btn { display: none;}
  .rit-hid-btn { display: none;}
  }

  .rit-hid-btn {position: fixed; width: 20px; height:65px;border-radius: 3px; text-align: center; background: #000;color: #fff; top: 50%; transform: translateY(-50%);right:250px;padding-top: 20px; opacity: 0.5;}
.mid-hid-btn { position: absolute;top: -25px;  width: 63px; border-radius: 3px; text-align: center; background: #000;color: #fff; padding-top: 2px; opacity: 0.5;}

.live-btn-blk { position: fixed; background: rgba(0,0,0,0.7); text-align: center; border-radius: 2px; transition-timing-function: linear; transition:0.3s;}
 
  .cus-fab {  border-radius: 100%; padding: 0; margin-top: 20px;}

.video-blk { position: absolute; top: 0;left: 0; width: 100%;  background: #1c1c1c;border-radius:10px}
.video-feature-blk {   height: 120px; background: ; padding-top: 6px; background: rgba(0,0,0,0.7); border-radius: 3px;transition-timing-function: linear; transition:0.3s;}
.feat-titl-blk { background: ; color: #fff; font-size: 13px; }
.record-btn { background: none; border-radius: 10px; border:1px solid red; color: #fff; font-size: 11px}
.feat-data-blk { width: 100%; overflow: hidden; height: 80px; border:1px solid #6b6b6b; margin-top: 3px; border-radius: 7px;padding: 4px;}
.my-sml-face-blk { width: 100px; height: 80px; background: #1f1f1f; border-radius: 7px;}
.nor-box { width: 100px; height: 70px; border-radius: 7px; text-align: center; padding-top: 20px; background: rgba(100,100,100,0.5); opacity: 0.5 }
.fullvideoblk { position: absolute; top: 0;left: 0; width: 100%; height: 100%; background:;border-radius:10px;overflow: hidden}
.msg-contnr { position: absolute; width: 100%; height: 100%; background: red;  }


</style>

</head>
<body>

<div class="container-fluid" style="padding:0;margin:0;">
<div class="row cus-livrow" style="">
  <div class="video-blk" style="display:none">
    <!-- <video class="fullvideoblk" id="yourVideo1" autoplay playsinline></video> -->
    <div id="videos-container" class="fullvideoblk" style=""></div>
  </div>
  <div class="video-feature-blk row" style="display:none"><input type="hidden" id="feablkdywid">
  <div id="closdwnbtn" class="mid-hid-btn"><i class="fa fa-fw fa-chevron-down"></i></div>
  <div id="opndwnbtn" class="mid-hid-btn" style="display:none"><i class="fa fa-fw fa-chevron-up"></i></div>
   <div class="col-md-4" style="padding:0;"></div>
   <!--  <div class="col-md-4" style="padding:0;">
      <div class="feat-titl-blk">Recording &nbsp;&nbsp; <button class="record-btn">START RECORDING</button></div>
      <div class="feat-data-blk">
        <div class="nor-box">
          <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/film.svg">
        </div>
      </div>
    </div> -->
     <div class="col-md-8" style="padding:0;" align="right">
      <div class="feat-titl-blk" style="color:#000">.</div>
      <div class="my-sml-face-blk">
         <!-- <video class="my-sml-face-blk" id="yourVideo2" autoplay playsinline></video> -->
      </div>
    </div>
  </div>
</div>
<div id="closlftb" class="left-hid-btn"><i class="fa fa-fw fa-chevron-left"></i></div>
<div id="openlftb" class="left-hid-btn" style="display:none;"><i class="fa fa-fw fa-chevron-right"></i></div>
<div class="live-btn-blk ">
       <button class="btn cus-fab close_livepage" id="<?php echo $clsuids; ?>"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/x.svg"></button>
       <button id="cus-mutvid" class="btn cus-fab" ><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/video-off.svg"></button>
       <button class="btn cus-fab" disabled><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/mic-off.svg"></button>
       <button class="btn cus-fab" disabled><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/airplay.svg"></button>
     <?php if($this->session->userdata("mem_type") == 'institute'){ ?>
      <button type="button" id="open-room" class="btn btn-raised btn-primary startopt" style="display:none">Start</button>
        <button type="button" id="join-room" class="btn btn-raised btn-primary startopt" style="display:none; position:fixed;top:-1000px;">Join</button>
      <?php }else { ?>
      <button type="button" id="open-room" class="btn btn-raised btn-primary startopt" style="display:none;position:fixed;top:-1000px;">Start</button>
       <button type="button" id="join-room" class="btn btn-raised btn-primary startopt" style="display:none">Join</button>
      <?php } ?>
</div>
 

  <div id="closrigtbtn" class="rit-hid-btn"><i class="fa fa-fw fa-chevron-right"></i></div>
  <div id="opnrigtbtn" class="rit-hid-btn" style="display:none"><i class="fa fa-fw fa-chevron-left"></i></div>
    <div class="chat-side-blk">
      
    </div>

</div>




  <h1 style="display:none">
    Video OneWay Broadcasting using RTCMultiConnection
    <p class="no-mobile">
      Multi-user (one-to-many) video broadcasting using star topology.
    </p>
  </h1>

  <section class="make-center"><input id="mainclsuid" type="hidden" value="<?php echo $clsuids; ?>">
    <input type="hidden" id="room-id" value="<?php echo $clsuids; ?>" autocorrect=off autocapitalize=off size=20>
    
    <button id="" style="display:none"></button>
    <button id="open-or-join-room" style="display:none"></button>

    <div id="" style="margin: 20px 0;"></div>

    <div id="room-urls" style="text-align: center;display: none;background: #000;position:fixed;top:-1000px;height:0px; overflow:hidden"></div>
  </section>

<script src="<?php echo base_url().'assets-public/' ?>dist/js/popper.js"></script>
<script src="<?php echo base_url().'assets-public/' ?>dist/js/bootstrap-material-design.js"></script>


 <script>$(document).ready(function() {
  $('body').bootstrapMaterialDesign();
   $(".chat-side-blk").load('<?php echo base_url()."dashboard/chatblk/"; ?><?php echo $clsuids; ?>');
  });</script>

<script src="https://rtcmulticonnection.herokuapp.com/dist/RTCMultiConnection.js"></script>
<script src="https://rtcmulticonnection.herokuapp.com/node_modules/webrtc-adapter/out/adapter.js"></script>
<script src="https://rtcmulticonnection.herokuapp.com/socket.io/socket.io.js"></script>

<!-- custom layout for HTML5 audio/video elements -->
<link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>dist/css/vid.css?12">
<script src="<?php echo base_url().'assets-public/' ?>dist/js/getHTMLMediaElement.js?chtid=19"></script>
<script type="text/javascript">

  window.onload = function onetchap() { 
    var mainid = $('#mainclsuid').val();
    $('#room-id').val(mainid);
     var screnwid = $(window).width();
    if(screnwid >= 1000){
      var puthit = 150;
    }else{
      var puthit = 10;
    }
    var perfor = parseInt(screnwid) - parseInt(340);
   var gt_fix_wid_per = ((perfor/screnwid) * 100).toFixed(0);
   var mk_fix_wid_per = gt_fix_wid_per+'%';
   $('#feablkdywid').val(mk_fix_wid_per);
  // var oldbotmfe_width = mk_fix_wid_per;
   //alert(oldbotmfe_width);
     var getsrnheight = $(window).height();
     var newhiht = parseInt(getsrnheight) - parseInt(puthit);
     var makmargin = parseInt(newhiht) + parseInt(10);
     $('.video-blk').css('height',newhiht);
     $('.video-blk').fadeIn('fast');
     if(screnwid >= 1000){
     $('.video-feature-blk').css('top',makmargin);
      }else{
         $('.video-feature-blk').css('width',mk_fix_wid_per);
      }
     $('.video-feature-blk').fadeIn('fast');
     $('.startopt').fadeIn('fast');


}

$('#closlftb').click(function(){
  $('.live-btn-blk').css('left','-50px');  
  $(this).hide();  
  $('#openlftb').show();  
});
$('#openlftb').click(function(){
  $('.live-btn-blk').css('left','10px');  
  $(this).hide();  
  $('#closlftb').show();  
});
$('#closdwnbtn').click(function(){
  $('.video-feature-blk').css('bottom','-120px');  
  $(this).hide();  
  $('#opndwnbtn').show();  
});
$('#opndwnbtn').click(function(){
  $('.video-feature-blk').css('bottom','0px');  
  $(this).hide();  
  $('#closdwnbtn').show();  
});


$('#closrigtbtn').click(function(){
  $('.chat-side-blk').css('right','-250px');  
  $('.rit-hid-btn').css('right','0px');  
  $('.cus-livrow').css('margin-right','0px');  
   $('.video-feature-blk').css('width','90%');
  $(this).hide();  
  $('#opnrigtbtn').show();  
});


$('#opnrigtbtn').click(function(){
  var feablkdywid = $('#feablkdywid').val();
  $('.chat-side-blk').css('right','0px');  
  $('.rit-hid-btn').css('right','250px');  
    $('.cus-livrow').css('margin-right','255px');  
     $('.video-feature-blk').css('width',feablkdywid);
  $(this).hide();  
  $('#closrigtbtn').show();  
});


$('.close_livepage').click(function(){
parent.closelivep();
});

</script>
<script>
// ......................................................
// .......................UI Code........................
// ......................................................
document.getElementById('open-room').onclick = function() {
    disableInputButtons();
    connection.open(document.getElementById('room-id').value, function() {
        showRoomURL(connection.sessionid);
    });
};

document.getElementById('join-room').onclick = function() {
    disableInputButtons();

    connection.sdpConstraints.mandatory = {
        OfferToReceiveAudio: true,
        OfferToReceiveVideo: true
    };
    connection.join(document.getElementById('room-id').value);
};

document.getElementById('open-or-join-room').onclick = function() {
    disableInputButtons();
    connection.openOrJoin(document.getElementById('room-id').value, function(isRoomExist, roomid) {
        if (isRoomExist === false && connection.isInitiator === true) {
            // if room doesn't exist, it means that current user will create the room
            showRoomURL(roomid);
        }

        if(isRoomExist) {
          connection.sdpConstraints.mandatory = {
              OfferToReceiveAudio: true,
              OfferToReceiveVideo: true
          };
        }
    });
};

// ......................................................
// ..................RTCMultiConnection Code.............
// ......................................................

var connection = new RTCMultiConnection();

// by default, socket.io server is assumed to be deployed on your own URL
//connection.socketURL = 'http://localhost:9001/';

// comment-out below line if you do not have your own socket.io server
 connection.socketURL = 'https://rtcmulticonnection.herokuapp.com:443/';

connection.socketMessageEvent = 'video-broadcast-demo';

connection.session = {
    audio: true,
    video: true,
    oneway: true
};

connection.sdpConstraints.mandatory = {
    OfferToReceiveAudio: false,
    OfferToReceiveVideo: false
};

// https://www.rtcmulticonnection.org/docs/iceServers/
// use your own TURN-server here!
connection.iceServers = [{
    'urls': [
        'stun:stun.l.google.com:19302',
        'stun:stun1.l.google.com:19302',
        'stun:stun2.l.google.com:19302',
        'stun:stun.l.google.com:19302?transport=udp',
    ]
}];

connection.videosContainer = document.getElementById('videos-container');
connection.onstream = function(event) {
    var existing = document.getElementById(event.streamid);
    if(existing && existing.parentNode) {
      existing.parentNode.removeChild(existing);
    }

    event.mediaElement.removeAttribute('src');
    event.mediaElement.removeAttribute('srcObject');
    event.mediaElement.muted = true;
    event.mediaElement.volume = 0;

    var video = document.createElement('video');

    try {
        video.setAttributeNode(document.createAttribute('autoplay'));
        video.setAttributeNode(document.createAttribute('playsinline'));
    } catch (e) {
        video.setAttribute('autoplay', true);
        video.setAttribute('playsinline', true);
    }

    if(event.type === 'local') {
      video.volume = 0;
      try {
          video.setAttributeNode(document.createAttribute('muted'));
      } catch (e) {
          video.setAttribute('muted', true);
      }
    }
    video.srcObject = event.stream;

    var width = parseInt(connection.videosContainer.clientWidth / 3) - 20;
    var mediaElement = getHTMLMediaElement(video, {
        title: event.userid,
        buttons: ['full-screen'],
        width: width,
        showOnMouseEnter: false
    });

    connection.videosContainer.appendChild(mediaElement);

    setTimeout(function() {
        mediaElement.media.play();
    }, 5000);

    mediaElement.id = event.streamid;
};

connection.onstreamended = function(event) {
    var mediaElement = document.getElementById(event.streamid);
    if (mediaElement) {
        mediaElement.parentNode.removeChild(mediaElement);

        if(event.userid === connection.sessionid && !connection.isInitiator) {
          alert('Broadcast is ended. We will reload this page to clear the cache.');
          location.reload();
        }
    }
};

connection.onMediaError = function(e) {
    if (e.message === 'Concurrent mic process limit.') {
        if (DetectRTC.audioInputDevices.length <= 1) {
            alert('Please select external microphone. Check github issue number 483.');
            return;
        }

        var secondaryMic = DetectRTC.audioInputDevices[1].deviceId;
        connection.mediaConstraints.audio = {
            deviceId: secondaryMic
        };

        connection.join(connection.sessionid);
    }
};

// ..................................
// ALL below scripts are redundant!!!
// ..................................

function disableInputButtons() {
    document.getElementById('room-id').onkeyup();

    document.getElementById('open-or-join-room').disabled = true;
    document.getElementById('open-room').disabled = true;
    document.getElementById('join-room').disabled = true;
    document.getElementById('room-id').disabled = true;
}

// ......................................................
// ......................Handling Room-ID................
// ......................................................

function showRoomURL(roomid) {
    var roomHashURL = '#' + roomid;
    var roomQueryStringURL = '?roomid=' + roomid;

    var html = '<h2>Unique URL for your room:</h2><br>';

    html += 'Hash URL: <a href="' + roomHashURL + '" target="_blank">' + roomHashURL + '</a>';
    html += '<br>';
    html += 'QueryString URL: <a href="' + roomQueryStringURL + '" target="_blank">' + roomQueryStringURL + '</a>';

    var roomURLsDiv = document.getElementById('room-urls');
    roomURLsDiv.innerHTML = html;

    roomURLsDiv.style.display = 'block';
}

(function() {
    var params = {},
        r = /([^&=]+)=?([^&]*)/g;

    function d(s) {
        return decodeURIComponent(s.replace(/\+/g, ' '));
    }
    var match, search = window.location.search;
    while (match = r.exec(search.substring(1)))
        params[d(match[1])] = d(match[2]);
    window.params = params;
})();

var roomid = '';
if (localStorage.getItem(connection.socketMessageEvent)) {
    roomid = localStorage.getItem(connection.socketMessageEvent);
} else {
    roomid = connection.token();
}
document.getElementById('room-id').value = roomid;
document.getElementById('room-id').onkeyup = function() {
    localStorage.setItem(connection.socketMessageEvent, document.getElementById('room-id').value);
};

var hashString = location.hash.replace('#', '');
if (hashString.length && hashString.indexOf('comment-') == 0) {
    hashString = '';
}

var roomid = params.roomid;
if (!roomid && hashString.length) {
    roomid = hashString;
}

if (roomid && roomid.length) {
    document.getElementById('room-id').value = roomid;
    localStorage.setItem(connection.socketMessageEvent, roomid);

    // auto-join-room
    (function reCheckRoomPresence() {
        connection.checkPresence(roomid, function(isRoomExist) {
            if (isRoomExist) {
                connection.join(roomid);
                return;
            }

            setTimeout(reCheckRoomPresence, 5000);
        });
    })();

    disableInputButtons();
}

// detect 2G
if(navigator.connection &&
   navigator.connection.type === 'cellular' &&
   navigator.connection.downlinkMax <= 0.115) {
  alert('2G is not supported. Please use a better internet service.');
}
</script>


  <script src="https://www.webrtc-experiment.com/common.js"></script>





</body>
</html>

