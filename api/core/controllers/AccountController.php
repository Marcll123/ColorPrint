<?php
     require_once '../models/AccountModel.php';
     
     class ActionsController{
        public function show(){    
            $account = new AccountModel();
            $page = $_REQUEST['page'];
            return $user->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new AccountModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $account  = $_POST['cuenta'];
            $id= $_POST['id'];

            $userI = new AccountModel();
            return $accountI->createUser($account, $id);
        }

        public function update(){
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $userU = new AccountModel();
            return $accountU->updateAccount($body->account, $id);
        }

        public function delete(){
            $id = $_REQUEST['id'];
            $accountE = new AccountModel();
            return $accountE->deleteaccount($id);
        }
     }

?>