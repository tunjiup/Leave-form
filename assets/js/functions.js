function print() {
	var element = document.getElementById('formPaper');
	var opt = {
		margin: 0,
		filename: 'LeaveForm_MSW.pdf',
		image: {
			type: 'jpeg',
			quality: 1
		},
		html2canvas: {
			dpi: 300,
			letterRendering: true
		},
		jsPDF: {
			unit: 'in',
			format: 'A4',
			orientation: 'portrait'
		}
	};

	html2pdf(element, opt);
}

$(document).ready(function(){
	
	$('#saveto').click(function(){
		var dateTimeFrom = $('#dateTimePickerFrom').val();
		var dateTimeTo = $('#dateTimePickerTo').val();
		var dateFrom = $('#datePickerFrom').val();
		var dateTo = $('#datePickerTo').val();
		var contLeave = $('#contLeave').val();
		var reason = $('#reason').val();
		var regular = $('#regular').val();
		var noDays = $('#noDays').val();
		$.ajax({
			url:"http://localhost:8080/dev-leave-form/leave-form/add",
			type: "POST",
			data: {regular:regular, dateFrom:dateFrom, dateTo:dateTo, reason:reason, dateTimeFrom:dateTimeFrom, dateTimeTo:dateTimeTo, contLeave:contLeave, noDays:noDays},
			success: function(data) {
				$('#successLeave').modal('show');
				print();
				window.setTimeout(function(){window.location.href = "http://localhost:8080/dev-leave-form/" }, 5000);
			},
			error:function() {
				alert('Error');
			}
		});
	});
});