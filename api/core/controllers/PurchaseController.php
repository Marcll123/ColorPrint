<?php
require_once '../models/PurchaseModel.php';

class PurchaseController
{
    public function show()
    {
        $shops = new PurchaseModel();
        $page = $_REQUEST['page'];
        return $shops->consult($page - 1);
    }
    public function showNum()
    {
        $detail2 = new PurchaseModel();
        return $detail2->consultNum();
    }
    public function save()
    {
        if(isset($_POST['numerodocumento'])) {
            $numberdocu  = $_POST['numerodocumento'];
        }  
        if(isset($_POST['id_proveedor'])) {
            $supplier = $_POST['id_proveedor'];
        }  
        if(isset($_POST['direccion'])) {
            $address = $_POST['direccion'];
        } 
        if(isset($_POST['bodega'])) {
            $winery  = $_POST['bodega'];
        } 
        if(isset($_POST['id_tipodoc'])) {
            $typec = $_POST['id_tipodoc'];
        } 
        if(isset($_POST['serie_costo'])) {
            $seriescos = $_POST['serie_costo'];
        } 
        if(isset($_POST['id_tipocompra'])) {
            $typepur  = $_POST['id_tipocompra'];
        } 
        if(isset($_POST['id_forma'])) {
            $way = $_POST['id_forma'];
        } 
        if(isset($_POST['id_origencom'])) {
            $idorigin = $_POST['id_origencom'];
        } 
        if(isset( $_POST['num_registro'])) {
            $numregi  = $_POST['num_registro'];
        } 

        if(isset($_POST['num_compra'])) {
            $purchasenum = $_POST['num_compra'];
        } 

        if(isset($_POST['dai'])) {
            $dai = $_POST['dai'];
        } 

        if(isset( $_POST['doc_excluidos'])) {
            $excludeddoc  = $_POST['doc_excluidos'];
        } 

    

        $shopI = new PurchaseModel();
        return $shopI->createShop($numberdocu, $supplier, $address, $winery, $typec, $seriescos, $typepur, $way, $idorigin, $numregi, $purchasenum, $dai, $excludeddoc);
    }

    public function update()
    {
        $id = $_REQUEST['id'];
        $body = json_decode(file_get_contents("php://input"));

        $shopU = new PurchaseModel();
        return $shopU->updateshop($body->numerodocumento, $body->id_proveedor, $body->direccion, $body->bodega,
         $body->id_tipodoc, $body->serie_costo,$body->id_tipocompra, $body->id_forma, $body->id_origencom, $body->num_registro, $body->num_compra,
          $body->dai, $body->doc_excluidos, $id);
    }

    public function delete()
    {
        $id = $_REQUEST['id'];
        $shopE = new PurchaseModel();
        return $shopE->deleteShop($id);
    }
}
