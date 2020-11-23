<?php

include_once "ConexionDB.php";
class Leccion
{
    private $numero;
    private $status;
    private $comentario_profesor;
    private $comentario_estudiante;
    private $id_programacion;
    private $id_estudiante;



    public function mostrarLecciones(){
        try {
            $db = new ConexionDB();
            $conn = $db->abrirConexion();

            $sql = "SELECT * FROM leccion";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $result = $respuesta->fetchAll();

            $db->cerrarConexion();
            return $result;
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function mostrarLeccionesPorIdProfesor($id_profesor){
        try {
            $db = new ConexionDB();
            $conn = $db->abrirConexion();

            $sql = "SELECT * FROM leccion INNER JOIN programacion ON leccion.id_programcion = programacion.id WHERE programacion.id_profesor = $id_profesor";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $result = $respuesta->fetchAll();

            $db->cerrarConexion();
            return $result;
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function guardarLeccion($id_programacion){
        try {
            $db = new ConexionDB();
            $conn = $db->abrirConexion();

            $sql = "INSERT INTO leccion(status, id_programacion) VALUES('programado', $id_programacion)";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $result = $respuesta->RowCount();

            $db->cerrarConexion();
            return $result;
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function revisarLibre($id_programacion){
        try {
            $db = new ConexionDB();
            $conn = $db->abrirConexion();

            $sql = "SELECT * FROM leccion WHERE id_programacion=$id_programacion";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $result = $respuesta->fetchAll();

            $db->cerrarConexion();

            if(count($result)==0){
                return true;
            }else{
                return false;
            }
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }
}