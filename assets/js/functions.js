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




$(function () {
    $('#dateFrom').datetimepicker();
    $('#dateTo').datetimepicker({useCurrent: false});
    $("#dateFrom").on("change.datetimepicker", function (e) {
        $('#dateTo').datetimepicker('minDate', e.date);
    });
    $("#dateTo").on("change.datetimepicker", function (e) {
        $('#dateFrom').datetimepicker('maxDate', e.date);
    });
});

$(document).ready(function(){
	
	$('#saveto').click(function(){
		var contLeave = $('#contLeave').val();
		var dateFrom = $('#dateFrom').val();
		var dateTo = $('#dateTo').val();
		var reason = $('#reason').val();
		var regular = $('#regular').val();
		var noDays = $('#noDays').val();
		$.ajax({
			url:"http://localhost:8080/dev-leave-form/leave-form/add",
			type: "POST",
			data: {regular:regular, dateFrom:dateFrom, dateTo:dateTo, reason:reason, contLeave:contLeave, noDays:noDays},
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

	// $("#dateFrom").datepicker();
	// $("#dateTo").datepicker();

	// $('#dateTo').on('changeDate', function(){
	// 	var oneDay = 24*60*60*1000;
	// 	var from = new Date ($("#dateFrom").val());
	// 	var to = new Date ($(this).val());

	// 	var int = Math.round(Math.abs((from.getTime() - to.getTime()) / (oneDay)));

	// 	$('#noDays').val(int + 1);

	// });
});