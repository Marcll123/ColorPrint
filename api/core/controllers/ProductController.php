<?php
    require_once '../models/ProductModel.php';
    class ProductController{

        public function show(){    
            $product = new ProductModel();
            $page = $_REQUEST['page'];
            return $product->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new ProductModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $product  = $_POST['nameProduct'];
            $price = $_POST['priceProduct'];
            $description = $_POST['descriptionProduct'];
            $idProvider = $_POST['typeProvider'];

            $productI = new ProductModel();
            return $productI->createProduct($product , $price, $description,  $idProvider);
        }

        public function update(){
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $productU = new ProductModel();
            return $productU->updateProduct($body->nameProduct, $body->priceProduct, 
            $body->descriptionProduct, $body->typeProvider, $id);
        }

        public function delete(){
            $id = $_REQUEST['id'];
            $productE = new ProductModel();
            return $productE->deleteUser($id);
        }

     
    }

    
?>