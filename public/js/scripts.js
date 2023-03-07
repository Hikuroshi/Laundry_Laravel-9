function cetakStruk() {
    html2canvas(document.getElementById('capture'), {
        allowTaint: true,
        useCORS: true,
        scale: 2
    }).then(canvas => {
        const base64image = canvas.toDataURL("image/png");
        var anchor = document.createElement('a');
        anchor.setAttribute('href', base64image);
        anchor.setAttribute('download', 'Struk-' + kode_invoice + '.png');
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
        pdf.save('Struk-' + kode_invoice + '.pdf');
    });
}

setTimeout(function() {
    $('#notify').fadeOut('slow');
}, 5000);

var monitoredUrl = "http://127.0.0.1:8000/";

if (window.location.href === monitoredUrl) {
    if (document.cookie.indexOf("visitcount=") < 0) {
        document.cookie = "visitcount=1; expires=Fri, 31 Dec 9999 23:59:59 GMT";
    } else {
        var visitCount = parseInt(getCookie("visitcount")) + 1;
        document.cookie = "visitcount=" + visitCount + "; expires=Fri, 31 Dec 9999 23:59:59 GMT";
    }
}

// if (document.cookie.indexOf("visitcount=") < 0) {
//     document.cookie = "visitcount=1; expires=Fri, 31 Dec 9999 23:59:59 GMT";
// } else {
//     var visitCount = parseInt(getCookie("visitcount")) + 1;
//     document.cookie = "visitcount=" + visitCount + "; expires=Fri, 31 Dec 9999 23:59:59 GMT";
// }

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

document.getElementById("visitor-count").innerHTML = getCookie("visitcount");
