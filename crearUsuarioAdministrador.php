<?php session_start(); ?>
<?php $con = mysqli_connect("localhost", "root", "admin", "usuarios") or die("Error al conectar a la base de datos!"); ?>

<?php 

if(isset($_POST["submit"])){
	$cedula = $_POST["cedula"];
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$telefono = $_POST["telefono"];
	$celular = $_POST["celular"];
	$fax = $_POST["fax"];
	$masInfo = $_POST["masInfo"];
	$esAdmin = $_POST["esAdmin"];

	$sql63 = "INSERT INTO users(nombre, apellido, password, correo, cedula, telefono, celular, fax, mas, admin) VALUES('$nombre', '$apellido', '$password', '$email', '$cedula', '$telefono', '$celular', '$fax', '$masInfo', '$esAdmin')";
	$query63 = mysqli_query($con, $sql63) or die(mysqli_error($con));

	if($query63){					
		header("Location:admin.php");			

	}else{
		echo "<script>alert('Error al agregar el usuario!')</script>";
	}
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php require 'includes/head_meta.php'; ?>
</head>
<body>
	<?php require 'includes/header_admin.php'; ?>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ol class="breadcrumb">
					<div class="container">
						<a class="breadcrumb-item" href="admin.php">Modo Admin</a>
						<span class="breadcrumb-item active">Crear usuario administrador</span>
					</div>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">				
				<div class="usuarioEstandar">
					<h5>Usuario administrador</h5>
					<hr>
					<form action="crearUsuarioAdministrador.php" method="POST">
						<label>Cedula</label>
						<input type="text" class="form-control" name="cedula" id="cedula" placeholder="Cedula">
						<br>
						<label>Nombre</label>
						<input type="text" class="form-control" name="nombre" placeholder="Nombre">
						<br>
						<label>Apellido</label>
						<input type="text" class="form-control" name="apellido" placeholder="Apellido">
						<br>
						<label>Email</label>
						<input type="text" class="form-control" name="email" placeholder="Email">
						<br>
						<label>Contrase??a</label>
						<input type="password" class="form-control" name="password" placeholder="Contrase??a">
						<br>
						<label>Telefono</label>
						<input type="text" class="form-control" name="telefono" placeholder="Telefono">
						<br>
						<label>Celular</label>
						<input type="text" class="form-control" name="celular" placeholder="Celular">
						<br>
						<label>Fax</label>
						<input type="text" class="form-control" name="fax" placeholder="Fax">
						<br>
						<label>Mas Informacion</label>
						<input type="text" class="form-control" name="masInfo" placeholder="Mas Informacion">
						<select name="esAdmin" id="esAdmin" hidden="true">
							<option value="si" selected="">si</option>
						</select>
						<br>
						<div class="float-xs-right">
							<a href="admin.php" class="btn">Volver</a>
							<button class="btn" type="submit" name="submit">Registrar usuario administrador</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br>
	<?php require 'includes/footer.php'; ?>
</body>
</html>