<!--[if lt IE 9]><script src="https://cdn01.jotfor.ms/js/vendor/flashcanvas.js?3.3.41851" type="text/javascript"></script><![endif]-->
<script src="https://cdn02.jotfor.ms/js/vendor/jquery-1.8.0.min.js?v=3.3.41851" type="text/javascript"></script>
<script src="https://cdn03.jotfor.ms/js/vendor/jSignature.min.noconflict.js?3.3.41851" type="text/javascript"></script>
<script src="https://cdn01.jotfor.ms/js/vendor/jotform.signaturepad.js?3.3.41851" type="text/javascript"></script>
<script src="https://cdn02.jotfor.ms/static/prototype.forms.js?3.3.41851" type="text/javascript"></script>
<script src="https://cdn03.jotfor.ms/static/jotform.forms.js?3.3.41851" type="text/javascript"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/punycode/1.4.1/punycode.js"></script>
<script defer src="https://cdn01.jotfor.ms/js/vendor/maskedinput.min.js?v=3.3.41851" type="text/javascript"></script>
<script defer src="https://cdn02.jotfor.ms/js/vendor/jquery.maskedinput.min.js?v=3.3.41851" type="text/javascript"></script>
<script src="https://cdn03.jotfor.ms/js/payments/validategateways.js?v=3.3.41851" type="text/javascript"></script>
<script src="https://cdn01.jotfor.ms/s/umd/320142024b0/for-sign-form-integration.js?v=3.3.41851" type="text/javascript" defer></script>
<script type="text/javascript">	JotForm.newDefaultTheme = true;
	JotForm.extendsNewTheme = false;
	JotForm.singleProduct = false;
	JotForm.newPaymentUIForNewCreatedForms = false;
	JotForm.newPaymentUI = true;
	JotForm.useJotformSign = "Yes";

   JotForm.setConditions([{"action":[{"id":"action_1671711043414","visibility":"Show","isError":false,"field":"28"}],"id":"1671711572309","index":"0","link":"Any","priority":"0","terms":[{"id":"term_1671711043414","field":"25","operator":"equals","value":"Yes","isError":false}],"type":"field"}]);	JotForm.submitError="jumpToFirstError";

	JotForm.init(function(){
	/*INIT-START*/
if (window.JotForm && JotForm.accessible) $('input_6').setAttribute('tabindex',0);
      setTimeout(function() {
          $('input_11').hint('ex: myname@example.com');
       }, 20);
if (window.JotForm && JotForm.accessible) $('input_19').setAttribute('tabindex',0);

 JotForm.calendarMonths = ["January","February","March","April","May","June","July","August","September","October","November","December"];
 JotForm.calendarDays = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
 JotForm.calendarOther = {"today":"Today"};
 var languageOptions = document.querySelectorAll('#langList li'); 
 for(var langIndex = 0; langIndex < languageOptions.length; langIndex++) { 
   languageOptions[langIndex].on('click', function(e) { setTimeout(function(){ JotForm.setCalendar("20", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":"","countSelectedDaysOnly":false}); }, 0); });
 } 
 JotForm.onTranslationsFetch(function() { JotForm.setCalendar("20", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":"","countSelectedDaysOnly":false}); });
if (window.JotForm && JotForm.accessible) $('input_21').setAttribute('tabindex',0);
if (window.JotForm && JotForm.accessible) $('input_22').setAttribute('tabindex',0);
if (window.JotForm && JotForm.accessible) $('input_28').setAttribute('tabindex',0);
if (window.JotForm && JotForm.accessible) $('input_26').setAttribute('tabindex',0);
if (window.JotForm && JotForm.accessible) $('input_33').setAttribute('tabindex',0);
if (window.JotForm && JotForm.accessible) $('input_34').setAttribute('tabindex',0);
if (window.JotForm && JotForm.accessible) $('input_35').setAttribute('tabindex',0);

 JotForm.calendarMonths = ["January","February","March","April","May","June","July","August","September","October","November","December"];
 JotForm.calendarDays = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
 JotForm.calendarOther = {"today":"Today"};
 var languageOptions = document.querySelectorAll('#langList li'); 
 for(var langIndex = 0; langIndex < languageOptions.length; langIndex++) { 
   languageOptions[langIndex].on('click', function(e) { setTimeout(function(){ JotForm.setCalendar("38", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":"","countSelectedDaysOnly":false}); }, 0); });
 } 
 JotForm.onTranslationsFetch(function() { JotForm.setCalendar("38", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":true,"custom":false,"ranges":false,"start":"","end":"","countSelectedDaysOnly":false}); });
 JotForm.formatDate({date:(new Date()), dateField:$("id_"+38)});
	/*INIT-END*/
	});

   JotForm.prepareCalculationsOnTheFly([null,null,{"name":"submitForm","qid":"2","text":"Send Application","type":"control_button"},null,null,null,{"name":"organizationbusinessName","qid":"6","text":"Organization\u002FBusiness Name","type":"control_textbox"},{"name":"address7","qid":"7","text":"Company Address","type":"control_address"},{"name":"pointOf","qid":"8","text":"Point of Contact","type":"control_fullname"},{"name":"phoneNumber9","qid":"9","text":"Phone Number (Day)","type":"control_phone"},{"name":"phoneNumber","qid":"10","text":"Phone Number (Evening)","type":"control_phone"},{"name":"email11","qid":"11","text":"E-mail","type":"control_email"},null,null,null,null,{"name":"clickTo16","qid":"16","text":"Vendor Registration","type":"control_head"},{"name":"companyContact","qid":"17","text":"Company Contact Information","type":"control_head"},{"name":"companyOverview","qid":"18","text":"Company Overview","type":"control_head"},{"name":"generalDetails","qid":"19","text":"General Details of Services\u002FGoods","type":"control_textarea"},{"name":"establishmentDate","qid":"20","text":"Establishment Date","type":"control_datetime"},{"name":"geographicService","qid":"21","text":"Geographic Service Area","type":"control_textbox"},{"name":"businessType","qid":"22","text":"Business Type","type":"control_textbox"},null,{"name":"insured","qid":"24","text":"Insured?","type":"control_radio"},{"name":"licensed","qid":"25","text":"Licensed?","type":"control_radio"},{"name":"grossAnnual","qid":"26","text":"Gross Annual Sales","type":"control_textbox"},null,{"name":"licenseNumber","qid":"28","text":"License Number","type":"control_textbox"},{"name":"input29","qid":"29","text":"I hereby affirm that all information provided above is accurate to the best of my knowledge and belief, and I understand that this information will be considered material in the evaluation of quotations, bids and proposals.","type":"control_text"},{"name":"companyRepresentative","qid":"30","text":"Company Representative Signature","type":"control_signature"},null,{"name":"bankingInformation","qid":"32","text":"Banking Information","type":"control_head"},{"name":"bankName","qid":"33","text":"Bank Name","type":"control_textbox"},{"name":"beneficiaryName","qid":"34","text":"Beneficiary Name","type":"control_textbox"},{"name":"accountNumber","qid":"35","text":"Account Number","type":"control_textbox"},{"name":"image","qid":"36","text":"acmeglobal-black.63a4557478f8d0.87854385","type":"control_image"},{"name":"input37","qid":"37","text":"\nACME GLOBAL Company\n123 Maple Street, Houston, TX, 77002\n\nexample@example.com\nwww.example.com\n(123) 1234567\n\n","type":"control_text"},{"name":"date","qid":"38","text":"Date","type":"control_datetime"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,null,{"name":"submitForm","qid":"2","text":"Send Application","type":"control_button"},null,null,null,{"name":"organizationbusinessName","qid":"6","text":"Organization\u002FBusiness Name","type":"control_textbox"},{"name":"address7","qid":"7","text":"Company Address","type":"control_address"},{"name":"pointOf","qid":"8","text":"Point of Contact","type":"control_fullname"},{"name":"phoneNumber9","qid":"9","text":"Phone Number (Day)","type":"control_phone"},{"name":"phoneNumber","qid":"10","text":"Phone Number (Evening)","type":"control_phone"},{"name":"email11","qid":"11","text":"E-mail","type":"control_email"},null,null,null,null,{"name":"clickTo16","qid":"16","text":"Vendor Registration","type":"control_head"},{"name":"companyContact","qid":"17","text":"Company Contact Information","type":"control_head"},{"name":"companyOverview","qid":"18","text":"Company Overview","type":"control_head"},{"name":"generalDetails","qid":"19","text":"General Details of Services\u002FGoods","type":"control_textarea"},{"name":"establishmentDate","qid":"20","text":"Establishment Date","type":"control_datetime"},{"name":"geographicService","qid":"21","text":"Geographic Service Area","type":"control_textbox"},{"name":"businessType","qid":"22","text":"Business Type","type":"control_textbox"},null,{"name":"insured","qid":"24","text":"Insured?","type":"control_radio"},{"name":"licensed","qid":"25","text":"Licensed?","type":"control_radio"},{"name":"grossAnnual","qid":"26","text":"Gross Annual Sales","type":"control_textbox"},null,{"name":"licenseNumber","qid":"28","text":"License Number","type":"control_textbox"},{"name":"input29","qid":"29","text":"I hereby affirm that all information provided above is accurate to the best of my knowledge and belief, and I understand that this information will be considered material in the evaluation of quotations, bids and proposals.","type":"control_text"},{"name":"companyRepresentative","qid":"30","text":"Company Representative Signature","type":"control_signature"},null,{"name":"bankingInformation","qid":"32","text":"Banking Information","type":"control_head"},{"name":"bankName","qid":"33","text":"Bank Name","type":"control_textbox"},{"name":"beneficiaryName","qid":"34","text":"Beneficiary Name","type":"control_textbox"},{"name":"accountNumber","qid":"35","text":"Account Number","type":"control_textbox"},{"name":"image","qid":"36","text":"acmeglobal-black.63a4557478f8d0.87854385","type":"control_image"},{"name":"input37","qid":"37","text":"\nACME GLOBAL Company\n123 Maple Street, Houston, TX, 77002\n\nexample@example.com\nwww.example.com\n(123) 1234567\n\n","type":"control_text"},{"name":"date","qid":"38","text":"Date","type":"control_datetime"}]);}, 20); 
</script>
<style type="text/css">@media print{.form-section{display:inline!important}.form-pagebreak{display:none!important}.form-section-closed{height:auto!important}.page-section{position:initial!important}}</style>
<link type="text/css" rel="stylesheet" href="https://cdn01.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?v=3.3.41851&themeRevisionID=5eb3b4ae85bd2e1e2966db96"/>
<link type="text/css" rel="stylesheet" href="https://cdn02.jotfor.ms/css/styles/payment/payment_styles.css?3.3.41851" />
<link type="text/css" rel="stylesheet" href="https://cdn03.jotfor.ms/css/styles/payment/payment_feature.css?3.3.41851" />
<style type="text/css" id="form-designer-style">
    /* Injected CSS Code */
/*PREFERENCES STYLE*/
    .form-all {
      font-family: Inter, sans-serif;
    }
    .form-all .qq-upload-button,
    .form-all .form-submit-button,
    .form-all .form-submit-reset,
    .form-all .form-submit-print {
      font-family: Inter, sans-serif;
    }
    .form-all .form-pagebreak-back-container,
    .form-all .form-pagebreak-next-container {
      font-family: Inter, sans-serif;
    }
    .form-header-group {
      font-family: Inter, sans-serif;
    }
    .form-label {
      font-family: Inter, sans-serif;
    }
  
    .form-label.form-label-auto {
      
    display: block;
    float: none;
    text-align: left;
    width: 100%;
  
    }
  
    .form-line {
      margin-top: 12px 36px 12px 36px px;
      margin-bottom: 12px 36px 12px 36px px;
    }
  
    .form-all {
      max-width: 752px;
      width: 100%;
    }
  
    .form-label.form-label-left,
    .form-label.form-label-right,
    .form-label.form-label-left.form-label-auto,
    .form-label.form-label-right.form-label-auto {
      width: 230px;
    }
  
    .form-all {
      font-size: 16px
    }
    .form-all .qq-upload-button,
    .form-all .qq-upload-button,
    .form-all .form-submit-button,
    .form-all .form-submit-reset,
    .form-all .form-submit-print {
      font-size: 16px
    }
    .form-all .form-pagebreak-back-container,
    .form-all .form-pagebreak-next-container {
      font-size: 16px
    }
  
    .supernova .form-all, .form-all {
      background-color: #fff;
    }
  
    .form-all {
      color: #000000;
    }
    .form-header-group .form-header {
      color: #000000;
    }
    .form-header-group .form-subHeader {
      color: #000000;
    }
    .form-label-top,
    .form-label-left,
    .form-label-right,
    .form-html,
    .form-checkbox-item label,
    .form-radio-item label,
    span.FITB .qb-checkbox-label,
    span.FITB .qb-radiobox-label,
    span.FITB .form-radio label,
    span.FITB .form-checkbox label,
    [data-blotid][data-type=checkbox] [data-labelid],
    [data-blotid][data-type=radiobox] [data-labelid],
    span.FITB-inptCont[data-type=checkbox] label,
    span.FITB-inptCont[data-type=radiobox] label {
      color: #000000;
    }
    .form-sub-label {
      color: #1a1a1a;
    }
  
    .supernova {
      background-color: #ecedf3;
    }
    .supernova body {
      background: transparent;
    }
  
    .form-textbox,
    .form-textarea,
    .form-dropdown,
    .form-radio-other-input,
    .form-checkbox-other-input,
    .form-captcha input,
    .form-spinner input {
      background-color: #fff;
    }
  
    .supernova {
      background-image: none;
    }
    #stage {
      background-image: none;
    }
  
    .form-all {
      background-image: none;
    }
  
  .ie-8 .form-all:before { display: none; }
  .ie-8 {
    margin-top: auto;
    margin-top: initial;
  }
  
  /*PREFERENCES STYLE*//*__INSPECT_SEPERATOR__*/.form-header-group.header-large {
    padding: 24px !important;
    border-top: 1px solid #E0E0E0;
    border-bottom: 0px solid #EEE;
    margin-top: 12px;
}

.form-line-active { 
  background-color: #F1F1F1; 
}
.supernova {
  background-image: linear-gradient(#ffffffff, #D9DEE4);
}
.form-all { box-shadow : 0 0 32px rgba(42, 42, 42, 0.16); }

.form-all,
#stage .formPage-stage.form-all,  
.form-section.page-section {
    border-radius : 6px;
}



    /* Injected CSS Code */
</style>

<form class="jotform-form" action="" method="post" name="form_231352235170546" id="231352235170546" accept-charset="utf-8" autocomplete="on"><input type="hidden" name="formID" value="231352235170546" /><input type="hidden" id="JWTContainer" value="" /><input type="hidden" id="cardinalOrderNumber" value="" />
  <div role="main" class="form-all">
    <ul class="form-section page-section">
      <li class="form-line form-line-column form-col-1" data-type="control_image" id="id_36">
        <div id="cid_36" class="form-input-wide" data-layout="full"> <img alt="Image" loading="lazy" class="form-image" style="border:0" src="{{ asset('logo/logo.jpg') }}" tabindex="0" height="100px" width="150px" data-component="image" /> </div>
      </li>
      <li class="form-line form-line-column form-col-2" data-type="control_text" id="id_37">
        <div id="cid_37" class="form-input-wide" data-layout="full">
          <div id="text_37" class="form-html" data-component="text" tabindex="0">
            <div style="line-height:18px;text-align:right;padding-top:24px;">
              <div style="font-size:12pt;"><strong>Online Business Center</strong></div>
              <div style="font-size:10pt;">123 Maple Street, Houston, TX, 77002</div>
              <div style="line-height:14px;">
                <div style="font-size:8pt;">admin@gmail.com</div>
                <div style="font-size:8pt;">www.online-business-center.com</div>
                <div style="font-size:8pt;">(255) 655193352</div>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li id="cid_16" class="form-input-wide" data-type="control_head">
        <div class="form-header-group  header-large">
          <div class="header-text httac htvam">
            <h1 id="header_16" class="form-header" data-component="header">Seller Registration</h1>
            <div id="subHeader_16" class="form-subHeader">Complete form below to signup as a seller.</div>
          </div>
        </div>
      </li>
      <li id="cid_17" class="form-input-wide" data-type="control_head">
        <div class="form-header-group  header-default">
          <div class="header-text httal htvam">
            <h2 id="header_17" class="form-header" data-component="header">Shop Contact Information</h2>
          </div>
        </div>
      </li>
      <li class="form-line fixed-width" data-type="control_textbox" id="id_6"><label class="form-label form-label-top form-label-auto" id="label_6" for="input_6"> Organization/Business Name </label>
        <div id="cid_6" class="form-input-wide" data-layout="half">
            {{-- <input type="text" id="input_6" name="" data-type="" class="form-textbox" data-defaultvalue="" style="width:620px" size="620" value="" placeholder=" " data-component="textbox" aria-labelledby="label_6" /> --}}
        </div>
      </li>
      <li class="form-line" data-type="control_address" id="id_7">
        <label class="form-label form-label-top form-label-auto" id="label_7" for="input_7undefined"> Company Address</label>
        <div id="cid_7" class="form-input-wide" data-layout="full">
          <div summary="" class="form-address-table jsTest-addressField">
            <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                <span class="form-address-line form-address-street-line jsTest-address-lineField">
                    <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_7_addr_line1" name="q7_address7[addr_line1]" class="form-textbox form-address-line" data-defaultvalue="" autoComplete="section-input_7 address-line1" value="" data-component="address_line_1" aria-labelledby="label_7 sublabel_7_addr_line1" />
                        <label class="form-sub-label" for="input_7_addr_line1" id="sublabel_7_addr_line1" style="min-height:13px" aria-hidden="false">Street Address</label>
                    </span>
                </span>
            </div>
            <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                <span class="form-address-line form-address-street-line jsTest-address-lineField">
                    <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_7_addr_line2" name="q7_address7[addr_line2]" class="form-textbox form-address-line" data-defaultvalue="" autoComplete="section-input_7 off" value="" data-component="address_line_2" aria-labelledby="label_7 sublabel_7_addr_line2" />
                        <label class="form-sub-label" for="input_7_addr_line2" id="sublabel_7_addr_line2" style="min-height:13px" aria-hidden="false">Street Address Line 2</label>
                    </span>
                </span>
            </div>
            <div class="form-address-line-wrapper jsTest-address-line-wrapperField">
                <span class="form-address-line form-address-city-line jsTest-address-lineField ">
                    <span class="form-sub-label-container" style="vertical-align:top">
                        <input type="text" id="input_7_city" name="q7_address7[city]" class="form-textbox form-address-city" data-defaultvalue="" autoComplete="section-input_7 address-level2" value="" data-component="city" aria-labelledby="label_7 sublabel_7_city" />
                        <label class="form-sub-label" for="input_7_city" id="sublabel_7_city" style="min-height:13px" aria-hidden="false">City</label></span></span><span class="form-address-line form-address-state-line jsTest-address-lineField ">
                            <span class="form-sub-label-container" style="vertical-align:top">
                                <input type="text" id="input_7_state" name="q7_address7[state]" class="form-textbox form-address-state" data-defaultvalue="" autoComplete="section-input_7 address-level1" value="" data-component="state" aria-labelledby="label_7 sublabel_7_state" /><label class="form-sub-label" for="input_7_state" id="sublabel_7_state" style="min-height:13px" aria-hidden="false">State / Province</label></span></span></div>
            <div class="form-address-line-wrapper jsTest-address-line-wrapperField"><span class="form-address-line form-address-zip-line jsTest-address-lineField "><span class="form-sub-label-container" style="vertical-align:top"><input type="text" id="input_7_postal" name="q7_address7[postal]" class="form-textbox form-address-postal" data-defaultvalue="" autoComplete="section-input_7 postal-code" value="" data-component="zip" aria-labelledby="label_7 sublabel_7_postal" /><label class="form-sub-label" for="input_7_postal" id="sublabel_7_postal" style="min-height:13px" aria-hidden="false">Postal / Zip Code</label></span></span><span class="form-address-line form-address-country-line jsTest-address-lineField "><span class="form-sub-label-container" style="vertical-align:top"><select class="form-dropdown form-address-country" name="q7_address7[country]" id="input_7_country" data-component="country" required="" aria-labelledby="label_7 sublabel_7_country" autoComplete="section-input_7 country">
                    <option value="">Please Select</option>
                    <option value="United States">United States</option>
                    <option value="Afghanistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="The Bahamas">The Bahamas</option>
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
                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Brazil">Brazil</option>
                    <option value="Brunei">Brunei</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Christmas Island">Christmas Island</option>
                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo">Congo</option>
                    <option value="Cook Islands">Cook Islands</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Cote d&#x27;Ivoire">Cote d&#x27;Ivoire</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Curaçao">Curaçao</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
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
                    <option value="French Polynesia">French Polynesia</option>
                    <option value="Gabon">Gabon</option>
                    <option value="The Gambia">The Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Gibraltar">Gibraltar</option>
                    <option value="Greece">Greece</option>
                    <option value="Greenland">Greenland</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guernsey">Guernsey</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Iran">Iran</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jersey">Jersey</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="North Korea">North Korea</option>
                    <option value="South Korea">South Korea</option>
                    <option value="Kosovo">Kosovo</option>
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
                    <option value="Malawi">Malawi</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mayotte">Mayotte</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Micronesia">Micronesia</option>
                    <option value="Moldova">Moldova</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montenegro">Montenegro</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Nagorno-Karabakh">Nagorno-Karabakh</option>
                    <option value="Namibia">Namibia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherlands">Netherlands</option>
                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                    <option value="New Caledonia">New Caledonia</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Niue">Niue</option>
                    <option value="Norfolk Island">Norfolk Island</option>
                    <option value="Turkish Republic of Northern Cyprus">Turkish Republic of Northern Cyprus</option>
                    <option value="Northern Mariana">Northern Mariana</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau">Palau</option>
                    <option value="Palestine">Palestine</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Philippines">Philippines</option>
                    <option value="Pitcairn Islands">Pitcairn Islands</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Republic of the Congo">Republic of the Congo</option>
                    <option value="Romania">Romania</option>
                    <option value="Russia">Russia</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="Saint Barthelemy">Saint Barthelemy</option>
                    <option value="Saint Helena">Saint Helena</option>
                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                    <option value="Saint Lucia">Saint Lucia</option>
                    <option value="Saint Martin">Saint Martin</option>
                    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                    <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                    <option value="Samoa">Samoa</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Serbia">Serbia</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="Somaliland">Somaliland</option>
                    <option value="South Africa">South Africa</option>
                    <option value="South Ossetia">South Ossetia</option>
                    <option value="South Sudan">South Sudan</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Svalbard">Svalbard</option>
                    <option value="eSwatini">eSwatini</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syria">Syria</option>
                    <option value="Taiwan">Taiwan</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania">Tanzania</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Timor-Leste">Timor-Leste</option>
                    <option value="Togo">Togo</option>
                    <option value="Tokelau">Tokelau</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Transnistria Pridnestrovie">Transnistria Pridnestrovie</option>
                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                    <option value="Tristan da Cunha">Tristan da Cunha</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Emirates">United Arab Emirates</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="Uruguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Vatican City">Vatican City</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="British Virgin Islands">British Virgin Islands</option>
                    <option value="Isle of Man">Isle of Man</option>
                    <option value="US Virgin Islands">US Virgin Islands</option>
                    <option value="Wallis and Futuna">Wallis and Futuna</option>
                    <option value="Western Sahara">Western Sahara</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                    <option value="other">Other</option>
                  </select><label class="form-sub-label" for="input_7_country" id="sublabel_7_country" style="min-height:13px" aria-hidden="false">Country</label></span></span></div>
          </div>
        </div>
      </li>
      <li class="form-line" data-type="control_fullname" id="id_8"><label class="form-label form-label-top form-label-auto" id="label_8" for="first_8"> Point of Contact </label>
        <div id="cid_8" class="form-input-wide" data-layout="full">
          <div data-wrapper-react="true"><span class="form-sub-label-container" style="vertical-align:top" data-input-type="first"><input type="text" id="first_8" name="q8_pointOf[first]" class="form-textbox" data-defaultvalue="" autoComplete="section-input_8 given-name" size="10" value="" data-component="first" aria-labelledby="label_8 sublabel_8_first" /><label class="form-sub-label" for="first_8" id="sublabel_8_first" style="min-height:13px" aria-hidden="false">First Name</label></span><span class="form-sub-label-container" style="vertical-align:top" data-input-type="last"><input type="text" id="last_8" name="q8_pointOf[last]" class="form-textbox" data-defaultvalue="" autoComplete="section-input_8 family-name" size="15" value="" data-component="last" aria-labelledby="label_8 sublabel_8_last" /><label class="form-sub-label" for="last_8" id="sublabel_8_last" style="min-height:13px" aria-hidden="false">Last Name</label></span></div>
        </div>
      </li>
      <li class="form-line form-line-column form-col-1" data-type="control_phone" id="id_9"><label class="form-label form-label-top form-label-auto" id="label_9" for="input_9_area"> Phone Number (Day) </label>
        <div id="cid_9" class="form-input-wide" data-layout="half">
          <div data-wrapper-react="true"><span class="form-sub-label-container" style="vertical-align:top" data-input-type="areaCode"><input type="tel" id="input_9_area" name="q9_phoneNumber9[area]" class="form-textbox" data-defaultvalue="" autoComplete="section-input_9 tel-area-code" value="" data-component="areaCode" aria-labelledby="label_9 sublabel_9_area" /><span class="phone-separate" aria-hidden="true"> -</span><label class="form-sub-label" for="input_9_area" id="sublabel_9_area" style="min-height:13px" aria-hidden="false">Area Code</label></span><span class="form-sub-label-container" style="vertical-align:top" data-input-type="phone"><input type="tel" id="input_9_phone" name="q9_phoneNumber9[phone]" class="form-textbox" data-defaultvalue="" autoComplete="section-input_9 tel-local" value="" data-component="phone" aria-labelledby="label_9 sublabel_9_phone" /><label class="form-sub-label" for="input_9_phone" id="sublabel_9_phone" style="min-height:13px" aria-hidden="false">Phone Number</label></span></div>
        </div>
      </li>
      <li class="form-line form-line-column form-col-2" data-type="control_phone" id="id_10"><label class="form-label form-label-top form-label-auto" id="label_10" for="input_10_area"> Phone Number (Evening) </label>
        <div id="cid_10" class="form-input-wide" data-layout="half">
          <div data-wrapper-react="true"><span class="form-sub-label-container" style="vertical-align:top" data-input-type="areaCode"><input type="tel" id="input_10_area" name="q10_phoneNumber[area]" class="form-textbox" data-defaultvalue="" autoComplete="section-input_10 tel-area-code" value="" data-component="areaCode" aria-labelledby="label_10 sublabel_10_area" /><span class="phone-separate" aria-hidden="true"> -</span><label class="form-sub-label" for="input_10_area" id="sublabel_10_area" style="min-height:13px" aria-hidden="false">Area Code</label></span><span class="form-sub-label-container" style="vertical-align:top" data-input-type="phone"><input type="tel" id="input_10_phone" name="q10_phoneNumber[phone]" class="form-textbox" data-defaultvalue="" autoComplete="section-input_10 tel-local" value="" data-component="phone" aria-labelledby="label_10 sublabel_10_phone" /><label class="form-sub-label" for="input_10_phone" id="sublabel_10_phone" style="min-height:13px" aria-hidden="false">Phone Number</label></span></div>
        </div>
      </li>
      <li class="form-line" data-type="control_email" id="id_11"><label class="form-label form-label-top form-label-auto" id="label_11" for="input_11"> E-mail </label>
        <div id="cid_11" class="form-input-wide" data-layout="half"> <input type="email" id="input_11" name="q11_email11" class="form-textbox validate[Email]" data-defaultvalue="" style="width:32px" size="32" value="" placeholder="ex: myname@example.com" data-component="email" aria-labelledby="label_11" /> </div>
      </li>
      <li id="cid_18" class="form-input-wide" data-type="control_head">
        <div class="form-header-group  header-default">
          <div class="header-text httal htvam">
            <h2 id="header_18" class="form-header" data-component="header">Company Overview</h2>
          </div>
        </div>
      </li>
      <li class="form-line" data-type="control_textarea" id="id_19"><label class="form-label form-label-top form-label-auto" id="label_19" for="input_19"> General Details of Services/Goods </label>
        <div id="cid_19" class="form-input-wide" data-layout="full"> <textarea id="input_19" class="form-textarea" name="q19_generalDetails" style="width:648px;height:163px" data-component="textarea" aria-labelledby="label_19"></textarea> </div>
      </li>
      <li class="form-line" data-type="control_datetime" id="id_20"><label class="form-label form-label-top form-label-auto" id="label_20" for="lite_mode_20"> Establishment Date </label>
        <div id="cid_20" class="form-input-wide" data-layout="half">
          <div data-wrapper-react="true">
            <div style="display:none"><span class="form-sub-label-container" style="vertical-align:top"><input type="tel" class="form-textbox validate[limitDate]" id="month_20" name="q20_establishmentDate[month]" size="2" data-maxlength="2" data-age="" maxLength="2" value="" autoComplete="off" aria-labelledby="label_20 sublabel_20_month" /><span class="date-separate" aria-hidden="true"> -</span><label class="form-sub-label" for="month_20" id="sublabel_20_month" style="min-height:13px" aria-hidden="false">Month</label></span><span class="form-sub-label-container" style="vertical-align:top"><input type="tel" class="form-textbox validate[limitDate]" id="day_20" name="q20_establishmentDate[day]" size="2" data-maxlength="2" data-age="" maxLength="2" value="" autoComplete="off" aria-labelledby="label_20 sublabel_20_day" /><span class="date-separate" aria-hidden="true"> -</span><label class="form-sub-label" for="day_20" id="sublabel_20_day" style="min-height:13px" aria-hidden="false">Day</label></span><span class="form-sub-label-container" style="vertical-align:top"><input type="tel" class="form-textbox validate[limitDate]" id="year_20" name="q20_establishmentDate[year]" size="4" data-maxlength="4" data-age="" maxLength="4" value="" autoComplete="off" aria-labelledby="label_20 sublabel_20_year" /><label class="form-sub-label" for="year_20" id="sublabel_20_year" style="min-height:13px" aria-hidden="false">Year</label></span></div><span class="form-sub-label-container" style="vertical-align:top"><input type="text" class="form-textbox validate[limitDate, validateLiteDate]" id="lite_mode_20" size="12" data-maxlength="12" maxLength="12" data-age="" value="" data-format="mmddyyyy" data-seperator="-" placeholder="MM-DD-YYYY" autoComplete="off" aria-labelledby="label_20 sublabel_20_litemode" /><img class=" newDefaultTheme-dateIcon icon-liteMode" alt="Pick a Date" id="input_20_pick" src="https://cdn.jotfor.ms/images/calendar.png" data-component="datetime" aria-hidden="true" data-allow-time="No" data-version="v2" /><label class="form-sub-label" for="lite_mode_20" id="sublabel_20_litemode" style="min-height:13px" aria-hidden="false">Date</label></span>
          </div>
        </div>
      </li>
      <li class="form-line form-line-column form-col-1" data-type="control_textbox" id="id_21"><label class="form-label form-label-top form-label-auto" id="label_21" for="input_21"> Geographic Service Area </label>
        <div id="cid_21" class="form-input-wide" data-layout="half"> <input type="text" id="input_21" name="q21_geographicService" data-type="input-textbox" class="form-textbox" data-defaultvalue="" style="width:310px" size="310" value="" data-component="textbox" aria-labelledby="label_21" /> </div>
      </li>
      <li class="form-line form-line-column form-col-2" data-type="control_textbox" id="id_22"><label class="form-label form-label-top form-label-auto" id="label_22" for="input_22"> Business Type </label>
        <div id="cid_22" class="form-input-wide" data-layout="half"> <input type="text" id="input_22" name="q22_businessType" data-type="input-textbox" class="form-textbox" data-defaultvalue="" style="width:310px" size="310" value="" data-component="textbox" aria-labelledby="label_22" /> </div>
      </li>
      <li class="form-line" data-type="control_radio" id="id_24"><label class="form-label form-label-top form-label-auto" id="label_24" for="input_24"> Insured? </label>
        <div id="cid_24" class="form-input-wide" data-layout="full">
          <div class="form-multiple-column" data-columncount="2" role="group" aria-labelledby="label_24" data-component="radio"><span class="form-radio-item"><span class="dragger-item"></span><input type="radio" aria-describedby="label_24" class="form-radio" id="input_24_0" name="q24_insured" value="Yes" /><label id="label_input_24_0" for="input_24_0">Yes</label></span><span class="form-radio-item"><span class="dragger-item"></span><input type="radio" aria-describedby="label_24" class="form-radio" id="input_24_1" name="q24_insured" value="No" /><label id="label_input_24_1" for="input_24_1">No</label></span></div>
        </div>
      </li>
      <li class="form-line" data-type="control_radio" id="id_25"><label class="form-label form-label-top form-label-auto" id="label_25" for="input_25"> Licensed? </label>
        <div id="cid_25" class="form-input-wide" data-layout="full">
          <div class="form-multiple-column" data-columncount="2" role="group" aria-labelledby="label_25" data-component="radio"><span class="form-radio-item"><span class="dragger-item"></span><input type="radio" aria-describedby="label_25" class="form-radio" id="input_25_0" name="q25_licensed" value="Yes" /><label id="label_input_25_0" for="input_25_0">Yes</label></span><span class="form-radio-item"><span class="dragger-item"></span><input type="radio" aria-describedby="label_25" class="form-radio" id="input_25_1" name="q25_licensed" value="No" /><label id="label_input_25_1" for="input_25_1">No</label></span></div>
        </div>
      </li>
      <li class="form-line always-hidden form-field-hidden" style="display:none;" data-type="control_textbox" id="id_28"><label class="form-label form-label-top form-label-auto" id="label_28" for="input_28"> License Number </label>
        <div id="cid_28" class="form-input-wide always-hidden" data-layout="half"> <input type="text" id="input_28" name="q28_licenseNumber" data-type="input-textbox" class="form-textbox" data-defaultvalue="" style="width:310px" size="310" value="" data-component="textbox" aria-labelledby="label_28" /> </div>
      </li>
      <li class="form-line" data-type="control_textbox" id="id_26"><label class="form-label form-label-top form-label-auto" id="label_26" for="input_26"> Gross Annual Sales </label>
        <div id="cid_26" class="form-input-wide" data-layout="half"> <input type="text" id="input_26" name="q26_grossAnnual" data-type="input-textbox" class="form-textbox" data-defaultvalue="" style="width:310px" size="310" value="" data-component="textbox" aria-labelledby="label_26" /> </div>
      </li>
      <li id="cid_32" class="form-input-wide" data-type="control_head">
        <div class="form-header-group  header-default">
          <div class="header-text httal htvam">
            <h2 id="header_32" class="form-header" data-component="header">Banking Information</h2>
          </div>
        </div>
      </li>
      <li class="form-line form-line-column form-col-1" data-type="control_textbox" id="id_33"><label class="form-label form-label-top form-label-auto" id="label_33" for="input_33"> Bank Name </label>
        <div id="cid_33" class="form-input-wide" data-layout="half"> <input type="text" id="input_33" name="q33_bankName" data-type="input-textbox" class="form-textbox" data-defaultvalue="" style="width:310px" size="310" value="" data-component="textbox" aria-labelledby="label_33" /> </div>
      </li>
      <li class="form-line form-line-column form-col-2" data-type="control_textbox" id="id_34"><label class="form-label form-label-top form-label-auto" id="label_34" for="input_34"> Beneficiary Name </label>
        <div id="cid_34" class="form-input-wide" data-layout="half"> <input type="text" id="input_34" name="q34_beneficiaryName" data-type="input-textbox" class="form-textbox" data-defaultvalue="" style="width:310px" size="310" value="" data-component="textbox" aria-labelledby="label_34" /> </div>
      </li>
      <li class="form-line" data-type="control_textbox" id="id_35"><label class="form-label form-label-top form-label-auto" id="label_35" for="input_35"> Account Number </label>
        <div id="cid_35" class="form-input-wide" data-layout="half"> <input type="text" id="input_35" name="q35_accountNumber" data-type="input-textbox" class="form-textbox" data-defaultvalue="" style="width:310px" size="310" value="" data-component="textbox" aria-labelledby="label_35" /> </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_29">
        <div id="cid_29" class="form-input-wide" data-layout="full">
          <div id="text_29" class="form-html" data-component="text" tabindex="0">
            <p>I hereby affirm that all information provided above is accurate to the best of my knowledge and belief, and I understand that this information will be considered material in the evaluation of quotations, bids and proposals.</p>
          </div>
        </div>
      </li>
      <li class="form-line" data-type="control_datetime" id="id_38"><label class="form-label form-label-top form-label-auto" id="label_38" for="lite_mode_38"> Date </label>
        <div id="cid_38" class="form-input-wide" data-layout="half">
          <div data-wrapper-react="true">
            <div style="display:none"><span class="form-sub-label-container" style="vertical-align:top"><input type="tel" class="form-textbox validate[limitDate]" id="month_38" name="q38_date[month]" size="2" data-maxlength="2" data-age="" maxLength="2" value="05" autoComplete="off" aria-labelledby="label_38 sublabel_38_month" /><span class="date-separate" aria-hidden="true"> -</span><label class="form-sub-label" for="month_38" id="sublabel_38_month" style="min-height:13px" aria-hidden="false">Month</label></span><span class="form-sub-label-container" style="vertical-align:top"><input type="tel" class="currentDate form-textbox validate[limitDate]" id="day_38" name="q38_date[day]" size="2" data-maxlength="2" data-age="" maxLength="2" value="16" autoComplete="off" aria-labelledby="label_38 sublabel_38_day" /><span class="date-separate" aria-hidden="true"> -</span><label class="form-sub-label" for="day_38" id="sublabel_38_day" style="min-height:13px" aria-hidden="false">Day</label></span><span class="form-sub-label-container" style="vertical-align:top"><input type="tel" class="form-textbox validate[limitDate]" id="year_38" name="q38_date[year]" size="4" data-maxlength="4" data-age="" maxLength="4" value="2023" autoComplete="off" aria-labelledby="label_38 sublabel_38_year" /><label class="form-sub-label" for="year_38" id="sublabel_38_year" style="min-height:13px" aria-hidden="false">Year</label></span></div><span class="form-sub-label-container" style="vertical-align:top"><input type="text" class="form-textbox validate[limitDate, validateLiteDate]" id="lite_mode_38" size="12" data-maxlength="12" maxLength="12" data-age="" value="05-16-2023" data-format="mmddyyyy" data-seperator="-" placeholder="MM-DD-YYYY" autoComplete="off" aria-labelledby="label_38 sublabel_38_litemode" /><img class=" newDefaultTheme-dateIcon icon-liteMode" alt="Pick a Date" id="input_38_pick" src="https://cdn.jotfor.ms/images/calendar.png" data-component="datetime" aria-hidden="true" data-allow-time="No" data-version="v2" /><label class="form-sub-label" for="lite_mode_38" id="sublabel_38_litemode" style="min-height:13px" aria-hidden="false">Date</label></span>
          </div>
        </div>
      </li>
      <li class="form-line" data-type="control_signature" id="id_30"><label class="form-label form-label-top form-label-auto" id="label_30" for="input_30"> Company Representative Signature </label>
        <div id="cid_30" class="form-input-wide" data-layout="half">
          <div data-wrapper-react="true">
            <div id="signature_pad_30" class="signature-pad-wrapper" style="width:312px;height:116px">
              <div data-wrapper-react="true">
                <!--[if IE 7]><script type="text/javascript" src="/js/vendor/json2.js"></script><![endif]-->
              </div>
              <div class="signature-line signature-wrapper signature-placeholder" data-component="signature" style="width:312px;height:116px;position:relative">
                <div id="sig_pad_30" data-width="310" data-height="114" data-id="30" data-required="false" class="pad " aria-labelledby="label_30"></div><input type="hidden" name="q30_companyRepresentative" class="output4" id="input_30" />
              </div><a style="margin-top:2px;font-size:10px;color:inherit;text-decoration:none;float:left" href="https://www.jotform.com/products/sign?utm_source=sign_cardform&amp;utm_content=form&amp;utm_medium=button&amp;utm_campaign=sign_form_integration" target="_blank">Powered by <b style="color:#7BB60F">OBC</b></a> <span class="clear-pad-btn clear-pad" role="button" tabindex="0">Clear</span>
            </div>
            <div data-wrapper-react="true">
              <script type="text/javascript">
                window.signatureForm = true
              </script>
            </div>
          </div>
        </div>
      </li>
      <li class="form-line" data-type="control_button" id="id_2">
        <div id="cid_2" class="form-input-wide" data-layout="full">
          <div data-align="auto" class="form-buttons-wrapper form-buttons-auto   jsTest-button-wrapperField"><button id="input_2" style="display:none !important" type="button" class="form-submit-button form-submit-button-simple_black submit-button jf-form-buttons jsTest-submitField" data-component="button" data-content="">Send Application</button><button type="button" class="form-submit-button form-submit-button-simple_black submit-button jf-form-buttons jsTest-submitField  useJotformSign-button useJotformSign " data-component="button" data-content="">Send Application</button></div>
        </div>
      </li>
      <li style="clear:both"></li>
      <li style="display:none">Should be Empty: <input type="text" name="website" value="" /></li>
    </ul>
  </div>
  <script>
    JotForm.showJotFormPowered = "new_footer";
  </script>
  <script>
    JotForm.poweredByText = "Powered by Jotform";
  </script><input type="hidden" class="simple_spc" id="simple_spc" name="simple_spc" value="231352235170546" />
  <script type="text/javascript">
    var all_spc = document.querySelectorAll("form[id='231352235170546'] .si" + "mple" + "_spc");
    for (var i = 0; i < all_spc.length; i++)
    {
      all_spc[i].value = "231352235170546-231352235170546";
    }
  </script>
  <div class="formFooter-heightMask"></div>
  
</form><script type="text/javascript">JotForm.ownerView=true;</script>