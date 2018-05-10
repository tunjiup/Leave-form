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
