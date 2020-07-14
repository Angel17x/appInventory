$(document).ready(function(){

    obtenerTabla();
    dataUser();
/***********************OBTENER DATOS DE LA TABLA************************/
    function obtenerTabla(){
        $.ajax({
            method: "GET",
            url: "obtenerTabla.php",
            success: function(response){
                var dataTable = JSON.parse(response);
                let template2 = '';
    
                dataTable.forEach(dataTable =>{
                    template2 += `<tr taskid='${dataTable.id}'>
                        <td>${dataTable.id}</td>
                        <td>${dataTable.ref}</td><td>${dataTable.name_prod}</td> <td>${dataTable.adm_date}</td>
                        <td>${dataTable.quantity}</td><td>${dataTable.price}</td>
                        <td><button class='btn btn-warning btn-mg' id='modificar'>Modificar</button></td>
                        <td><button class='btn btn-danger btn-mg' id='eliminar'>Eliminar</button></td>
                    </tr>`
                });
    
                $("#task").html(template2);
            }
        })
    }
/***********************OBTENER DATOS DE EL USUARIO************************/
    function dataUser(){
        $.ajax({
            url: "infoUser.php",
            method: "GET",
            success: function(response){
                let dataUser = JSON.parse(response);
                let template = '';

                dataUser.forEach(dataUser =>{
                    template += `${dataUser.name} ${dataUser.lastname}</br>${dataUser.type_of_user}`
                });
                $("#titulo").html(template);
            }
        });
    }


/*********************FUNCION ELIMINAR PRODUCTO********************************/
    $(document).on('click', '#eliminar', function(){
        var elemento = $(this)[0].parentElement.parentElement;
        var id = $(elemento).attr('taskid');
        if(confirm("estas seguro que deseas eliminar este producto?")){
            $.get('deleteProd.php', {id}, function(response){
                obtenerTabla();
                alert(response);
                }
            )};
    });

/*********************FUNCION MODIFICAR PRODUCTO********************************/
/*$(document).on('click', '#modificar', function(){
    var elemento = $(this)[0].parentElement.parentElement;
    var id = $(elemento).attr('taskid');
    if(confirm("estas seguro que deseas eliminar a este usuario?")){
        $.get('deleteProd.php', {id}, function(response){
            obtenerTabla();
            alert(response);
            }
        )};*/

/***********************FUNCION VALIDAR FORMULARIO*************************************************/
$("#form").on("submit",function(e){
    
    let pass = $("#password").val();
    let login = $("#loginname").val();
        const obj = {
            'loginname': login,
            'password': pass
        }

    $.post("validarInfo.php", obj, function (response) {
        alert(response);      
    });
    e.preventDefault();
})



});



