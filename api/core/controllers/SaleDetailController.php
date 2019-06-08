<?php
     require_once '../models/SaleDetailModel.php';
     
     class ShopController{
        public function show(){    
            $shops = new SaleDetailModel();
            $page = $_REQUEST['page'];
            return $user->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new SaleDetailModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $cproduct  = $_POST['cproducto'];
            $umd = $_POST['umdd'];
            $quantity = $_POST['quantityy'];
            $discount  = $_POST['discountt'];
            $vnosubject = $_POST['vnosubjectt'];
            $veffector = $_POST['veffectorr'];
            $tp  = $_POST['tpp'];
            $description = $_POST['descriptionn'];
            $total_e = $_POST['total_ee'];
            $price  = $_POST['pricee'];
            $vconversion = $_POST['vconversionn'];
            $uconversion = $_POST['uconversionn'];
            $total  = $_POST['totall'];
            $saleid  = $_POST['saleidd'];
            $id = $_POST['idsad'];

            $clientI = new SaleDetailModel();
            return $shopI->createShop($cproduct , $umd, $quantity, $discount, $vnosubject, $veffector, $tp, $description, $total_e, $price, $vconversion, $uconversion, $total, $saleid, $id);
        }

        public function updateSaleDetail(){
            $id = $_REQUEST['idsh'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $saledetailU = new SaleDetailModel();
            return $saledetailU->updateshop($body->cproduct, $body->umd, $body->quantity, $body->discount, $body->vnosubject, $body->veffector, $body->tp, $body->description, $body->total_e, $body->price, $body->vconversion, $body->uconversion, $body->total, $body->saleid, $id);
        }

        public function deleteSaleDetail(){
            $id = $_REQUEST['idsh'];
            $saledetailE = new SaleDetailModel();
            return $saledetailE->deleteSaleDetail($id);
        }
     }

?>