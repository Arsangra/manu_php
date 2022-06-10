<?php
include("conexion.php");
$con=conectar();
//creo variables para el envio de los datos recogidos por name en el formulario
$id=$_POST['id'];
$menu=$_POST['menu'];
$plato=$_POST['plato'];
$precio=$_POST['precio'];

//sentencia para insertar los datos enviados en la bbdd
$sql="INSERT INTO menú VALUES('$id','$menu','$plato','$precio')";
$query= mysqli_query($con,$sql);

//condicional que redirige al index
if($query){
    Header("Location: index.php");
    
}else {
    print_r("Se ha producido un error!");
};
?>