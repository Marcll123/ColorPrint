<?php
require_once '../models/ClientModel.php';

class ClientController
{
    public function show()
    {
        $clients = new ClientModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $clients->consult($page - 1);
        }
    }

    public function showNum()
    {
        $detail2 = new ClientModel();
        return $detail2->consultNum();
    }

    public function showClient()
    {
        $clients = new ClientModel();
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            return $clients->consultOneClientId($id);
        }
    }

    public function save()
    {
        $name  = $_POST['cliente'];
        $turn = $_POST['giro'];
        $nit = $_POST['numero_nit'];
        $numrestra  = $_POST['numero_registro'];
        $address = $_POST['direccion'];
        $municipality = $_POST['id_numi'];
        $department = $_POST['id_departamento'];
        $phone = $_POST['telefono'];
        $email = $_POST['correo'];
        $totalbalance  = $_POST['saldo_acumu'];
        $creditlimit = $_POST['limite_credito'];
        $creditdays  = $_POST['dias_credito'];
        $typeclient = $_POST['id_tipocli'];

        $clientCreate = new ClientModel();
        return $clientCreate->createClient(
            $name,
            $turn,
            $nit,
            $numrestra,
            $address,
            $municipality,
            $department,
            $phone,
            $email,
            $totalbalance,
            $creditlimit,
            $creditdays,
            $typeclient
        );
    }

    public function search()
    {
        $client = new ClientModel();
        if (isset($_REQUEST['cliente']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['cliente'])) {
            $search = $_REQUEST['cliente'];
            return $client->searchClient($search);
        }
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $clientUpdate = new ClientModel();
            return $clientUpdate->updateClient(
                $body->cliente,
                $body->giro,
                $body->numero_nit,
                $body->numero_registro,
                $body->direccion,
                $body->id_numi,
                $body->id_departamento,
                $body->telefono,
                $body->correo,
                $body->saldo_acumu,
                $body->limite_credito,
                $body->dias_credito,
                $body->id_tipocli,
                $id
            );
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $clientDelete = new ClientModel();
            return $clientDelete->deleteClients($id);
        }
    }
}
