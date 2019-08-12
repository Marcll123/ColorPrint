<?php
//Se incluye el archivo PHP de conexión con la base de datos
require_once '../helpers/connection.php';

//Se crea la clase  Purchased model que tiene las funciones para obtener los datos de la base de datos
class PurchasedModel extends Connection
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
            $query = 'SELECT detallecompra.id_detallecom, produto.nombre_produc, detallecompra.cantidad, detallecompra.descripcion,  detallecompra.precio_uni , detallecompra.total_exeno, detallecompra.total_grabado, compra.num_compra FROM detallecompra INNER JOIN produto ON detallecompra.id_producto = produto.id_producto INNER JOIN compra ON detallecompra.id_compra = compra.id_compra limit ' . $p . ', ' . $rowpaper;
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al ingresar el detalle de lacompra',
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
            $query = 'SELECT count(detallecompra.id_detallecom) as num FROM detallecompra';
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
    public function createPurchased($product, $quantity, $description, $priceu, $totale, $totalt, $purchase)
    {
        $conexion = parent::connect();
        try {
            $query = 'INSERT INTO detallecompra(id_producto, cantidad, descripcion, precio_uni, total_exeno, total_grabado, id_compra) VALUES (?,?,?,?,?,?,?)';
            $conexion->prepare($query)->execute(array($product, $quantity, $description, $priceu, $totale, $totalt, $purchase));
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
    public function updatePurchased($product, $quantity, $description, $priceu, $totale, $totalt, $purchase, $id)
    {
        $conexion = parent::connect();
        try {
            $query = 'UPDATE detallecompra SET id_producto=?, cantidad=?, descripcion=?, precio_uni=?, total_exeno=?, total_grabado=?, 	id_compra=? WHERE id_detallecom=?';
            $conexion->prepare($query)->execute(array($product, $quantity, $description, $priceu, $totale, $totalt, $purchase, $id));
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
    public function deletePurchased($id)
    {
        $conexion = parent::connect();
        try {
            $query = 'DELETE FROM detallecompra WHERE id_detallecom=?';
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
