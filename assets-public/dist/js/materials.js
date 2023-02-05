  $(document).on('click', '#crt-vid-pop', function(){ 
  $('#up-fil-typ').val('video');
  $('#vid-up-pop').show();
  $('#up-ic-vid').show();
  $('#up-ic-doc').hide();
    });  
  $(document).on('click', '#crt-docs-pop', function(){ 
  $('#up-fil-typ').val('docs');
  $('#vid-up-pop').show();
  $('#up-ic-doc').show();
   $('#up-ic-vid').hide();
    });   
     $(document).on('click', '#vminiz-btn', function(){ 
     $('#vid-up-pop').show();
     });  
  $(document).on('click', '.min-v-up', function(){ 
  $('#vid-up-pop').hide();
    });
  $(document).on('click', '#cls-v-up', function(){ 
  $('#vid-up-pop').hide();
    });


/* Script written by Adam Khoury @ DevelopPHP.com */
/* Video Tutorial: http://www.youtube.com/watch?v=EraNFJiY0Eg */
function _(el){
  return document.getElementById(el);
}
function uploadFile(){
  var file = _("mainmaterials").files[0];
  // alert(file.name+" | "+file.size+" | "+file.type);
  var formdata = new FormData();
  formdata.append("mainmaterials", file);
  var ajax = new XMLHttpRequest();
  ajax.upload.addEventListener("progress", progressHandler, false);
  ajax.addEventListener("load", completeHandler, false);
  ajax.addEventListener("error", errorHandler, false);
  ajax.addEventListener("abort", abortHandler, false);
  var vidurl = base_url + "materials/Material_vupload";
  ajax.open("POST", vidurl);
  ajax.send(formdata);
}

function progressHandler(event){
  //_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
  var percent = (event.loaded / event.total) * 100;
  _("VprogressBar").value = Math.round(percent);
  _("vup-status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
  _("vup-status").innerHTML = event.target.responseText;
  _("VprogressBar").value = 100;
$('#goto-v-pseting').show();
$('#miniz-blk').hide();
$('#vupld-opt').hide();
$('#cls-v-up').show();
}
function errorHandler(event){
  _("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
  _("status").innerHTML = "Upload Aborted";
}

var timestamp = new Date().getUTCMilliseconds();
  var loadFile = function(event) {
    var outpuimg = document.getElementById('snpvideo');
    outpuimg.src = URL.createObjectURL(event.target.files[0]);
    $('#strt-vup-tem-ldr').show();
    $('#mainmaterials').hide();
    setTimeout(function(){ $('#jumpvid').click(); }, 600); 
  };
  function playv(){
     var v = document.getElementById('snpvideo');
     v.play();
  }

    var video = document.getElementById('snpvideo');
     var canvas = document.getElementById('snpcanvas');
     var context = canvas.getContext('2d');
     var w, h, ratio;
     //add loadedmetadata which will helps to identify video attributes......
     video.addEventListener('loadedmetadata', function() {
       ratio = video.videoWidth / video.videoHeight;
       w = video.videoWidth - 100;
       h = parseInt(w / ratio, 10);
       canvas.width = w;
       canvas.height = h;
     }, false);
     ///define a function
     function snap() {
       context.fillRect(0, 0, w, h);
       context.drawImage(video, 0, 0, w, h);
      setTimeout(function(){ 
        uploadbase64();  
        $('#strt-vup-tem-ldr').hide();
        $('#in-def-vidblk').hide();
        $('#in-up-vidblk').show();
        $('#VprogressBar').show();
       // $('#crt-vid-pop').hide();
        $('#cls-v-up').hide();
        $('#vupld-opt').show();
        $('#min-v-up').show();
        $('#miniz-blk').show();
      }, 100);  
     }
      function uploadbase64(){
        canvasData = canvas.toDataURL("image/jpeg"); 
        var ajax = new XMLHttpRequest();
        ajax.addEventListener("load", completeHandlerThumb, false);
         ajax.addEventListener("error", errorHandlerThumb, false);
         ajax.addEventListener("abort", abortHandlerThumb, false);
         var thumurl = base_url + 'materials/Material_thumb';
        ajax.open("POST",thumurl);
       // ajax.setRequestHeader('Content-Type', 'application/upload');
        ajax.send(canvasData);
    }
    function completeHandlerThumb(event){
     
     _("vm-details-id").value = event.target.responseText;
      uploadFile();
    //_("progressBar").value = 0;
    //uploadFile();
    }
    function errorHandlerThumb(event){
     // _("status").innerHTML = "Upload Failed";
    }
    function abortHandlerThumb(event){
     // _("status").innerHTML = "Upload Aborted";
    }

     // forword 1min
    var jumpvide = document.getElementById('snpvideo'),
    jumpvid = document.getElementById('jumpvid');

    jumpvid.addEventListener("click", function (event) {
        event.preventDefault();
        jumpvide.play();
        jumpvide.pause();
        jumpvide.currentTime = 60;
        jumpvide.pause();
        setTimeout(function(){ snap(); }, 800); 
        
    }, false);

