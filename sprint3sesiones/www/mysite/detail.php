<?php
	$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail'); // CONEXIÓN ENTRE PHP y la base de datos.
?>
<html>
    <head>
		<style> /* HOJA DE ESTILOS INTERNA */
			th {
				background-color: lightgreen;
			}
			td {
				text-align: center;
			}
			table {
				width: 40%;
				text-align: center;
                border-collapse: collapse;
			}
			img {
				width: 250px;
			}
            span {
                font-size: 0.7rem;
                color: grey;
            }
		</style>
	</head>
    <body>
        <table border= "2px solid black">
            <tr>
				<th>Título</th>
				<th>Imágen</th>
				<th>Género</th>
				<th>Precio</th>
			</tr>
        <?php
            if (!isset($_GET['id'])) {  //Detecta si hay alguna id en la barra del buscador y si no devuelve el error
                die('No se ha especificado un juego');
            }
            $id = $_GET['id']; //Guarda la id de la barra del buscador en una variable 
            $query = 'SELECT * FROM tJuegos WHERE id='.$id; // Creamos la petición "query" que le vamos a hacer a mariadb en SQL y lo guardamos en una variable.
            $result = mysqli_query($db, $query) or die('Query error'); // Realizamos la petición y guardamos lo que devuelve en una variable.
            $row = mysqli_fetch_array($result); // Guardamos lo que devolvio la petición en un array.
            echo '<tr>';
                echo '<td>'.$row[1].'</td>'; //MOTRAMOS TODO EN UNA TABLA
                echo '<td><img src="'.$row[2].'"></img></td>';
                echo '<td>'.$row[3].'</td>';
                echo '<td>'.$row[4].'€</td>';
            echo '</tr>';
        ?>
        </table>
        <h3>Comentarios:</h3>
        <ul>
            <?php
                $query2 = 'SELECT * FROM tComentarios WHERE juego_id='.$id; // Creamos la petición "query" que le vamos a hacer a mariadb en SQL y lo guardamos en otra variable.
                $result2 = mysqli_query($db, $query2) or die('Query error'); // Realizamos la petición y guardamos lo que devuelve en otra variable.
                while ($row = mysqli_fetch_array($result2)) { //Este bucle lee todo lo que devuelve la peticion y lo muestra como lista
                    echo '<li>'.$row[1].'   <span>('.$row['fecha'].')</span></li>';
                }
                mysqli_close($db); // Cerramos la conexión entre PHP y la base de datos
            ?>
        </ul>
        <p>Deja un nuevo comentario:</p>
        <form action="/comment.php" method="post">
            <textarea rows="4" cols="50" name="new_comment"></textarea><br>
            <input type="hidden" name="id" value="<?php echo $id;/* Esto manda la id del juego junto al formulario, para saber a que juego asociarlo en comment.php */ ?>">
            <input type="submit" value="Comentar">
        </form>
    </body>
</html>