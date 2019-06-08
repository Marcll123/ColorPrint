<?php
     require_once '../models/ClientModel.php';
     
     class ClientController{
        public function show(){    
            $clients = new ClientModel();
            $page = $_REQUEST['page'];
            return $user->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new ClientModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $name  = $_POST['nombre'];
            $turn = $_POST['giro'];
            $nit = $_POST['nitc'];
            $numrestra  = $_POST['numre'];
            $municipality = $_POST['muni'];
            $phone = $_POST['phonec'];
            $numfax  = $_POST['numfaxc'];
            $email = $_POST['emailc'];
            $contact = $_POST['contactc'];
            $balanceac  = $_POST['balance'];
            $creditlimit = $_POST['creditli'];
            $way = $_POST['idway'];
            $creditdays  = $_POST['daycre'];
            $account = $_POST['accountc'];
            $applyrent = $_POST['arent'];
            $sellercode  = $_POST['codese'];
            $lastday = $_POST['lastd'];
            $createdby = $_POST['created'];
            $creationday  = $_POST['creationd'];
            $typeclient = $_POST['typec'];
            $id = $_POST['idc'];

            $clientI = new ClientModel();
            return $clientI->createClient($name , $turn, $nit, $numrestra, $municipality, $phone, $numfax, $email, $contact, $balanceac, $creditlimit, $way, $creditdays, $account, $applyrent, $sellercode, $lastday, $createdby, $creationday, $typeclient, $id);
        }

        public function update(){
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $clientU = new ClientModel();
            return $clientU->updateClient($body->name, $body->turn, $body->nit, $body->numrestra, $body->municipality, $body->phone, $body->numfax, $body->email, $body->contact, $body->balanceac, $body->creditlimit, $body->way, $body->creditdays, $body->account, $body->applyrent, $body->sellercode, $body->lastday, $body->createdby, $body->creationday, $body->typeclient, $id);
        }

        public function delete(){
            $id = $_REQUEST['id'];
            $clientE = new ClientModel();
            return $clientE->deleteClient($id);
        }
     }

?>