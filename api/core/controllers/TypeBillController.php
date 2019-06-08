<?php
    require_once '../models/TypeBillModel.php';
    class TypeBillController{

        public function show(){    
            $Bill = new TypeBillModel();
            $page = $_REQUEST['page'];
            return $Bill->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new TypeBillModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $TypeBill  = $_POST['TypeBill'];
          

            $BillI = new TypeBillModel();
            return $BillI->createTypeBill($TypeBill);
        }

        public function update(){
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $BillU = new TypeBillModel();
            return $BillU->updateTypeClient($body->TypeBill,  $id);
        }

        public function delete(){
            $id = $_REQUEST['id'];
            $BillE = new TypeBillModel();
            return $BillE->deleteTypeClient($id);
        }

     
    }

    
?>