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