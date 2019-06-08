<?php
     require_once '../models/MunicipalityModel.php';
     
     class MunicipalityController{
        public function show(){    
            $municipality = new MunicipalityModel();
            $page = $_REQUEST['page'];
            return $user->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new MunicipalityModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $municipality  = $_POST['municipalityy'];
            $department = $_POST['departmentt'];
            $id = $_POST['idm'];

            $municipalityI = new MunicipalityModel();
            return $municipalityI->createMunicipality($municipality , $department, $id);
        }

        public function update(){
            $id = $_REQUEST['idm'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $municipalityU = new MunicipalityModel();
            return $municipalityU->updateMunicipality($body->municipality, $body->department, $id);
        }

        public function delete(){
            $id = $_REQUEST['idm'];
            $municipalityE = new MunicipalityModel();
            return $municipalityE->deleteMunicipality($id);
        }
     }

?>