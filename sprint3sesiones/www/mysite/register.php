<?php
	$db = mysqli_connect('172.16.0.2', 'root', '1234', 'mysitedb') or die('Fail'); // CONEXIÓN ENTRE PHP y la base de datos.
    $nombre = $_POST['name'];
    $apellidos = $_POST['surname'];
    $mail = $_POST['mail'];
    $passwd1 = $_POST['passwd1'];
    $passwd2 = $_POST['passwd2'];
    if (empty($nombre) || empty($apellidos) || empty($mail) || empty($passwd1) || empty($passwd2)) {die('Hay un campo vacio');}
    if ($passwd1 != $passwd2 ) { die('Contraseñas distintas'); }
    $password = password_hash($passwd1,PASSWORD_DEFAULT);
    $query2 = 'SELECT email FROM tUsuarios';
    $result2 = mysqli_query($db, $query2) or die('Query error'); 
    while ($row = mysqli_fetch_array($result2)) { 
        if ($mail == $row[0]) { die('El correo ya está registrado'); }
    }
    $query = $db -> prepare("INSERT INTO tUsuarios(nombre,apellidos,email,contraseña) VALUES (?,?,?,?)");
    $query -> bind_param("ssss",$nombre,$apellidos,$mail,$password);
    $query -> execute();
    echo "<h1>USUARIO REGISTRADO</h1>";
    echo "<a href=/main.php>Volver al principio</a>";
    $query -> close();
    mysqli_close($db);
?>
