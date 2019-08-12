<?php
require_once '../models/subsidiaryModel.php';
class SubsidiaryController
{

    public function show()
    {
        $subsidiary = new SubsidiaryModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $subsidiary->consult($page - 1);
        }
    }
    public function showNum()
    {
        $subsidiaryNum = new SubsidiaryModel();
        return $subsidiaryNum->consultNum();
    }
    public function save()
    {
        if (isset($_POST['nombre_sucu']) && isset($_POST['ubicacion'])) {
            $subsidiary  = $_POST['nombre_sucu'];
            $location = $_POST['ubicacion'];


            $subsidiaryCreate = new SubsidiaryModel();
            return $subsidiaryCreate->createSubsidiary($subsidiary, $location);
        }
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $subsidiaryUpdate = new SubsidiaryModel();
            return $subsidiaryUpdate->updateSubsidiary($body->nombre_sucu, $body->ubicacion, $id);
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $subsidiaryDelete = new SubsidiaryModel();
            return $subsidiaryDelete->deleteSubsidiary($id);
        }
    }
}
