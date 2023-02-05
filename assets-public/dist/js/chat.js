 var base_url = 'https://infidust.com/'; 
  //   var base_url = 'http://localhost/infidust/';
// var base_url = 'http://192.168.43.249/s-social-ci/';
  
var chanelid = chatchalid;
var myuserid = mychatid;
var friendid = chatchalid;
var mymsg;
var randid;
var datatype;
var firebaseuserid = chanelid+'_'+myuserid;
var firebasefriendid = chanelid+'_'+friendid;
var chtime;
var totmsg = 38;
var lastapend = 0;
var firsttimeapnd = 0;
var oldscrolhit;
var fetchedData;
var shwoWidth;
var shwoHeight;
getallmsg();
function getallmsg(){

        var url = 'chat/getallmsg/'+chanelid+'/'+friendid;
        
         $.ajax({
          url: base_url + url,
          method: 'GET',
          dataType:'jsonp',
           cache: false,
          success:function(data) {
         // console.log(data);
         fetchedData = data;
          var cnt = '';
          $.each(data, function( key, value ) {
          if(value.user_id == myuserid){
          	    if(value.msg_sts == null){
                 var showmsgtst = '<unsentick id="unsn_'+value.ch_uid+'"><img src="'+base_url+'assets-public/dist/images/unsntick.svg"></unsentick>';
                }else if(value.msg_sts == 2){
                 var showmsgtst = '<sentick id="snt_'+value.ch_uid+'"><img src="'+base_url+'assets-public/dist/images/sntick.svg"></sentick>';	
                }

                if(value.data_type == 'text'){
                      row = 
          		    '<div class="selfmsgblk" align="right">'+
          		        '<div class="selfmsg">'+
          		         '<span>'+value.data+'</span>'+
          		        '</div>'+
          		      '<msgdt>'+value.chtime+'</msgdt>'+showmsgtst+
          		    '</div>'
                      ;
                }else if(value.data_type == 'img'){
                     var chtimgurl_sml = base_url+'assets/chat-small/'+value.data;
                     var chtimgurl_big = base_url+'assets/chat-big/'+value.data;
                     row = 
                    
                  '<div class="selfmsgblk" align="right" style="position:relative;">'+
                      '<div id="imgv_'+value.ch_uid+'" class="selfmsgimg" style="opacity:1;z-index:9; display:none">'+
                        '<a>'+
                          '<img alt=""'+
                               'src="'+chtimgurl_sml+'"'+
                               'data-image="'+chtimgurl_big+'"'+
                               'style="display:none;" >'+
                        '</a>'+
                      '</div>'+
                      // '<img src="'+chtimgurl_sml+'" width="46%" style="position:absolute; top:0px; right:15px;border-radius:5px;">'+
                      '<msgdt>'+value.chtime+'</msgdt>'+showmsgtst+
                  '</div>'+
                   '<script>'+
                    'jQuery(document).ready(function(){'+
                      'jQuery("#imgv_'+value.ch_uid+'").unitegallery({ tile_enable_icons:false });'+
                    '});'+
                  '</script>'
                      ;
                }else if(value.data_type == 'mp4'){
                     var chtimgurl_sml = base_url+'assets/chat-small/'+value.data+'.jpg';
                     var chtimgurl_big = base_url+'assets/chat-big/'+value.data+'.mp4';
                      row = 
                       '<div  class="selfmsgblk" align="right">'+
                         '<div class="selfmsgvideo" >'+
                                 '<video '+
                                'id="my-player" '+
                                'class="video-js" '+
                                'controls '+
                                'preload="false" '+
                               'width="198" '+
                               'readyState ="0" '+
                                'poster="'+chtimgurl_sml+'" '+
                                'data-setup="{}">'+
                              '<source src="'+chtimgurl_big+'" type="video/'+value.data_type+'"></source>'+
                            '</video>'+
                          '</div>'+  
                           '<msgdt>'+value.chtime+'</msgdt>'+showmsgtst+   
                        '</div>'
                      ;
                }
          }else{
             if(value.user_id == friendid){
          	    if(value.msg_sts == null){
                 var showmsgtst = '<unsentick id="unsn_'+value.ch_uid+'"><img src="'+base_url+'assets-public/dist/images/unsntick.svg"></unsentick>';
                }else if(value.msg_sts == 2){
                 var showmsgtst = '<sentick id="snt_'+value.ch_uid+'"><img src="'+base_url+'assets-public/dist/images/sntick.svg"></sentick>';	
                }
            row = 
		    '<div class="usermsgblk usrmsg_'+value.ch_uid+'">'+
            '<div class="userfmsg">'+
		         '<span>'+value.data+'</span>'+
		        '</div>'+
		      '<msgdt>'+value.chtime+'</msgdt>'+
		    '</div>'
            ;
          }
       }
              
             cnt += row;  
          });
          

       $('#chatmsgcontainer').append(cnt);
           window.location.href = '#tobtm';
           setTimeout(function(){  $('#chatmsgcontainer').css('opacity','1'); }, 100);
           if(totmsg >= 15){
             totmsg = totmsg - 15;
           }else{
           		if(lastapend == 1){
           			totmsg = 0;
           		}else{
           			lastapend = 1;
           		}
           }
           console.log(totmsg);
           oldscrolhit = $("#chatmsgcontainer").height();
           firsttimeapnd = 1;
           updatefirebase_allseen();

         },error:function(error) {
          console.error(error);
         }
       }); 

 
   }

