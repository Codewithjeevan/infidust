var main_state_val = 'student/dashboard,';
var next_state_val = '';

function openNavipageStart(controlr,page){
  var makurl = controlr+"/"+page;
   $("#datacontent").load(base_url+makurl);
            if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
            window.history.pushState('forward', null, './student_panel');
       //  nextstate(makurl);
}
function openNavipage(controlr,page){
  var catchid = new Date().getTime();
  var makurl = controlr+"/"+page+"?catch="+catchid;
   $("#datacontent").load(base_url+makurl);
            if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
          var stateval = controlr+'#'+page
          window.history.pushState('forward', null, './student_panel?'+stateval);
         nextstate(makurl);

        
}



      if (window.history && window.history.pushState) {
   // console.log(main_state_val);
     // var hashLocationS = window.location.search;
     //      var hashSplitS = hashLocationS.split("/#");
     //      var hashNameS = hashSplitS[1];
     //      alert(hashLocationS);

        $(window).on('popstate', function() {
          var hashLocation = location.hash;
          var hashSplit = hashLocation.split("/#");
          var hashName = hashSplit[1];
         
       //   $("#datacontent").load(base_url+'dashboard/'+puthist_state);
           var back_array = main_state_val.split(',');
            var get_ar_num = back_array.length;
            console.log(back_array[get_ar_num-2]);
            if(get_ar_num > 2){
               
                     $("#datacontent").load(base_url+back_array[get_ar_num-2]);
                     var reval = back_array[get_ar_num-2]+',';
                     main_state_val = main_state_val.replace(reval,'');
                      // alert(back_array[get_ar_num-2]);
                
            }else if(get_ar_num > 1){
              if(next_state_val == 'liveclass'){
                    closelivep();
                    next_state_val = '';
                 }else{
                    back_array1 = main_state_val.replace(',','');
                     $("#datacontent").load(base_url+back_array1);
                     next_state_val = '';
                   // alert(back_array1);
                 }
            }
            

         //  alert(hashLocation);
          if (hashName !== '') {
            var hash = window.location.hash;
            if (hash === '') {
            //  alert('Back button was pressed.');
               // window.location='www.example.com';
                return false;
            }
          }

        });

        // window.history.pushState('home', null, './#home');
      }

  function nextstate(nval){
    if(next_state_val == ''){
     next_state_val = nval;
    }else{
      main_state_val = main_state_val+next_state_val+',';
      next_state_val = nval;
    }
   // console.log(main_state_val);
   // console.log(next_state_val);
  }



