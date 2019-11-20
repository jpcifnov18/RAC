<?php 
	session_start();
	
	if(!isset($_SESSION['Id_personal'])){
		if ($_SESSION['Id_personal']==0){
			header("Location: index.php");
			exit();
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Principal</title>
	<link rel="stylesheet" href = "css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href = "css/Principal.css">
	
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="Validacion_Contraseña.js"></script>


</head>
<body class="bg-gradient-primary">
	<div id="header">
		<ul class="nav">
			<li><a href="Cerrar.php">Cerrar Sesión</a></li>
		</ul><pre></pre>
			<p id="ima_login" align="right"><img src="./image/usuario.png" width="25" height="25">&nbsp <?php echo $_SESSION['s_suario'] ?>&nbsp&nbsp</p>
	</div><br><p></p>

	<div style="display: inline-flex;">
			<label id="label" align="left">Coatepeque, 
			<?php 
			$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
			$mes = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
			echo $dias[date('w')]." ".date('d')." de ".$mes[date('n')-1]." del ".date('Y');
			?></label>
	</div><br>

	<div  id="d_encabezado">
	<hr id="d_linea" noshade/>
		<center><h5>SISTEMA DE CONTROL - RAC</h5></center>
		
	<hr id="d_linea" noshade/>
	</div><br><br>
	
	<center>
	<div id="header2">
		<table class="tb">	
			<td width="225">
			
			<center><center><a href="Listado_Adoptante.php" id="referencia_ima"><img src="./image/user.png" width="95" height="100"><br>Adoptantes</a></td>
			</center>
			<td width="225">
			
			<center><center><a href="Listado_Usuarios.php" id="referencia_ima"><img src="./image/user.png" width="95" height="100"><br>Agregar Adoptante</a></td>
			</center>
			

		</table><br><br>
		
		<table>	
			<td width="225">
			<center><a href="Adoptante.php" id="referencia_ima"><img src="./image/pet.png"  width="90" height="100"><br> Mascotas</a></td>
			</center>
			<td width="225">
			<center><a href="Ver_citas.php" id="referencia_ima"><img src="./image/calendario.png"  width="90" height="100"><br>Agregar </a></td>
			</center>		

		</table>
		
	</div></center>
	
	<div id="info">
		<div id="cerrar"><a href="javascript:cerrar()"><img src="./image/cerrar.png" width="15" height="15"></a>
		</div>
		<center><img src="./image/uni.jpg" width="85" height="40">
		<p style="font-family: 'Trebuchet MS'"> Ingeniería en Sitemas Coatepeque
		<br> Noveno Semestre 2019</p></center>
	</div>
	<br><br><br><br>

	<footer>
			<center><div style="display: inline-flex;">
			<p id="footer_parrafo"> Copyright &copy; 2019 Root, Universidad Mariano Gálvez.</p> 
			</div>
			<div style="display: inline-flex; float: right;">
					<a id="a" href="javascript:abrir()"><img src="./image/informacion.png"  width="30" height="30" id="mostrar"></a>&nbsp &nbsp
			</div></center>

	</footer>

	<script type="text/javascript">
		function abrir(){
			document.getElementById("info").style.display="block";
		}
		function cerrar(){
			document.getElementById("info").style.display="none";
		}
	</script>

	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>