jQuery(document).ready(function(){
	jQuery(document).on('submit','.business-contact-form',function(e){
		e.preventDefault();
		var form_data = jQuery(this).serialize();
		var formvalid = 0;
		var first_name = jQuery(this).find('input[name="first_name"]').val();
		var last_name = jQuery(this).find('input[name="last_name"]').val();
		var business_name = jQuery(this).find('input[name="business_name"]').val();
		var cage = jQuery(this).find('input[name="cage"]').val();
		var message = jQuery(this).find('textarea[name="message"]').val();
		if( cage == '' ){
			jQuery(this).find('input[name="cage"]').addClass('wpcf7-not-valid');
			jQuery(this).find('input[name="cage"]').next().show();
			formvalid = 1;
		}else{
			jQuery(this).find('input[name="cage"]').removeClass('wpcf7-not-valid');
			jQuery(this).find('input[name="cage"]').next().hide();
		}
		if( message == '' ){
			jQuery(this).find('textarea[name="message"]').addClass('wpcf7-not-valid');
			jQuery(this).find('textarea[name="message"]').next().show();
			formvalid = 1;
		}else{
			jQuery(this).find('textarea[name="message"]').removeClass('wpcf7-not-valid');
			jQuery(this).find('textarea[name="message"]').next().hide();
		}
		if(!formvalid){
			jQuery.ajax({
				type: 'post',
				url: myAjax.ajaxurl,
				data: form_data,
				success: function (response) {
					if( response.url ){
						window.location.href = response.url;
					}
				}, 
			});
		}
	});
});