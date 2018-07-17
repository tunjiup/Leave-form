$(document).ready(function() {
	var dropdown = document.getElementsByClassName("dropdown-btn");
	var i;

	for (i = 0; i < dropdown.length; i++) {
		dropdown[i].addEventListener("click", function() {
			this.classList.toggle("active");

			var dropdownContent = this.nextElementSibling;
			if (dropdownContent.style.display === "block") {
				dropdownContent.style.display = "none";
				document.getElementById("changeCaret").className = "fas fa-caret-right";
			} else {
				dropdownContent.style.display = "block";
				document.getElementById("changeCaret").className = "fas fa-caret-down";
			}
		});
	}

	$('#moveDate').on('show', function() {
		$('#historyfiles').css('opacity', .5);
		$('#historyfiles').unbind();
	});
	$('#moveDate').on('hidden', function() {
		$('#historyfiles').css('opacity', 1);
		$('#historyfiles').removeData("modal").modal({});
	});

	$('st-actionContainer').launchBtn( { openDuration: 500, closeDuration: 300 } );


	$('#pass').on('blur', function(){

		var pass = $(this).val();
		var cpass = $('#cpass').val();

		if($('#cpass').val() == '') {
			$('#changeMyPass').attr('disabled','disabled');
		} else {

			if(cpass == pass) {
				$(this).css({"border-color": ""});
				$('#cpass').css({"border-color": ""});
				$('#changeMyPass').removeAttr('disabled','disabled');
			} else {
				$(this).css({"border-color": "#dc3545"});
				$('#cpass').css({"border-color": "#dc3545"});
				$('#changeMyPass').attr('disabled','disabled');
			}

		}

	});

	$('#cpass').on('blur', function(){

		var cpass = $(this).val();
		var pass = $('#pass').val();

		if($('#pass').val() == '') {
			$('#changeMyPass').attr('disabled','disabled');
		} else {

			if(cpass == pass) {
				$(this).css({"border-color": ""});
				$('#pass').css({"border-color": ""});
				$('#changeMyPass').removeAttr('disabled','disabled');
			} else {
				$(this).css({"border-color": "#dc3545"});
				$('#pass').css({"border-color": "#dc3545"});
				$('#changeMyPass').attr('disabled','disabled');
			}

		}

	});

	

	$('#EditEmployeesLeave').on('click',function(){
		$('#profileDir').css("z-index", "100");
		$('#empID').val($('#employeeid').val());
	});

	$('.modalClose').on('click', function(){
		$('#profileDir').css("z-index", "1050");
	})

	$('#commentClose').on('click', function(){
		$('#feed_back').css("z-index", "1050");
	})

	$('#changeClose').on('click', function(){
		$('#historyfiles').css("z-index", "1050");
	})

	$('#modalChangePass').click(function(){
		$('#editProfile').css("z-index", "100");
    });

    $('.passClose').on('click', function(){
		$('#editProfile').css("z-index", "1050");
	})

	$('#empdob').datetimepicker({format: 'MM/DD/YYYY'});

	$('#datefrom').datetimepicker({format: 'MM/DD/YYYY'});
	$('#dateto').datetimepicker({
		useCurrent: false,
		format: 'MM/DD/YYYY'
	});
	$("#datefrom").on("change.datetimepicker", function (e) {
	    $('#dateto').datetimepicker('minDate', e.date);
	});
	$("#dateto").on("change.datetimepicker", function (e) {
	    $('#datefrom').datetimepicker('maxDate', e.date);
	    _DatePickerCom();
	});

	function _DatePickerCom() {

		var oneDay = 24*60*60*1000;
		var from = new Date ($("#datefrom").val());
		var to = new Date ($('#dateto').val());

		var int = Math.round(Math.abs((from.getTime() - to.getTime()) / (oneDay)));

		$('#noDays').val(int + 1);
	}

	$('#trigerComment').click(function() {
		$('st-actionContainer').toggle('slow');
	});
});