<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista Usuarios</title>
    <style>
        td {
            border: 1px dashed grey;
        }
    </style>
</head>

<body>

    <table>
        <tr>
            <td>Nombre del Usuario</td>
        </tr>
        <?php
        foreach ($listaUsers as $user) {
            echo "<tr><td>" . $user['nombre'] . "</tr></td>";
        }
        /*
        if (is_array($listaUsers) || is_object($listaUsers)) {
            foreach ($listaUsers as $user => $value) {
                echo "<tr><td>" . $user => $value . "</tr></td>";
            }
        }*/
        ?>
    </table>



</body>

</html>