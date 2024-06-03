<?php
include('db.php');
$correo=$_POST['txtCorreo'];
$contraseña=$_POST['txtContrasena'];
session_start();
$_SESSION['txtCorreo']=$correo;


$conexion=mysqli_connect("localhost","root","","aurora hotel");

$consulta="SELECT*FROM usuario where correo='$correo' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    header("location:gestion_empleado.html");

}else{
    ?>
    <?php
    include("LoginPage.php");

  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);