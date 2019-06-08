<?php
    require_once '../models/UsersModel.php';
    class SubsidiaryController{

        public function show(){    
            $Subsidiary = new SubsidiaryModel();
            $page = $_REQUEST['page'];
            return $Subsidiary->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new SubsidiaryModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $Subsidiary  = $_POST['nameSubsidiary'];
            $location = $_POST['location'];
            

            $SubsidiaryI = new SubsidiaryModel();
            return $SubsidiaryI->createSubsidiary($Subsidiary,$location);
        }

        public function update(){
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $SubsidiaryU = new SubsidiaryModel();
            return $SubsidiaryU->updateSubsidiary($body->nameSubsidiary, $body->location, $id);
        }

        public function delete(){
            $id = $_REQUEST['id'];
            $SubsidiaryE = new SubsidiaryModel();
            return $SubsidiaryE->deleteSubsidiary($id);
        }

     
    }

    
?>