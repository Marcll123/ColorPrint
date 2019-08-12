<?php
//Se incluye el archivo PHP de conexión con la base de datos
require_once '../helpers/connection.php';

//Se crea la clase Actions model que tiene las funciones para obtener los datos de la base de datos
class ActionsModel extends Connection
{
    //Función para realizar la consulta de los datos 
    public function consult($num)
    {
        $connection = parent::connect();
        try {
            $rowpaper = 5;
            $page = 1 + $num;
            $page = $page - 1;
            $p = $page * $rowpaper;
            $query = 'SELECT id_acciones, roles.roles, permisos.permisos FROM acciones INNER JOIN roles ON acciones.id_rol = roles.id_rol INNER JOIN permisos ON acciones.id_permiso = permisos.id_permiso limit ' . $p . ', ' . $rowpaper;
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al ingresar una Accion',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    //Función para obtener el número de datos 
    public function consultNum()
    {
        $connection = parent::connect();
        try {
            $query = 'SELECT count(id_acciones) as num FROM acciones';
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al obtener registros',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

     //Función para realizar la acción de crear un nuevo dato
    public function createActions($roles, $permissions)
    {
        $conexion = parent::connect();
        try {
            $query = 'INSERT INTO acciones(id_rol, id_permiso) VALUES (?,?)';
            $conexion->prepare($query)->execute(array($roles, $permissions));
            $array = [
                'message' => 'He insertado un registro',
                'type' => 'success',
                'specificMessage' => $conexion
            ];
            return json_encode($array);
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al ingresar un registro',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    //Función para actualizar los datos
    public function updateActions($roles, $permissions, $id)
    {
        $conexion = parent::connect();
        try {
            $query = 'UPDATE acciones SET id_rol=?, id_permiso=? WHERE id_acciones=?';
            $conexion->prepare($query)->execute(array($roles, $permissions, $id));
            $array = [
                'message' => 'He actualizado un registro',
                'type' => 'success',
                'specificMessage' => $conexion
            ];
            return json_encode($array);
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al actualizar un registro',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    //Función para eliminar los datos
    public function deleteActions($id)
    {
        $conexion = parent::connect();
        try {
            $query = 'DELETE FROM acciones WHERE id_acciones=?';
            $conexion->prepare($query)->execute(array($id));
            $array = [
                'message' => 'He borrado un registro',
                'type' => 'success',
                'specificMessage' => $conexion
            ];
            return json_encode($array);
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al borrar un registro',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }
}
