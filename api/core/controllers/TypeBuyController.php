<?php
require_once '../models/TypeBuyModel.php';

class TypeBuyController
{
    public function show()
    {
        $typebuy = new TypeBuyModel();
        $page = $_REQUEST['page'];
        return $typebuy->consult($page - 1);
    }
    public function showNum()
    {
        $detail2 = new TypeBuyModel();
        return $detail2->consultNum();
    }
    public function save()
    {
        $typebuy  = $_POST['tipo_compra'];
        $id = $_POST['id'];

        $typebuyI = new TypeBuyModel();
        return $typebuyI->createtypebuy($typebuy, $id);
    }

    public function update()
    {
        $id = $_REQUEST['id'];
        $body = json_decode(file_get_contents("php://input"));

        $typebuyU = new TypeBuyModel();
        return $typebuyU->updatTypeBuy($body->tipo_compra, $id);
    }

    public function delete()
    {
        $id = $_REQUEST['id'];
        $typebuyE = new TypeBuyModel();
        return $typebuyE->deletTypeBuy($id);
    }
}
