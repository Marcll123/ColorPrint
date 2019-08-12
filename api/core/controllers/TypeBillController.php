<?php
require_once '../models/TypeBillModel.php';
class TypeBillController
{

    public function show()
    {
        $TypeBill = new TypeBillModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $TypeBill->consult($page - 1);
        }
    }
    public function showNum()
    {
        $TypeBillNum = new TypeBillModel();
        return $TypeBillNum->consultNum();
    }
    public function save()
    {
        if (isset($_POST['facturacion'])) {
            $TypeBill  = $_POST['facturacion'];


            $TypeBillCreate = new TypeBillModel();
            return $TypeBillCreate->createTypeBill($TypeBill);
        }
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $TypeBillUpdate = new TypeBillModel();
            return $TypeBillUpdate->updateTypeBill($body->TypeBill,  $id);
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $TypeBillDelete = new TypeBillModel();
            return $TypeBillDelete->deleteTypeBill($id);
        }
    }
}
