$(function(){

	var socket = io.connect("http://localhost:5001");
	var role = $('#myrole').val();

	socket.on("new_employee", function(data) {

		$('.leave-container').append("<div class='col-sm'><div class='leave-wrapper' data-id='"+data.id+"'><div class='lv-name'>"+data.uname+"</div><div class='lv-info'><div class='lv-label'>VL</div><div class='lv-details'><span>0</span>/0</div></div><div class='lv-info'><div class='lv-label'>SL</div><div class='lv-details'><span>0</span>/0</div></div><div class='lv-info'><div class='lv-label'>BL</div><div class='lv-details'><span>1</span>/1</div></div></div></div>");

	});

	socket.on("new_comment", function(data) {

		$('.feedtbody').prepend('<tr><td>'+data.date+'</td><td>'+data.message+'</td><td>'+data.from+'</td><td><a href="#" class="commentView" data-id="'+data.id+'"><i class="far fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://localhost:8080/leaveform/comment-hide/'+data.id+'" class="commentHide"><i class="fas fa-toggle-on"></i></a></td></tr>');
		$('#feedBadge').addClass('badge badge-danger');
		$('#feedBadge').html(data.count);
		if(role == 1) {
			toastr.info('You have a '+data.count+' message/s', 'Notifications', {timeOut: 8000});
		}
	});

});