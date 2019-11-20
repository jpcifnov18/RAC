<?php 
require("usu_val.php")
?>

<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>

        <link rel="stylesheet" href = "css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href = "css/Principal.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"> 

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">

</head>
<body style= "background-color: #313d5b">
    <div id="header">
        <ul class="nav">
            <li><a href="Principal.php">Principal</a></li>
            <li><a href="Cerrar.php">Cerrar Sesión</a></li>
        </ul><pre></pre>
            <p id="ima_login" align="center"><img src="./image/usuario.png" width="25" height="25">&nbsp <?php echo $_SESSION['s_suario'] ?>&nbsp&nbsp</p>
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
    </div><br>
    
<div class="container" style="width: 900px;">
    <div class="alinear">
    <form action="usuario.php" >
    
     <label style="color: white; font-size:18px">Listado de Adoptantes</label>
    </form>
    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 

    <center>
    <form action="Buscar_usuarios.php" method="get" class="form_search">
         
    
<input type="text" name="caja_busqueda" id="caja_busqueda" placeholder="Buscar" utofocus>
    <p></p>
    </div>
 <ul class="nav">
            <li><a href="Adoptante.php">Agregar Adoptante</a></li>
 </ul><pre></pre>
    <table class='tabla_datos'>
                <thead>
                    <tr id='titulo'>
                        <td style='width:70px'>ID</td>
                        <td style='width:300px'>Nombre</td>
                        <td style='width:100px'>Vivenda</td>
                        <td style='width:90px'>Familia</td>
                        
                    </tr>
                </thead>

    <?php
    require("BaseDatos.php");

    $sql = mysqli_query($Conexion, "SELECT count(*) as total_registros FROM tbl_adoptante");
    $result_registro=mysqli_fetch_array($sql);
    $total_registro = $result_registro['total_registros'];

    $por_pagin=30;

    if(empty($_GET['pagina'])){
        $pagina=1;
    }else{
        $pagina=$_GET['pagina'];
    }

    $desde = ($pagina-1) * $por_pagin;
    $total_pagina = ceil($total_registro / $por_pagin);

    $query =  "SELECT * FROM tbl_adoptante WHERE id_adoptante IS NOT NULL ORDER BY id_adoptante ASC LIMIT $desde, $por_pagin";

    $resultado = $Conexion->query($query);

    if ($resultado->num_rows>0) {
        while ($fila = $resultado->fetch_assoc()) {
     ?>
                <tr>
                        <td><?php echo $fila['id_adoptante'];?></td>
                        <td><?php echo $fila['Apellido'].', '.$fila['Nombre']; ?> </td>
                        <td>
                            <center>
                            <a href="evolucion.php?id=<?php echo $fila['id_adoptante']; ?>">
                            <img src="./image/estetoscopio.png" width="30" height="30"><br>
                            </a>
                            </center>
                        </td>
                        <td>
                            <center>
                            <a href="terapiaB.php?id=<?php echo $fila['id_adoptante'];?>">
                            <img src="./image/camilla/0  grados.png" width="30" height="30"><br>
                            </a>
                            </center>
                        </td>
                       
                    </tr>
					
    <?php } } ?>
    </table>

<?php if($total_registro>30){
?>
    <div class="Paginador">
        <ul>
        <?php  
            if($pagina !=1){
        ?>
            <li ><a href="?pagina=<?php echo 1; ?>">|<</a></li>
            <li><a href="?pagina=<?php echo $pagina-1; ?>"><-</a></li>
            <?php  

            }
            for($i=1; $i <= $total_pagina; $i++){
                if($i==$pagina){
                    echo  '<li class="pageSelected">'.$i.'</a></li>';       
                }else{
                    echo  '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
                }
            }
            if($pagina != $total_pagina){
            ?>
            <li><a href="?pagina=<?php echo $pagina+1; ?>">-></a></li>
            <li><a href="?pagina=<?php echo $total_pagina; ?>">>|</a></li>
            <?php  
            }
            ?>
        </ul>
    </div>
<?php } ?>
    </center>

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</form>
</div>
    <br>
</body>
</html>
