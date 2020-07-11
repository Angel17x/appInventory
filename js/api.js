$(document).ready(function(){

    $('#form').submit(function(){
        var nombre=$("#loginname").val();
        var password=$("#password").val();
        var mensaje1=$("#mensaje1").text("Debes completar campo nombre");
        var mensaje2=$("#mensaje2").text("Debes completar campo contraseña");
        
        if(nombre==""){
            mensaje1.fadeIn(500).fadeOut(2000);
            return false;
        }         
        if(password==""){
           mensaje2.fadeIn(500).fadeOut(2000);
            return false;
        }
        
    });
});

const http = new XMLHttpRequest();
http.open("POST", "", true);
http.send();
http.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        
        const confirm = confirm("Deseas modificar este producto?");
    }
}