<?php
require_once '../models/SaleDetailModel.php';

class SaleDetailController
{
    public function show()
    {
        $shops = new SaleDetailModel();
        $page = $_REQUEST['page'];
        return $shops->consult($page - 1);
    }
    public function showNum()
    {
        $detail2 = new SaleDetailModel();
        return $detail2->consultNum();
    }
    public function save()
    {
        $cproduct  = $_POST['card_producto'];
        $umd = $_POST['umd'];
        $quantity = $_POST['cantidad'];
        $discount  = $_POST['descuento'];
        $vnosubject = $_POST['v_nosujeta'];
        $veffector = $_POST['v_efecta'];
        $tp  = $_POST['t_p'];
        $description = $_POST['descripcion'];
        $total_e = $_POST['total_gravado'];
        $price  = $_POST['precio'];
        $vconversion = $_POST['v_conversion'];
        $uconversion = $_POST['u_conversion'];
        $total  = $_POST['total'];
        $saleid  = $_POST['id_venta'];

        $saledetailI = new SaleDetailModel();
        return $saledetailI->createSaled($cproduct, $umd, $quantity, $discount, $vnosubject, $veffector, $tp, $description, $total_e, $price, $vconversion, $uconversion, $total, $saleid);
    }

    public function update()
    {
        $id = $_REQUEST['id'];
        $body = json_decode(file_get_contents("php://input"));

        $saledetaillU = new SaleDetailModel();
        return $saledetaillU->updateSaled($body->cproduct, $body->umd, $body->quantity, $body->discount, $body->vnosubject, $body->veffector, $body->tp, $body->description, $body->total_e, $body->price, $body->vconversion, $body->uconversion, $body->total, $body->saleid, $id);
    }

    public function delete()
    {
        $id = $_REQUEST['id'];
        $saledetailE = new SaleDetailModel();
        return $saledetailE->deleteSaled($id);
    }
}
