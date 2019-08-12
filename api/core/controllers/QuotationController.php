<?php
require_once '../models/QuotationModel.php';

class QuotationController
{
    public function show()
    {
        $quatation = new QuatationModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $quatation->consult($page - 1);
        }
    }
    public function showNum()
    {
        $quatationNum = new QuatationModel();
        return $quatationNum->consultNum();
    }
    public function save()
    {
        if (
            isset($_POST['cantidad']) && isset($_POST['descripcion']) && isset($_POST['precio_unitario']) && isset($_POST['id_cliente'])
            && isset($_POST['total']) && isset($_POST['numero_cotizacion'])
        ) {
            $quantity  = $_POST['cantidad'];
            $description = $_POST['descripcion'];
            $price = $_POST['precio_unitario'];
            $client = $_POST['id_cliente'];
            $total = $_POST['total'];
            $num_quatation = $_POST['numero_cotizacion'];

            $quotationCreate = new QuatationModel();
            return $quotationCreate->createQuotation($quantity, $description, $price, $client, $total, $num_quatation);
        }
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $quatationUpdate = new QuatationModel();
            return $quatationUpdate->updateQuotation($body->cantidad, $body->descripcion, $body->precio_unitario, $body->id_cliente, $body->total, $body->numero_cotizacion, $id);
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $quotationDelete = new QuatationModel();
            return $quotationDelete->deleteQuatation($id);
        }
    }
}
