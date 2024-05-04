function toggle(){
    var blur = document.getElementById('blur');
    var popup = document.getElementById("popup");

    popup.classList.add("open-popup");
    blur.classList.toggle('active');
    popup.classList.toggle('active');
}
