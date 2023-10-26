<?php session_start(); ?>

<?php
if (!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<?php
// Incluyendo el archivo de conexión a la base de datos
include_once("conexion.php");

if (isset($_POST['update'])) {
	$id = $_POST['id_producto'];

	$cantidad_en_estock = $_POST['cantidad_en_estock'];
	$tallas_disponibles = $_POST['tallas_disponibles'];
	$proveedor = $_POST['proveedor'];
	$precio_compra = $_POST['precio_compra'];
	$precio_venta = $_POST['precio_venta'];
	$n_producto = $_POST['n_producto'];
	$fecha_de_reposicion = $_POST['fecha_de_reposicion'];

	// Verificar campos vacíos
	if (empty($cantidad_en_estock) || empty($tallas_disponibles) || empty($proveedor) || empty($precio_compra) || empty($precio_venta) || empty($n_producto) || empty($fecha_de_reposicion)) {
		if (empty($cantidad_en_estock)) {
			echo "<font color='red'>El campo de cantidad en stock está vacío.</font><br/>";
		}

		if (empty($tallas_disponibles)) {
			echo "<font color='red'>El campo de tallas disponibles está vacío.</font><br/>";
		}

		if (empty($proveedor)) {
			echo "<font color='red'>El campo de proveedor está vacío.</font><br/>";
		}

		if (empty($precio_compra)) {
			echo "<font color='red'>El campo de precio de compra está vacío.</font><br/>";
		}

		if (empty($precio_venta)) {
			echo "<font color='red'>El campo de precio de venta está vacío.</font><br/>";
		}

		if (empty($n_producto)) {
			echo "<font color='red'>El campo de nombre del producto está vacío.</font><br/>";
		}

		if (empty($fecha_de_reposicion)) {
			echo "<font color='red'>El campo de fecha de reposición está vacío.</font><br/>";
		}

	} else {
		// Actualizando la tabla
// Actualizando la tabla
		$resultado = mysqli_query($mysqli, "UPDATE inventario SET cantidad_en_estock='$cantidad_en_estock', tallas_disponibles='$tallas_disponibles', proveedor='$proveedor', precio_compra='$precio_compra', precio_venta='$precio_venta', n_producto='$n_producto', fecha_de_reposicion='$fecha_de_reposicion' WHERE id_producto='$id'");

		// Redireccionando a la página de visualización. En este caso, es ver.php
		header("Location: ver.php");
	}
}
?>

<?php
// Obtener el id del URL
$id = $_GET['id_producto'];

if ($id != '') {
	// Seleccionar los datos asociados con este id particular
	$resultado = mysqli_query($mysqli, "SELECT * FROM inventario WHERE id_producto=$id");

	while ($res = mysqli_fetch_array($resultado)) {
		$cantidad_en_estock = $res['cantidad_en_estock'];
		$tallas_disponibles = $res['tallas_disponibles'];
		$proveedor = $res['proveedor'];
		$precio_compra = $res['precio_compra'];
		$precio_venta = $res['precio_venta'];
		$n_producto = $res['n_producto'];
		$fecha_de_reposicion = $res['fecha_de_reposicion'];
	}
} else {
	echo "ID de producto no encontrado en la URL. Asegúrate de pasar el ID correctamente.";
}
?>


<html>

<head>
	<title>Editar Datos</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="ver.php">Ver Productos</a> | <a href="cerrar.php">Cerrar Sesión</a>
	<br /><br />

	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr>
				<td>Cantidad en Stock</td>
				<td><input type="text" name="cantidad_en_estock" value="<?php echo $cantidad_en_estock; ?>"></td>
			</tr>
			<tr>
				<td>Tallas Disponibles</td>
				<td><input type="text" name="tallas_disponibles" value="<?php echo $tallas_disponibles; ?>"></td>
			</tr>
			<tr>
				<td>Proveedor</td>
				<td><input type="text" name="proveedor" value="<?php echo $proveedor; ?>"></td>
			</tr>
			<tr>
				<td>Precio de Compra</td>
				<td><input type="text" name="precio_compra" value="<?php echo $precio_compra; ?>"></td>
			</tr>
			<tr>
				<td>Precio de Venta</td>
				<td><input type="text" name="precio_venta" value="<?php echo $precio_venta; ?>"></td>
			</tr>
			<tr>
				<td>Nombre de Producto</td>
				<td><input type="text" name="n_producto" value="<?php echo $n_producto; ?>"></td>
			</tr>
			<tr>
				<td>Fecha de Reposicion</td>
				<td><input type="date" name="fecha_de_reposicion" value="<?php echo $fecha_de_reposicion; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_producto" value=<?php echo $_GET['id_producto']; ?>></td>
				<td><input type="submit" name="update" value="Actualizar"></td>
			</tr>
		</table>
	</form>
</body>

</html>