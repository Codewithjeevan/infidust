<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link href="<?php echo base_url().'assets-public/' ?>dist/img/favicon.png" rel="shortcut icon" type="image/png">
  <meta name="description" content=""/>
  <meta name="keywords" content="" />

  <?php require_once('cssinclude.php');?> 

  
</head>

<style type="text/css">
 @media only screen and (min-width: 993px) and (max-width: 3000px) { 

.blankbk { position: fixed; top: -50px; left: -80px; width: 40%; opacity: 0.5;}
.blankbk img { width: 100%;}
}
 @media only screen and (min-width: 260px) and (max-width: 992px) { 

}

</style>
<body class="hold-transition skin-blue sidebar-collapse">

    <!-- Main content -->
    <div class="container-fluid" style="padding: 0px; background-color: #fff;">

 

    <div class="row" align="center">
     <div class="col-md-12" style="height:70px;"></div>
      <div id="loginblk" class="row cus-lvl " align="left" >
      <div class="col-md-3"></div>
      <div class="col-md-6" style="border:1px solid #ccc;">
                <div class="form-group cus-gr-padding">
                  <label for="exampleInputEmail1">Email address</label><br>
                  <input type="email" class="cus-input" id="exampleInputEmail1" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label><br>
                  <input type="password" class="cus-input" id="exampleInputEmail1" placeholder="">
                </div>
                <div class="form-group">
                  <a href="#" class="gray-link">Forgot Password?</a>
                  
                </div>
                <div class="form-group" align="center">
                 <button type="button" class="cus-round-block" style="">sign in</button>
                </div>
      </div>
      </div>    

      <div id="signupblk" class="row cus-lvl resp-padding" align="left" style="display:none;">
      <div class="col-md-12">
                <div class="form-group cus-gr-padding">
                  <label for="exampleInputEmail1">Name</label><br>
                  <input type="text" class="cus-input" id="exampleInputEmail1" placeholder="Enter Name..">
                </div>
                <div class="form-group cus-gr-padding">
                  <label for="exampleInputEmail1">Email</label><br>
                  <input type="email" class="cus-input" id="exampleInputEmail1" placeholder="Enter Email..">
                </div>
                <div class="form-group cus-gr-padding">
                  <label for="exampleInputEmail1">Password</label><br>
                  <input type="password" class="cus-input" id="exampleInputEmail1" placeholder="Enter Password..">
                </div>
                <div class="form-group cus-gr-padding">
                  <label for="exampleInputEmail1">Merchant Type</label><br>
                  <input type="text" class="cus-input" id="exampleInputEmail1" placeholder="Select marchant type">
                </div>
                <div class="form-group cus-gr-padding">
                  <label for="exampleInputEmail1">Business/Individual Name</label><br>
                  <input type="text" class="cus-input" id="exampleInputEmail1" placeholder="Enter B/I name..">
                </div>
                <div class="form-group cus-gr-padding">
                  <label for="exampleInputEmail1">Website URL(Optional)</label><br>
                  <input type="text" class="cus-input" id="exampleInputEmail1" placeholder="Enter Web URL">
                </div>
                <div class="form-group cus-gr-padding col-md-5" style="padding-left:0px; position:relative;">
                  <label for="exampleInputEmail1">Country</label><br>
                  <input type="text" class="cus-input" id="openconty" placeholder="" value="india">
                 
                    <div class="cus-option-blk" id="contryselect">
                     <option class="getcntry" value="+93" >Afghanistan</option>
                                                      <option class="getcntry" value="+35818" >Aland Islands</option>
                                                      <option class="getcntry" value="+355" >Albania</option>
                                                      <option class="getcntry" value="+213" >Algeria</option>
                                                      <option class="getcntry" value="+1684" >American Samoa</option>
                                                      <option class="getcntry" value="+376" >Andorra</option>
                                                      <option class="getcntry" value="+244" >Angola</option>
                                                      <option class="getcntry" value="+1264" >Anguilla</option>
                                                      <option class="getcntry" value="na" >Antarctica</option>
                                                      <option class="getcntry" value="+1268" >Antigua and Barbuda</option>
                                                      <option class="getcntry" value="+54" >Argentina</option>
                                                      <option class="getcntry" value="+374" >Armenia</option>
                                                      <option class="getcntry" value="+297" >Aruba</option>
                                                      <option class="getcntry" value="+61" >Australia</option>
                                                      <option class="getcntry" value="+43" >Austria</option>
                                                      <option class="getcntry" value="+994" >Azerbaijan</option>
                                                      <option class="getcntry" value="+1242" >Bahamas</option>
                                                      <option class="getcntry" value="+973" >Bahrain</option>
                                                      <option class="getcntry" value="+880" >Bangladesh</option>
                                                      <option class="getcntry" value="+1246" >Barbados</option>
                                                      <option class="getcntry" value="+375" >Belarus</option>
                                                      <option class="getcntry" value="+32" >Belgium</option>
                                                      <option class="getcntry" value="+501" >Belize</option>
                                                      <option class="getcntry" value="+229" >Benin</option>
                                                      <option class="getcntry" value="+1441" >Bermuda</option>
                                                      <option class="getcntry" value="+975" >Bhutan</option>
                                                      <option class="getcntry" value="+591" >Bolivia</option>
                                                      <option class="getcntry" value="+387" >Bosnia and Herzegovina</option>
                                                      <option class="getcntry" value="+267" >Botswana</option>
                                                      <option class="getcntry" value="+55" >Brazil</option>
                                                      <option class="getcntry" value="+246" >British Indian Ocean Territory</option>
                                                      <option class="getcntry" value="+1284" >British Virgin Islands</option>
                                                      <option class="getcntry" value="+673" >Brunei</option>
                                                      <option class="getcntry" value="+359" >Bulgaria</option>
                                                      <option class="getcntry" value="+226" >Burkina Faso</option>
                                                      <option class="getcntry" value="+257" >Burundi</option>
                                                      <option class="getcntry" value="+855" >Cambodia</option>
                                                      <option class="getcntry" value="+237" >Cameroon</option>
                                                      <option class="getcntry" value="+238" >Cape Verde</option>
                                                      <option class="getcntry" value="+1345" >Cayman Islands</option>
                                                      <option class="getcntry" value="+236" >Central African Republic</option>
                                                      <option class="getcntry" value="+235" >Chad</option>
                                                      <option class="getcntry" value="+56" >Chile</option>
                                                      <option class="getcntry" value="+86" >China</option>
                                                      <option class="getcntry" value="+57" >Colombia</option>
                                                      <option class="getcntry" value="+269" >Comoros</option>
                                                      <option class="getcntry" value="+682" >Cook Islands</option>
                                                      <option class="getcntry" value="+506" >Costa Rica</option>
                                                      <option class="getcntry" value="+385" >Croatia</option>
                                                      <option class="getcntry" value="+53" >Cuba</option>
                                                      <option class="getcntry" value="+357" >Cyprus</option>
                                                      <option class="getcntry" value="+420" >Czech Republic</option>
                                                      <option class="getcntry" value="+243" >Democratic Republic of the Congo</option>
                                                      <option class="getcntry" value="+45" >Denmark</option>
                                                      <option class="getcntry" value="+253" >Djibouti</option>
                                                      <option class="getcntry" value="+1767" >Dominica</option>
                                                      <option class="getcntry" value="+1809" >Dominican Republic</option>
                                                      <option class="getcntry" value="+670" >East Timor</option>
                                                      <option class="getcntry" value="+593" >Ecuador</option>
                                                      <option class="getcntry" value="+20" >Egypt</option>
                                                      <option class="getcntry" value="+503" >El Salvador</option>
                                                      <option class="getcntry" value="+240" >Equatorial Guinea</option>
                                                      <option class="getcntry" value="+291" >Eritrea</option>
                                                      <option class="getcntry" value="+372" >Estonia</option>
                                                      <option class="getcntry" value="+251" >Ethiopia</option>
                                                      <option class="getcntry" value="+500" >Falkland Islands</option>
                                                      <option class="getcntry" value="+298" >Faroe Islands</option>
                                                      <option class="getcntry" value="+679" >Fiji</option>
                                                      <option class="getcntry" value="+358" >Finland</option>
                                                      <option class="getcntry" value="+33" >France</option>
                                                      <option class="getcntry" value="+594" >French Guiana</option>
                                                      <option class="getcntry" value="+689" >French Polynesia</option>
                                                      <option class="getcntry" value="+241" >Gabon</option>
                                                      <option class="getcntry" value="+220" >Gambia</option>
                                                      <option class="getcntry" value="+995" >Georgia</option>
                                                      <option class="getcntry" value="+49" >Germany</option>
                                                      <option class="getcntry" value="+233" >Ghana</option>
                                                      <option class="getcntry" value="+350" >Gibraltar</option>
                                                      <option class="getcntry" value="+30" >Greece</option>
                                                      <option class="getcntry" value="+299" >Greenland</option>
                                                      <option class="getcntry" value="+1473" >Grenada</option>
                                                      <option class="getcntry" value="+1671" >Guam</option>
                                                      <option class="getcntry" value="+502" >Guatemala</option>
                                                      <option class="getcntry" value="+441481" >Guernsey</option>
                                                      <option class="getcntry" value="+224" >Guinea</option>
                                                      <option class="getcntry" value="+245" >Guinea-Bissau</option>
                                                      <option class="getcntry" value="+592" >Guyana</option>
                                                      <option class="getcntry" value="+509" >Haiti</option>
                                                      <option class="getcntry" value="+504" >Honduras</option>
                                                      <option class="getcntry" value="+852" >Hong Kong</option>
                                                      <option class="getcntry" value="+36" >Hungary</option>
                                                      <option class="getcntry" value="+354" >Iceland</option>
                                                      <option class="getcntry" value="+91" >India</option>
                                                      <option class="getcntry" value="+62" >Indonesia</option>
                                                      <option class="getcntry" value="+98" >Iran</option>
                                                      <option class="getcntry" value="+964" >Iraq</option>
                                                      <option class="getcntry" value="+353" >Ireland</option>
                                                      <option class="getcntry" value="+441624" >Isle of Man</option>
                                                      <option class="getcntry" value="+972" >Israel</option>
                                                      <option class="getcntry" value="+39" >Italy</option>
                                                      <option class="getcntry" value="+225" >Ivory Coast</option>
                                                      <option class="getcntry" value="+1876" >Jamaica</option>
                                                      <option class="getcntry" value="+81" >Japan</option>
                                                      <option class="getcntry" value="+441534" >Jersey</option>
                                                      <option class="getcntry" value="+962" >Jordan</option>
                                                      <option class="getcntry" value="+7" >Kazakhstan</option>
                                                      <option class="getcntry" value="+254" >Kenya</option>
                                                      <option class="getcntry" value="+686" >Kiribati</option>
                                                      <option class="getcntry" value="+965" >Kuwait</option>
                                                      <option class="getcntry" value="+996" >Kyrgyzstan</option>
                                                      <option class="getcntry" value="+856" >Laos</option>
                                                      <option class="getcntry" value="+371" >Latvia</option>
                                                      <option class="getcntry" value="+961" >Lebanon</option>
                                                      <option class="getcntry" value="+266" >Lesotho</option>
                                                      <option class="getcntry" value="+231" >Liberia</option>
                                                      <option class="getcntry" value="+218" >Libya</option>
                                                      <option class="getcntry" value="+423" >Liechtenstein</option>
                                                      <option class="getcntry" value="+370" >Lithuania</option>
                                                      <option class="getcntry" value="+352" >Luxembourg</option>
                                                      <option class="getcntry" value="+853" >Macao</option>
                                                      <option class="getcntry" value="+389" >Macedonia</option>
                                                      <option class="getcntry" value="+261" >Madagascar</option>
                                                      <option class="getcntry" value="+265" >Malawi</option>
                                                      <option class="getcntry" value="+60" >Malaysia</option>
                                                      <option class="getcntry" value="+960" >Maldives</option>
                                                      <option class="getcntry" value="+223" >Mali</option>
                                                      <option class="getcntry" value="+356" >Malta</option>
                                                      <option class="getcntry" value="+692" >Marshall Islands</option>
                                                      <option class="getcntry" value="+596" >Martinique</option>
                                                      <option class="getcntry" value="+222" >Mauritania</option>
                                                      <option class="getcntry" value="+230" >Mauritius</option>
                                                      <option class="getcntry" value="+262" >Mayotte</option>
                                                      <option class="getcntry" value="+52" >Mexico</option>
                                                      <option class="getcntry" value="+691" >Micronesia</option>
                                                      <option class="getcntry" value="+373" >Moldova</option>
                                                      <option class="getcntry" value="+377" >Monaco</option>
                                                      <option class="getcntry" value="+976" >Mongolia</option>
                                                      <option class="getcntry" value="+382" >Montenegro</option>
                                                      <option class="getcntry" value="+1664" >Montserrat</option>
                                                      <option class="getcntry" value="+212" >Morocco</option>
                                                      <option class="getcntry" value="+258" >Mozambique</option>
                                                      <option class="getcntry" value="+95" >Myanmar</option>
                                                      <option class="getcntry" value="+264" >Namibia</option>
                                                      <option class="getcntry" value="+674" >Nauru</option>
                                                      <option class="getcntry" value="+977" >Nepal</option>
                                                      <option class="getcntry" value="+31" >Netherlands</option>
                                                      <option class="getcntry" value="+687" >New Caledonia</option>
                                                      <option class="getcntry" value="+64" >New Zealand</option>
                                                      <option class="getcntry" value="+505" >Nicaragua</option>
                                                      <option class="getcntry" value="+227" >Niger</option>
                                                      <option class="getcntry" value="+234" >Nigeria</option>
                                                      <option class="getcntry" value="+683" >Niue</option>
                                                      <option class="getcntry" value="+672" >Norfolk Island</option>
                                                      <option class="getcntry" value="+850" >North Korea</option>
                                                      <option class="getcntry" value="+1670" >Northern Mariana Islands</option>
                                                      <option class="getcntry" value="+47" >Norway</option>
                                                      <option class="getcntry" value="+968" >Oman</option>
                                                      <option class="getcntry" value="+92" >Pakistan</option>
                                                      <option class="getcntry" value="+680" >Palau</option>
                                                      <option class="getcntry" value="+970" >Palestinian Territory</option>
                                                      <option class="getcntry" value="+507" >Panama</option>
                                                      <option class="getcntry" value="+675" >Papua New Guinea</option>
                                                      <option class="getcntry" value="+595" >Paraguay</option>
                                                      <option class="getcntry" value="+51" >Peru</option>
                                                      <option class="getcntry" value="+63" >Philippines</option>
                                                      <option class="getcntry" value="+870" >Pitcairn</option>
                                                      <option class="getcntry" value="+48" >Poland</option>
                                                      <option class="getcntry" value="+351" >Portugal</option>
                                                      <option class="getcntry" value="+1787" >Puerto Rico</option>
                                                      <option class="getcntry" value="+974" >Qatar</option>
                                                      <option class="getcntry" value="+242" >Republic of the Congo</option>
                                                      <option class="getcntry" value="+40" >Romania</option>
                                                      <option class="getcntry" value="+250" >Rwanda</option>
                                                      <option class="getcntry" value="+290" >Saint Helena</option>
                                                      <option class="getcntry" value="+1869" >Saint Kitts and Nevis</option>
                                                      <option class="getcntry" value="+1758" >Saint Lucia</option>
                                                      <option class="getcntry" value="+590" >Saint Martin</option>
                                                      <option class="getcntry" value="+508" >Saint Pierre and Miquelon</option>
                                                      <option class="getcntry" value="+1784" >Saint Vincent and the Grenadines</option>
                                                      <option class="getcntry" value="+685" >Samoa</option>
                                                      <option class="getcntry" value="+378" >San Marino</option>
                                                      <option class="getcntry" value="+239" >Sao Tome and Principe</option>
                                                      <option class="getcntry" value="+966" >Saudi Arabia</option>
                                                      <option class="getcntry" value="+221" >Senegal</option>
                                                      <option class="getcntry" value="+381" >Serbia</option>
                                                      <option class="getcntry" value="+248" >Seychelles</option>
                                                      <option class="getcntry" value="+232" >Sierra Leone</option>
                                                      <option class="getcntry" value="+65" >Singapore</option>
                                                      <option class="getcntry" value="+599" >Sint Maarten</option>
                                                      <option class="getcntry" value="+421" >Slovakia</option>
                                                      <option class="getcntry" value="+386" >Slovenia</option>
                                                      <option class="getcntry" value="+677" >Solomon Islands</option>
                                                      <option class="getcntry" value="+252" >Somalia</option>
                                                      <option class="getcntry" value="+27" >South Africa</option>
                                                      <option class="getcntry" value="+82" >South Korea</option>
                                                      <option class="getcntry" value="+211" >South Sudan</option>
                                                      <option class="getcntry" value="+34" >Spain</option>
                                                      <option class="getcntry" value="+94" >Sri Lanka</option>
                                                      <option class="getcntry" value="+249" >Sudan</option>
                                                      <option class="getcntry" value="+597" >Suriname</option>
                                                      <option class="getcntry" value="+268" >Swaziland</option>
                                                      <option class="getcntry" value="+46" >Sweden</option>
                                                      <option class="getcntry" value="+41" >Switzerland</option>
                                                      <option class="getcntry" value="+963" >Syria</option>
                                                      <option class="getcntry" value="+886" >Taiwan</option>
                                                      <option class="getcntry" value="+992" >Tajikistan</option>
                                                      <option class="getcntry" value="+255" >Tanzania</option>
                                                      <option class="getcntry" value="+66" >Thailand</option>
                                                      <option class="getcntry" value="+228" >Togo</option>
                                                      <option class="getcntry" value="+690" >Tokelau</option>
                                                      <option class="getcntry" value="+676" >Tonga</option>
                                                      <option class="getcntry" value="+1868" >Trinidad and Tobago</option>
                                                      <option class="getcntry" value="+216" >Tunisia</option>
                                                      <option class="getcntry" value="+90" >Turkey</option>
                                                      <option class="getcntry" value="+993" >Turkmenistan</option>
                                                      <option class="getcntry" value="+1649" >Turks and Caicos Islands</option>
                                                      <option class="getcntry" value="+688" >Tuvalu</option>
                                                      <option class="getcntry" value="+1340" >U.S. Virgin Islands</option>
                                                      <option class="getcntry" value="+256" >Uganda</option>
                                                      <option class="getcntry" value="+380" >Ukraine</option>
                                                      <option class="getcntry" value="+971" >United Arab Emirates</option>
                                                      <option class="getcntry" value="+44" >United Kingdom</option>
                                                      <option class="getcntry" value="+1" >United States</option>
                                                      <option class="getcntry" value="+598" >Uruguay</option>
                                                      <option class="getcntry" value="+998" >Uzbekistan</option>
                                                      <option class="getcntry" value="+678" >Vanuatu</option>
                                                      <option class="getcntry" value="+379" >Vatican</option>
                                                      <option class="getcntry" value="+58" >Venezuela</option>
                                                      <option class="getcntry" value="+84" >Vietnam</option>
                                                      <option class="getcntry" value="+681" >Wallis and Futuna</option>
                                                      <option class="getcntry" value="+967" >Yemen</option>
                                                      <option class="getcntry" value="+260" >Zambia</option>
                                                      <option class="getcntry" value="+263" >Zimbabwe</option>
                    </div>

                </div>
                
                <div class="form-group cus-gr-padding col-md-7" style="padding-left:0px; padding-right:0px;">
                  <label for="exampleInputEmail1">Phone Number</label><br>
                  <input type="text" class="cus-input" id="exampleInputEmail1" placeholder="xxxxxxxxxx">
                </div>

                 <div class="form-group cus-gr-padding col-md-12" style="padding-left:0px; position:relative; z-index:9;">
                  <label for="">Expected Monthly Transactions</label><br>
                  <input type="text" class="cus-input" id="openmt" placeholder="" value="india">
                 
                    <div class="cus-option-blk" id="mtselect">
                                                      <option class="getmt" value="100" >100</option>
                                                      <option class="getmt" value="100-1000" >100-1000</option>
                                                      <option class="getmt" value="A1000" >Avobe 1000</option>
                                                      
                    </div>
                </div>

                <div class="form-group cus-gr-padding" align="left">
                 <img src="<?php echo base_url().'assets-public/' ?>dist/img/bluechk-b.png" id="makechk"> 
                 <img src="<?php echo base_url().'assets-public/' ?>dist/img/bluechk-c.png" id="getchk" style="display:none"> 
                 <span style="position:relative;top:2px;">I agree to the terms and conditions</span>
                 <input type="hidden" value="0" id="isreadtc">
                </div>
                <div class="form-group cus-gr-padding" align="center">
                 <button type="button" class="cus-round-block" style="">sign up</button>
                </div>
      </div>
       
      </div>

    </div>

