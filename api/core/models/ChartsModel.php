<?php
require_once '../helpers/connection.php';

class ChartsModel extends Connection {
    
    public function consultPurchaseType()
    {
        $connection = parent::connect();
        try {
            $query = 'SELECT COUNT(id_compra) as data FROM compra WHERE id_tipocompra = 2 UNION
            SELECT COUNT(id_compra)  FROM compra WHERE id_tipocompra = 1 UNION 
            SELECT COUNT(id_compra)  FROM compra WHERE id_tipocompra = 8';
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


    public function consultProductPrice()
    {
        $connection = parent::connect();
        try {
            $query = 'SELECT precio_uni AS precio FROM produto';
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

    public function consultProductName()
    {
        $connection = parent::connect();
        try {
            $query = 'SELECT nombre_produc AS nombre FROM produto';
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

    //GRAFICOS PERSONALIZADOS


    public function consultTypeSalesDate($start, $final)
    {
        $connection = parent::connect();
        try {
            $query = "SELECT COUNT(id_venta) AS num FROM ventas WHERE fecha_realizacion BETWEEN '$start' AND '$final' AND id_tipoven = 3";
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

    public function consultTypeSalesDate2($start, $final)
    {
        $connection = parent::connect();
        try {
            $query = "SELECT COUNT(id_venta) AS num FROM ventas WHERE fecha_realizacion BETWEEN '$start' AND '$final' AND id_tipoven = 1";
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

    public function consultTypeSalesDate3($start, $final)
    {
        $connection = parent::connect();
        try {
            $query = "SELECT COUNT(id_venta) AS num FROM ventas WHERE fecha_realizacion BETWEEN '$start' AND '$final' AND id_tipoven = 2";
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

    public function consultTypeSalesDate4($start, $final)
    {
        $connection = parent::connect();
        try {
            $query = "SELECT COUNT(id_venta) AS num FROM ventas WHERE fecha_realizacion BETWEEN '$start' AND '$final' AND id_tipoven = 8";
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

    public function consultproductSale($start, $final)
    {
        $connection = parent::connect();
        try {
            $query = "SELECT COUNT(id_detalleven) AS num FROM detalleventa INNER JOIN ventas ON detalleventa.id_venta = ventas.id_venta WHERE ventas.fecha_realizacion BETWEEN '$start' AND '$final' GROUP BY id_producto";
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

    public function consultproductnameSale()
    {
        $connection = parent::connect();
        try {
            $query = "SELECT nombre_produc as nombre FROM produto";
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

    public function consultproductPurchase($start, $final)
    {
        $connection = parent::connect();
        try {
            $query = "SELECT COUNT(id_detallecom) AS num FROM detallecompra INNER JOIN compra ON detallecompra.id_compra = compra.id_compra WHERE compra.fecha_compra BETWEEN '$start' AND '$final' GROUP BY id_producto";
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

    public function consultClientName()
    {
        $connection = parent::connect();
        try {
            $query = "SELECT cliente FROM cliente";
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

    public function consultSaleClient($start, $final)
    {
        $connection = parent::connect();
        try {
            $query = "SELECT COUNT(id_venta) AS num FROM ventas WHERE fecha_realizacion BETWEEN '$start' AND '$final' GROUP BY id_cliente";
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

    public function consulttotal($start, $final)
    {
        $connection = parent::connect();
        try {
            $query = "SELECT SUM(total) AS total FROM detalleventa INNER JOIN ventas ON detalleventa.id_venta = ventas.id_venta WHERE ventas.fecha_realizacion BETWEEN '$start' AND '$final' GROUP BY id_producto";
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


    public function consultnumUsers()
    {
        $connection = parent::connect();
        try {
            $query = "SELECT COUNT(id_usuario) AS num FROM usuarios GROUP BY id_rol";
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
    public function consultTypeUsers()
    {
        $connection = parent::connect();
        try {
            $query = "SELECT roles FROM roles";
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

    public function consultProviderNum()
    {
        $connection = parent::connect();
        try {
            $query = "SELECT COUNT(id_compra)AS num FROM compra GROUP BY id_proveedor DESC";
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

    
    public function consultProviderName()
    {
        $connection = parent::connect();
        try {
            $query = "SELECT nombre_prove AS nombre FROM proveedor";
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


    public function consultClientNum()
    {
        $connection = parent::connect();
        try {
            $query = "SELECT COUNT(id_cliente) AS num FROM cliente GROUP BY id_tipocli";
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

    
    public function consultClientTypeName()
    {
        $connection = parent::connect();
        try {
            $query = "SELECT tipo_cliete AS nombre FROM tipocliente";
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
    

    
}
?>