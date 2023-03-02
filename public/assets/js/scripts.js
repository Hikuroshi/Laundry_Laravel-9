function cetakStruk() {
    html2canvas(document.getElementById('capture'), {
        allowTaint: true,
        useCORS: true,
        scale: 2
    }).then(canvas => {
        const base64image = canvas.toDataURL("image/png");
        var anchor = document.createElement('a');
        anchor.setAttribute('href', base64image);
        anchor.setAttribute('download', 'Struk-{{ $transaksi->kode_invoice }}.png');
        anchor.click();
        anchor.remove();
    });
}

function cetakStrukPDF() {
    html2canvas(document.getElementById('capture'), {
        allowTaint: true,
        useCORS: true,
        scale: 2
    }).then(canvas => {
        var pdf = new jsPDF("p", "mm", "a4");
        var width = pdf.internal.pageSize.getWidth();
        var height = pdf.internal.pageSize.getHeight();
        pdf.addImage(canvas.toDataURL("image/jpeg"), "jpeg", 0, 0, width, height);
        pdf.save('Struk-{{ $transaksi->kode_invoice }}.pdf');
    });
}