// get part massage
$('.fix-container-inner').scroll(function(){
    if ($('.fix-container-inner').scrollTop() == 0){
    if(firsttimeapnd == 1 && lastapend == 0){
         var url = 'chat/getmoremsg/'+chanelid+'/'+totmsg;
        
         $.ajax({
          url: base_url + url,
          method: 'GET',
          dataType:'jsonp',
           cache: false,
          success:function(data) {
          console.log(data);
          var cnt = '';
          $.each(data, function( key, value ) {
          if(value.user_id == myuserid){
          	    if(value.msg_sts == null){
                 var showmsgtst = '<unsentick id="unsn_'+value.ch_uid+'"><img src="'+base_url+'assets-public/dist/images/unsntick.svg"></unsentick>';
                }else if(value.msg_sts == 2){
                 var showmsgtst = '<sentick id="snt_'+value.ch_uid+'"><img src="'+base_url+'assets-public/dist/images/sntick.svg"></sentick>';	
                }
            row = 
		    '<div class="selfmsgblk" align="right">'+
		        '<div class="selfmsg">'+
		         '<span>'+value.data+'</span>'+
		        '</div>'+
		      '<msgdt>'+value.chtime+'</msgdt>'+showmsgtst+
		    '</div>'
            ;
          }else{
             if(value.user_id == friendid){
          	    if(value.msg_sts == null){
                 var showmsgtst = '<unsentick id="unsn_'+value.ch_uid+'"><img src="'+base_url+'assets-public/dist/images/unsntick.svg"></unsentick>';
                }else if(value.msg_sts == 2){
                 var showmsgtst = '<sentick id="snt_'+value.ch_uid+'"><img src="'+base_url+'assets-public/dist/images/sntick.svg"></sentick>';	
                }
            row = 
		    '<div class="usermsgblk usrmsg_'+value.ch_uid+'">'+
            '<div class="userfmsg">'+
		         '<span>'+value.data+'</span>'+
		        '</div>'+
		      '<msgdt>'+value.chtime+'</msgdt>'+
		    '</div>'
            ;
          }
       }
              
             cnt += row;  
          });
          

          $('#chatmsgcontainer').prepend(cnt);
          if(totmsg >= 15){
             totmsg = totmsg - 15;
           }else{
           		if(lastapend == 1){
           			
           		}else{
           			
           			lastapend = 1;
           		}
           //	totmsg = 0;
           }
           console.log(totmsg);

          
           var makescroll = $("#chatmsgcontainer").height() - oldscrolhit;
           $('.fix-container-inner').scrollTop(makescroll);
           oldscrolhit = $("#chatmsgcontainer").height();
           

         },error:function(error) {
          console.error(error);
         }
       }); 

       
       } 
    }
});






$('.csend-btn').click(function(){
 var oldcount = randomStr(10, '3ijk');
	var makerandid = randomStr(20, '12345abcde');
	randid = makerandid+oldcount;
	//console.log(randid+oldcount);
	mymsg = $('#chattype').val();
    datatype = 'text';
	var row = 
	 '<div class="selfmsgblk" align="right">'+
      '<div class="selfmsg">'+
        '<span>'+mymsg+'</span>'+
      '</div>'+
      '<msgdt id="chttime_'+randid+'"></msgdt>'+
      '<pending id="clock_'+randid+'" class="letssend notsend"><i class="fa fa-clock-o"></i></pending>'+
      // '<sentick id="snt_'+randid+'" class="hideel"><img src="images/sntick.svg"></sentick>'+
      '<unsentick id="unsn_'+randid+'" class="hideel"><img src="'+base_url+'assets-public/dist/images/unsntick.svg"></unsentick>'+
    '</div>'
    ;
	
	 $('#chatmsgcontainer').append(row);
	 window.location.href = '#tobtm';
	 $('#chattype').val('');
	 $('#chattype').focus();
	// $('.letssend').click();
	$('.csend-btn').hide();
    $('.attc-btn').show();
	letssendmsg(mymsg, randid);
});

    function randomStr(len, arr) { 
            var ans = ''; 
            for (var i = len; i > 0; i--) { 
                ans +=  
                  arr[Math.floor(Math.random() * arr.length)]; 
            } 
            return ans; 
        } 