<!-- <div class="cus-option-back"></div> -->
  


   


    
     
    



    <?php require_once('footerblank.php');?> 
<script type="text/javascript">
$(document).ready(function() { 
   $('#openconty').click(function(e) {
        $('#contryselect').toggle();
        e.stopPropagation();
   });

   $('body').click(function() {
        $('#contryselect').hide();
        $('#mtselect').hide();
       
   });

   $('#contryselect').click(function(e) {
        e.stopPropagation();
   });
   $('#openmt').click(function(e) {
        $('#mtselect').toggle();
        e.stopPropagation();
   });
   $('#mtselect').click(function(e) {
        e.stopPropagation();
   });
   

   });



   $('.getcntry').click(function() {
        var cntrynm = $(this).html();
        var cntryval = this.value;
        $('#openconty').val(cntrynm);
        $('#contryselect').hide();
         
   });
   $('#makechk').click(function() {
        $('#makechk').hide();
        $('#getchk').show();
        $('#isreadtc').val('1');
         
   });
   $('#getchk').click(function() {
        $('#makechk').show();
        $('#getchk').hide();
        $('#isreadtc').val('0');
         
   });
   $('#signup').click(function() {
        $('#loginblk').hide();
        $('#signupblk').show();
        $('#signup').removeClass('cus-round4');
        $('#signup').addClass('cus-round5');
        $('#signin').removeClass('cus-round5');
        $('#signin').addClass('cus-round4');
         
   });
   $('#signin').click(function() {
        $('#signupblk').hide();
        $('#loginblk').show();
        $('#signup').removeClass('cus-round5');
        $('#signup').addClass('cus-round4');
        $('#signin').removeClass('cus-round4');
        $('#signin').addClass('cus-round5');
         
   });
</script>