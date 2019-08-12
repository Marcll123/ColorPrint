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

    public function save()
    {
        if (
            isset($_POST['cliente']) && isset($_POST['giro']) && isset($_POST['numero_nit']) && isset($_POST['numero_registro'])
            && isset($_POST['id_muni']) && isset($_POST['telefono']) && isset($_POST['numero_fax']) && isset($_POST['correo']) && isset($_POST['saldo_acumu'])
            && isset($_POST['limite_credito']) && isset($_POST['id_forma']) && isset($_POST['dias_credito']) && isset($_POST['id_cuenta'])
            && isset($_POST['aplica_rent']) && isset($_POST['codigo_vendedor']) && isset($_POST['ultifechapago']) && isset($_POST['creadopor'])
            && isset($_POST['fechacreacion']) && isset($_POST['id_tipocli'])
        ) {

            $name  = $_POST['cliente'];
            $turn = $_POST['giro'];
            $nit = $_POST['numero_nit'];
            $numrestra  = $_POST['numero_registro'];
            $municipality = $_POST['id_numi'];
            $phone = $_POST['telefono'];
            $numfax  = $_POST['numero_fax'];
            $email = $_POST['correo'];
            $totalbalance  = $_POST['saldo_acumu'];
            $creditlimit = $_POST['limite_credito'];
            $way = $_POST['id_forma'];
            $creditdays  = $_POST['dias_credito'];
            $account = $_POST['id_cuenta'];
            $applyrent = $_POST['aplica_rent'];
            $sellercode  = $_POST['codigo_vendedor'];
            $lastpaymentpay = $_POST['ultifechapago'];
            $createdby = $_POST['creadopor'];
            $creationday  = $_POST['fechacreacion'];
            $typeclient = $_POST['id_tipocli'];

            $clientCreate = new ClientModel();
            return $clientCreate->createClient(
                $name,
                $turn,
                $nit,
                $numrestra,
                $municipality,
                $phone,
                $numfax,
                $email,
                $totalbalance,
                $creditlimit,
                $way,
                $creditdays,
                $account,
                $applyrent,
                $sellercode,
                $lastpaymentpay,
                $createdby,
                $creationday,
                $typeclient
            );
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
                $body->id_numi,
                $body->telefono,
                $body->numero_fax,
                $body->correo,
                $body->saldo_acumu,
                $body->limite_credito,
                $body->id_forma,
                $body->dias_credito,
                $body->id_cuenta,
                $body->aplica_rent,
                $body->codigo_vendedor,
                $body->ultifechapago,
                $body->creadopor,
                $body->fechacreacion,
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
