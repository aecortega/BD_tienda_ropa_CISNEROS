<?php
session_start();

if(!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<html>
<head>
	<title>Agregar datos</title>
</head>

<body>
<?php
include_once("conexion.php");

if(isset($_POST['update'])) {	
	$id_producto = $_POST['id_producto'];
	$cantidad_en_estock = $_POST['cantidad_en_estock'];
	$tallas_disponibles = $_POST['tallas_disponibles'];
	$proveedor = $_POST['proveedor'];
	$precio_compra = $_POST['precio_compra'];
	$precio_venta = $_POST['precio_venta'];
	$n_producto = $_POST['n_producto'];
	$fecha_de_reposicion = $_POST['fecha_de_reposicion'];
	$id_usuario = $_SESSION['id_usuario']; // ID de usuario obtenido de la sesión

	if(empty($id_producto) || empty($cantidad_en_estock) || empty($tallas_disponibles) || empty($proveedor) || empty($precio_compra) || empty($precio_venta) || empty($n_producto) || empty($fecha_de_reposicion)) {
		echo "<font color='red'>Por favor, complete todos los campos.</font><br/>";
		echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
	} else { 
		$resultado = mysqli_query($mysqli, "INSERT INTO inventario (id_producto, cantidad_en_estock, tallas_disponibles, proveedor, precio_compra, precio_venta, n_producto, fecha_de_reposicion, id_usuario) VALUES ('$id_producto', '$cantidad_en_estock', '$tallas_disponibles', '$proveedor', '$precio_compra', '$precio_venta', '$n_producto', '$fecha_de_reposicion', '$id_usuario')");
		
		if($resultado){
			echo "<font color='green'>Datos añadidos con éxito.</font>";
			echo "<br/><a href='ver.php'>Ver resultados</a>";
		} else {
			echo "Error en la inserción: " . mysqli_error($mysqli);
		}
	}
}
?>
</body>
</html>