$(document).on('click', '.letssend', function(){ 
	//alert("clicked");
});

function letssendmsg(){
 var url = base_url+'chat/letschat/'+randid+'/'+myuserid+'/'+chanelid+'/'+mymsg;

 jQuery.ajax({
      url: url,
      method: 'GET',
      dataType: 'jsonp',
      cache: false,
      success: function(data)
      {
        // console.log(data);
        if(data.response == "Y"){
        	$('#clock_'+randid).hide();
        	
        	$('#chttime_'+randid).html(data.chtime);
          $('#unsn_'+randid).show();
        	chtime = data.chtime;
        	updatefirebase();
        }else if(data.response == "N"){
           console.log(data);
           
            $('#error-blk').show().delay(2000).slideUp();
            $('#er-msg').html('Something went wrong!');

        }
       
      },
      error: function (data) {
            $('#error-blk').show().delay(2000).slideUp();
            $('#er-msg').html('Connection error!');
          }

    }); 
}


function updatefirebase() {
    var msg = rootRef.push({ 
      ch_uid: randid,
    chanel_id: chanelid,
    user_id: myuserid,
    data: mymsg,
    data_type: datatype,
    created_at: chtime,
    username: mychatname,
    userimg: mychatimag
  });
    msg.remove();
}

// function updatefirebase_allseen(){

// 	rootRef.child(firebaseuserid).set({
// 		seen_msg_array: fetchedData
// 	});
// }
$(function () {

  rootRef.on('child_added', readMessage);

 })
 
 function readMessage(data) {
 // console.log(data.val().ch_uid);
 var sender = data.val().user_id;
 var myclsid = data.val().chanel_id;
  if(sender != myuserid && myclsid == chanelid){

    var fmsgdata = data.val().data;
    var fmsgdatatime = data.val().created_at;
    var thismsgid = data.val().ch_uid;
    var sendrnam = data.val().username;
    var sendrimg = data.val().userimg;

     if ( $( ".usrmsg_"+thismsgid ).length ) {

    }else{
      if(sendrimg){
        var showimgurl = '<img src="'+base_url+'assets/pro-sml/'+sendrimg+'">';
      }else{
        var showimgurl = '<img src="'+base_url+'assets-public/dist/img/icon/usert.svg" style="opacity:0.4;">';
      }
      // if(!dataSnapshot.val().seen_msg_array){
          var row = 
         '<div class="usermsgblk">'+
           '<div class="msg-rpic">'+showimgurl+'</div><usernm>'+sendrnam+'</usernm>'+
            '<div class="userfmsg">'+
              '<span>'+fmsgdata+'</span>'+
            '</div>'+
            '<msgdt>'+fmsgdatatime+'</msgdt>'+
          '</div>'
          ;
  //    }
  

            var top_of_element = $("#tobtm").offset().top;
            var bottom_of_element = $("#tobtm").offset().top + $("#tobtm").outerHeight();
            var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
            var top_of_screen = $(window).scrollTop();

            if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){
               $('#chatmsgcontainer').append(row);
                 window.location.href = '#tobtm';
            } else {
             
              $('#chatmsgcontainer').append(row);
             
            }
  // window.location.href = '#tobtm';
  // updateseen(thismsgid);
    }

  }
 }

 function updateseen(thismsgid) {
 	var url = base_url+'chat/msgseenup/'+thismsgid;

 jQuery.ajax({
      url: url,
      method: 'GET',
      dataType: 'jsonp',
      cache: false,
      success: function(data)
      {
        if(data.response == "Y"){
        	// $('#unsn_'+thismsgid).hide();
        	// $('#snt_'+thismsgid).show();
        	updatefirebaseseen(thismsgid);
        }else if(data.response == "N"){
           

        }
       
      },
      error: function (data) {
            // $('#error-blk').show().delay(2000).slideUp();
            // $('#er-msg').html('Connection error!');
          }

    }); 
 }

 function updatefirebaseseen(thismsgid){
 	var msgseen = 2;
	rootRef.child(firebasefriendid+'_msts').set({
		msg_sts: msgseen,
		msg_ch_uid: thismsgid
	});
}

 $(function () {
 	 var ordershowtwo = firebase.database().ref('users').child(firebaseuserid+'_msts');
  
  ordershowtwo.on('value', function(dataSnapshot){
   // $('#textdata').html(dataSnapshot.val().data);
   var makeseenid = dataSnapshot.val().msg_ch_uid;
        	$('#unsn_'+makeseenid).hide();
        	$('#snt_'+makeseenid).show();

  });

 })




