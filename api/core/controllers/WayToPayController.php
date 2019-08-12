<?php
require_once '../models/WayToPayModel.php';

class WayToPayController
{
    public function show()
    {
        $waypay = new WayToPayModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $waypay->consult($page - 1);
        }
    }
    public function showNum()
    {
        $waypayNum = new WayToPayModel();
        return $waypayNum->consultNum();
    }
    public function save()
    {
        if (isset($_POST['forma_pago'])) {
            $waypay  = $_POST['forma_pago'];

            $waypayCreate = new WayToPayModel();
            return $waypayCreate->createwaypay($waypay);
        }
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $waypayUpdate = new WayToPayModel();
            return $waypayUpdate->updatewaypay($body->waypay, $id);
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $waypayDelete = new WayToPayModel();
            return $waypayDelete->deletewaypay($id);
        }
    }
}
