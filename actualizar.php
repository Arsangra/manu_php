<?php
include("templates/header.php");
include("conexion.php");
$con = conectar();
//variable para traer el id y guardarlo
$id = $_GET['id'];
//variable vacia para darle valor según los datos recibidos de la fila seleccionada
$menu = "";
//sentencia para seleccionar la fila del id que pasamos por parámetros
$sql = "SELECT * FROM menú WHERE id='$id'";

$query = mysqli_query($con, $sql);

//recorremos los valores recogidos de la consulta para poder verlos en pantalla y poder actualizarlos

while ($row = mysqli_fetch_array($query)):
    if ($row['menu'] == "1") {
        $menu = "Especialidad de la casa";
    } elseif ($row['menu'] == "2") {
        $menu = "Las clásicas";
    } elseif ($row['menu'] == "3") {
        $menu = "Las más picantes";
    } elseif ($row['menu'] == "4") {
        $menu = "Para los más gourmets";
    } elseif ($row['menu'] == "5") {
        $menu = "Familiares";
    } elseif ($row['menu'] == "6") {
        $menu = "Aperitivos";
    }

?>
<!--visualizamos los datos del nuevo formulario para enviarlos-->
    <div class="container mt-5">
        <form action="editar.php" method="POST"> 
        <input type="hidden" name="id" value="<?=$row['id']  ?>">    
            <input type="hidden" name="menu" value="<?=$row['menu']  ?>">          
            <select name="menu" placeholder="Menú" required="true">
                        <option value="<?=$row['menu']  ?>"><?=$menu?></option>
                        <option value="1">Especialidades de la casa</option>
                        <option value="2">Las clásicas</option>
                        <option value="3">Las más picantes</option>
                        <option value="4">Para los más gourmets</option>
                        <option value="5">Familiares</option>
                        <option value="6">Aperitivos</option>
                    </select><br><br>        
            <input type="text" class="form-control mb-3" name="plato" placeholder="Plato" value="<?=$row['plato']  ?>">
            <input type="text" class="form-control mb-3" name="precio" placeholder="Precio" value="<?=$row['precio']  ?>">

            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
        </form>
    </div>
<?php
endwhile;
?>
    <?php
    include("templates/footer.php");
    ?>