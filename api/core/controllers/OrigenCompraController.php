<?php
    require_once '../models/UsersModel.php';
    class OrigenCompraController{

        public function show(){    
            $compra = new OrigenCompraModel();
            $page = $_REQUEST['page'];
            return $compra->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new OrigenCompraModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $origen_com = $_POST['origenCom'];
          
            $compraI = new OrigenCompraModel();
            return $userI->createCompra($origen_com);
        }

        public function update(){
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $compraU = new OrigenCompraModel();
            return $compraU->updateCompra($body->origen_com, $id);
        }

        public function delete(){
            $id = $_REQUEST['id'];
            $compraE = new OrigenCompraModel();
            return $compraE->deleteCompra($id);
        }

     
    }

    
?>