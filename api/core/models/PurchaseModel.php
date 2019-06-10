<?php

//Se manda a llamar la coneccion con la base de datos 
require_once '../helpers/Connection.php';

class PurchaseModel extends Connection
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
            $query = 'SELECT * FROM compra  limit ' . $p . ', ' . $rowpaper;
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al ingresar una compra',
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
            $query = 'SELECT count(*) as num FROM compra';
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
    public function createShop($numberdocu, $supplier, $address, $celler,  $typedoc, $seriescost, $typepurchase, $shape, $idoriginpucharse, $numregi, $purchasenum, $dai, $excludeddoc)
    {
        $conexion = parent::connect();
        try {
            $query = 'INSERT INTO compra(numerodocumento, id_proveedor, direccion, 	bodega, id_tipodoc, serie_costo, id_tipocompra, id_forma, id_origencom, num_registro, num_compra, dai, doc_excluidos) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $conexion->prepare($query)->execute(array($numberdocu, $supplier, $address, $celler,  $typedoc, $seriescost, $typepurchase, $shape, $idoriginpucharse, $numregi, $purchasenum, $dai, $excludeddoc));
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
    public function updateShop($numberdocu, $supplier, $address, $celler,  $typedoc, $seriescost, $typepurchase, $shape, $idoriginpucharse, $numregi, $purchasenum, $dai, $excludeddoc, $id)
    {
        $conexion = parent::connect();
        try {
            $query = 'UPDATE compra SET numerodocumento=?, id_proveedor=?, direccion=?, bodega=?, id_tipodoc=?, serie_costo=?, id_tipocompra=?,  id_forma=?, id_origencom=?, num_registro=?, num_compra=?, dai=?, doc_excluidos=? WHERE id_compra=?';
            $conexion->prepare($query)->execute(array($numberdocu, $supplier, $address, $celler,  $typedoc, $seriescost, $typepurchase, $shape, $idoriginpucharse, $numregi, $purchasenum, $dai, $excludeddoc, $id));
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
    public function deleteShop($id)
    {
        $conexion = parent::connect();
        try {
            $query = 'DELETE FROM compra WHERE id_compra=?';
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
