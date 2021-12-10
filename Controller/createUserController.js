"use strict";

$(document).ready(function () {
  $(document).on("click", "#btnGuardar", function (e) {
    e.preventDefault();
    var documento = $("#documento").val();
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var perfil = $("#perfil").val();
    var passw = $("#passw").val();
    var sede = $('input:radio[name=btnradio]:checked').val()
    var birthDate = $("#birthDate").val();
    //console.log(sede);

    if (!documento.trim() || !nombre.trim() || !apellido.trim() || !passw.trim() ||
    !birthDate.trim()) return; //comprueba que si hallan datos
    
    //los datos que se van a pasar por medio de ajax al servicio create
    var user = {
      documento: documento,
      nombre: nombre,
      apellido: apellido,
      perfil: perfil,
      passw: passw,
      sede: sede,
      birthDate: birthDate
    };
    console.log(user);
    $.ajax({
      //se le envian los sgtes parametros
      type: "POST", //el metodo en que se envia la input
      url: "../Model/createUserModel.php", //el lugar donde esta el servicio a consumir
      data: user, //la informacion que se va a enviar
    })
      .done(function (result) {
        console.log(result);
        //result, es lo que retorna el servicio a consumir, create.php
        Swal.fire({
          icon: "success",
          title: "DATOS GUARDADOS",
          text: "La informacion se almaceno en la DB",
        });
        //borrar datos del formulario
        $("#documento").val("");
        $("#nombre").val("");
        $("#apellido").val("");
        $("#passw").val("");
        $("#birthDate").val("");
        //actualiza la tabla con la informacion
      })
      .fail(function (result) {
        Swal.fire({
          icon: "error",
          title: "DATOS NO GUARDADOS",
          text: "La informacion no se pudo almacenar en la DB",
        });
      });
  });
});
