<?php
     require_once '../models/TypeBuyModel.php';
     
     class TypeBuyController{
        public function show(){    
            $typebuy = new TypeBuyModel();
            $page = $_REQUEST['page'];
            return $waypay->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new WayToPayModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $typebuy  = $_POST['typebuyy'];
            $id= $_POST['idt'];

            $typebuyI = new TypeBuyModel();
            return $typebuyI->createtypebuy($typebuy, $id);
        }

        public function update(){
            $id = $_REQUEST['idt'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $typebuyU = new TypeBuyModel();
            return $typebuyU->updatewaypay($body->typebuy, $id);
        }

        public function delete(){
            $id = $_REQUEST['idt'];
            $typebuyE = new TypeBuyModel();
            return $waypayE->deletetypebuy($id);
        }
     }

?>