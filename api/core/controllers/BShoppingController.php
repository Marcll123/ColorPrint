<?php
     require_once '../models/BShoppingModel.php';
     
     class BShopController{
        public function show(){    
            $BShopping = new BShoppingModel();
            $page = $_REQUEST['page'];
            return $user->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new BShoppingModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $shopping  = $_POST['shop'];
            $date = $_POST['dates'];
            $idBShopping = $_POST['id'];

            $userI = new BShoppingModel();
            return $userI->createUser($shopping , $date, $idBShopping);
        }

        public function update(){
            $idBShopping = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $userU = new BShoppingModel();
            return $actionsU->updateActions($body->shop, $body->dates, $id);
        }

        public function delete(){
            $idBShopping = $_REQUEST['id'];
            $userE = new BShoppingModel();
            return $userE->deleteUser($id);
        }
     }

?>