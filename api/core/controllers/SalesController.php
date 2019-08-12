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
    public function showNum()
    {
        $salesNum = new SalesModel();
        return $salesNum->consultNum();
    }
    public function save()
    {
        if (
            isset($_POST['id_sucursal']) && isset($_POST['id_tipocom']) && isset($_POST['id_cliente']) && isset($_POST['direccion'])
            && isset($_POST['id_forma']) && isset($_POST['dias_credito']) && isset($_POST['punto_venta']) && isset($_POST['contacto'])
            && isset($_POST['id_tipoven']) && isset($_POST['id_tipofac']) && isset($_POST['id_usuario']) && isset($_POST['nota_remision'])
            && isset($_POST['num_pedido']) && isset($_POST['bodega'])
        ) {
            $id_sucursal  = $_POST['id_sucursal'];
            $id_tipocom = $_POST['id_tipocom'];
            $id_cliente = $_POST['id_cliente'];
            $direccion = $_POST['direccion'];
            $id_forma = $_POST['id_forma'];
            $dias_credito = $_POST['dias_credito'];
            $punto_venta = $_POST['punto_venta'];
            $contacto = $_POST['contacto'];
            $id_tipoven = $_POST['id_tipoven'];
            $id_tipofac = $_POST['id_tipofac'];
            $id_usuario = $_POST['id_usuario'];
            $nota_remision = $_POST['nota_remision'];
            $num_pedido = $_POST['num_pedido'];
            $bodega = $_POST['bodega'];

            $salesCreate = new SalesModel();
            return $salesCreate->createSale(
                $id_sucursal,
                $id_tipocom,
                $id_cliente,
                $direccion,
                $id_forma,
                $dias_credito,
                $punto_venta,
                $contacto,
                $id_tipoven,
                $id_tipofac,
                $id_usuario,
                $nota_remision,
                $num_pedido,
                $bodega
            );
        }
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
