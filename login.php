<?php
require 'BaseDatos.php'; 
	session_start();
	if(isset($_SESSION['Id_personal'])){
		if ($_SESSION['Id_personal']!=0){
			echo $_SESSION['Id_cargo'];
			header("Location: Principal2.php");
			exit();
		}
} 
$msn = '';
?>


<?php
if(isset($_POST['submit'])){
	require("BaseDatos.php");

	$v_usuario = $_POST['Usuario'];
	$v_cotraseña = $_POST['Contrasena'];	
	$_SESSION['Id_personal'] = 0;
	$_SESSION['Id_cargo'] = 0;
	$_SESSION['s_suario'] = '';

	$sql = mysqli_query($Conexion, "SELECT * FROM tbl_personal WHERE usuario='$v_usuario' and id_estado ='1'");

	if($resultado = mysqli_fetch_assoc($sql)){
		if($v_cotraseña==$resultado['contrasena']){
			if($resultado['id_cargo']!= 4){
			$_SESSION['Id_personal']=$resultado['id_personal'];
			$_SESSION['s_suario']=strtoupper($resultado['usuario']);
			$_SESSION['Id_cargo']=$resultado['id_cargo'];
			echo "<script>location.href='Principal2.php'</script>";
			}else{
			$msn = 'Requiere permiso!';
			}
		}else{
			$msn = 'Contraseña incorrecta!';	
		}
	}else{
			$msn = 'El usuario no existe!';	
	}
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

<br><br><br><br>
	<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-10 col-lg-12 col-md-9">
			<div class="card o-hidden border-0 shadow-lg my-5">
			<div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido Proyecto RAC</h1>
                  </div>
			</div>
		
	
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  autocomplete="off">
				 
				<div class="form-group">
                      <input type="text" name="Usuario" class="form-control form-control-user" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                    <input type="password"  name="Contrasena" class="form-control form-control-user" placeholder="Contraseña">
                    </div>

				
	
	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
	<input name="submit" class= "btn btn-success" type="submit" value="Entrar">
	<p></p><center><b><p style="color: #313d5b; font-size: 16px;" ><?php echo $msn; ?></p></center>
	</form>
	</div>
	</div>
</div>

 <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>
</html>

