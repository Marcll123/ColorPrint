<?php
     require_once '../models/InvoicesModel.php';
     
     class InvoicesController{
        public function show(){    
            $invoives = new InvoicesModel();
            $page = $_REQUEST['page'];
            return $user->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new InvoicesModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $sale  = $_POST['salee'];
            $description = $_POST['descriptionn'];
            $id = $_POST['idi'];

            $invoivesI = new InvoicesModel();
            return $invoivesI->createInvoives($sale , $description, $id);
        }

        public function update(){
            $id = $_REQUEST['idi'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $invoivesU = new InvoicesModel();
            return $invoivesU->updateInvoives($body->sale, $body->description, $id);
        }

        public function delete(){
            $id = $_REQUEST['idi'];
            $invoivesE = new InvoicesModel();
            return $invoivesE->deleteInvoives($id);
        }
     }

?>