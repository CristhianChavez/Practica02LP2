<?php

include_once "ConexionDB.php";
class Programacion
{
    private $inicio;
    private $tipo;
    private $id_profesor;

    
    public function mostrarProgramacion(){
        try {
            $db = new ConexionDB();
            $conn = $db->abrirConexion();

            $sql = "SELECT * FROM programacion";
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

    public function mostrarProgramacionPorId($id_programacion){
        try {
            $db = new ConexionDB();
            $conn = $db->abrirConexion();

            $sql = "SELECT * FROM programacion WHERE id=$id_programacion";
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

    public function mostrarProgramacionPorProfesor($id_profesor){
        try {
            $db = new ConexionDB();
            $conn = $db->abrirConexion();

            $sql = "SELECT * FROM programacion WHERE id_profesor=$id_profesor";
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

    public function eliminarProgramacion($id_programacion){
        try {
            $db = new ConexionDB();
            $conn = $db->abrirConexion();

            $sql = "DELETE FROM programacion WHERE id=$id_programacion";
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
}