<?php
     require_once '../models/WayToPayModel.php';
     
     class WayToPayController{
        public function show(){    
            $waypay = new WayToPayModel();
            $page = $_REQUEST['page'];
            return $waypay->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new WayToPayModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $waypay  = $_POST['waypayy'];
            $id= $_POST['idw'];

            $waypayI = new WayToPayModel();
            return $waypayI->createwaypay($waypay, $id);
        }

        public function update(){
            $id = $_REQUEST['idw'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $waypayU = new WayToPayModel();
            return $waypayU->updatewaypay($body->waypay, $id);
        }

        public function delete(){
            $id = $_REQUEST['idw'];
            $waypayE = new WayToPayModel();
            return $waypayE->deletewaypay($id);
        }
     }

?>