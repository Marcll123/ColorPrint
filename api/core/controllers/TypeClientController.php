<?php
require_once '../models/TypeClientModel.php';
class TypeClientController
{

    public function show()
    {
        $typeclient = new TypeClientModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $typeclient->consult($page - 1);
        }
    }
    public function showNum()
    {
        $typeclientNum = new TypeClientModel();
        return $typeclientNum->consultNum();
    }
    public function save()
    {
        if (isset($_POST['tipo_cliete'])) {
            $TypeClient  = $_POST['tipo_cliete'];

            $typeclientCreate = new TypeClientModel();
            return $$typeclientCreate->createTypeClient($TypeClient);
        }
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $typeclientUpdate = new TypeClientModel();
            return $typeclientUpdate->updateTypeClient($body->TypeClient,  $id);
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $typeclientDelete = new TypeClientModel();
            return $typeclientDelete->deleteTypeClient($id);
        }
    }
}
