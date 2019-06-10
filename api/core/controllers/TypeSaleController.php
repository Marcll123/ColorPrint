<?php
require_once '../models/TypeSaleModel.php';
class TypeSaleController
{

    public function show()
    {
        $Tsale = new TypeSaleModel();
        $page = $_REQUEST['page'];
        return $Tsale->consult($page - 1);
    }
    public function showNum()
    {
        $detail2 = new TypeSaleModel();
        return $detail2->consultNum();
    }
    public function save()
    {
        $TypeSale  = $_POST['venta'];
        $TsaleI = new TypeSaleModel();
        return $TsaleI->createTypeSale($TypeSale);
    }

    public function update()
    {
        $id = $_REQUEST['id'];
        $body = json_decode(file_get_contents("php://input"));

        $TsaleU = new TypeSaleModel();
        return $TsaleU->updateTypeSale($body->venta,  $id);
    }

    public function delete()
    {
        $id = $_REQUEST['id'];
        $TsaleE = new TypeSaleModel();
        return $TsaleE->deleteTypeSale($id);
    }
}
