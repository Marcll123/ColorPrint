<?php
require_once '../models/RolesModel.php';
class RolesController
{

    public function show()
    {
        $roles = new RolesModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $roles->consult($page - 1);
        }
    }
    public function showNum()
    {
        $rolesNum = new RolesModel();
        return $rolesNum->consultNum();
    }

    public function save()
    {
        if (isset($_POST['roles'])) {
            $roles  = $_POST['roles'];
            $rolesCreate = new RolesModel();
            return $rolesCreate->createRole($roles);
        }
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $rolesUpdate = new RolesModel();
            return $rolesUpdate->updateRole($body->roles, $id);
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $rolesDelete = new RolesModel();
            return $rolesDelete->deleteRole($id);
        }
    }
}
