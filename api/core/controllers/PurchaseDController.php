<?php
require_once '../models/PurchaseDModel.php';

class PurchaseDController
{
    public function show()
    {
        $PurchaseD = new PurchaseDModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $PurchaseD->consult($page - 1);
        }
    }
    public function showNum()
    {
        $PurchaseDNum = new PurchaseDModel();
        return $PurchaseDNum->consultNum();
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

            $PurchaseDCreate = new PurchaseDModel();
            return $PurchaseDCreate->createPurchaseD($product, $quantity, $description, $priceu, $totale, $totalt, $purchase);

    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $PurchaseDUpdate = new PurchaseDModel();
            return $PurchaseDUpdate->updatePurchaseD(
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
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $PurchaseDDelete = new PurchaseDModel();
            return $PurchaseDDelete->deletePurchaseD($id);
        }
    }
}
