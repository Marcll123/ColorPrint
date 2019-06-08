<?php
     require_once '../models/QuotationModel.php';
     
     class QuotationController{
        public function show(){    
            $BShopping = new QuotationModel();
            $page = $_REQUEST['page'];
            return $user->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new QuotationModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $quantity  = $_POST['quanti'];
            $product = $_POST['produc'];
            $price = $_POST['pricee'];
            $discount = $_POST['discountt'];
            $client = $_POST['clientt'];
            $total = $_POST['totall'];
            $idqu = $_POST['id'];

            $quotationI = new QuotationModel();
            return $quotationI->createQuotation($quantity , $product, $price, $discount, $client, $total, $idqu);
        }

        public function update(){
            $idqu = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $quantity = new QuotationModel();
            return $quotationsU->updateQuotation($body->quantity, $body->product, $body->price, $body->discount, $body->client, $body->total, $id);
        }

        public function delete(){
            $idqu = $_REQUEST['id'];
            $quotationE = new QuotationModel();
            return $quotationE->deleteQuotation($idqu);
        }
     }

?>