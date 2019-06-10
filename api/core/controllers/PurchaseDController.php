<?php
require_once '../models/PurchaseDModel.php';

class PurchaseDController
{
    public function show()
    {
        $PurchaseD = new PurchaseDModel();
        $page = $_REQUEST['page'];
        return $PurchaseD->consult($page - 1);
    }
    public function showNum()
    {
        $detail2 = new PurchaseDModel();
        return $detail2->consultNum();
    }
    public function save()
    {
        $product  = $_POST['id_producto'];
        $quantity = $_POST['cantidad'];
        $description = $_POST['descripcion'];
        $priceu = $_POST['precio_uni'];
        $totale = $_POST['total_exeno'];
        $totalt = $_POST['total_grabado'];
        $purchase = $_POST['id_compra'];

        $PurchaseDI = new PurchaseDModel();
        return $PurchaseDI->createPurchaseD($product, $quantity, $description, $priceu, $totale, $totalt, $purchase);
    }

    public function update()
    {
        $id = $_REQUEST['id'];
        $body = json_decode(file_get_contents("php://input"));

        $PurchaseDU = new PurchaseDModel();
        return $PurchaseDU->updatePurchaseD(
            $body->id_producto,
            $body->cantidad,
            $body->descripcion,
            $body->precio_uni,
            $body->total_exeno,
            $body->total_grabado,
            $body->id_compra,
            $id
        );
    }

    public function delete()
    {
        $id = $_REQUEST['id'];
        $PurchaseDE = new PurchaseDModel();
        return $PurchaseDE->deletePurchaseD($id);
    }
}
