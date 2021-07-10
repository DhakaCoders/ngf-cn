(function($) {
setTimeout(function(){ 
    $('body.hide-account-title.check-shipping-box form input#is_shipping_address').trigger('click');
}, 1000);
$("#register_next").prop("disabled",true);
$("#reg_email").bind('blur keyup change click', function(){
  if(isValidEmailAddress($(this).val())){
    $(this).css({"border": "0px solid red", "color": "#000"});
    $("#register_next").prop("disabled",false);
  }else{
    $(this).css({"border": "1px solid red", "color": "red"});
    $("#register_next").prop("disabled",true);
  }
});

$("#for_business").on('change', function(){
var html = '<p class="form-row form-row-wide" id="billing_company_field">' +
        '<label for="billing_company" class="">Business Name</label>' +
        '<span class="woocommerce-input-wrapper">' +
          '<input type="text" class="input-text " name="billing_company" id="billing_company" placeholder="Business Name">' +
        '</span>' +
      '</p>'+
      '<p class="form-row form-row-wide" id="billing_btw_nummer_field">' +
        '<label for="billing_reference" class="">Reference</label>' +
        '<span class="woocommerce-input-wrapper">' +
          '<input type="text" class="input-text " name="billing_reference" id="billing_reference" placeholder="Reference">' +
        '</span>' +
      '</p>'+
      '<p class="form-row form-row-wide" id="billing_btw_nummer_field">' +
        '<label for="billing_btw_nummer" class="">BTW number</label>' +
        '<span class="woocommerce-input-wrapper">' +
          '<input type="text" class="input-text " name="billing_btw_nummer" id="billing_btw_nummer" placeholder="Bijv. BE0848 629 779">' +
        '</span>' +
      '</p>';

  $("#extra_fields").html(html);
});

$("#private").on('change', function(){
  var html = '';
  $("#extra_fields").empty(html);
});


// shipping field show/hide
$("#is_shipping_address").on('change',function(){
   var ischecked= $(this).is(':checked');
    if(ischecked){
     $(".hide-account-title .show_shipping_fields").hide();
    }else{
      $(".hide-account-title .show_shipping_fields").show();
    }
 }); 

// Registration form validation
$("#re_password").bind('blur keyup change', function(){
  $("#register_action_btn").attr('disabled','disabled');
  var pass = $('#re_password').val();
  //check the strings
  if(pass.length >= 8){
    $('.error-rel_password').text('');
    $(this).css({"border": "2px solid #F3F3F3", "color": "#9EA5AB"});
  }else{
    $('.error-rel_password').text('Password minimum 8 characters');
    $(this).css({"border": "2px solid #D17181", "color": "#D17181"});
    $("#register_action_btn").attr('disabled','disabled');
  }
});


$("#confirm_password").bind('blur keyup change click', function(){
  $("#register_action_btn").prop("disabled",false);
    var pass = $('#re_password').val();
    var confpass = $(this).val();
    //check the strings
    if(pass == confpass){
    //if both are same remove the error and allow to submit
    $('.error-confirm_password').text('');
    $(this).css({"border": "2px solid #F3F3F3", "color": "#9EA5AB"});
    $("#register_action_btn").prop("disabled",false);
    }else{
    //if not matching show error and not allow to submit
    $('.error-confirm_password').text('Password does not match');
    $(this).css({"border": "2px solid #D17181", "color": "#D17181"});
    $("#register_action_btn").prop("disabled",true);
    }
});

/* Checkout field show/hide */
if ($("#billing_order_type_Business").is(":checked")) {
    $('#billing_company_field').addClass('show-company');
    $('#vat_number_field').addClass('show-vat_number');
    $('#billing_reference_field').addClass('show-reference');
}
$("#billing_order_type_Business").on('change', function(){
    if ($(this).is(":checked")) {
        $('#billing_company_field').addClass('show-company');
        $('#vat_number_field').addClass('show-vat_number');
        $('#billing_reference_field').addClass('show-reference');
    }
});
$("#billing_order_type_Individual").on('change', function(){
    if ($(this).is(":checked")) {
        $('#billing_company_field').removeClass('show-company');
        $('#vat_number_field').removeClass('show-vat_number');
        $('#billing_reference_field').removeClass('show-reference');
    }
});


// Coupon code triger
$("#apply_coupon_code").click(function(){
    var couponCode = $('#coupon_code_enter').val();
    $("body .checkout_coupon.woocommerce-form-coupon input#coupon_code").val(couponCode)
    $(".checkout_coupon button").submit();

});


jQuery('body').on('wc_cart_emptied', function(){
  location.reload();
  //console.log('wc_cart_emptied triggered');
});


// Woocommerce form validation
if( $("body.woocommerce-account.woocommerce-edit-address").length ){
    $('body.woocommerce-account.woocommerce-edit-address form p.form-row.validate-required').addClass('required-field');
}

var txt1 = $('.register-nextstep form').find('span.error-valid').text();
var txt2 = $('.woocommerce-edit-account-crtl form').find('span.error-valid').text();
//$('.register-nextstep form').find('span.error-valid').parents('p.form-row').addClass('hasError');
//$('.woocommerce-edit-account-crtl form').find('span.error-valid').parents('p.form-row').addClass('hasError');

$('.register-nextstep form span.error-valid').each(function(){
    if ($(this).is(':empty')){
        $(this).parents('p.form-row').removeClass('hasError');
    }else{
        $(this).parents('p.form-row').addClass('hasError');
    }
});
$('.woocommerce-edit-account-crtl form span.error-valid').each(function(){
    if ($(this).is(':empty')){
        $(this).parents('p.form-row').removeClass('hasError');
    }else{
        $(this).parents('p.form-row').addClass('hasError');
    }
});

$('.woocommerce-edit-address form span.error-valid').each(function(){
    if ($(this).is(':empty')){
        $(this).parents('p.form-row').removeClass('hasError');
    }else{
        $(this).parents('p.form-row').addClass('hasError');
    }
});

//$('.register-nextstep form input#is_shipping_address').trigger('click');
$('.register-nextstep form p.form-row.required-field input,.woocommerce-edit-account-crtl form p.form-row.required-field input').blur(function(){
    if( $(this).val().length === 0 ) {
        $(this).parents('p.form-row').addClass('hasError');
    }else{
        $(this).parents('p.form-row').removeClass('hasError');
    }
});


if($('#ship-to-different-address-checkbox').not(':checked').length){
    $('body.woocommerce-checkout').find('.cbv_shipping_address').show();
    $('#cbv_defferent_shipping').prop('checked', true);
}else{
    $('body.woocommerce-checkout').find('.cbv_shipping_address').hide();
    $('#cbv_defferent_shipping').prop('checked', false);
}
$('#ship-to-different-address-checkbox').on('click', function() {
    if( $(this).is(':checked') ){
        $('body.woocommerce-checkout').find('.cbv_shipping_address').hide();
        $('#cbv_defferent_shipping').prop('checked', false);
    }else{
        $('body.woocommerce-checkout').find('.cbv_shipping_address').show();
        $('#cbv_defferent_shipping').prop('checked', true);
    }
});
})(jQuery);
jQuery( function($){
     /*global wc_single_product_params, wc_add_to_cart_variation_params*/
    if( $('body.single-product').length ){
        window.alert = function() {};
    }
    if ( typeof wc_add_to_cart_variation_params !== 'undefined' ) {
        // Variation selection error message
        $('#show_error').hide();
        $('.single_add_to_cart_button').on('click',function(e){
          if ( $( this ).is('.disabled') ) {
            e.preventDefault();
            if ( $( this ).is('.wc-variation-is-unavailable') ) {
                $('#show_error').show();
                $('#show_error').html(msgHtmlFormat(wc_add_to_cart_variation_params.i18n_unavailable_text));
            }else if ( $( this ).is('.wc-variation-selection-needed') ) {
                $('#show_error').show();
                $('#show_error').html(msgHtmlFormat(wc_add_to_cart_variation_params.i18n_make_a_selection_text));
              /*setTimeout(function () {
                $('#show_error').hide();
              }, 3000);*/
            }
            return false;
          }
        });
    }
    if ( typeof wc_single_product_params !== 'undefined' ) {


    }

 });
 function msgHtmlFormat(text){
    var htmlText = '<div class="register-field-error"><div class="error-msg"><span><i>'+
            '<svg class="error-msg-icon-svg" width="24" height="24" viewBox="0 0 24 24" fill="#ffffff">'+
            '<use xlink:href="#error-msg-icon-svg"></use> </svg></i>'+text+'</span></div></div>';
    return htmlText;
 }
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}
function isValidNumber(number) {
    var pattern = new RegExp(/^\s*[+-]?(\d+|\.\d+|\d+\.\d+|\d+\.)(e[+-]?\d+)?\s*$/);
    return pattern.test(number);
}
