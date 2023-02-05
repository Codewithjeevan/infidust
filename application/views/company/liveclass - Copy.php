<style type="text/css">

  .live-btn-blk { position: fixed;left: 20px; width: 70px;top: 100px;}
 
  .cus-fab { width: 40px; height: 40px; border-radius: 100%; padding: 0; margin-top: 20px;}
  .chat-side-blk { position: fixed; right: 0px; width: 330px; height: 100%; background: #fff; top: 0px; }
  .top-btn-blk { position: fixed; top: 0px; width: 330px; right: 0px; background: ; border-bottom: 1px solid #ccc;}
.top-btn-blk button { margin:0px;}
.video-blk { position: absolute; top: 0;left: 0; width: 100%; height: 76%; background: #1c1c1c;border-radius:10px}
.video-feature-blk { position: absolute; width: 100%; height: 120px; background: ; top: 77%; padding-top: 6px}
.feat-titl-blk { background: ; color: #fff; font-size: 13px; }
.record-btn { background: none; border-radius: 10px; border:1px solid red; color: #fff; font-size: 11px}
.feat-data-blk { width: 100%; overflow: hidden; height: 80px; border:1px solid #6b6b6b; margin-top: 3px; border-radius: 7px;padding: 4px;}
.my-sml-face-blk { width: 100px; height: 80px; background: #1f1f1f; border-radius: 7px;}
.nor-box { width: 100px; height: 70px; border-radius: 7px; text-align: center; padding-top: 20px; background: rgba(100,100,100,0.5); opacity: 0.5 }
.fullvideoblk { position: absolute; top: 0;left: 0; width: 100%; height: 100%; background:;border-radius:10px}
</style>


<div class="row" style="height:100%;background: ; margin:15px 350px 100px 90px;; position:relative;">
  <div class="video-blk">
    <video class=" fullvideoblk" id="yourVideo1" autoplay playsinline></video>
  </div>
  <div class="video-feature-blk row">
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
         <video class="my-sml-face-blk" id="yourVideo2" autoplay playsinline></video>
      </div>
    </div>
  </div>
</div>
<div class="live-btn-blk">
       <button class="btn cus-fab close_livepage" id="<?php echo $clsuids; ?>"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/x.svg"></button>
       <button class="btn cus-fab" onclick="stopstreming();"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/video-off.svg"></button>
       <button class="btn cus-fab" ><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/mic-off.svg"></button>
       <button class="btn cus-fab" ><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/airplay.svg"></button>
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




<script>
 $(document).ready(function() {
         showMyFace();
        });
//Create an account on Firebase, and use the credentials they give you in place of the following


var database = firebase.database().ref();
 var yourVideo = document.getElementById("yourVideo1");
 var yourVideo2 = document.getElementById("yourVideo2");
//var yourVideo = document.getElementsByClassName("yourVideo")[0]
var friendsVideo = document.getElementById("friendsVideo");
var yourId = Math.floor(Math.random()*1000000000);
//Create an account on Viagenie (http://numb.viagenie.ca/), and replace {'urls': 'turn:numb.viagenie.ca','credential': 'websitebeaver','username': 'websitebeaver@email.com'} with the information from your account
var servers = {'iceServers': [{'urls': 'stun:stun.services.mozilla.com'}, {'urls': 'stun:stun.l.google.com:19302'}, {'urls': 'turn:numb.viagenie.ca','credential': 'beaver','username': 'webrtc.websitebeaver@gmail.com'}]};
var pc = new RTCPeerConnection(servers);
pc.onicecandidate = (event => event.candidate?sendMessage(yourId, JSON.stringify({'ice': event.candidate})):console.log("Sent All Ice") );
pc.onaddstream = (event => friendsVideo.srcObject = event.stream);

function sendMessage(senderId, data) {
    var msg = database.push({ sender: senderId, message: data });
   msg.remove();
}

function readMessage(data) {
    var msg = JSON.parse(data.val().message);
    var sender = data.val().sender;
    if (sender != yourId) {
        if (msg.ice != undefined)
            pc.addIceCandidate(new RTCIceCandidate(msg.ice));
        else if (msg.sdp.type == "offer")
            pc.setRemoteDescription(new RTCSessionDescription(msg.sdp))
              .then(() => pc.createAnswer())
              .then(answer => pc.setLocalDescription(answer))
              .then(() => sendMessage(yourId, JSON.stringify({'sdp': pc.localDescription})));
        else if (msg.sdp.type == "answer")
            pc.setRemoteDescription(new RTCSessionDescription(msg.sdp));
    }
};

database.on('child_added', readMessage);

function showMyFace() {
  navigator.mediaDevices.getUserMedia({audio:true, video:true})
    .then(stream => yourVideo.srcObject = stream)
    .then(stream => pc.addStream(stream));
  navigator.mediaDevices.getUserMedia({audio:true, video:true})
    .then(stream => yourVideo2.srcObject = stream)
    .then(stream => pc.addStream(stream));
}
function stopstreming() {
  navigator.mediaDevices.getUserMedia({audio:false, video:false})
     yourVideo.srcObject = null;
     yourVideo2.srcObject = null;
     pc.addStream.stop();
}


function showFriendsFace() {
  pc.createOffer()
    .then(offer => pc.setLocalDescription(offer) )
    .then(() => sendMessage(yourId, JSON.stringify({'sdp': pc.localDescription})) );
}
</script>

<script type="text/javascript">
   $(document).on('click', '#user-dbtn', function(){  
        $("#user-dbtn").hide();
        $("#user-abtn").show();
        $("#chat-abtn").hide();
        $("#chat-dbtn").show();
     });
   $(document).on('click', '#chat-dbtn', function(){  
        $("#chat-dbtn").hide();
        $("#chat-abtn").show();
        $("#user-abtn").hide();
        $("#user-dbtn").show();
     });
   function vidOff() {
    yourVideo.pause();
    yourVideo.src = "";
    localstream.stop();
}
</script>
