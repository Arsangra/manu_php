<?php

include("conexion.php");
$con=conectar();
//variable para almacenar lo traido desde name id
$id=$_GET['id'];
//sentencia para eliminar la fila completa con ese id de la tabla
$sql="DELETE FROM menú  WHERE id='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: index.php");
    }else{
        print_r("No se ha podido eliminar!");
    };
?>
