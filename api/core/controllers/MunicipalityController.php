<?php
require_once '../models/MunicipalityModel.php';

class MunicipalityController
{

    public function show()
    {
        $municipality = new MunicipalityModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $municipality->consult($page - 1);
        }
    }
    public function showNum()
    {
        $municipalityNum = new MunicipalityModel();
        return $municipalityNum->consultNum();
    }
    public function save()
    {
        if (isset($_POST['municipio']) && isset($_POST['id_dep'])) {
            $municipality  = $_POST['municipio'];
            $department = $_POST['id_dep'];

            $municipalityCreate = new MunicipalityModel();
            return $municipalityCreate->createMunicipality($municipality, $department);
        }
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $municipalityUpdate = new MunicipalityModel();
            return $municipalityUpdate->updateMunicipality($body->municipality, $body->department, $id);
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $municipalityDelete = new MunicipalityModel();
            return $municipalityDelete->deleteMunicipality($id);
        }
    }
}
