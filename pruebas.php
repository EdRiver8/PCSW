<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Personas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <section class="container contenido">
        <h3>REGISTRO</h3>
        <form action="pruebas.php" method="post">
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">DOCUMENTO</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="documento">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">NOMBRES</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">APELLIDOS</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="apellido">
                </div>
            </div>
            <div class="mb-3 row">
                <button type="submit" class="btn btn-success" id="btnGuardar" name="btnGuardar">GUARDAR</button>
            </div>
        </form>
    </section>

    <?php

    if (isset($_POST['btnGuardar'])) {
        //prueba de que la db esta funcionando y hay conexion
        include "config/db.php";
        include "Model/createUserModel.php";
    }
    ?>

</body>

</html>