<?php
require_once '../models/TypeVoucherModel.php';
class TypeVoucherController
{

    public function show()
    {
        $typevoucher = new TypeVoucherModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $typevoucher->consult($page - 1);
        }
    }
    public function showNum()
    {
        $typevoucherNum = new TypeVoucherModel();
        return $typevoucherNum->consultNum();
    }
    public function save()
    {

        if (isset($_POST['tipo_compro'])) {
            $TypeVoucher  = $_POST['tipo_compro'];


            $typevoucherCreate = new TypeVoucherModel();
            return $typevoucherCreate->createTypeVoucher($TypeVoucher);
        }
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $typevoucherUpdate = new TypeVoucherModel();
            return $typevoucherUpdate->updateTypeVoucher($body->tipo_compro,  $id);
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $typevoucherDelete = new TypeVoucherModel();
            return $typevoucherDelete->deleteTypeVoucher($id);
        }
    }
}
