<?php
require_once '../models/PermitsModel.php';
class PermitsController
{

    public function show()
    {
        $permits = new PermitsModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $permits->consult($page - 1);
        }
    }
    public function showNum()
    {
        $permitsNum = new PermitsModel();
        return $permitsNum->consultNum();
    }
    public function save()
    {
        if (isset($_POST['permisos'])) {
            $permit  = $_POST['permisos'];
            $permitsCreate = new PermitModel();
            return $permitsCreate->createPermit($permit);
        }
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $PermitUpdate = new PermitsModel();
            return $PermitUpdate->updatepermit($body->permisos, $id);
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $PermitDelete = new PermitsModel();
            return $PermitDelete->deletePermit($id);
        }
    }
}
