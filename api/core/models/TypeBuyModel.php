<?php
//Se manda a llamar la coneccion con la base de datos
require_once '../helpers/connection.php';

class TypeBuyModel extends Connection
{
    // se hace la consulta para obtener los datos de la tabla que se quiere
    public function consult($num)
    {
        $connection = parent::connect();
        try {
            $rowpaper = 5;
            $page = 1 + $num;
            $page = $page - 1;
            $p = $page * $rowpaper;
            $query = 'SELECT id_tipocompra, tipo_compra FROM id_tipocompra limit ' . $p . ', ' . $rowpaper;
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al ingresar el tipo de compra',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }
    //se hace la paginacion de los datos
    public function consultNum()
    {
        $connection = parent::connect();
        try {
            $query = 'SELECT count(id_tipocompra) as num FROM id_tipocompra';
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
    //se hace el INSERT con los campos que se quieren ingresar a la datos de base
    public function createTypeBuy($typebuy)
    {
        $conexion = parent::connect();
        try {
            $query = 'INSERT INTO id_tipocompra(tipo_compra) VALUES (?)';
            $conexion->prepare($query)->execute(array($typebuy));
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
    //se crea el Update  para actualizar datos
    public function updatTypeBuy($typebuy, $id)
    {
        $conexion = parent::connect();
        try {
            $query = 'UPDATE id_tipocompra SET tipo_compra=? WHERE id_tipocompra=?';
            $conexion->prepare($query)->execute(array($typebuy, $id));
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
    //se hace el Delete y se el pone el id con el que va a usar para reconocer y borrar el dato
    public function deletTypeBuy($id)
    {
        $conexion = parent::connect();
        try {
            $query = 'DELETE FROM id_tipocompra WHERE id_tipocompra=?';
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
