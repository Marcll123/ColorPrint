<?php
require_once '../models/PurchaseModel.php';

class PurchaseController
{
    public function show()
    {
        $purchase = new PurchaseModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $purchase->consult($page - 1);
        }
    }
    public function showNum()
    {
        $purchaseNum = new PurchaseModel();
        return $purchaseNum->consultNum();
    }
    public function save()
    {
        if (
            isset($_POST['numerodocumento']) && isset($_POST['id_proveedor']) && isset($_POST['direccion']) &&
            isset($_POST['bodega']) && isset($_POST['id_tipodoc']) && isset($_POST['serie_costo']) &&
            isset($_POST['id_tipocompra']) && isset($_POST['id_forma']) && isset($_POST['id_origencom']) &&
            isset($_POST['num_registro']) && isset($_POST['num_compra']) && isset($_POST['dai']) &&
            isset($_POST['doc_excluidos'])
        ) {
            $numberdocu  = $_POST['numerodocumento'];
            $supplier = $_POST['id_proveedor'];
            $address = $_POST['direccion'];
            $winery  = $_POST['bodega'];
            $typec = $_POST['id_tipodoc'];
            $seriescos = $_POST['serie_costo'];
            $typepur  = $_POST['id_tipocompra'];
            $way = $_POST['id_forma'];
            $idorigin = $_POST['id_origencom'];
            $numregi  = $_POST['num_registro'];
            $purchasenum = $_POST['num_compra'];
            $dai = $_POST['dai'];
            $excludeddoc  = $_POST['doc_excluidos'];

            $purchaseCreate = new PurchaseModel();
            return $purchaseCreate->createShop($numberdocu, $supplier, $address, $winery, $typec, $seriescos, $typepur, $way, $idorigin, $numregi, $purchasenum, $dai, $excludeddoc);
        }
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $purchaseUpdate = new PurchaseModel();
            return $purchaseUpdate->updateshop(
                $body->numerodocumento,
                $body->id_proveedor,
                $body->direccion,
                $body->bodega,
                $body->id_tipodoc,
                $body->serie_costo,
                $body->id_tipocompra,
                $body->id_forma,
                $body->id_origencom,
                $body->num_registro,
                $body->num_compra,
                $body->dai,
                $body->doc_excluidos,
                $id
            );
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $purchaseDelete = new PurchaseModel();
            return $purchaseDelete->deleteShop($id);
        }
    }
}