$('.attc-btn').click(function(){
		  //    var top_of_element = $("#tobtm").offset().top;
    // var bottom_of_element = $("#tobtm").offset().top + $("#tobtm").outerHeight();
    // var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
    // var top_of_screen = $(window).scrollTop();

    // if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){
    //   console.log("yes");
    // } else {
    //   console.log("no");
    // }
});



$('.cam-btn').click(function(){
   var oldcount = randomStr(10, '3ijk');
  var makerandid = randomStr(20, '12345abcde');
  randid = makerandid+oldcount;
 AndroidFunction.OpenCam(randid);
 //setText("sdlkf");
  });
 function CallbackForImgload(){
  AndroidFunction.setloaderimg();
  }


    function putloaderimg(randuid){
     var row = 
         '<div id="imgc_'+randuid+'" class="selfmsgblk" align="right" style="position:relative;height:'+shwoHeight+'px;">'+
                      '<div class="selfmsgimg">'+
                       '<span><img src="'+base_url+'assets-public/dist/images/imgloaderbk.jpg" width="'+shwoWidth+'" height="'+shwoHeight+'"></span>'+
                      '</div>'+
                      '<img src="'+base_url+'assets-public/dist/images/dataloder.gif" width="50" class="chatimgldr">'+
                    '<msgdt>20/20/20</msgdt>'+
                    '</div>'
       ;
       $('#chatmsgcontainer').append(row);
        setTimeout(function(){  window.location.href = '#tobtm'; }, 100);
       
  }

 function CallbackForImgput(){
  AndroidFunction.setchatimg();
  }

 function putchatimg(thisranduid){

var chuid = thisranduid;
   var url = 'chat/replaceimg/'+chanelid+'/'+myuserid+'/'+chuid;
        
         $.ajax({
          url: base_url + url,
          method: 'GET',
          dataType:'jsonp',
           cache: false,
          success:function(data) {
            if(data.msgresp == 'Y'){
              $('#imgc_'+chuid).html('');
                     var chtimgurl_sml = base_url+'assets/chat-small/'+data.data;
                     var chtimgurl_big = base_url+'assets/chat-big/'+data.data;
                      var showmsgtst = '<unsentick id="unsn_'+chuid+'"><img src="'+base_url+'assets-public/dist/images/unsntick.svg"></unsentick><sentick id="snt_'+chuid+'" class="hideel"><img src="'+base_url+'assets-public/dist/images/sntick.svg"></sentick>';
                     row = 
                    
                      '<div id="imgv_'+chuid+'" class="selfmsgimg" style="opacity:1;z-index:9; display:none">'+
                        '<a>'+
                          '<img alt=""'+
                               'src="'+chtimgurl_sml+'"'+
                               'data-image="'+chtimgurl_big+'"'+
                               'style="display:none;" >'+
                        '</a>'+
                      '</div>'+
                      '<msgdt>'+data.chtime+'</msgdt>'+showmsgtst+
                   '<script>'+
                    'jQuery(document).ready(function(){'+
                      'jQuery("#imgv_'+chuid+'").unitegallery({ tile_enable_icons:false });'+
                    '});'+
                  '</script>'
                      ;
               $('#imgc_'+chuid).html(row);
                setTimeout(function(){  window.location.href = '#tobtm'; }, 100);
            }
         },error:function(error) {
         // console.error(error);
         }
       }); 
 
  }


  function CallbackForCalLen(){
  AndroidFunction.letcalculenth();
  }

 function calcullenth(origWidth,origHeight){
  var orwd = origWidth;
  var orht = origHeight;
  var makwd = 1200;
  destHeight = orht/( orwd / makwd ) ;
  shwoWidth = getsrnwidth / 2;
  shwoHeight1 = orht/( orwd / shwoWidth ) ;
  shwoHeight =  shwoHeight1 - 5;
//$('#textdata').html(destHeight);
 AndroidFunction.putimgsize(destHeight);
  // alert(shwoHeight);
 }

 $('.hdr-txt').click(function(){
  calcullenth();
  
 });
// var cachedImage = new Image();
// cachedImage.addEventListener('load', function () {
//    // alert('Cached image loaded');            
// });
// cachedImage.src = '//vjs.zencdn.net/v/oceans.png';