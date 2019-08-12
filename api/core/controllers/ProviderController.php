<?php
require_once '../models/ProviderModel.php';
class ProviderController
{

    public function show()
    {
        $provider = new ProviderModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $provider->consult($page - 1);
        }
    }
    public function showNum()
    {
        $providerNum = new ProviderModel();
        return $providerNum->consultNum();
    }
    public function save()
    {
        if (isset($_POST['nombre_prove']) && isset($_POST['nit'])) {
            $provider  = $_POST['nombre_prove'];
            $nit = $_POST['nit'];

            $providerI = new ProviderModel();
            return $providerI->createProvider($provider, $nit);
        }
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $providerUpdate = new ProviderModel();
            return $providerUpdate->updateProvider($body->nombre_prove, $body->nit, $id);
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $providerDelete = new ProviderModel();
            return $providerDelete->deleteProvider($id);
        }
    }
}
