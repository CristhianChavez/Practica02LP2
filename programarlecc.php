<?php
include_once "Estudiante.php";
include_once "Profesor.php";
include_once "Programacion.php";
include_once "Leccion.php";
?>
<form method="post" action="<?=$_SERVER["PHP_SELF"]?>">
    <input type="text" name="Numero" placeholder="Ingrese numero de leccion"><br>
    <select name="status">
            <option value="programado">Programado</option>
            <option value="cancelado">cancelado</option>
            <option value="terminado">Terminado</option>
        </select></BR>

    <input type="text" name="comentario_profesor" placeholder="Comentario Profesor"><br>
    <input type="text" name="comentario_estudiante" placeholder="Comentario estudiante"><br>


        Estudiante:
        <select name="id_estudiante">
            <?php

            $estudiante = new Estudiante();
            $resultados = $estudiante-> mostrarEstudiante();
            foreach ($resultados as $estudiante) {
                echo "<option value=" . $estudiante["id"] . ">" . $estudiante["nombre"] . "</option>";
            }
            ?>
        </select>

        Programacion:
        <select name="id_programacion">
            <?php

            $programacion = new Programacion();
            $resultados = $programacion->mostrarProgramacion();
            foreach ($resultados as $programacion) {
                echo "<option value=" . $programacion["id"] . ">" . $programacion["nombre"] . "</option>";
            }
            ?>
        </select></BR>
        <input type="submit" name="submit" value="Guardar informacion">
    
</form>
<?php
if (isset($_POST["submit"])) {
    $numero = $_POST["Numero"];
    $statuss = $_POST["status"];
    $comntario_profesor =$_POST["comentario_profesor"];
    $comentario_estudiantes = $_POST["comentario_estudiante"];
    $id_estudiante = $_POST["id_estudiante"];
    $id_programacion = $_POST["id_programacion"];

    $leccion = new Leccion();
    $filasAfectadas = $leccion->guardarLeccion($programacion_id);

    if ($filasAfectadas==0) {
        echo "Error";
    } else {
        header("location: consultaprof.php");
    }
}
?>