<?php
    require_once '../models/RolesModel.php';
    class UsersController{

        public function show(){    
            $role = new RoleModel();
            $page = $_REQUEST['page'];
            return $role->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new RoleModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $roles  = $_POST['nameRoles'];
            

            $roleI = new RoleModel();
            return $roleI->createRole($roles);
        }

        public function update(){
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $roleU = new RoleModel();
            return $roleU->updateRole($body->nameRoles, $id);
        }

        public function delete(){
            $id = $_REQUEST['id'];
            $roleE = new RoleModel();
            return $roleE->deleteRole($id);
        }

     
    }

    
?>