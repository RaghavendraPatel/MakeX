<?php
 include_once "../php/conn.php";
 session_start();
 if (!isset($_SESSION['userid'])||($_SESSION['usrtype']=='dev')) {
    header("Location: login.html?login=nologon");
  }
  
  if (isset($_GET['plan'])){
    $plan=$_GET['plan'];
    if($plan=='Basic'){
      $price=20;
    }else if($plan=='Standard'){
      $price=50;

    }else if($plan=='Premium'){
      $price=90;
    }
  }else{
    header("Location: custhome.php?notaccessible");

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="../css/payment.css">
    <title>Payment | MakeX</title>
    <link rel="shortcut icon" href="..\assets\icon.png">
</head>
<body>
    <script src="..\js\payment.js"></script>
    <nav class="navbar navbar-expand-xl navbar-light  notnav" id="naav">
        <a class="navbar-brand pl-4" href="landing.php"><img src="..\assets\logo.png" width= 150 height= 65></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto h3" >
            <a class="nav-item nav-link">
              <?php
                  echo '<div id="logg" style="display: flex;">
                    <img src="..\assets\user1.png" width="35"  style="font-size:25px ;margin-top:2px;margin-right:8px;" height="35" class="usr-btn ml-4">
                    <div class="dash-name Lead" style="font-size:23px ;margin-top:3px; margin-right:2px;font-weight:400;">';
                  $name=$_SESSION['fname'];
                  echo"$name";
                  echo '</div>
                  <button type="button" class="btn btn-outline-dark ml-4 mr-3" onclick="window.location.href=\'../php/logout.php\'">Logout</button>
                  </div>';
              ?>
            </a>
          </div>
        </div>
    </nav>
    <div class="top">
        <h2>Payment Details</h2>
    </div>
    <form method="POST" onsubmit="return submitForm()" action="../php/paymentgate.php">
    <div class="outer" style="display:flex">
        <div class="left">
            <span style="font-size:42px;">Checkout</span><br>
            <span style="font-size:24px">Billing Address</span><br>
            <div class="address" style="margin-bottom:20px">
                <span class="span1">Country</span>
                <span class="span2">Province/State/Union Territory</span><br>
                <select name="country" class="add-inp" required>
                  <option value="" selected hidden>Nothing Selected</option>
                  <option value="Afganistan">Afghanistan</option>
                  <option value="Albania">Albania</option>
                  <option value="Algeria">Algeria</option>
                  <option value="American Samoa">American Samoa</option>
                  <option value="Andorra">Andorra</option>
                  <option value="Angola">Angola</option>
                  <option value="Anguilla">Anguilla</option>
                  <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                  <option value="Argentina">Argentina</option>
                  <option value="Armenia">Armenia</option>
                  <option value="Aruba">Aruba</option>
                  <option value="Australia">Australia</option>
                  <option value="Austria">Austria</option>
                  <option value="Azerbaijan">Azerbaijan</option>
                  <option value="Bahamas">Bahamas</option>
                  <option value="Bahrain">Bahrain</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="Barbados">Barbados</option>
                  <option value="Belarus">Belarus</option>
                  <option value="Belgium">Belgium</option>
                  <option value="Belize">Belize</option>
                  <option value="Benin">Benin</option>
                  <option value="Bermuda">Bermuda</option>
                  <option value="Bhutan">Bhutan</option>
                  <option value="Bolivia">Bolivia</option>
                  <option value="Bonaire">Bonaire</option>
                  <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                  <option value="Botswana">Botswana</option>
                  <option value="Brazil">Brazil</option>
                  <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                  <option value="Brunei">Brunei</option>
                  <option value="Bulgaria">Bulgaria</option>
                  <option value="Burkina Faso">Burkina Faso</option>
                  <option value="Burundi">Burundi</option>
                  <option value="Cambodia">Cambodia</option>
                  <option value="Cameroon">Cameroon</option>
                  <option value="Canada">Canada</option>
                  <option value="Canary Islands">Canary Islands</option>
                  <option value="Cape Verde">Cape Verde</option>
                  <option value="Cayman Islands">Cayman Islands</option>
                  <option value="Central African Republic">Central African Republic</option>
                  <option value="Chad">Chad</option>
                  <option value="Channel Islands">Channel Islands</option>
                  <option value="Chile">Chile</option>
                  <option value="China">China</option>
                  <option value="Christmas Island">Christmas Island</option>
                  <option value="Cocos Island">Cocos Island</option>
                  <option value="Colombia">Colombia</option>
                  <option value="Comoros">Comoros</option>
                  <option value="Congo">Congo</option>
                  <option value="Cook Islands">Cook Islands</option>
                  <option value="Costa Rica">Costa Rica</option>
                  <option value="Cote DIvoire">Cote DIvoire</option>
                  <option value="Croatia">Croatia</option>
                  <option value="Cuba">Cuba</option>
                  <option value="Curaco">Curacao</option>
                  <option value="Cyprus">Cyprus</option>
                  <option value="Czech Republic">Czech Republic</option>
                  <option value="Denmark">Denmark</option>
                  <option value="Djibouti">Djibouti</option>
                  <option value="Dominica">Dominica</option>
                  <option value="Dominican Republic">Dominican Republic</option>
                  <option value="East Timor">East Timor</option>
                  <option value="Ecuador">Ecuador</option>
                  <option value="Egypt">Egypt</option>
                  <option value="El Salvador">El Salvador</option>
                  <option value="Equatorial Guinea">Equatorial Guinea</option>
                  <option value="Eritrea">Eritrea</option>
                  <option value="Estonia">Estonia</option>
                  <option value="Ethiopia">Ethiopia</option>
                  <option value="Falkland Islands">Falkland Islands</option>
                  <option value="Faroe Islands">Faroe Islands</option>
                  <option value="Fiji">Fiji</option>
                  <option value="Finland">Finland</option>
                  <option value="France">France</option>
                  <option value="French Guiana">French Guiana</option>
                  <option value="French Polynesia">French Polynesia</option>
                  <option value="French Southern Ter">French Southern Ter</option>
                  <option value="Gabon">Gabon</option>
                  <option value="Gambia">Gambia</option>
                  <option value="Georgia">Georgia</option>
                  <option value="Germany">Germany</option>
                  <option value="Ghana">Ghana</option>
                  <option value="Gibraltar">Gibraltar</option>
                  <option value="Great Britain">Great Britain</option>
                  <option value="Greece">Greece</option>
                  <option value="Greenland">Greenland</option>
                  <option value="Grenada">Grenada</option>
                  <option value="Guadeloupe">Guadeloupe</option>
                  <option value="Guam">Guam</option>
                  <option value="Guatemala">Guatemala</option>
                  <option value="Guinea">Guinea</option>
                  <option value="Guyana">Guyana</option>
                  <option value="Haiti">Haiti</option>
                  <option value="Hawaii">Hawaii</option>
                  <option value="Honduras">Honduras</option>
                  <option value="Hong Kong">Hong Kong</option>
                  <option value="Hungary">Hungary</option>
                  <option value="Iceland">Iceland</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="India">India</option>
                  <option value="Iran">Iran</option>
                  <option value="Iraq">Iraq</option>
                  <option value="Ireland">Ireland</option>
                  <option value="Isle of Man">Isle of Man</option>
                  <option value="Israel">Israel</option>
                  <option value="Italy">Italy</option>
                  <option value="Jamaica">Jamaica</option>
                  <option value="Japan">Japan</option>
                  <option value="Jordan">Jordan</option>
                  <option value="Kazakhstan">Kazakhstan</option>
                  <option value="Kenya">Kenya</option>
                  <option value="Kiribati">Kiribati</option>
                  <option value="Korea North">Korea North</option>
                  <option value="Korea Sout">Korea South</option>
                  <option value="Kuwait">Kuwait</option>
                  <option value="Kyrgyzstan">Kyrgyzstan</option>
                  <option value="Laos">Laos</option>
                  <option value="Latvia">Latvia</option>
                  <option value="Lebanon">Lebanon</option>
                  <option value="Lesotho">Lesotho</option>
                  <option value="Liberia">Liberia</option>
                  <option value="Libya">Libya</option>
                  <option value="Liechtenstein">Liechtenstein</option>
                  <option value="Lithuania">Lithuania</option>
                  <option value="Luxembourg">Luxembourg</option>
                  <option value="Macau">Macau</option>
                  <option value="Macedonia">Macedonia</option>
                  <option value="Madagascar">Madagascar</option>
                  <option value="Malaysia">Malaysia</option>
                  <option value="Malawi">Malawi</option>
                  <option value="Maldives">Maldives</option>
                  <option value="Mali">Mali</option>
                  <option value="Malta">Malta</option>
                  <option value="Marshall Islands">Marshall Islands</option>
                  <option value="Martinique">Martinique</option>
                  <option value="Mauritania">Mauritania</option>
                  <option value="Mauritius">Mauritius</option>
                  <option value="Mayotte">Mayotte</option>
                  <option value="Mexico">Mexico</option>
                  <option value="Midway Islands">Midway Islands</option>
                  <option value="Moldova">Moldova</option>
                  <option value="Monaco">Monaco</option>
                  <option value="Mongolia">Mongolia</option>
                  <option value="Montserrat">Montserrat</option>
                  <option value="Morocco">Morocco</option>
                  <option value="Mozambique">Mozambique</option>
                  <option value="Myanmar">Myanmar</option>
                  <option value="Nambia">Nambia</option>
                  <option value="Nauru">Nauru</option>
                  <option value="Nepal">Nepal</option>
                  <option value="Netherland Antilles">Netherland Antilles</option>
                  <option value="Netherlands">Netherlands (Holland, Europe)</option>
                  <option value="Nevis">Nevis</option>
                  <option value="New Caledonia">New Caledonia</option>
                  <option value="New Zealand">New Zealand</option>
                  <option value="Nicaragua">Nicaragua</option>
                  <option value="Niger">Niger</option>
                  <option value="Nigeria">Nigeria</option>
                  <option value="Niue">Niue</option>
                  <option value="Norfolk Island">Norfolk Island</option>
                  <option value="Norway">Norway</option>
                  <option value="Oman">Oman</option>
                  <option value="Pakistan">Pakistan</option>
                  <option value="Palau Island">Palau Island</option>
                  <option value="Palestine">Palestine</option>
                  <option value="Panama">Panama</option>
                  <option value="Papua New Guinea">Papua New Guinea</option>
                  <option value="Paraguay">Paraguay</option>
                  <option value="Peru">Peru</option>
                  <option value="Phillipines">Philippines</option>
                  <option value="Pitcairn Island">Pitcairn Island</option>
                  <option value="Poland">Poland</option>
                  <option value="Portugal">Portugal</option>
                  <option value="Puerto Rico">Puerto Rico</option>
                  <option value="Qatar">Qatar</option>
                  <option value="Republic of Montenegro">Republic of Montenegro</option>
                  <option value="Republic of Serbia">Republic of Serbia</option>
                  <option value="Reunion">Reunion</option>
                  <option value="Romania">Romania</option>
                  <option value="Russia">Russia</option>
                  <option value="Rwanda">Rwanda</option>
                  <option value="St Barthelemy">St Barthelemy</option>
                  <option value="St Eustatius">St Eustatius</option>
                  <option value="St Helena">St Helena</option>
                  <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                  <option value="St Lucia">St Lucia</option>
                  <option value="St Maarten">St Maarten</option>
                  <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                  <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                  <option value="Saipan">Saipan</option>
                  <option value="Samoa">Samoa</option>
                  <option value="Samoa American">Samoa American</option>
                  <option value="San Marino">San Marino</option>
                  <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                  <option value="Saudi Arabia">Saudi Arabia</option>
                  <option value="Senegal">Senegal</option>
                  <option value="Seychelles">Seychelles</option>
                  <option value="Sierra Leone">Sierra Leone</option>
                  <option value="Singapore">Singapore</option>
                  <option value="Slovakia">Slovakia</option>
                  <option value="Slovenia">Slovenia</option>
                  <option value="Solomon Islands">Solomon Islands</option>
                  <option value="Somalia">Somalia</option>
                  <option value="South Africa">South Africa</option>
                  <option value="Spain">Spain</option>
                  <option value="Sri Lanka">Sri Lanka</option>
                  <option value="Sudan">Sudan</option>
                  <option value="Suriname">Suriname</option>
                  <option value="Swaziland">Swaziland</option>
                  <option value="Sweden">Sweden</option>
                  <option value="Switzerland">Switzerland</option>
                  <option value="Syria">Syria</option>
                  <option value="Tahiti">Tahiti</option>
                  <option value="Taiwan">Taiwan</option>
                  <option value="Tajikistan">Tajikistan</option>
                  <option value="Tanzania">Tanzania</option>
                  <option value="Thailand">Thailand</option>
                  <option value="Togo">Togo</option>
                  <option value="Tokelau">Tokelau</option>
                  <option value="Tonga">Tonga</option>
                  <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                  <option value="Tunisia">Tunisia</option>
                  <option value="Turkey">Turkey</option>
                  <option value="Turkmenistan">Turkmenistan</option>
                  <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                  <option value="Tuvalu">Tuvalu</option>
                  <option value="Uganda">Uganda</option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="Ukraine">Ukraine</option>
                  <option value="United Arab Erimates">United Arab Emirates</option>
                  <option value="United States of America">United States of America</option>
                  <option value="Uraguay">Uruguay</option>
                  <option value="Uzbekistan">Uzbekistan</option>
                  <option value="Vanuatu">Vanuatu</option>
                  <option value="Vatican City State">Vatican City State</option>
                  <option value="Venezuela">Venezuela</option>
                  <option value="Vietnam">Vietnam</option>
                  <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                  <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                  <option value="Wake Island">Wake Island</option>
                  <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                  <option value="Yemen">Yemen</option>
                  <option value="Zaire">Zaire</option>
                  <option value="Zambia">Zambia</option>
                  <option value="Zimbabwe">Zimbabwe</option>
                </select>
                
                <input type="text" id="prov" class="add-inp" required placeholder="Province/State/Union Territory" name="province" onblur="provincevalid()">
                <span id="prov_err"><i class="fa fa-exclamation-triangle"  aria-hidden="true" title="Should only contain alphabets" style="color: red;"></i></span><br>
            </div>
            <div style="padding-left:10px;line-height:25px;margin-bottom:20px;">
              <input type="radio" checked name="method" value="card" onclick="payMode('card');">
              <span>Credit or Debit card</span><br>
              <input type="radio" name="method" value="netbank" onclick="payMode('net');">
              <span>Pay with netbanking</span><br>
              <input type="radio" name="method" value="paypal" onclick="payMode('paypal');">
              <span>PayPal</span><br>
              <input type="radio" name="method" value="upi" onclick="payMode('mobile');">
              <span>Pay by UPI</span><br>
            </div>

            <div class="pay-method" id="card" >
            <div style="padding-left:10px;line-height:25px;margin-bottom:20px;">
              <input type="radio"  checked name="ctype" value="visa"  id="ct">
              <span>Visa</span>
              <input type="radio" name="ctype" value="master" style="margin-left:10px;" id="ct">
              <span>Master Card</span>
              <input type="radio" name="ctype"  value="amex" style="margin-left:10px;" id="ct">
              <span>American Express</span>
              <span id="card_err"><i class="fa fa-exclamation-triangle"  aria-hidden="true" title="check your details" style="color: red;margin-left:10px;"></i></span><br>
            </div>
              <input type="text" placeholder="Name On card" onblur="cardvalid()" id="card_name"style="width:100%;height:40px;margin-bottom:10px;padding-left:10px"><br>
              <input type="text" placeholder="Card Number" name="cardnum" onblur="cardvalid()" id="card_num" style="width:100%;height:40px;margin-bottom:10px;padding-left:10px"><br>
              <select name="" id="mm" style="width:32.5%;height:40px;margin-bottom:10px;padding-left:10px" onblur="cardvalid()">
                <option value="" selected hidden>MM</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>
              <select name="" id="yy" style="width:33%;height:40px;margin-bottom:10px;padding-left:10px" onblur="cardvalid()">
                <option value="" selected hidden>YYYY</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>
                <option value="2031">2031</option>
                <option value="2032">2032</option>
                <option value="2033">2033</option>
                <option value="2034">2034</option>
                <option value="2035">2035</option>
              </select>
              <input type="text" min=100 max=999 maxlength="3" id="cvv" onblur="cardvalid()"  placeholder="Security Code" style="width:33%;height:40px;margin-bottom:20px;padding-left:10px">
            </div>
            <div class="pay-method" id="net">
              <span>
                Select your bank from the drop-down list and click proceed to continue with your payment.
              </span><br><span id="bank_err"><i class="fa fa-exclamation-triangle"  aria-hidden="true" title="check your details" style="color: red;margin-left:10px;margin-top:10px;"></i></span>
              <select style="width:100%;height:40px;margin:20px 0px;padding-left:10px" id="bank" onblur="bankvalid()" name="bank"><option value=""hidden >Please choose one</option><option value="ALB_DIRECT">Allahabad Bank </option><option value="APG_DIRECT">Andhra Pragathi Grameena Bank</option><option value="AUB_DIRECT">AU Small Finance Bank</option><option value="UTI_DIRECT">Axis Bank </option><option value="BDN_DIRECT">Bandhan bank</option><option value="BBK_DIRECT">Bank of Bahrain and Kuwait</option><option value="BBR_DIRECT">Bank of Baroda - Retail Banking</option><option value="BOM_DIRECT">Bank of Maharashtra</option><option value="BCB_DIRECT">Bassien Catholic Co-Operative Bank </option><option value="CNB_DIRECT">Canara Bank</option><option value="SYD_DIRECT">Canara Bank (e-Syndicate)</option><option value="CSB_DIRECT">Catholic Syrian Bank</option><option value="CBI_DIRECT">Central Bank of India</option><option value="CUB_DIRECT">City Union Bank</option><option value="COB_DIRECT">Cosmos Bank</option><option value="DEN_DIRECT">Dena Bank</option><option value="DBK_DIRECT">Deutsche Bank</option><option value="DCB_DIRECT">Development Credit Bank</option><option value="DLB_DIRECT">Dhanlakshmi Bank - Retail Net Banking</option><option value="DBS_DIRECT">digibank by DBS</option><option value="EQB_DIRECT">Equitas Small Finance Bank</option><option value="ESF_DIRECT">ESAF Small Finance Bank</option><option value="FBK_DIRECT">Federal Bank</option><option value="FNC_DIRECT">Fincare Bank</option><option value="HDF_DIRECT">HDFC Bank</option><option value="ICI_DIRECT">ICICI Bank </option><option value="IDB_DIRECT">IDBI Bank - Retail Net Banking</option><option value="IDN_DIRECT">IDFC FIRST Bank</option><option value="INB_DIRECT">Indian Bank</option><option value="IOB_DIRECT">Indian Overseas Bank</option><option value="IDS_DIRECT">IndusInd Bank</option><option value="JKB_DIRECT">Jammu &amp; Kashmir Bank</option><option value="JNB_DIRECT">Jana Small Finance Bank</option><option value="JSB_DIRECT">Janata Sahakari Bank Ltd Pune</option><option value="KJB_DIRECT">Kalyan Janata Sahakari Bank</option><option value="KBL_DIRECT">Karnataka Bank Ltd</option><option value="KVG_DIRECT">Karnataka Vikas Grameena Bank</option><option value="KVB_DIRECT">Karur Vysya Bank</option><option value="162_DIRECT">Kotak Bank</option><option value="LVR_DIRECT">Laxmi Vilas Bank - Retail</option><option value="NKB_DIRECT">NKGSB Co-op Bank</option><option value="NEB_DIRECT">North East Small Finance Bank</option><option value="OBC_DIRECT">PNB (Erstwhile-Oriental Bank of Commerce)</option><option value="UNI_DIRECT">PNB (Erstwhile-United Bank of India)</option><option value="PMC_DIRECT">Punjab &amp; Maharastra Co-op Bank</option><option value="PSB_DIRECT">Punjab &amp; Sind Bank</option><option value="PNB_DIRECT">Punjab National Bank - Retail Banking</option><option value="RBL_DIRECT">RBL Bank Limited</option><option value="SWB_DIRECT">Saraswat Bank</option><option value="SVC_DIRECT">Shamrao Vithal Co-op Bank</option><option value="SHB_DIRECT">Shivalik Mercantile Cooperative Bank Ltd</option><option value="SIB_DIRECT">South Indian Bank</option><option value="SCB_DIRECT">Standard Chartered Bank</option><option value="SBI_DIRECT">State Bank of India</option><option value="SRB_DIRECT">Suryoday Small Finance Bank</option><option value="TNC_DIRECT">Tamil Nadu State Co-operative Bank</option><option value="TMB_DIRECT">Tamilnad Mercantile Bank Ltd</option><option value="TBB_DIRECT">Thane Bharat Sahakari Bank Ltd</option><option value="KLB_DIRECT">The Kalupur Commercial Co-operative Bank</option><option value="MSB_DIRECT">The Mehsana Urban Co Op Bank Ltd</option><option value="TJB_DIRECT">TJSB Bank</option><option value="UCO_DIRECT">UCO Bank</option><option value="UBI_DIRECT">Union Bank of India</option><option value="ADB_DIRECT">Union Bank of India (Erstwhile Andhra Bank)</option><option value="CRP_DIRECT">Union Bank of India (Erstwhile Corporation Bank)</option><option value="VRB_DIRECT">Varachha Co-operative Bank Limited</option><option value="VJB_DIRECT">Vijaya Bank</option><option value="YBK_DIRECT">Yes Bank</option><option value="ZOB_DIRECT">Zoroastrian Co-operative Bank Limited</option></select>
            </div>
            <div class="pay-method" id="paypal">
              <span>In order to complete your transaction, we will transfer you over to PayPal's secure servers.</span>
            </div>
            <div class="pay-method" id="mobile">
              <span>Select your UPI app</span><span id="upi_err"><i class="fa fa-exclamation-triangle"  aria-hidden="true" title="check your details" style="color: red;margin-left:10px;margin-top:10px;"></i></span>
              <select name="upiapp" id="upiapp" style="width:100%;height:40px;margin:10px 0px;padding-left:10px" onblur="upivalid()">
                <option value="" hidden>Nothing Selected</option>
                <option value="Google Payt">Google Pay</option>
                <option value="PayTm">PayTm</option>
                <option value="PhonePay">PhonePay</option>
                <option value="Bhim">Bhim</option>
              </select>
              <span>Enter your UPI ID</span>
              <input type="text" name="upiid" id="upiid" placeholder="eg. example@oksbi" onblur="upivalid()" style="width:100%;height:40px;margin:10px 0px;padding-left:10px">
            </div>
        </div>

        <div class="right">
            <span style="font-size:30px;font-weight:bold;">Summary</span><br>
            <span style="font-size:20px;color:#707070">Selected Plan:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp &nbsp<?php echo $plan;?></span><br>
            <span style="font-size:20px;color:#707070">Original Price:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp<?php echo '$'.$price;?></span><br>
            <span style="font-size:20px;color:#707070">Tax( 18% ):&nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp<?php echo '$'.($price*0.18);?></span><br>
            <span style="font-size:20px;color:#707070">Coupon discount:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp$0</span>
            <hr>
            <span style="font-size:24px;">Total:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<?php echo '$'.($price+$price*0.18);?></span><br>
            <span style="font-size:11px;color:#707070;">MakeX is required by law to collect applicable transaction taxes for purchases made in certain tax jurisdictions</span><br><br>
            <span style="font-size:11px;color:#707070;">By completing your purchase you agree to these <a href="#">Terms of Service.</a></span>
            <input type="text" name="plan" id="" hidden value="<?php echo $plan;?>">
            <input type="text" name="price" id="" hidden value="<?php echo '$'.($price+$price*0.18);?>">
            <button id="complete" type="submit" name="submit">Complete Payment</button>
        </div>
    </div>
    </form>
    <center><p style="color: black; margin-top: 10px;">© MakeX All rights reserved.</p></center>
</body>
</html>
