<?php
require_once '../models/TypeSaleModel.php';
class TypeSaleController
{

    public function show()
    {
        $typesale = new TypeSaleModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $typesale->consult($page - 1);
        }
    }
    public function showNum()
    {
        $typesaleNum = new TypeSaleModel();
        return $typesaleNum->consultNum();
    }
    public function save()
    {
        if (isset($_POST['tipo_venta'])) {
            $TypeSale  = $_POST['tipo_venta'];
            $typesaleCreate = new TypeSaleModel();
            return $typesaleCreate->createTypeSale($TypeSale);
        }
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $typesaleUpdate = new TypeSaleModel();
            return $typesaleUpdate->updateTypeSale($body->venta,  $id);
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $typesaleDelete = new TypeSaleModel();
            return $typesaleDelete->deleteTypeSale($id);
        }
    }
}
