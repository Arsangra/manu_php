<?php
include("templates/header.php");
include("conexion.php");
//funcion conectar la introduzco en una constante
$con = conectar();
//consulta a la base de datos y guardada en variable sql
$sql = "SELECT *  FROM menú";
//Me traigo la funcion conectar y la consulta a la variable
$query = mysqli_query($con, $sql);
//variable vacia declarada para que el cliente pueda ver en que consiste cada tipo de menú, que rellenamos en el condicional del menu
$invertirMenu = "";
?>
<!--visualización de las opciones en página principal-->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <h1>Ingrese datos</h1><br>
            <form action="insertar.php" method="POST"> 
                <!--damos el nombre del valor que enviaremos a la bbdd-->            
                <select name="menu" placeholder="Menú" required="true">
                        <option value="">Selecciona menú</option>
                        <option value="1">Especialidades de la casa</option>
                        <option value="2">Las clásicas</option>
                        <option value="3">Las más picantes</option>
                        <option value="4">Para los más gourmets</option>
                        <option value="5">Familiares</option>
                        <option value="6">Aperitivos</option>
                    </select><br><br>
                <input type="text" class="form-control mb-3" name="plato" placeholder="Plato" required="true">
                <input type="text" class="form-control mb-3" name="precio" placeholder="Precio" required="true">
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
        <!--creamos la tabla de la visualización de los datos introducidos en la bbdd-->
        <div class="col-md-8">
            <table class="table">
                <thead class="table-success table-striped">
                    <tr>
                        <th>Menú</th>
                        <th>Plato</th>
                        <th>Precio</th>
                        <th></th>
                        <th></th>
                        <th></th>                        
                    </tr>
                </thead>

                <tbody>
                    <?php
                    //bucle whilw para iterar sobre el resultado optenido de la consulta realizada
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <tr>   
                             <!--transformamos la variabble creada vacia, la rellenamos segun el valor recibido de la bbdd-->                    
                            <th><?php //condicional para adjudicar números a los diferentes menús
                                if ($row['menu'] == 1) {
                                    $invertirMenu = "Especialidad de la casa";
                                } elseif ($row['menu'] == 2) {
                                    $invertirMenu = "Las clásicas";
                                } elseif ($row['menu'] == 3) {
                                    $invertirMenu = "Las más picantes";
                                } elseif ($row['menu'] == 4) {
                                    $invertirMenu = "Para los más gourmets";
                                } elseif ($row['menu'] == 5) {
                                    $invertirMenu = "Familiares";
                                } elseif ($row['menu'] == 6) {
                                    $invertirMenu = "Aperitivos";
                                }
                                //imprimimos el nombre del menú en vez del número
                                echo $invertirMenu;
                                ?></th>
                            <th><?php echo $row['plato'] ?></th>
                            <th><?php echo $row['precio'] ." €" ?></th>
                            <th><a href="actualizar.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a></th>
                            <th><a href="eliminar.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a></th>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
include("templates/footer.php");
