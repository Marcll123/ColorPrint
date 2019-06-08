<?php
    require_once '../models/PermitsModel.php';
    class PermitsController{

        public function show(){    
            $Permit = new PermitModel();
            $page = $_REQUEST['page'];
            return $Permit->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new PermitModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $permiso  = $_POST['permiso'];
            

            $PermitI = new PermitModel();
            return $PermitI->createPermit($permiso);
        }

        public function update(){
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $PermitU = new PermitModel();
            return $PermitU->updatepermit($body->permiso, $id);
        }

        public function delete(){
            $id = $_REQUEST['id'];
            $PermitE = new PermitModel();
            return $PermitE->deletePermit($id);
        }

     
    }

    
?>