<?php session_start(); ?>

<?php
if(!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<?php
include_once("conexion.php");

$resultado = mysqli_query($mysqli, "SELECT * FROM inventario WHERE id_usuario=".$_SESSION['id_usuario']." ORDER BY id_producto DESC");
?>

<html>
<head>
	<title>Página principal</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="agregar.html">Agregar nuevo dato</a> | <a href="cerrar.php">Cerrar sesión</a>
	<br/><br/>

	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Id producto</td>
			<td>Id cantidad en estock</td>
			<td>tallas disponibles</td>
			<td>proveedor</td>
			<td>precio de compra</td>
			<td>precio de venta</td>
			<td>nombre de producto</td>
			<td>fecha de reposicion</td>
			<td>Opciones</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($resultado)) {		
			echo "<tr>";
			echo "<td>".$res['id_producto']."</td>";
			echo "<td>".$res['cantidad_en_estock']."</td>";
			echo "<td>".$res['tallas_disponibles']."</td>";
			echo "<td>".$res['proveedor']."</td>";
			echo "<td>".$res['precio_compra']."</td>";
			echo "<td>".$res['precio_venta']."</td>";	
			echo "<td>".$res['n_producto']."</td>";
			echo "<td>".$res['fecha_de_reposicion']."</td>";
			echo "<td><a href=\"editar.php?id_producto=$res[id_producto]\">Editar</a> | <a href=\"eliminar.php?id=$res[id_producto]\" onClick=\"return confirm('¿Estás seguro de que quieres eliminar?')\">Eliminar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
