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
		<table border= "1px solid black" text-align="center">
		<caption>Tabla tJuegos</caption>
			<tr>
				<th>Título</th>
				<th>Imágen</th>
				<th>Género</th>
				<th>Precio</th>
			</tr>
			<?php
				$query = 'SELECT * FROM tJuegos';
				$result = mysqli_query($db, $query) or die('Query error');
				while ($row = mysqli_fetch_array($result)) {
					echo '<tr>';
						echo '<td>';
							echo '<a href="/detail.php?id=';
								echo $row[0];
							echo '">';
								echo $row[1];
							echo '</a>';
						echo '</td>';
						echo '<td>';
							echo '<img src="';
							echo $row[2];
							echo '"></img>';
						echo '</td>';
						echo '<td>';
							echo $row[3];
						echo '</td>';
						echo '<td>';
							echo $row[4];
						echo '€</td>';
					echo '</tr>';
				}
				mysqli_close($db);
			?>
		</table>
	</body>
</html>
