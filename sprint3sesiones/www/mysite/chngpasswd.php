<?php
	$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail'); // CONEXIÓN ENTRE PHP y la base de datos.
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    if (empty($pass1) || empty($pass2)) {die('No puede haber campos vacios');}
    if ($pass1 != $pass2 ) { die('Las contraseñas deben ser iguales'); }
    $new_pass = password_hash($pass1,PASSWORD_DEFAULT);
    session_start();
    if (!empty($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        die ('Debes tener la sesión iniciada para poder cambiar la contraseña');
    }
    $query = $db -> prepare("UPDATE tUsuarios SET contraseña=? where id=?;");
    $query -> bind_param("si",$new_pass,$user_id);
    $query -> execute();
    echo "<h1>CONTRASEÑA CAMBIADA</h1>";
    echo "<a href=/main.php>Volver al principio</a>";
    $query -> close();
    mysqli_close($db);
?>
