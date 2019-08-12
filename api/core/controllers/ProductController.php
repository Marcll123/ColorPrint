<?php
require_once '../models/ProductModel.php';
class ProductController
{

    public function show()
    {
        $product = new ProductModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $product->consult($page - 1);
        }
    }
    public function showNum()
    {
        $productNum = new ProductModel();
        return $productNum->consultNum();
    }
    public function save()
    {
        if (isset($_POST['nombre_produc']) && isset($_POST['precio_uni']) && isset($_POST['descripcion']) && isset($_POST['id_proveedor'])) {
            $product  = $_POST['nombre_produc'];
            $price = $_POST['precio_uni'];
            $description = $_POST['descripcion'];
            $idProvider = $_POST['id_proveedor'];

            $productCreate = new ProductModel();
            return $productCreate->createProduct($product, $price, $description,  $idProvider);
        }
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $productUpdate = new ProductModel();
            return $productUpdate->updateProduct(
                $body->nombre_produc,
                $body->precio_uni,
                $body->descripcion,
                $body->id_proveedor,
                $id
            );
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $productDelete = new ProductModel();
            return $productDelete->deleteProduct($id);
        }
    }
}
