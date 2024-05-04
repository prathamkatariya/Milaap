window.onload = function(){
    document.getElementById("download")
    .addEventListener("click",()=>{
        var poster = this.document.getElementById("poster");
        console.log(poster);
        console.log(window);
        var opt = {
            margin:       0.5,
            filename:     'Missing_Person_Poster.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 0.5 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'potrait', size: 'A4'}
          };
        html2pdf().from(poster).set(opt).save();
    })
}