<?php
	$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail');
?>
<html>
    <head>
		<style>
			th {
				background-color: lightgreen;
			}
			td {
				text-align: center;
			}
			table {
				width: 40%;
				text-align: center;
			}
			caption {
				font-size: 20pt;
				font-weight: bold;
			}
			img {
				width: 250px;
			}
		</style>
	</head>
    <body>
        <table border= "1px solid black">
            <tr>
				<th>Título</th>
				<th>Imágen</th>
				<th>Género</th>
				<th>Precio</th>
			</tr>
        <?php
            if (!isset($_GET['id'])) {
                die('No se ha especificado un juego');
            }
            $id = $_GET['id'];
            $query = 'SELECT * FROM tJuegos WHERE id='.$id;
            $result = mysqli_query($db, $query) or die('Query error');
            $row = mysqli_fetch_array($result);
            echo '<tr>';
                echo '<td><a href="/detail.php?id='.$row[0].'">'.$row[1].'</a></td>';
                echo '<td><img src="'.$row[2].'"></img></td>';
                echo '<td>'.$row[3].'</td>';
                echo '<td>'.$row[4].'€</td>';
            echo '</tr>';
        ?>
        </table>
        <h3>Comentarios:</h3>
        <ul>
            <?php
                $query2 = 'SELECT * FROM tComentarios WHERE juego_id='.$id;
                $result2 = mysqli_query($db, $query2) or die('Query error');
                while ($row = mysqli_fetch_array($result2)) {
                    echo '<li>'.$row[1].'</li>';
                }
                mysqli_close($db);
            ?>
        </ul>
        <p>Deja un nuevo comentario:</p>
        <form action="/comment.php" method="post">
            <textarea rows="4" cols="50" name="new_comment"></textarea><br>
            <input type="hidden" name="cancion_id" value="<?php echo $cancion_id; ?>">
            <input type="submit" value="Comentar">
        </form>
    </body>
</html>