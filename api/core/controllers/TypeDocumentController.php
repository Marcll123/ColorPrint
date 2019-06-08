<?php
    require_once '../models/TypeDocumentModel.php';
    class TypeDocumentController{

        public function show(){    
            $Document = new TypeDocumentModel();
            $page = $_REQUEST['page'];
            return $Document->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new TypeDocumentModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $TypeDocument  = $_POST['TypeDocument'];
          

            $DocumentI = new TypeDocumentModel();
            return $DocumentI->createTypeDocument($TypeDocument);
        }

        public function update(){
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $DocumentU = new TypeDocumentModel();
            return $DocumentU->updateTypeDocument($body->TypeDocument,  $id);
        }

        public function delete(){
            $id = $_REQUEST['id'];
            $DocumentE = new TypeDocumentModel();
            return $DocumentE->deleteTypeDocument($id);
        }

     
    }

    
?>