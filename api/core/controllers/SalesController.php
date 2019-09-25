<?php
require_once '../models/SalesModel.php';
class SalesController
{
    public function show()
    {
        $sales = new SalesModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $sales->consult($page - 1);
        }
    }

    public function showAllSales()
    {
        $sales = new SalesModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $sales->consultAllSales($page - 1);
        }
    }

    
    public function showdata()
    {
        $sales = new SalesModel();
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id= $_REQUEST['id'];
            return $sales->consultDataClient($id);
        }
    }

      
    public function showSuma()
    {
        $sales = new SalesModel();
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id= $_REQUEST['id'];
            return $sales->consultSuma($id);
        }
    }
    public function showAllData()
    {
        $sales = new SalesModel();
        return $sales->consultDataClients();
    }

    public function showNum()
    {
        $salesNum = new SalesModel();
        return $salesNum->consultNum();
    }

    
    public function showID()
    {
        $salesNum = new SalesModel();
        return $salesNum->consultLatId();
    }
    
    public function save()
    {
            $cliente = $_POST['cliente'];
            $comprobante= $_POST['id_tipocom'];
            $municipio = $_POST['municipio'];
            $departamento = $_POST['departamento'];
            $dirreccion= $_POST['direccion'];
            $numeroregistro = $_POST['numero_registro'];
            $formapago = $_POST['id_forma'];
            $tipoventa = $_POST['id_tipoven'];

            $salesCreate = new SalesModel();
            return $salesCreate->createSale(
                $cliente, 
                $comprobante,
                $municipio,
                $departamento,
                $dirreccion,
                $numeroregistro,
                $formapago,
                $tipoventa
            );
        
    }

    public function saveFactura()
    {
            $descuento = $_POST['descuento'];
            $iva= $_POST['iva'];
            $cesc = $_POST['cesc'];
            $retencion = $_POST['retencion'];
            $total = $_POST['total'];
            $id = $_POST['id_venta'];
        
            $salesCreate = new SalesModel();
            return $salesCreate->createDetailF(
                $descuento,
                $iva,
                $cesc,
                $retencion,
                $total,
                $id 
            );
        
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $salesUpdate = new SalesModel();
            return $salesUpdate->updateSale(
                $body->id_sucursal,
                $body->id_tipocom,
                $body->id_cliente,
                $body->direccion,
                $body->id_forma,
                $body->dias_credito,
                $body->punto_venta,
                $body->contacto,
                $body->id_tipoven,
                $body->id_tipofac,
                $body->id_usuario,
                $body->nota_remision,
                $body->num_pedido,
                $body->bodega,
                $id
            );
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $salesDelete = new SalesModel();
            return $salesDelete->deleteSale($id);
        }
    }
}
