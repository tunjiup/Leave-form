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
function disabled() {
  $('#ckbox').attr('disabled','disabled');
  $('#ckbox2').attr('disabled','disabled');
  $('#ckbox3').attr('disabled','disabled');
  $('#ckbox4').attr('disabled','disabled');
  $('#ckbox5').attr('disabled','disabled');
  $('#ckbox6').attr('disabled','disabled');
  $('#ckbox7').attr('disabled','disabled');
  $('#ckbox8').attr('disabled','disabled');
  $('#ckbox9').attr('disabled','disabled');
}

function removeDisabled() {
  $('#ckbox').removeAttr('disabled','disabled');
  $('#ckbox2').removeAttr('disabled','disabled');
  $('#ckbox3').removeAttr('disabled','disabled');
  $('#ckbox4').removeAttr('disabled','disabled');
  $('#ckbox5').removeAttr('disabled','disabled');
  $('#ckbox6').removeAttr('disabled','disabled');
  $('#ckbox7').removeAttr('disabled','disabled');
  $('#ckbox8').removeAttr('disabled','disabled');
  $('#ckbox9').removeAttr('disabled','disabled');
}
$('#ckbox').click(function(){
  if($(this).is(":checked")) {
    $('#ckbox2').attr('disabled','disabled');
    $('#ckbox3').attr('disabled','disabled');
    $('#ckbox4').attr('disabled','disabled');
    $('#ckbox5').attr('disabled','disabled');
    $('#ckbox6').attr('disabled','disabled');
    $('#ckbox7').attr('disabled','disabled');
    $('#ckbox8').attr('disabled','disabled');
    $('#ckbox9').attr('disabled','disabled');
  } else {
    $('#ckbox2').removeAttr('disabled','disabled');
    $('#ckbox3').removeAttr('disabled','disabled');
    $('#ckbox4').removeAttr('disabled','disabled');
    $('#ckbox5').removeAttr('disabled','disabled');
    $('#ckbox6').removeAttr('disabled','disabled');
    $('#ckbox7').removeAttr('disabled','disabled');
    $('#ckbox8').removeAttr('disabled','disabled');
    $('#ckbox9').removeAttr('disabled','disabled');
  }
});