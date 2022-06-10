<?php

include("conexion.php");
$con=conectar();
//nos traemos los name y los guardamos en variables para darles uso
$id=$_POST['id'];
$menu=$_POST['menu'];
$plato=$_POST['plato'];
$precio=$_POST['precio'];

//generamos una sentencia para actualizar los datos recogidos según lo que nos hemos traido
$sql="UPDATE menú SET  menu='$menu',plato='$plato',precio='$precio' WHERE id='$id'";

$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }else{
        print_r("No se ha podido guardar!");
    };
?>