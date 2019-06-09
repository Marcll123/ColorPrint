<?php
     require_once '../models/PurchaseDModel.php';
     
     class PurchaseDController{
        public function show(){    
            $PurchaseD = new PurchaseDModel();
            $page = $_REQUEST['page'];
            return $user->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new PurchaseDModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $product  = $_POST['productt'];
            $quantity = $_POST['quantityy'];
            $description = $_POST['descriptionn'];
            $priceu = $_POST['priceuu'];
            $totale = $_POST['totalee'];
            $totalt = $_POST['totaltt'];
            $purchase = $_POST['purchasee'];
            $id = $_POST['idp'];

            $PurchaseDI = new PurchaseDModel();
            return $PurchaseDI->createPurchaseD($product , $quantity, $description, $priceu, $totale, $totalt, $purchase, $id);
        }

        public function update(){
            $id = $_REQUEST['idp'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $PurchaseDU = new PurchaseDModel();
            return $PurchaseDU->updatePurchaseD($body->product, $body->quantity, $body->description, $body->priceu, $body->totale, $body->totalt, $body->purchase, $id);
        }

        public function delete(){
            $id = $_REQUEST['idp'];
            $PurchaseDE = new PurchaseDModel();
            return $PurchaseDE->deletePurchaseD($id);
        }
     }

?>