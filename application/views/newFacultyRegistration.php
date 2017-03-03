<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html oncontextmenu="return false">
<head>
	<title>Faculty Registration Form | Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">      
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/icon.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/materialize.min.min.css">
   	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/select2.min.css">
<script type="text/javascript" src="<?php echo base_url()?>assets/js/angular.min.js"></script>
    <style type="text/css">
    	@media screen and (min-width: 991px) {
	    	.container {
	    		margin-right: 10%;
	    	}
    	}
    	.spanRed {
    		color: #ef5350;
    	}

    </style>
</head>
<body bgcolor="#f1f1f1">
	
	<!--contents of the dropdown menu-->
	<ul id="dropdown1" class="dropdown-content">
	  <li><a href="#!">Profile</a></li>
	  <li class="divider"></li>
	  <li><a href="#!">Logout</a></li>
	</ul>
	<!--contents of the dropdown menu end-->
	<!--main-->
	<div class="container main" ng-app="baseModule" ng-controller="formController">
      <div class="card-panel">
        <form id="studentRegistrationForm" class="col s12" method="post" action="<?php echo base_url('studentRegistration/addStudentDB')?>" name="studentRegistrationForm" autocomplete>
            <div class="row">
               	<div class="input-field col s4">
                	<input id="fname" name="fname" type="text" class="active" pattern="[A-Za-z ]+" title="Special Characters not allowed" required>
                	<label for="fname">First Name <span class="spanRed">*</span></label>
               	</div>
               	<div class="input-field col s4">      
                	<label for="mname">Middle Name</label>
                  	<input id="mname" name="mname" type="text" pattern="[A-Za-z]+[0-9]*[ ]?[0-9]*" title="Special Characters not allowed">
               	</div>
               	<div class="input-field col s4">      
                	<label for="lname">Last Name <span class="spanRed">*</span></label>
                	<input id="lname" name="lname" type="text" pattern="[A-Za-z]+[0-9]*[ ]?[0-9]*" title="Special Characters not allowed" required>          
               	</div>
            </div>
            <div class="row">
               	<div class="input-field col s4">
                  	<input id="male" type="radio" name="gender" value="male" checked>
                  	<label for="male">Male</label>
                  
                  	<input id="female" type="radio" name="gender" value="female">
                  	<label for="female">Female</label>
               	</div>
               	<div class="input-field col s4">
                    <label for="dob">Date of Birth <span class="spanRed">*</span></label>
                    <input id="dob" name="dob" type="date" class="datepicker">
               	</div>
               	<div class="input-field col s4">
                  	<label for="doa">Date of Admission <span class="spanRed">*</span></label>
                  	<input id="doa" name="doa" type="date" class="datepicker">
               	</div>
            </div>
            <div class="row">
            	<div class="input-field col s2" style="padding-top: 20px;">
            		<select name="studentCountryCode" class="names" style="width: 100%;">
						<option value="91" selected>India (+91)</option>
						<option value="44">UK (+44)</option>
						<option value="1">USA (+1)</option>
						<option disabled>others</option>
						<option value="93">Afghanistan (+93)</option>
						<option value="355">Albania (+355)</option>
						<option value="213">Algeria (+213)</option>
						<option value="1684">American Samoa (+1684)</option>
						<option value="376">Andorra (+376)</option>
						<option value="244">Angola (+244)</option>
						<option value="1264">Anguilla (+1264)</option>
						<option value="1268">Antigua &amp; Barbuda (+1268)</option>
						<option value="54">Argentina (+54)</option>
						<option value="374">Armenia (+374)</option>
						<option value="297">Aruba (+297)</option>
						<option value="61">Australia (+61)</option>
						<option value="43">Austria (+43)</option>
						<option value="994">Azerbaijan (+994)</option>
						<option value="1242">Bahamas (+1242)</option>
						<option value="973">Bahrain (+973)</option>
						<option value="880">Bangladesh (+880)</option>
						<option value="1246">Barbados (+1246)</option>
						<option value="375">Belarus (+375)</option>
						<option value="32">Belgium (+32)</option>
						<option value="501">Belize (+501)</option>
						<option value="229">Benin (+229)</option>
						<option value="1441">Bermuda (+1441)</option>
						<option value="975">Bhutan (+975)</option>
						<option value="591">Bolivia (+591)</option>
						<option value="387">Bosnia Herzegovina (+387)</option>
						<option value="267">Botswana (+267)</option>
						<option value="55">Brazil (+55)</option>
						<option value="246">British Indian Ocean Territory (+246)</option>
						<option value="1284">British Virgin Islands (+1284)</option>
						<option value="673">Brunei (+673)</option>
						<option value="359">Bulgaria (+359)</option>
						<option value="226">Burkina Faso (+226)</option>
						<option value="95">Burma-Myanmar (+95)</option>
						<option value="257">Burundi (+257)</option>
						<option value="855">Cambodia (+855)</option>
						<option value="237">Cameroon (+237)</option>
						<option value="1">Canada (+1)</option>
						<option value="238">Cape Verde Islands (+238)</option>
						<option value="1345">Cayman Islands (+1345)</option>
						<option value="236">Central African Republic (+236)</option>
						<option value="235">Chad (+235)</option>
						<option value="56">Chile (+56)</option>
						<option value="86">China (+86)</option>
						<option value="6189">Christmas Island (+6189)</option>
						<option value="57">Colombia (+57)</option>
						<option value="269">Comoros (+269)</option>
						<option value="242">Congo (+242)</option>
						<option value="682">Cook Islands (+682)</option>
						<option value="506">Costa Rica (+506)</option>
						<option value="385">Croatia (+385)</option>
						<option value="53">Cuba (+53)</option>
						<option value="599">Curaçao (+599)</option>
						<option value="90392">Cyprus North (+90392)</option>
						<option value="357">Cyprus South (+357)</option>
						<option value="420">Czech Republic (+420)</option>
						<option value="45">Denmark (+45)</option>
						<option value="253">Djibouti (+253)</option>
						<option value="1767">Dominica (+1767)</option>
						<option value="1809">Dominican Republic (+1809)</option>
						<option value="670">East Timor (+670)</option>
						<option value="593">Ecuador (+593)</option>
						<option value="20">Egypt (+20)</option>
						<option value="503">El Salvador (+503)</option>
						<option value="240">Equatorial Guinea (+240)</option>
						<option value="291">Eritrea (+291)</option>
						<option value="372">Estonia (+372)</option>
						<option value="251">Ethiopia (+251)</option>
						<option value="500">Falkland Islands (+500)</option>
						<option value="298">Faroe Islands (+298)</option>
						<option value="679">Fiji (+679)</option>
						<option value="358">Finland (+358)</option>
						<option value="33">France (+33)</option>
						<option value="594">French Guiana (+594)</option>
						<option value="689">French Polynesia (+689)</option>
						<option value="241">Gabon (+241)</option>
						<option value="220">Gambia (+220)</option>
						<option value="995">Georgia (+995)</option>
						<option value="49">Germany (+49)</option>
						<option value="233">Ghana (+233)</option>
						<option value="350">Gibraltar (+350)</option>
						<option value="30">Greece (+30)</option>
						<option value="299">Greenland (+299)</option>
						<option value="1473">Grenada (+1473)</option>
						<option value="590">Guadeloupe (+590)</option>
						<option value="1671">Guam (+1671)</option>
						<option value="502">Guatemala (+502)</option>
						<option value="224">Guinea (+224)</option>
						<option value="245">Guinea - Bissau (+245)</option>
						<option value="592">Guyana (+592)</option>
						<option value="509">Haiti (+509)</option>
						<option value="504">Honduras (+504)</option>
						<option value="852">Hong Kong (+852)</option>
						<option value="36">Hungary (+36)</option>
						<option value="354">Iceland (+354)</option>
						<!-- <option value="91">India (+91)</option> -->
						<option value="62">Indonesia (+62)</option>
						<option value="98">Iran (+98)</option>
						<option value="964">Iraq (+964)</option>
						<option value="353">Ireland (+353)</option>
						<option value="972">Israel (+972)</option>
						<option value="39">Italy (+39)</option>
						<option value="225">Ivory Coast (+225)</option>
						<option value="1876">Jamaica (+1876)</option>
						<option value="81">Japan (+81)</option>
						<option value="962">Jordan (+962)</option>
						<option value="7">Kazakhstan (+7)</option>
						<option value="254">Kenya (+254)</option>
						<option value="686">Kiribati (+686)</option>
						<option value="965">Kuwait (+965)</option>
						<option value="996">Kyrgyzstan (+996)</option>
						<option value="856">Laos (+856)</option>
						<option value="371">Latvia (+371)</option>
						<option value="961">Lebanon (+961)</option>
						<option value="266">Lesotho (+266)</option>
						<option value="231">Liberia (+231)</option>
						<option value="218">Libya (+218)</option>
						<option value="423">Liechtenstein (+423)</option>
						<option value="370">Lithuania (+370)</option>
						<option value="352">Luxembourg (+352)</option>
						<option value="853">Macao (+853)</option>
						<option value="389">Macedonia (+389)</option>
						<option value="261">Madagascar (+261)</option>
						<option value="265">Malawi (+265)</option>
						<option value="60">Malaysia (+60)</option>
						<option value="960">Maldives (+960)</option>
						<option value="223">Mali (+223)</option>
						<option value="356">Malta (+356)</option>
						<option value="692">Marshall Islands (+692)</option>
						<option value="596">Martinique (+596)</option>
						<option value="222">Mauritania (+222)</option>
						<option value="230">Mauritius (+230)</option>
						<option value="262">Mayotte (+262)</option>
						<option value="52">Mexico (+52)</option>
						<option value="691">Micronesia (+691)</option>
						<option value="373">Moldova (+373)</option>
						<option value="377">Monaco (+377)</option>
						<option value="976">Mongolia (+976)</option>
						<option value="382">Montenegro (+382)</option>
						<option value="1664">Montserrat (+1664)</option>
						<option value="212">Morocco (+212)</option>
						<option value="258">Mozambique (+258)</option>
						<option value="95">Myanmar (+95)</option>
						<option value="264">Namibia (+264)</option>
						<option value="674">Nauru (+674)</option>
						<option value="977">Nepal (+977)</option>
						<option value="31">Netherlands (+31)</option>
						<option value="687">New Caledonia (+687)</option>
						<option value="64">New Zealand (+64)</option>
						<option value="505">Nicaragua (+505)</option>
						<option value="227">Niger (+227)</option>
						<option value="234">Nigeria (+234)</option>
						<option value="683">Niue (+683)</option>
						<option value="672">Norfolk Islands (+672)</option>
						<option value="1670">Northern Mariana Islands (+1670)</option>
						<option value="850">North Korea (+850)</option>
						<option value="47">Norway (+47)</option>
						<option value="968">Oman (+968)</option>
						<option value="92">Pakistan (+92)</option>
						<option value="680">Palau (+680)</option>
						<option value="970">Palestine (+970)</option>
						<option value="507">Panama (+507)</option>
						<option value="675">Papua New Guinea (+675)</option>
						<option value="595">Paraguay (+595)</option>
						<option value="51">Peru (+51)</option>
						<option value="63">Philippines (+63)</option>
						<option value="870">Pitcairn Islands (+870)</option>
						<option value="48">Poland (+48)</option>
						<option value="351">Portugal (+351)</option>
						<option value="1787">Puerto Rico (+1787)</option>
						<option value="974">Qatar (+974)</option>
						<option value="262">Reunion (+262)</option>
						<option value="40">Romania (+40)</option>
						<option value="7">Russia (+7)</option>
						<option value="250">Rwanda (+250)</option>
						<option value="290">Saint Helena (+290)</option>
						<option value="1869">Saint Kitts and Nevis (+1869)</option>
						<option value="1758">Saint Lucia (+1758)</option>
						<option value="1599">Saint Martin (+1599)</option>
						<option value="508">Saint Pierre and Miquelon (+508)</option>
						<option value="1784">Saint Vincent and the Grenadines (+1784)</option>
						<option value="685">Samoa (+685)</option>
						<option value="378">San Marino (+378)</option>
						<option value="239">Sao Tome &amp; Principe (+239)</option>
						<option value="966">Saudi Arabia (+966)</option>
						<option value="221">Senegal (+221)</option>
						<option value="381">Serbia (+381)</option>
						<option value="248">Seychelles (+248)</option>
						<option value="232">Sierra Leone (+232)</option>
						<option value="65">Singapore (+65)</option>
						<option value="421">Slovak Republic (+421)</option>
						<option value="386">Slovenia (+386)</option>
						<option value="677">Solomon Islands (+677)</option>
						<option value="252">Somalia (+252)</option>
						<option value="27">South Africa (+27)</option>
						<option value="500">South Georgia and the South Sandwich Islands (+500)</option>
						<option value="82">South Korea (+82)</option>
						<option value="211">South Sudan (+211)</option>
						<option value="34">Spain (+34)</option>
						<option value="94">Sri Lanka (+94)</option>
						<option value="249">Sudan (+249)</option>
						<option value="597">Suriname (+597)</option>
						<option value="268">Swaziland (+268)</option>
						<option value="46">Sweden (+46)</option>
						<option value="41">Switzerland (+41)</option>
						<option value="963">Syria (+963)</option>
						<option value="886">Taiwan (+886)</option>
						<option value="992">Tajikistan (+992)</option>
						<option value="255">Tanzania (+255)</option>
						<option value="66">Thailand (+66)</option>
						<option value="228">Togo (+228)</option>
						<option value="690">Tokelau (+690)</option>
						<option value="676">Tonga (+676)</option>
						<option value="1868">Trinidad &amp; Tobago (+1868)</option>
						<option value="216">Tunisia (+216)</option>
						<option value="90">Turkey (+90)</option>
						<option value="993">Turkmenistan (+993)</option>
						<option value="1649">Turks &amp; Caicos Islands (+1649)</option>
						<option value="688">Tuvalu (+688)</option>
						<option value="256">Uganda (+256)</option>
						<!-- <option value="44">UK (+44)</option> -->
						<option value="380">Ukraine (+380)</option>
						<option value="971">United Arab Emirates (+971)</option>
						<option value="598">Uruguay (+598)</option>
						<!-- <option value="1">USA (+1)</option> -->
						<option value="998">Uzbekistan (+998)</option>
						<option value="678">Vanuatu (+678)</option>
						<option value="379">Vatican City (+379)</option>
						<option value="58">Venezuela (+58)</option>
						<option value="84">Vietnam (+84)</option>
						<option value="1284">Virgin Islands - British (+1284)</option>
						<option value="1340">Virgin Islands - US (+1340)</option>
						<option value="681">Wallis &amp; Futuna (+681)</option>
						<option value="967">Yemen (North)(+967)</option>
						<option value="969">Yemen (South)(+969)</option>
						<option value="260">Zambia (+260)</option>
						<option value="263">Zimbabwe (+263)</option>
					</select>
            	</div>
            	<div class="input-field col s4">
            		<input id="studentPhone" type="number" name="studentPhone" required>
            		<label for="studentPhone">Faculty Contact<span class="spanRed">*</span></label>
            	</div>					
            	<div class="input-field col s2" style="padding-top: 20px;">
            		<select name="parentCountryCode" class="names" style="width: 100%;">
						<option value="91" selected>India (+91)</option>
						<option value="44">UK (+44)</option>
						<option value="1">USA (+1)</option>
						<option disabled>others</option>
						<option value="93">Afghanistan (+93)</option>
						<option value="355">Albania (+355)</option>
						<option value="213">Algeria (+213)</option>
						<option value="1684">American Samoa (+1684)</option>
						<option value="376">Andorra (+376)</option>
						<option value="244">Angola (+244)</option>
						<option value="1264">Anguilla (+1264)</option>
						<option value="1268">Antigua &amp; Barbuda (+1268)</option>
						<option value="54">Argentina (+54)</option>
						<option value="374">Armenia (+374)</option>
						<option value="297">Aruba (+297)</option>
						<option value="61">Australia (+61)</option>
						<option value="43">Austria (+43)</option>
						<option value="994">Azerbaijan (+994)</option>
						<option value="1242">Bahamas (+1242)</option>
						<option value="973">Bahrain (+973)</option>
						<option value="880">Bangladesh (+880)</option>
						<option value="1246">Barbados (+1246)</option>
						<option value="375">Belarus (+375)</option>
						<option value="32">Belgium (+32)</option>
						<option value="501">Belize (+501)</option>
						<option value="229">Benin (+229)</option>
						<option value="1441">Bermuda (+1441)</option>
						<option value="975">Bhutan (+975)</option>
						<option value="591">Bolivia (+591)</option>
						<option value="387">Bosnia Herzegovina (+387)</option>
						<option value="267">Botswana (+267)</option>
						<option value="55">Brazil (+55)</option>
						<option value="246">British Indian Ocean Territory (+246)</option>
						<option value="1284">British Virgin Islands (+1284)</option>
						<option value="673">Brunei (+673)</option>
						<option value="359">Bulgaria (+359)</option>
						<option value="226">Burkina Faso (+226)</option>
						<option value="95">Burma-Myanmar (+95)</option>
						<option value="257">Burundi (+257)</option>
						<option value="855">Cambodia (+855)</option>
						<option value="237">Cameroon (+237)</option>
						<option value="1">Canada (+1)</option>
						<option value="238">Cape Verde Islands (+238)</option>
						<option value="1345">Cayman Islands (+1345)</option>
						<option value="236">Central African Republic (+236)</option>
						<option value="235">Chad (+235)</option>
						<option value="56">Chile (+56)</option>
						<option value="86">China (+86)</option>
						<option value="6189">Christmas Island (+6189)</option>
						<option value="57">Colombia (+57)</option>
						<option value="269">Comoros (+269)</option>
						<option value="242">Congo (+242)</option>
						<option value="682">Cook Islands (+682)</option>
						<option value="506">Costa Rica (+506)</option>
						<option value="385">Croatia (+385)</option>
						<option value="53">Cuba (+53)</option>
						<option value="599">Curaçao (+599)</option>
						<option value="90392">Cyprus North (+90392)</option>
						<option value="357">Cyprus South (+357)</option>
						<option value="420">Czech Republic (+420)</option>
						<option value="45">Denmark (+45)</option>
						<option value="253">Djibouti (+253)</option>
						<option value="1767">Dominica (+1767)</option>
						<option value="1809">Dominican Republic (+1809)</option>
						<option value="670">East Timor (+670)</option>
						<option value="593">Ecuador (+593)</option>
						<option value="20">Egypt (+20)</option>
						<option value="503">El Salvador (+503)</option>
						<option value="240">Equatorial Guinea (+240)</option>
						<option value="291">Eritrea (+291)</option>
						<option value="372">Estonia (+372)</option>
						<option value="251">Ethiopia (+251)</option>
						<option value="500">Falkland Islands (+500)</option>
						<option value="298">Faroe Islands (+298)</option>
						<option value="679">Fiji (+679)</option>
						<option value="358">Finland (+358)</option>
						<option value="33">France (+33)</option>
						<option value="594">French Guiana (+594)</option>
						<option value="689">French Polynesia (+689)</option>
						<option value="241">Gabon (+241)</option>
						<option value="220">Gambia (+220)</option>
						<option value="995">Georgia (+995)</option>
						<option value="49">Germany (+49)</option>
						<option value="233">Ghana (+233)</option>
						<option value="350">Gibraltar (+350)</option>
						<option value="30">Greece (+30)</option>
						<option value="299">Greenland (+299)</option>
						<option value="1473">Grenada (+1473)</option>
						<option value="590">Guadeloupe (+590)</option>
						<option value="1671">Guam (+1671)</option>
						<option value="502">Guatemala (+502)</option>
						<option value="224">Guinea (+224)</option>
						<option value="245">Guinea - Bissau (+245)</option>
						<option value="592">Guyana (+592)</option>
						<option value="509">Haiti (+509)</option>
						<option value="504">Honduras (+504)</option>
						<option value="852">Hong Kong (+852)</option>
						<option value="36">Hungary (+36)</option>
						<option value="354">Iceland (+354)</option>
						<!-- <option value="91">India (+91)</option> -->
						<option value="62">Indonesia (+62)</option>
						<option value="98">Iran (+98)</option>
						<option value="964">Iraq (+964)</option>
						<option value="353">Ireland (+353)</option>
						<option value="972">Israel (+972)</option>
						<option value="39">Italy (+39)</option>
						<option value="225">Ivory Coast (+225)</option>
						<option value="1876">Jamaica (+1876)</option>
						<option value="81">Japan (+81)</option>
						<option value="962">Jordan (+962)</option>
						<option value="7">Kazakhstan (+7)</option>
						<option value="254">Kenya (+254)</option>
						<option value="686">Kiribati (+686)</option>
						<option value="965">Kuwait (+965)</option>
						<option value="996">Kyrgyzstan (+996)</option>
						<option value="856">Laos (+856)</option>
						<option value="371">Latvia (+371)</option>
						<option value="961">Lebanon (+961)</option>
						<option value="266">Lesotho (+266)</option>
						<option value="231">Liberia (+231)</option>
						<option value="218">Libya (+218)</option>
						<option value="423">Liechtenstein (+423)</option>
						<option value="370">Lithuania (+370)</option>
						<option value="352">Luxembourg (+352)</option>
						<option value="853">Macao (+853)</option>
						<option value="389">Macedonia (+389)</option>
						<option value="261">Madagascar (+261)</option>
						<option value="265">Malawi (+265)</option>
						<option value="60">Malaysia (+60)</option>
						<option value="960">Maldives (+960)</option>
						<option value="223">Mali (+223)</option>
						<option value="356">Malta (+356)</option>
						<option value="692">Marshall Islands (+692)</option>
						<option value="596">Martinique (+596)</option>
						<option value="222">Mauritania (+222)</option>
						<option value="230">Mauritius (+230)</option>
						<option value="262">Mayotte (+262)</option>
						<option value="52">Mexico (+52)</option>
						<option value="691">Micronesia (+691)</option>
						<option value="373">Moldova (+373)</option>
						<option value="377">Monaco (+377)</option>
						<option value="976">Mongolia (+976)</option>
						<option value="382">Montenegro (+382)</option>
						<option value="1664">Montserrat (+1664)</option>
						<option value="212">Morocco (+212)</option>
						<option value="258">Mozambique (+258)</option>
						<option value="95">Myanmar (+95)</option>
						<option value="264">Namibia (+264)</option>
						<option value="674">Nauru (+674)</option>
						<option value="977">Nepal (+977)</option>
						<option value="31">Netherlands (+31)</option>
						<option value="687">New Caledonia (+687)</option>
						<option value="64">New Zealand (+64)</option>
						<option value="505">Nicaragua (+505)</option>
						<option value="227">Niger (+227)</option>
						<option value="234">Nigeria (+234)</option>
						<option value="683">Niue (+683)</option>
						<option value="672">Norfolk Islands (+672)</option>
						<option value="1670">Northern Mariana Islands (+1670)</option>
						<option value="850">North Korea (+850)</option>
						<option value="47">Norway (+47)</option>
						<option value="968">Oman (+968)</option>
						<option value="92">Pakistan (+92)</option>
						<option value="680">Palau (+680)</option>
						<option value="970">Palestine (+970)</option>
						<option value="507">Panama (+507)</option>
						<option value="675">Papua New Guinea (+675)</option>
						<option value="595">Paraguay (+595)</option>
						<option value="51">Peru (+51)</option>
						<option value="63">Philippines (+63)</option>
						<option value="870">Pitcairn Islands (+870)</option>
						<option value="48">Poland (+48)</option>
						<option value="351">Portugal (+351)</option>
						<option value="1787">Puerto Rico (+1787)</option>
						<option value="974">Qatar (+974)</option>
						<option value="262">Reunion (+262)</option>
						<option value="40">Romania (+40)</option>
						<option value="7">Russia (+7)</option>
						<option value="250">Rwanda (+250)</option>
						<option value="290">Saint Helena (+290)</option>
						<option value="1869">Saint Kitts and Nevis (+1869)</option>
						<option value="1758">Saint Lucia (+1758)</option>
						<option value="1599">Saint Martin (+1599)</option>
						<option value="508">Saint Pierre and Miquelon (+508)</option>
						<option value="1784">Saint Vincent and the Grenadines (+1784)</option>
						<option value="685">Samoa (+685)</option>
						<option value="378">San Marino (+378)</option>
						<option value="239">Sao Tome &amp; Principe (+239)</option>
						<option value="966">Saudi Arabia (+966)</option>
						<option value="221">Senegal (+221)</option>
						<option value="381">Serbia (+381)</option>
						<option value="248">Seychelles (+248)</option>
						<option value="232">Sierra Leone (+232)</option>
						<option value="65">Singapore (+65)</option>
						<option value="421">Slovak Republic (+421)</option>
						<option value="386">Slovenia (+386)</option>
						<option value="677">Solomon Islands (+677)</option>
						<option value="252">Somalia (+252)</option>
						<option value="27">South Africa (+27)</option>
						<option value="500">South Georgia and the South Sandwich Islands (+500)</option>
						<option value="82">South Korea (+82)</option>
						<option value="211">South Sudan (+211)</option>
						<option value="34">Spain (+34)</option>
						<option value="94">Sri Lanka (+94)</option>
						<option value="249">Sudan (+249)</option>
						<option value="597">Suriname (+597)</option>
						<option value="268">Swaziland (+268)</option>
						<option value="46">Sweden (+46)</option>
						<option value="41">Switzerland (+41)</option>
						<option value="963">Syria (+963)</option>
						<option value="886">Taiwan (+886)</option>
						<option value="992">Tajikistan (+992)</option>
						<option value="255">Tanzania (+255)</option>
						<option value="66">Thailand (+66)</option>
						<option value="228">Togo (+228)</option>
						<option value="690">Tokelau (+690)</option>
						<option value="676">Tonga (+676)</option>
						<option value="1868">Trinidad &amp; Tobago (+1868)</option>
						<option value="216">Tunisia (+216)</option>
						<option value="90">Turkey (+90)</option>
						<option value="993">Turkmenistan (+993)</option>
						<option value="1649">Turks &amp; Caicos Islands (+1649)</option>
						<option value="688">Tuvalu (+688)</option>
						<option value="256">Uganda (+256)</option>
						<!-- <option value="44">UK (+44)</option> -->
						<option value="380">Ukraine (+380)</option>
						<option value="971">United Arab Emirates (+971)</option>
						<option value="598">Uruguay (+598)</option>
						<!-- <option value="1">USA (+1)</option> -->
						<option value="998">Uzbekistan (+998)</option>
						<option value="678">Vanuatu (+678)</option>
						<option value="379">Vatican City (+379)</option>
						<option value="58">Venezuela (+58)</option>
						<option value="84">Vietnam (+84)</option>
						<option value="1284">Virgin Islands - British (+1284)</option>
						<option value="1340">Virgin Islands - US (+1340)</option>
						<option value="681">Wallis &amp; Futuna (+681)</option>
						<option value="967">Yemen (North)(+967)</option>
						<option value="969">Yemen (South)(+969)</option>
						<option value="260">Zambia (+260)</option>
						<option value="263">Zimbabwe (+263)</option>
					</select>
            	</div>
            	<div class="input-field col s4">
            		<input id="parentPhone" type="number" name="parentPhone" ng-model="parentPhone" required>
					<label>Parent Contact<span class="spanRed">*</span></label>
            	</div>
            </div>
            <div class="row">
               	<div class="input-field col s8">
                	<input id="email" name="email" type="email" ng-model="email" class="validate" pattern="^[a-z]+\.[a-z]{4}\.([0-9][1-9]|[1-9][0-9])@acharya\.ac\.in$" title="Enter valid Acharya email id" required>
                  	<label for="email">Email <span class="spanRed">*</span></label>
               	</div>
               	<div class="input-field col s4">
                  	<select name="quota" id="quota">
	                     <option value="CET" selected>CET</option>
	                     <option value="COMEDK">COMEDK</option>
	                     <option value="Management">Management</option>
	                </select>
	                <label>Quota <span class="spanRed">*</span></label>
               	</div>
            </div>
            <div class="row">
               	<div class="input-field col s12">
                  	<input type="text" id="permanentAddress" name="permanentAddress" ng-model="permanentAddress" pattern="[A-Za-z0-9 .,/\-#]+" title="Special Characters not allowed" required>
                  	<label for="permanentAddress">Permanent Address <span class="spanRed">*</span></label>
               	</div>
            </div>
            <div class="row">
            	<div class="input-field col s12">
            		<input type="checkbox" id="copy" ng-model="copy" ng-change="copyAddress()" ng-disabled="!permanentAddress">
            		<label for="copy">If current address is same as permanent address</label>
            	</div>
            </div>
            <div class="row">
               	<div class="input-field col s12">
	                <input type="text" name="currentAddress" id="currentAddress" name="currentAddress" ng-model="currentAddress" pattern="[A-Za-z0-9 .,/\-#]+" title="Special Characters not allowed" required>
	                <label for="currentAddress" ng-class="{'active':activateLabel}">Current Address <span class="spanRed">*</span></label>
               	</div>
            </div>
            <div class="row">
               	<button class="btn waves-effect waves-light" type="submit" name="action">Submit
                  	<i class="material-icons right">send</i>
               	</button>
            </div>
        </form>
      </div>
    </div>
	<!--main end-->
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/select2.min.js" async></script>
    <script src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
    <script type="text/javascript">
    	$(".button-collapse").sideNav();
    	$(document).ready(function() {
        	$('#quota').material_select();
        });

    	//Calculating the date upto yesterday
    	var yesterday = new Date((new Date()).valueOf()-1000*60*60*24);
    	//Disable future dates
        $('.datepicker').pickadate({
        	max: yesterday+1,
        	selectMonths: true,
        	selectYears: 40,
        	format: 'yyyy-mm-dd'
        });

        //For using select2 in country code
        $(document).ready(function() {
        	$(".names").select2();
        });

        var app = angular.module('baseModule',[]);
        app.controller('formController', function($scope) {
			$scope.copyAddress = function() {
				$scope.setVal = $scope.permanentAddress;
				if($scope.copy) {
					$scope.activateLabel = true;
					$scope.currentAddress = $scope.permanentAddress;
				}
				else if($scope.currentAddress == $scope.permanentAddress){
					$scope.activateLabel = false;
					$scope.currentAddress = "";
				}
				else {
					$scope.activateLabel = true;
				}
			};
         });
    </script>
</body>
</html>