<?php

include('../sitio/scripts_php/conexion_bd.php');

$con = new ConexionBD();
$conexion = $con->getConexion();

$parametro = $_POST['parametro'];

$sql="SELECT * FROM alumnos2 WHERE Num_control LIKE '%$parametro%' or Nombre_Alumno LIKE '%$parametro%' or Primer_Ap_Alumno LIKE '%$parametro%' or Segundo_Ap_Alumno LIKE '%$parametro%' or Edad LIKE '%$parametro%' or Semestre LIKE '%$parametro%' or Carrera LIKE '%$parametro%'";

$res = mysqli_query($conexion, $sql);

//var_dump($resultado);
if(mysqli_num_rows($res)>0){
    //mysqli_fetch_row
    require_once('../vista/formulario_consultas.php');
    ?>
    <table id="customers">
      <tr> <th>Num. Control</th> 
           <th>Nombre</th> 
           <th>Primer Ap.</th> 
           <th>Segundo Ap.</th>
           <th>Edad</th> 
           <th>Semestre</th> 
           <th>Carrera</th> 
        </tr>

    <?php
    
    while($fila=mysqli_fetch_assoc($res)){
        printf("<tr><td>".$fila['Num_Control']."</td>".
                "<td>".$fila['Nombre_Alumno']."</td>".
                "<td>".$fila['Primer_Ap_Alumno']."</td>".
                "<td>".$fila['Segundo_Ap_Alumno']."</td>".
                "<td>".$fila['Edad']."</td>".
                "<td>".$fila['Semestre']."</td>".
                "<td>".$fila['Carrera']."</td>"     
        );
    }
}else{
    echo ('No hay datos');
}

?>