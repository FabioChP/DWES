<?php
	$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail');
?>
<html>
    <body>
        <p>prueba</p>
        <?php
            $id = $_POST['id'];
            $comentario = $_POST['new_comment'];
            $currentDateTime = new DateTime('now');
            $currentDate = $currentDateTime->format('Ymd');
            $query = "INSERT INTO tComentarios(comentario, usuario_id, juego_id, fecha) VALUES ('".$comentario."',NULL,".$id.",".$currentDate.")";
            mysqli_query($db, $query) or die('Error');
            echo "<p>Nuevo comentario ";
            echo mysqli_insert_id($db);
            echo " añadido</p>";
            echo "<a href='/detail.php?id=".$id."'>Volver</a>";
            mysqli_close($db);
        ?>
    </body>
</html>