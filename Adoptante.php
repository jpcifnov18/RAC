<?php 
session_start();
  
  if(!isset($_SESSION['Id_personal'])){
    if ($_SESSION['Id_personal']==0){
      header("Location: index.php");
      exit();
    }
  }else{
        if ($_SESSION['Id_cargo']==2 || $_SESSION['Id_cargo']==4 ){
            header("Location: Principal2.php");
            exit();
        }
    }


  $v_msn=''; 
  $v_nombre='';
  $v_apellido='';
  $v_Cui='';
  $v_Profesion='';
  $v_Empresa='';
  $v_fecha='';
  $v_sexo='';
  $v_estado='';
  $v_correo='';

?>

<?php
if(isset($_POST['submit'])){
require("BaseDatos.php");
$B_nombres = strtoupper($_POST['Nombre']);
$B_apellidos = strtoupper($_POST['Apellido']);
$B_Cui = $_POST['DPI'];
$B_Profesion = $_POST['Profesion'];
$B_empresa = $_POST['Empresa'];
$B_fecha=date('Y/m/d');
$B_sexo= $_POST['Sexo'];
$B_estado= $_POST['Estado'];
$B_correo= $_POST['Correo'];


$sql = mysqli_query($Conexion, "SELECT * FROM tbl_adoptante WHERE DPI='$B_Cui'");

if($resultado = mysqli_fetch_assoc($sql)){
  $v_msn = 'El usuario ya se encuentra ingresado'; 
  $v_nombre= $B_nombres;
  $v_apellido= $B_apellidos;
  $v_Cui= $B_Cui;
  $v_Profesion= $B_Profesion;
  $v_Empresa= $B_empresa;
  $v_fecha= $B_fecha;
  $v_sexo= $B_sexo;
  $v_estado=$B_estado;
  $v_correo=$B_correo;


}else{
  
  $sql ="INSERT INTO tbl_adoptante(Nombre,Apellido,DPI,Profesion,Empresa,Fecha,Sexo,Estado,Correo)VALUES('$B_nombres','$B_apellidos','$B_Cui','$B_Profesion','$B_empresa','$B_fecha','$B_sexo','$B_estado','$B_correo')";
  $resultado = $Conexion->query($sql);    
        
     echo "<script>alert('Usuario registrado')</script>";
     echo "<script>location.href='Principal2.php'</script>";

      
}
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <title>Principal</title>
  <link rel="stylesheet" href = "css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href = "css/Principal.css">
  
  <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="Validacion_Contraseña.js"></script>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Proyecto RAC</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="Principal2.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Proyecto RAC <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Opciones
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Adoptante</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Generalidades:</h6>
            <a class="collapse-item" href="Adoptante.php">Agregar</a>
            <a class="collapse-item" href="listar.php">Ver</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Mascota</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Opciones:</h6>
            <a class="collapse-item" href="utilities-color.html">Agregar</a>
            <a class="collapse-item" href="utilities-border.html">Ver</a>
            <a class="collapse-item" href="Raza.php">Agregar Raza</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>



        

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">&nbsp <?php echo $_SESSION['s_suario'] ?>&nbsp&nbsp</span>
                <img class="img-profile rounded-circle" <img src="./image/usuario.png" width="25" height="25"">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="Cerrar.php" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        
        <!-- /.container-fluid todo formulario aqui -->
  <div class="container-fluid">
  <form id="contact" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"  autocomplete="off">
  <center><h3>Ingreso de Adoptantes</h3>
    <h4>Debe Ingresar todos los datos necesarios</h4></center>

    <fieldset>
    
    <input type="text" name="Nombre" placeholder="Nombre" class="form-control form-control-user" value="<?php echo $v_nombre ?>" tabindex="1" required autofocus>
    </fieldset>

    <p>
    <fieldset>
    <input type="text" name="Apellido" placeholder="Apellidos" class="form-control form-control-user" value="<?php echo $v_apellido ?>" tabindex="2" required>
    </fieldset>
  </p>
  <p>
    <fieldset>
        <input type="number" name="DPI" placeholder="CUI(Numero de DPI)"  class="form-control form-control-user" value="<?php echo $v_Cui ?>" tabindex="3" required>
      </fieldset>
  </p>
      
      <p>
      <fieldset>
    <input type="text" name="Profesion" placeholder="Profesion" class="form-control form-control-user" value="<?php echo $v_Profesion ?>"  tabindex="4" >
    </fieldset>

      </p>
    
     <fieldset>
    <input type="text" name="Empresa" placeholder="Empresa"class="form-control form-control-user" value="<?php echo $v_Empresa ?>"  tabindex="5" required >
    </fieldset>
        <fieldset>
        <p>Fecha de Nacimiento
        <input name="Fecha" placeholder="Fecha" class="form-control form-control-user" type="date" tabindex= ¨6¨ required></p>
        </fieldset><fieldset>
    <p>Sexo.
    <select name="Sexo" class="form-control form-control-user" tabindex="7">
      <OPTION><?php echo $v_sexo ?></OPTION>
      <option>MASCULINO</option>
      <option>FEMENINO</option>
      <option>OTRO..</option>
    </select></p>    


    <p>Estado
    <select name="Estado" class="form-control form-control-user" required tabindex="8" required>
      <OPTION><?php echo $v_estado ?></OPTION>
      <option>SOLTERO</option>
      <option>CASADO</option>
    </select></p>
    
    <p>
      <fieldset>
    <input type="email" name="Correo" placeholder="Correo"class="form-control form-control-user" value="<?php echo $v_correo?>"  tabindex="9" required >
    </fieldset>
    </p>
      

    <button name="submit" class= "btn btn-success" type="submit" id="contact-submit" data-submit="...Sending">Ingresar</button>
  </form>

</div> 

         
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; UMG 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Desea cerrar sesión.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="Cerrar.php">Cerrar Sesión</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
