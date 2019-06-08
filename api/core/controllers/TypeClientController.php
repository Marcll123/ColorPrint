<?php
    require_once '../models/TypeClientModel.php';
    class TypeClientController{

        public function show(){    
            $Client = new TypeClientModel();
            $page = $_REQUEST['page'];
            return $Client->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new TypeClientModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $TypeClient  = $_POST['TypeClient'];
          

            $ClientI = new TypeClientModel();
            return $ClientI->createTypeClient($TypeClient);
        }

        public function update(){
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $cientU = new TypeClientModel();
            return $clientU->updateTypeClient($body->TypeClient,  $id);
        }

        public function delete(){
            $id = $_REQUEST['id'];
            $clientE = new TypeClientModel();
            return $clientE->deleteTypeClient($id);
        }

     
    }

    
?>