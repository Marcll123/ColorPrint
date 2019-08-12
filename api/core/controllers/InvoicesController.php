<?php
require_once '../models/InvoicesModel.php';

class InvoicesController
{
    public function show()
    {
        $invoices = new InvoiceModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $invoices->consult($page - 1);
        }
    }
    public function showNum()
    {
        $invoicesNum = new InvoiceModel();
        return $invoicesNum->consultNum();
    }
    public function save()
    {
        if (isset($_POST['sale']) && isset($_POST['descripcion'])) {
            $sale  = $_POST['id_venta'];
            $description = $_POST['descripcion'];

            $invoicesCreate = new InvoiceModel();
            return $invoicesCreate->createInvoices($sale, $description);
        }
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $invoicesUpdate = new InvoiceModel();
            return $invoicesUpdate->updateInvoices($body->id_venta, $body->descripcion, $id);
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $invoicesDelete = new InvoiceModel();
            return $invoicesDelete->deleteInvoices($id);
        }
    }
}
