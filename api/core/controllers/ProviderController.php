<?php
    require_once '../models/ProviderModel.php';
    class ProviderController{

        public function show(){    
            $provider = new ProviderModel();
            $page = $_REQUEST['page'];
            return $provider->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new ProviderModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $provider  = $_POST['nameProvider'];
            $nit = $_POST['numberNit'];
            
            $providerI = new ProviderModel();
            return $providerI->createProvider($provider , $nit);
        }

        public function update(){
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $providerU = new ProviderModel();
            return $userU->updateProvider($body->nameProvider, $body->numberNit,$id);
        }

        public function delete(){
            $id = $_REQUEST['id'];
            $providerE = new ProviderModel();
            return $providerE->deleteProvider($id);
        }

     
    }

    
?>