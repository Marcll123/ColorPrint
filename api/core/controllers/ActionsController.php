<?php
require_once '../models/ActionsModel.php';

class ActionsController
{
    public function show()
    {
        $actions = new ActionsModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $actions->consult($page - 1);
        }
    }

    public function showNum()
    {
        $actionsNum = new ActionsModel();
        return $actionsNum->consultNum();
    }

    public function save()
    {
        if (isset($_POST['rol']) && isset($_POST['permit'])) {
            $role  = $_POST['rol'];
            $permits = $_POST['permit'];

            $actionsCreate = new ActionsModel();
            return $actionsCreate->createActions($role, $permits);
        }
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $actionsUpdate = new ActionsModel();
            return $actionsUpdate->updateActions($body->rol, $body->permit, $id);
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $actionsDelete = new ActionsModel();
            return $actionsDelete->deleteActions($id);
        }
    }
}
