<?php
//Se incluye el archivo PHP de conexión con la base de datos
require_once '../helpers/connection.php';

//Se crea la clase Sales model que tiene las funciones para obtener los datos de la base de datos
class SalesModel extends Connection
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
            $query = 'SELECT ventas.id_venta, sucursal.nombre_sucu, tipo_comprobante.tipo_compro, cliente.cliente, ventas.direccion, formapago.forma_pago, ventas.dias_credito, ventas.punto_venta,
                 ventas.contacto, tipo_venta.tipo_venta, tipofacturacion.facturacion, usuarios.nombre_usu, 
                ventas.nota_remision, ventas.num_pedido, ventas.bodega FROM ventas INNER JOIN sucursal ON 
                ventas.id_sucursal = sucursal.id_sucursal INNER JOIN tipo_comprobante ON ventas.id_tipocom = tipo_comprobante.id_tipocom INNER JOIN cliente ON ventas.id_cliente = cliente.id_cliente INNER JOIN formapago ON ventas.id_forma = formapago.id_forma INNER JOIN tipo_venta ON ventas.id_tipoven = tipo_venta.id_tipoven 
                INNER JOIN tipofacturacion ON ventas.id_tipofac = tipofacturacion.id_tipofac INNER JOIN usuarios ON ventas.id_usuario = usuarios.id_usuario  limit ' . $p . ', ' . $rowpaper;
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al ingresar un registro',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }


    public function consultAllSales($num)
    {
        $connection = parent::connect();
        try {      
            $rowpaper = 5;
            $page = 1+$num;
            $page = $page-1;
            $p = $page*$rowpaper;
            $query = 'SELECT ventas.cliente, ventas.municipio, ventas.departamento, ventas.direccion, ventas.numero_registro, detallefactura.total FROM ventas INNER JOIN detallefactura ON detallefactura.id_venta = ventas.id_venta limit '.$p.', '.$rowpaper;
            $data=  $connection->query($query,PDO::FETCH_ASSOC)->fetchAll();
          return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al ingresar un registro',
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
            $query = 'SELECT count(ventas.id_venta) as num FROM ventas';
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

    public function consultSuma($id)
    {
        $connection = parent::connect();
        try {
            $query = 'SELECT SUM(subtotal) as sub FROM detalleventa WHERE id_venta ='.$id;
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

    public function consultLatId()
    {
        $connection = parent::connect();
        try {
            $query = 'SELECT id_venta FROM ventas ORDER BY id_venta DESC LIMIT 1';
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

    public function consultDataClient($id)
    {
        $connection = parent::connect();
        try {
            $query = 'SELECT id_cliente , cliente, numero_registro,  municipio.municipio, departamento.departamento, direccion FROM cliente INNER JOIN municipio ON municipio.id_muni = cliente.id_muni INNER JOIN departamento ON departamento.id_dep = cliente.id_departamento WHERE id_cliente ='.$id;
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
    public function consultDataClients()
    {
        $connection = parent::connect();
        try {
            $query = 'SELECT id_cliente , cliente, numero_registro,  municipio.municipio, departamento.departamento, direccion FROM cliente INNER JOIN municipio ON municipio.id_muni = cliente.id_muni INNER JOIN departamento ON departamento.id_dep = cliente.id_departamento';
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
    public function createSale($cliente, $comprobate, $municipio, $departamento, $dirreccion, $numero_registro, $formapago, $tipoventa)
    {
        $conexion = parent::connect();
        try {
            date_default_timezone_set('America/El_Salvador');
            $date = date("Y-m-d");
            $query = 'INSERT INTO ventas(cliente, id_tipocom, municipio, departamento, direccion, numero_registro, id_forma, id_tipoven, fecha_realizacion) VALUES (?,?,?,?,?,?,?,?,?)';
            $conexion->prepare($query)->execute(array(
                $cliente, $comprobate, $municipio, $departamento, $dirreccion, $numero_registro, $formapago, $tipoventa, $date
            ));
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

    public function createDetailF($descuento, $iva, $cesc, $retencion, $total, $venta)
    {
        $conexion = parent::connect();
        try {
            $query = 'INSERT INTO detallefactura(descuento, iva, cesc, retencion, total, id_venta) VALUES (?,?,?,?,?,?)';
            $conexion->prepare($query)->execute(array(
                $descuento, $iva, $cesc, $retencion, $total, $venta
            ));
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
    public function updateSale(
        $id_sucursal,
        $tipo_com,
        $id_cliente,
        $direccion,
        $forma,
        $dias_credito,
        $punto_venta,
        $contacto,
        $tipo_venta,
        $tipo_fac,
        $id_usuario,
        $nota_remision,
        $num_pedido,
        $bodega,
        $id
    ) {
        $conexion = parent::connect();
        try {
            $query = 'UPDATE ventas SET id_sucursal=? , id_tipocom=?,id_cliente=?, direccion=?, id_forma=?, dias_credito=?, punto_venta=?, contacto=?,id_tipoven=?,id_tipofac=?,id_usuario=?,nota_remision=?,num_pedido=?,bodega=? WHERE id_venta=?';
            $conexion->prepare($query)->execute(array(
                $id_sucursal, $tipo_com, $id_cliente, $direccion, $forma, $dias_credito, $punto_venta, $contacto, $tipo_venta,
                $tipo_fac, $id_usuario, $nota_remision, $num_pedido, $bodega, $id
            ));
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
    public function deleteSale($id)
    {
        $conexion = parent::connect();
        try {
            $query = 'DELETE FROM ventas WHERE id_venta=?';
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
