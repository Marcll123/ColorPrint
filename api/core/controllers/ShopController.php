<?php
     require_once '../models/ShopModel.php';
     
     class ShopController{
        public function show(){    
            $shops = new shopModel();
            $page = $_REQUEST['page'];
            return $user->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new ShopModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $numberdocu  = $_POST['numedoc'];
            $supplier = $_POST['idsupplier'];
            $address = $_POST['addes'];
            $winery  = $_POST['wine'];
            $typec = $_POST['type'];
            $seriescos = $_POST['seriesc'];
            $typepur  = $_POST['typep'];
            $way = $_POST['idway'];
            $idorigin = $_POST['idorig'];
            $numregi  = $_POST['numre'];
            $purchasenum = $_POST['purchasen'];
            $dai = $_POST['daii'];
            $excludeddoc  = $_POST['excludeddo'];
            $ids = $_POST['idsh'];

            $clientI = new ShopModel();
            return $shopI->createShop($numberdocu , $supplier, $address, $winery, $typec, $seriescos, $typepur, $way, $idorigin, $numregi, $purchasenum, $dai, $excludeddoc, $ids);
        }

        public function updateShop(){
            $id = $_REQUEST['idsh'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $shopU = new ShopModel();
            return $shopU->updateshop($body->numberdocu, $body->supplier, $body->address, $body->winery, $body->typec, $body->seriescos, $body->typepur, $body->way, $body->idorigin, $body->numregi, $body->purchasenum, $body->dai, $body->excludeddoc, $ids);
        }

        public function deleteShop(){
            $id = $_REQUEST['idsh'];
            $shopE = new ShopModel();
            return $shopE->deleteShop($id);
        }
     }

?>