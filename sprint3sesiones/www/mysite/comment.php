<?php
    $db = mysqli_connect('172.16.0.2', 'root', '1234', 'mysitedb') or die('Fail'); // CONEXIÓN ENTRE PHP y la base de datos.
?>
<html>
    <body>
        <?php
            $id = $_POST['id']; // Guarda la id mandada con el formulario en una variable .
            $comentario = $_POST['new_comment']; // Guarda el comentario mandada con el formulario en otra variable.
            session_start();
            $user_id;
            if (!empty($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
            }
            $currentDateTime = new DateTime('now'); // Guarda el dia actual en otra variable.
            $currentDate = $currentDateTime->format('Ymd'); // Esta linea formatea la fecha para que se vea (yyyymmdd - 2023-10-23)

            $query = $db -> prepare("INSERT INTO tComentarios(comentario, usuario_id, juego_id, fecha) VALUES (?,?,?,?)");
            $query -> bind_param("siis",$comentario,$user_id,$id,$currentDate);
            $query -> execute();

            echo "<p>Nuevo comentario ";
            echo mysqli_insert_id($db); // MUESTRA QUE NÚMERO DE INSERCIÓN ES
            echo " añadido</p>";
            echo "<a href='/detail.php?id=".$id."'>Volver</a>";
            $query -> close();
            mysqli_close($db); // Cerramos la conexión entre PHP y la base de datos
        ?>
    </body>
</html>
