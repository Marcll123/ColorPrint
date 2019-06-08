<?php
     require_once '../models/ActionsModel.php';
     
     class ActionsController{
        public function show(){    
            $actions = new ActionsModel();
            $page = $_REQUEST['page'];
            return $user->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new ActionsModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $role  = $_POST['rol'];
            $permits = $_POST['permit'];
            $id = $_POST['ida'];

            $userI = new ActionsModel();
            return $actionsI->createUser($role , $permits, $id);
        }

        public function update(){
            $id = $_REQUEST['ida'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $userU = new ActionsModel();
            return $actionsU->updateActions($body->rol, $body->permit, $id);
        }

        public function delete(){
            $id = $_REQUEST['ida'];
            $userE = new ActionsModel();
            return $userE->deleteUser($id);
        }
     }

?>