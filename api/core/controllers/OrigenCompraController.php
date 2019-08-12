<?php
require_once '../models/OrigenCompraModel.php';
class OrigenCompraController
{

    public function show()
    {
        $originbuy = new OrigenCompraModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $originbuy->consult($page - 1);
        }
    }
    public function showNum()
    {
        $originbuyNum = new OrigenCompraModel();
        return $$originbuyNum->consultNum();
    }
    public function save()
    {
        if (isset($_POST['origen_com'])) {
            $origen_com = $_POST['origen_com'];

            $originbuyCreate = new OrigenCompraModel();
            return $originbuyCreate->createCompra($origen_com);
        }
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $originbuyUpdate = new OrigenCompraModel();
            return $originbuyUpdate->updateCompra($body->origen_com, $id);
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $originbuyDelete = new OrigenCompraModel();
            return $originbuyDelete->deleteCompra($id);
        }
    }
}
