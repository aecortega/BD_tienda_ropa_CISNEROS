<html>
<head>
	<title>Registro</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['submit'])) {
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];

	if($usuario == "" || $contrasena == "" || $nombre == "" || $correo == "") {
		echo "Todos los campos deben estar llenos. Uno o más campos están vacíos.";
		echo "<br/>";
		echo "<a href='registro.php'>Volver</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO usuarios(nombre, correo, usuario, contrasena) VALUES('$nombre', '$correo', '$usuario', md5('$contrasena'))")
			or die("No se pudo ejecutar la consulta de inserción.");
			
		echo "Registro exitoso";
		echo "<br/>";
		echo "<a href='iniciar.php'>Iniciar sesión</a>";
	}
} else {
?>
	<p><font size="+2">Registro</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Nombre completo</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr> 
				<td>Correo electrónico</td>
				<td><input type="text" name="correo"></td>
			</tr>			
			<tr> 
				<td>Usuario</td>
				<td><input type="text" name="usuario"></td>
			</tr>
			<tr> 
				<td>Contraseña</td>
				<td><input type="password" name="contrasena"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Enviar"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
