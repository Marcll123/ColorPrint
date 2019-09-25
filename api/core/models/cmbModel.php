<?php

require_once '../helpers/Connection.php';

class cmbModel extends Connection
{
    public function datacmbProvider()
    {
        $connection = parent::connect();
        try {
            $query = "SELECT id_proveedor, nombre_prove FROM proveedor";
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'error al obtener los datos',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    public function datacmbtypeDocument()
    {
        $connection = parent::connect();
        try {
            $query = "SELECT id_tipodoc, tipo_docmento from tipodocumento";
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'error al obtener los datos',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    
    public function datacmbTypeVoucher()
    {
        $connection = parent::connect();
        try {
            $query = "SELECT id_tipocom, tipo_compro FROM tipo_comprobante";
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'error al obtener los datos',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    public function datacmbTypeSales()
    {
        $connection = parent::connect();
        try {
            $query = "SELECT id_tipoven, tipo_venta FROM tipo_venta";
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'error al obtener los datos',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    
    public function datacmbtypePurchase()
    {
        $connection = parent::connect();
        try {
            $query = "SELECT id_tipocompra, tipo_compra from id_tipocompra";
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'error al obtener los datos',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    public function datacmbPaymentMethod()
    {
        $connection = parent::connect();
        try {
            $query = "SELECT id_forma, forma_pago from formapago";
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'error al obtener los datos',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    public function datacmbOriginPurchase()
    {
        $connection = parent::connect();
        try {
            $query = "SELECT id_origencom, origen_com from origencompra";
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'error al obtener los datos',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    public function datacmbProduct()
    {
        $connection = parent::connect();
        try {
            $query = "SELECT id_producto, nombre_produc from produto";
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'error al obtener los datos',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    public function datacmbAccount()
    {
        $connection = parent::connect();
        try {
            $query = "SELECT id_cuenta, cuenta FROM cuenta";
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'error al obtener los datos',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    public function datacmbTypeClient()
    {
        $connection = parent::connect();
        try {
            $query = "SELECT id_tipocli, tipo_cliete FROM tipocliente";
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'error al obtener los datos',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    public function datacmbMunicipaly()
    {
        $connection = parent::connect();
        try {
            $query = "SELECT id_muni, municipio from municipio";
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'error al obtener los datos',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    public function dataProductPrice($id)
    {
        $connection = parent::connect();
        try {
            $query = "SELECT precio_uni from produto WHERE id_producto =".$id;
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'error al obtener los datos',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    public function datalastid()
    {
        $connection = parent::connect();
        try {
            $query = "SELECT id_compra FROM compra ORDER BY id_compra DESC LIMIT 1";
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'error al obtener los datos',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }
}
