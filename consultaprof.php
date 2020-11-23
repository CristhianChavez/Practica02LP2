<?php
include_once "Profesor.php";
include_once "Programacion.php";
include_once "Leccion.php";
?>
    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
        Profesor:
        <select name="id_profesor">
            <?php

            $profesores = new Profesor();
            $resultados = $profesores->mostrarProfesores();
            foreach ($resultados as $profesor) {
                echo "<option value=" . $profesor["id"] . ">" . $profesor["nombre"] . "</option>";
            }
            ?>
        </select>
        <input type="submit" name="submit" value="Mostar informacion">
    </form>


<?php
if (isset($_POST["submit"])) {
    $id_profesor = $_POST["id_profesor"];
    echo "<table border='1'>" .
        "<tr>
              <th>Nombres</th>
              <th>Idioma</th>
              <th>Programacion</th>
         </tr>" .
        "<tr>";

    $datosProfesor = new Profesor();
    $resultados = $datosProfesor->mostrarProfesoresPorId($id_profesor);
    foreach ($resultados as $profesor) {
        echo "<td>" . $profesor["nombre"] . "</td>   
              <td>" . $profesor["idioma"] . "</td>
              <td>";

        $datosProgra = new Programacion();
        $leccion = new Leccion();
        $otroResultados = $datosProgra->mostrarProgramacionPorProfesor($id_profesor);
        foreach ($otroResultados as $programacion) {
            if ($leccion->revisarLibre($programacion["id"]) == true) {

                    echo "<p>" .
                        "<b>Inicio:</b>" . $programacion["inicio"] . "<br>" .
                        "<b>Tipo:</b>" . $programacion["tipo"] . "<br>" .
                        "<a href='programarLecc.php?id=". $programacion["id"] ."'>Programar Leccion<a/> |
                         <a href='eliminarProgramacion.php?id=". $programacion["id"] ."'>Eliminar Programacion</a>";
                        "</p>";
                }
        }
    }
    echo "</td>
            </tr>
         </table>";
}