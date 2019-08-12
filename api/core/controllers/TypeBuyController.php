<?php
require_once '../models/TypeBuyModel.php';

class TypeBuyController
{
    public function show()
    {
        $typebuy = new TypeBuyModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $typebuy->consult($page - 1);
        }
    }
    public function showNum()
    {
        $typebuyNum = new TypeBuyModel();
        return $typebuyNum->consultNum();
    }
    public function save()
    {
        if (isset($_POST['tipo_compra'])) {
            $typebuy  = $_POST['tipo_compra'];

            $typebuyCreate = new TypeBuyModel();
            return $typebuyCreate->createtypebuy($typebuy);
        }
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $typebuyUpdate = new TypeBuyModel();
            return $typebuyUpdate->updatTypeBuy($body->tipo_compra, $id);
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $typebuyDelete = new TypeBuyModel();
            return $typebuyDelete->deletTypeBuy($id);
        }
    }
}
