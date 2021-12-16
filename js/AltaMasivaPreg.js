window.addEventListener("load", function(){
    const textarea= document.getElementById('alta').value;
    const btn = document.getElementById('enviar');
    btn.onclick=function(){
    document.write(textarea);
}
})