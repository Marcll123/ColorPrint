<?php
//Se incluye el archivo PHP de conexión con la base de datos
require_once '../helpers/connection.php';

//Se crea la clase SalesDetail model que tiene las funciones para obtener los datos de la base de datos
class SaleDetailModel extends Connection
{
    //Función para realizar la consulta de los datos 
    public function consult($id)
    {
        $connection = parent::connect();
        try {
            $query = "SELECT produto.nombre_produc, detalleventa.cantidad, detalleventa.v_nosujeta, detalleventa.v_exenta, detalleventa.descripcion, detalleventa.v_gravado, detalleventa.precio, detalleventa.subtotal, detalleventa.id_venta FROM detalleventa INNER JOIN produto ON produto.id_producto = detalleventa.id_producto WHERE  detalleventa.id_venta =".$id ;
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al ingresar el detalle de venta',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    public function consultAll($num)
    {
        $connection = parent::connect();
        try {
            $rowpaper = 5;
            $page = 1 + $num;
            $page = $page - 1;
            $p = $page * $rowpaper;
            $query = 'SELECT produto.nombre_produc, detalleventa.cantidad, detalleventa.v_nosujeta, detalleventa.v_exenta, detalleventa.descripcion, detalleventa.v_gravado, detalleventa.precio, detalleventa.id_venta FROM detalleventa INNER JOIN produto ON produto.id_producto = detalleventa.id_producto  limit ' . $p . ', ' . $rowpaper;
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al ingresar el detalle de venta',
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
            $query = 'SELECT count(id_detalleven) as num FROM detalleventa';
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
    public function createSaled($producto, $cantidad, $vnosujeta, $vexenta, $descripcion, $vgravdo, $precio, $subtotal, $venta)
    {
        $conexion = parent::connect();
        try {
            $query = 'INSERT INTO detalleventa(id_producto, cantidad, v_nosujeta, v_exenta, descripcion, v_gravado, precio, subtotal, id_venta) VALUES (?,?,?,?,?,?,?,?,?)';
            $conexion->prepare($query)->execute(array($producto, $cantidad, $vnosujeta, $vexenta, $descripcion, $vgravdo, $precio, $subtotal, $venta));
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
    public function updateSaled($cproduct, $umd, $quantity, $discount, $vnosubject, $veffector, $tp, $description, $total_e, $price, $vconversion, $uconversion, $total, $saleid, $id)
    {
        $conexion = parent::connect();
        try {
            $query = 'UPDATE detalleventa SET card_producto=?, umd=?, cantidad=?, descuento=?, v_nosujeta=?, v_efecta=?, t_p=?, descripcion=?, total_gravado=?, precio=?, v_conversion=?, u_conversion=?, total=?, id_venta=? WHERE id_detalleven=?';
            $conexion->prepare($query)->execute(array($cproduct, $umd, $quantity, $discount, $vnosubject, $veffector, $tp, $description, $total_e, $price, $vconversion, $uconversion, $total, $saleid, $id));
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
    public function deleteSaled($id)
    {
        $conexion = parent::connect();
        try {
            $query = 'DELETE FROM detalleventa WHERE id_detalleven=?';
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
