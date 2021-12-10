"use strict";

$(document).ready(function () {
  $(document).on("click", "#btnIngresar", function (e) {
    e.preventDefault();
    var userName = $("#userName").val();
    var passw = $("#passw").val();
    console.log(!userName.trim()); //si esta en blanco devuelve true
    //trim quita los espacios en blanco
    if (!userName.trim() || !passw.trim()) return; //comprueba que si hallan datos
    //console.log(userName, passw);
    //los datos que se van a pasar por medio de ajax al servicio create
    var user = {
      userName: userName,
      passw: passw,
    };
    console.log(user);
    $.ajax({
      //se le envian los sgtes parametros
      type: "POST", //el metodo en que se envia la input
      url: "../Model/loginUserModel.php", //el lugar donde esta el servicio a consumir
      data: user, //la informacion que se va a enviar
    })
      .done(function (result) {
        console.log("Retorno del server: ", result);
        var json = JSON.parse(result);
        console.log("Tamaño retorno convertido json: ", json.length);
        console.log("Datos en json: ", json);
        if (json.length) {
          Swal.fire({
            icon: "success",
            title: "INGRESO AL PROGRAMA",
            text: "Ha realizado el ingreso de forma exitosa!",
          });
          setTimeout(function () {
            location.replace("../index.html");
          }, 2500);
          //window.open("../index.html");
          //location.href("../index.html"); //carga en la misma pestaña
          //window.open("../index.html"); //abre una pestaña nueva
          //actualiza la tabla con la informacion
        } else {
          Swal.fire({
            icon: "error",
            title: "USUARIO NO REGISTRADO",
            text: "Por favor registrese en el sistema para poder ingresar.",
          });
        }
        $("#userName").val("");
        $("#passw").val("");
      })
      .fail(function (result) {
        Swal.fire({
          icon: "error",
          title: "NO SE PUEDE EJECUTAR LA OPERACION",
          text: "Recargue la pagina nuevamente.",
        });
      });
  });
});

/*
//********FORMAS DE VALIDAR FORMULARIOS ******************
function validateForm(e) {
  var elements = e.elements;
  for (var i = 0; i < elements.length; i++) {
    if (elements[i].tagName === "INPUT" || elements[i].tagName === "SELECT") {
      if (elements[i].value.trim() === "" && elements[i].required === true) {
        var title = elements[i].getAttribute("title");
        alert("Please fill the " + title + " field");
        elements[i].focus();
        elements[i].style.borderColor = "red";
        elements[i].style.borderStyle = "dashed";
        return false;
      }
    }
  }
}
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms).forEach(function (form) {
    form.addEventListener(
      "submit",
      function (event) {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();
*/
