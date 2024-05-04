// HTML code snippet to convert to canvas
    document.getElementById('downloadpdf').addEventListener('click', function() {
        html2canvas(document.getElementById('downloadposter')).then(function(canvas) {
            var a = document.createElement('a');
            a.href = canvas.toDataURL('image/png');
            a.download = 'myImage.png';
            a.click();
        });
    });


