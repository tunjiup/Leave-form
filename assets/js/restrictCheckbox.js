$( function() {

	$(".leaveTypes").on("click", function() {
		var numberOfChecked = $('input.leaveTypes:checkbox:checked').length;
		if (numberOfChecked > 1) {
			$(this).prop('checked', false);
		}
	});

	$(".withorwithoutpay").on("click", function() {
		var numberOfChecked = $('input.withorwithoutpay:checkbox:checked').length;
		if (numberOfChecked > 1) {
			$(this).prop('checked', false);
		}
	});

	$('#ckbox').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
		}
	});
	$('#ckbox2').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
		}
	});
	$('#ckbox3').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
		}
	});
	$('#ckbox4').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
		}
	});
	$('#ckbox5').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
		}
	});
	$('#ckbox6').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
		}
	});
	$('#ckbox7').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
		}
	});
	$('#ckbox8').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
		}
	});
	$('#ckbox9').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#contLeave').val(val);
		}
	});
	$('#ckbox10').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#regular').val(val);
		}
	});
	$('#ckbox11').click(function(){
		var val = $(this).val();
		if($(this).is(':checked')) {
			$('#regular').val(val);
		}
	});

});