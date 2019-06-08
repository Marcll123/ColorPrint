<?php
    require_once '../models/TypeVoucherModel.php';
    class TypeVoucherController{

        public function show(){    
            $Voucher = new TypeVoucherModel();
            $page = $_REQUEST['page'];
            return $Voucher->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new TypeVoucherModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $TypeVoucher  = $_POST['TypeVoucher'];
          

            $VoucherI = new TypeVoucherModel();
            return $VoucherI->createTypeVoucher($TypeVoucher);
        }

        public function update(){
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $VoucherU = new TypeVoucherModel();
            return $VoucherU->updateTypeVoucher($body->TypeVoucher,  $id);
        }

        public function delete(){
            $id = $_REQUEST['id'];
            $VoucherE = new TypeVoucherModel();
            return $VoucherE->deleteTypeVoucher($id);
        }

     
    }

    
?>