<?php
	$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail'); // CONEXIÓN ENTRE PHP y la base de datos.
?>
<html>
    <body>
        <?php
            $id = $_POST['id']; // Guarda la id mandada con el formulario en una variable .
            $comentario = $_POST['new_comment']; // Guarda el comentario mandada con el formulario en otra variable.
            $currentDateTime = new DateTime('now'); // Guarda el dia actual en otra variable.
            $currentDate = $currentDateTime->format('Ymd'); // Esta linea formatea la fecha para que se vea (yyyymmdd - 2023-10-23)
            $query = "INSERT INTO tComentarios(comentario, usuario_id, juego_id, fecha) VALUES ('".$comentario."',NULL,".$id.",".$currentDate.")"; // Este comando sirve para introducir los datos que tenemos en php dentro de la base de datos, lo guardamos en una variable
            mysqli_query($db, $query) or die('Error'); // Y le mandamos el comando SQL de la linea anterior.
            echo "<p>Nuevo comentario ";
            echo mysqli_insert_id($db); // MUESTRA QUE NÚMERO DE INSERCIÓN ES
            echo " añadido</p>";
            echo "<a href='/detail.php?id=".$id."'>Volver</a>";
            mysqli_close($db); // Cerramos la conexión entre PHP y la base de datos
        ?>
    </body>
</html>