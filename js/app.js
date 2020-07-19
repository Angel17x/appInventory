window.onload = function(){
    $("#preloader").fadeOut();
    $("body").removeClass('hidden');
}

$(document).ready(function(){

    obtenerTabla();
    obtenerProv();
    dataUser();

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

                
                if(dataUser.type_of_user == "USUARIO"){
                    
                    
                    }
            });
            $("#titulo").html(template);

            
        }
    });
}
/***********************OBTENER TABLA PRODUCTOS************************/
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
                        <td>${dataTable.quantity}</td><td>${dataTable.price}</td><td>${dataTable.price_2}</td><td>${dataTable.price_3}</td>
                        <td>${dataTable.warehouse}</td>
                        <td id='mod'><button class='btn btn-warning btn-mg' id='modificar' data-toggle="modal" data-target="#exampleModalCenter">Modificar</button></td>
                        <td id='del'><button class='btn btn-danger btn-mg' id='eliminar'>Eliminar</button></td>
                    </tr>`
                });
    
                $("#task").html(template2);
            }
        })
    }





/*********************FUNCION ELIMINAR PRODUCTO********************************/
    $(document).on('click', '#eliminar', function(){
        var elemento = $(this)[0].parentElement.parentElement;
        var id = $(elemento).attr('taskid');
        
        if(confirm("estas seguro que deseas eliminar este producto?")){
            $.get('deleteProd.php', {id}, function(response){
                obtenerTabla();
                let res = 
                    `<div class='container'>
                        <div class='row justify-content-center'>
                            <div class='col-lg-4'>
                            <h6 class='alert alert-success alert-dismissible fade show'>${response}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </h6>
                            </div>
                        </div>
                    </div>`

                    $("#modal-response").html(res);
                }
                
            )};
    });

/*********************FUNCION MODIFICAR PRODUCTO********************************/

$(document).on('click', '#modificar', function(e){
    
    e.preventDefault();

    /********ENVIAR DATOS*********/
var elemento = $(this)[0].parentElement.parentElement;
var id = $(elemento).attr('taskid');

$.post('obtenerTabla.php', {id}, function(response){

    let datos = response;
    $.ajax({
        method: "GET",
        url: "obtenerTabla.php",
        success: function(){
            var dataTable = JSON.parse(datos);
            let template3 = '';

            dataTable.forEach(dataTable =>{
                template3 += `<form modifyId="form" class="form p-4" id="form2" method="POST">
                
                <div class="form-group col-md-12">
                    <label class="bg-light" for="id">Id Del Producto</label>
                    <input class="form-control" type="number" name="id" id="id" value="${dataTable.id}">
                </div>
                <div class="form-group col-md-12">
                    <label class="bg-light" for="ref">Referencia Del Producto</label>
                    <input class="form-control" type="text" name="ref" id="ref" value="${dataTable.ref}">
                </div>
                <div class="form-group col-md-12">
                    <label class="bg-light" for="name_prod">Nombre del Producto</label>
                    <input class="form-control" type="text" name="name_prod" id="name_prod" value="${dataTable.name_prod}">
                </div>
                <div class="form-group col-md-12">
                    <label class="bg-light" for="adm_date">Fecha de ingreso</label>
                    <input class="form-control" type="text" name="adm_date" id="adm_date" value="${dataTable.adm_date}">
                </div>
                <div class="form-group col-md-12">
                    <label class="bg-light" for="quantity">Cantidad</label>
                    <input class="form-control" type="text" name="quantity" id="quantity" value="${dataTable.quantity}">
                </div>
                <div class="form-group col-md-12">
                    <label class="bg-light" for="price">Precio</label>
                    <input class="form-control" type="text" name="price" id="price" value="${dataTable.price}">
                </div>
                <div class="form-group col-md-12">
                    <label class="bg-light" for="price">Precio_2</label>
                    <input class="form-control" type="text" name="price2" id="price2" value="${dataTable.price_2}">
                </div>
                <div class="form-group col-md-12">
                    <label class="bg-light" for="price">Precio_3</label>
                    <input class="form-control" type="text" name="price3" id="price3" value="${dataTable.price_3}">
                </div>
                <div class="form-group col-md-12">
                    <label class="bg-light" for="price">Almacen</label>
                    <input class="form-control" type="text" name="warehouse" id="warehouse" value="${dataTable.warehouse}">
                </div>
                <button type="submit" class="btn btn-primary btn-block text-center" value="Modificar" name="update" id="update" data-dismiss="modal">Modificar</button>
                <button class="btn mt-2 btn-warning btn-block text-center" data-dismiss="modal">Regresar</button>
            </form>`
            });

            $(document).on('click','#regresar',function(e){
                e.preventDefault();
            });
            $("#respuesta").html(template3);
        }
    });


})
    $(document).on('click','#update',function(e){
        e.preventDefault();
           let datos = $("#form2").serialize();

            $.ajax({
                type: "POST",
                url: "modifyProd.php",
                data: datos,
                success: function(response){
                    let res = 
                    `<div class='container'>
                        <div class='row justify-content-center'>
                            <div class='col-lg-4'>
                            <h5 class='alert alert-success alert-dismissible fade show'>${response}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </h5>
                            </div>
                        </div>
                    </div>`

                    let res2 = `<div class='container'>
                    <div class='row justify-content-center'>
                        <div class='col-lg-4'>
                        <h5 class='alert alert-danger alert-dismissible fade show'>${response}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </h5>
                        </div>
                    </div>
                </div>`

                    if(response=="Modificacion Exitosa"){
                        $("#modal-response").html(res);
                    }else{
                    
                    $("#modal-response").html(res2);
                    }
                    obtenerTabla();
                }
            });
        
         
        
        return false;
    });
});/***********CIERRE DE MODIFICAR******* */

    

       




/***********************FUNCION VALIDAR FORMULARIO*************************************************/
$("#form").on("submit",function(e){
    
    let pass = $("#password").val();
    let login = $("#loginname").val();
        const obj = {
            'loginname': login,
            'password': pass
        }

    $.post("validarInfo.php", obj, function (response) {

        let res1 = $("#respuesta1").html(response);
        let res2 = $("#respuesta2").html(response);

        if(response=="haz conectado satisfactoriamente"){
        
            res1.slideToggle();
            res2.fadeOut();
            alert(response);
            window.location.href = 'http://localhost/formulario/appInventory.php';    
            
        }else{
            
            res2.slideToggle();
            res1.fadeOut();
            e.preventDefault();
        }
    });
        
        e.preventDefault();
})

    /***********************FORMULARIO BUSQUEDA PARA PRODUCTOS********************************/
    $(document).on("click","#buscar", function(e){
        e.preventDefault();
    });
$("#search").keyup(function () {

    

    var search = $("#search").val();

    if(search.length==0){
        obtenerTabla();
    }else{
        
    if(search){
        $.ajax({
            type: "POST",
            url: "obtenerTabla.php",
            data: {search},
            success: function (response) {
                var data = JSON.parse(response);
                let template = '';

                if(data!=""){
                data.forEach(data =>{
                    template += `<tr taskid='${data.id}'>
                    <td>${data.id}</td>
                    <td>${data.ref}</td><td>${data.name_prod}</td> <td>${data.adm_date}</td>
                    <td>${data.quantity}</td><td>${data.price}</td>
                    <td id='mod'><button class='btn btn-warning btn-mg' id='modificar'>Modificar</button></td>
                    <td id='del'><button class='btn btn-danger btn-mg' id='eliminar'>Eliminar</button></td>
                </tr>`
                });

              $("#task").html(template);

                }else{
                    let notRes = $("#notRes").html("no se encuentra tu busqueda");
                    $("#notRes").fadeTo(2000, 1000).slideUp(500, function(){
                        $("#notRes").slideUp(500);
                 });
                }
            }
            
            
        });
    }
        
    
}
});

/************************OBTENER TABLA PROVEEDORES*********************************/
function obtenerProv(){
    $.ajax({
        method: "POST",
        url: "obtenerProv.php",
        success: function(response){
            var dataTable = JSON.parse(response);
                let template = '';
    
                dataTable.forEach(dataTable =>{
                    template += `<tr taskid2='${dataTable.id}'>
                        <td>${dataTable.id}</td>
                        <td>${dataTable.tradename}</td><td>${dataTable.fiscal_name}</td> <td>${dataTable.comercial_business}</td>
                        <td>${dataTable.domicilie}</td><td>${dataTable.telephone}</td>
                        <td id='mod'><button class='btn btn-warning btn-mg' id='modificar2' data-toggle="modal" data-target="#exampleModalCenter">Modificar</button></td>
                        <td id='del'><button class='btn btn-danger btn-mg' id='eliminar2'>Eliminar</button></td>
                    </tr>`
                });
    
                $("#task4").html(template);
        }
    });
}
/*********************FUNCION ELIMINAR PROVEEDORES********************************/
$(document).on('click', '#eliminar2', function(){
var elemento = $(this)[0].parentElement.parentElement;
var id = $(elemento).attr('taskid2');

if(confirm("estas seguro que deseas eliminar este proveedor?")){
    $.get('deleteProv.php', {id}, function(response){
        obtenerProv()
        let res = 
                `<div class='container'>
                    <div class='row justify-content-center'>
                        <div class='col-lg-4'>
                        <h6 class='alert alert-success alert-dismissible fade show'>${response}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </h6>
                        </div>
                    </div>
                </div>`

            $("#modal-response").html(res);
        }
        
    )};
});



/*********************FUNCION MODIFICAR PROVEEDORES********************************/

$(document).on('click', '#modificar2', function(e){
    
    e.preventDefault();
    
var elemento = $(this)[0].parentElement.parentElement;
var id = $(elemento).attr('taskid2');

$.post("obtenerProv.php", {id}, function(res){
    const datos = res;
    
    $.ajax({
        method: "GET",
        url: "obtenerTabla.php",
        success: function(){
          const dataForm = JSON.parse(datos);
            let template = '';

            dataForm.forEach(dataForm =>{
                template += `<form modifyId="form" class="form p-4" id="form2" method="POST">
                
                <div class="form-group col-md-12">
                    <label class="bg-light" for="id">Id Del Proveedor</label>
                    <input class="form-control" type="number" name="id" id="id" value="${dataForm.id}">
                </div>
                <div class="form-group col-md-12">
                    <label class="bg-light" for="ref">Nombre Comercial</label>
                    <input class="form-control" type="text" name="tradename" id="tradename" value="${dataForm.tradename}">
                </div>
                <div class="form-group col-md-12">
                    <label class="bg-light" for="name_prod">Nombre Fiscal</label>
                    <input class="form-control" type="text" name="fiscalname" id="fiscalname" value="${dataForm.fiscal_name}">
                </div>
                <div class="form-group col-md-12">
                    <label class="bg-light" for="adm_date">Giro Comercial</label>
                    <input class="form-control" type="text" name="comercial_business" id="comercial_business" value="${dataForm.comercial_business}">
                </div>
                <div class="form-group col-md-12">
                    <label class="bg-light" for="quantity">Domicilio</label>
                    <input class="form-control" type="text" name="domicilie" id="domicilie" value="${dataForm.domicilie}">
                </div>
                <div class="form-group col-md-12">
                    <label class="bg-light" for="price">Telefono</label>
                    <input class="form-control" type="text" name="telephone" id="telephone" value="${dataForm.telephone}">
                </div>
                <button type="submit" class="btn btn-primary btn-block text-center" value="Modificar" name="update2" id="update2" data-dismiss="modal">Modificar</button>
                <button class="btn mt-2 btn-warning btn-block text-center" data-dismiss="modal">Regresar</button>
            </form>`
            });

            $(document).on('click','#regresar2',function(e){
                e.preventDefault();
            });
            $("#respuesta2").html(template);
        }
    });
    
    

    
});

$(document).on('click','#update2',function(e){
    e.preventDefault();
       let datos = $("#form2").serialize();

        $.ajax({
            type: "POST",
            url: "modifyProv.php",
            data: datos,
            success: function(response){
                let res = 
                `<div class='container mt-2'>
                    <div class='row justify-content-center'>
                        <div class='col-lg-4'>
                        <h5 class='alert alert-success alert-dismissible fade show'>${response}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </h5>
                        </div>
                    </div>
                </div>`

                let res2 = `<div class='container mt-2'>
                <div class='row justify-content-center'>
                    <div class='col-lg-4'>
                    <h5 class='alert alert-danger alert-dismissible fade show'>${response}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </h5>
                    </div>
                </div>
            </div>`

                if(response=="Modificacion Exitosa"){
                    $("#modal-response").html(res);
                }else{
                
                $("#modal-response").html(res2);
                }
                obtenerProv();
            }
        });
    
     
    
    return false;
});

});/***********CIERRE DE MODIFICAR PROVEEDORES******* */


});

/******************************************************************/
/******************************************************************/
/*********FUNCIONES AGREGAR PROVEEDORES Y PRODUCTOS****************/
/******************************************************************/
/******************************************************************/
/******************************************************************/

