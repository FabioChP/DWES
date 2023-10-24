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
		<table border= "2px solid black" text-align="center">
		<caption>Tabla tJuegos</caption>
			<tr>
				<th>Título</th>
				<th>Imágen</th>
				<th>Género</th>
				<th>Precio</th>
			</tr>
			<?php
				$query = 'SELECT * FROM tJuegos'; // Creamos la petición "query" que le vamos a hacer a mariadb en SQL y lo guardamos en una variable.
				$result = mysqli_query($db, $query) or die('Query error'); // Realizamos la petición y guardamos lo que devuelve en una variable.
				while ($row = mysqli_fetch_array($result)) { // Este bucle va linea a linea del resultado y los muestra en una estructura de tabla.
					echo '<tr>';
						echo '<td><a href="/detail.php?id='.$row[0].'">'.$row[1].'</a></td>';
						echo '<td><img src="'.$row[2].'"></img></td>';
						echo '<td>'.$row[3].'</td>';
						echo '<td>'.$row[4].'€</td>';
					echo '</tr>';
				}
				mysqli_close($db); // Cerramos la conexión entre PHP y la base de datos
			?>
		</table>
	</body>
</html>
