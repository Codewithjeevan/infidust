var main_state_val = 'dashboard,';
var next_state_val = '';

      if (window.history && window.history.pushState) {

        $(window).on('popstate', function() {
          var hashLocation = location.hash;
          var hashSplit = hashLocation.split("/#");
          var hashName = hashSplit[1];

       //   $("#datacontent").load(base_url+'company/'+puthist_state);
           var back_array = main_state_val.split(',');
            var get_ar_num = back_array.length;
            if(get_ar_num > 2){
               
                     $("#datacontent").load(base_url+'company/'+back_array[get_ar_num-2]);
                     var reval = back_array[get_ar_num-2]+',';
                     main_state_val = main_state_val.replace(reval,'');
                      // alert(back_array[get_ar_num-2]);
                
            }else if(get_ar_num > 1){
              if(next_state_val == 'liveclass'){
                    closelivep();
                    next_state_val = '';
                 }else{
                    back_array1 = main_state_val.replace(',','');
                     $("#datacontent").load(base_url+'company/'+back_array1);
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
  }



