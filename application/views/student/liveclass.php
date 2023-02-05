

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

  <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>dist/css/cus.css">
   <link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>dist/css/bootstrap-material-design.min.css"> 
   <script src="<?php echo base_url().'assets-public/' ?>dist/js/jquery-3.1.1.min.js"></script>
  <script src="<?php echo base_url().'assets-public/' ?>dist/js/pace.js"></script>
  <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase.js"></script>
  
    <script type="text/javascript"> var base_url = '<?php echo base_url()?>';</script>
    <style type="text/css">

  .live-btn-blk { position: fixed;left: 20px; width: 70px;top: 100px;}
 
  .cus-fab { width: 40px; height: 40px; border-radius: 100%; padding: 0; margin-top: 20px;}
  .chat-side-blk { position: fixed; right: 0px; width: 330px; height: 100%; background: #fff; top: 0px; }
  .top-btn-blk { position: fixed; top: 0px; width: 330px; right: 0px; background: ; border-bottom: 1px solid #ccc;}
.top-btn-blk button { margin:0px;}
.video-blk { position: absolute; top: 0;left: 0; width: 100%;  background: #1c1c1c;border-radius:10px}
.video-feature-blk { position: absolute; width: 100%; height: 120px; background: ; padding-top: 6px}
.feat-titl-blk { background: ; color: #fff; font-size: 13px; }
.record-btn { background: none; border-radius: 10px; border:1px solid red; color: #fff; font-size: 11px}
.feat-data-blk { width: 100%; overflow: hidden; height: 80px; border:1px solid #6b6b6b; margin-top: 3px; border-radius: 7px;padding: 4px;}
.my-sml-face-blk { width: 100px; height: 80px; background: #1f1f1f; border-radius: 7px;}
.nor-box { width: 100px; height: 70px; border-radius: 7px; text-align: center; padding-top: 20px; background: rgba(100,100,100,0.5); opacity: 0.5 }
.fullvideoblk { position: absolute; top: 0;left: 0; width: 100%; height: 100%; background:;border-radius:10px;overflow: hidden}
</style>

</head>
<body>

<div class="container-fluid">
<div class="row" style="height:100%;background: red; margin:15px 350px 100px 90px;position:relative;">
  <div class="video-blk" style="display:none">
    <!-- <video class="fullvideoblk" id="yourVideo1" autoplay playsinline></video> -->
    <div id="videos-container" class="fullvideoblk" style=""></div>
  </div>
  <div class="video-feature-blk row" style="display:none">
    <div class="col-md-4" style="padding:0;">
      <div class="feat-titl-blk">Recording &nbsp;&nbsp; <button class="record-btn">START RECORDING</button></div>
      <div class="feat-data-blk">
        <div class="nor-box">
          <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/film.svg">
        </div>
      </div>
    </div>
     <div class="col-md-8" style="padding:0;" align="right">
      <div class="feat-titl-blk" style="color:#000">.</div>
      <div class="my-sml-face-blk">
         <!-- <video class="my-sml-face-blk" id="yourVideo2" autoplay playsinline></video> -->
      </div>
    </div>
  </div>
</div>
<div class="live-btn-blk">
       <button class="btn cus-fab close_livepage" id=""><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/x.svg"></button>
       <button class="btn cus-fab" onclick="stopstreming();"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/video-off.svg"></button>
       <button class="btn cus-fab" ><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/mic-off.svg"></button>
       <button class="btn cus-fab" id="join-room"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/airplay.svg"></button>
</div>
 


    <div class="chat-side-blk">
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
      <div align="center"><br><br><br><br><br><br><br>
        No student added yet!
      </div>
    </div>

</div>




  <h1 style="display:none">
    Video OneWay Broadcasting using RTCMultiConnection
    <p class="no-mobile">
      Multi-user (one-to-many) video broadcasting using star topology.
    </p>
  </h1>

  <section class="make-center"><input id="mainclsuid" type="hidden" value="<?php echo $crnt_cls_liv_uid; ?>">
    <input type="hidden" id="room-id" value="<?php echo $crnt_cls_liv_uid; ?>" autocorrect=off autocapitalize=off size=20>
    
    <button id="join-room" style="display:none"></button>
    <button id="open-or-join-room" style="display:none"></button>

    <div id="" style="margin: 20px 0;"></div>

    <div id="room-urls" style="text-align: center;display: none;background: #000;position:fixed;top:-1000px;height:0px; overflow:hidden"></div>
  </section>

<script src="<?php echo base_url().'assets-public/' ?>dist/js/popper.js"></script>
<script src="<?php echo base_url().'assets-public/' ?>dist/js/bootstrap-material-design.js"></script>


 <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

<script src="https://rtcmulticonnection.herokuapp.com/dist/RTCMultiConnection.js"></script>
<script src="https://rtcmulticonnection.herokuapp.com/node_modules/webrtc-adapter/out/adapter.js"></script>
<script src="https://rtcmulticonnection.herokuapp.com/socket.io/socket.io.js"></script>

<!-- custom layout for HTML5 audio/video elements -->
<link rel="stylesheet" href="<?php echo base_url().'assets-public/' ?>dist/css/vid.css?12">
<script src="<?php echo base_url().'assets-public/' ?>dist/js/getHTMLMediaElement.js?12"></script>
<script type="text/javascript">
  window.onload = function onetchap() { 
    var mainid = $('#mainclsuid').val();
    $('#room-id').val(mainid);
     var getsrnheight = $(window).height();
     var newhiht = parseInt(getsrnheight) - parseInt(150);
     var makmargin = parseInt(newhiht) + parseInt(10);
     $('.video-blk').css('height',newhiht);
     $('.video-blk').fadeIn('fast');
     $('.video-feature-blk').css('top',makmargin);
     $('.video-feature-blk').fadeIn('fast');
}
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

