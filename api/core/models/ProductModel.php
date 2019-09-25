<?php
//Se incluye el archivo PHP de conexión con la base de datos
require_once '../helpers/connection.php';

//Se crea la clase Product model que tiene las funciones para obtener los datos de la base de datos
class ProductModel extends Connection
{

    //Función para realizar la consulta de los datos 
    public function consult($num)
    {
        $connection = parent::connect();
        try {
            $rowpaper = 5;
            $page = 1 + $num;
            $page = $page - 1;
            $p = $page * $rowpaper;
            $query = 'SELECT id_producto, nombre_produc, precio_uni, descripcion, proveedor.nombre_prove FROM produto INNER JOIN proveedor ON produto.id_proveedor = proveedor.id_proveedor limit ' . $p . ', ' . $rowpaper;
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al ingresar un registro',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    //Función para obtener el número de datos 
    public function consultNum()
    {
        $connection = parent::connect();
        try {
            $query = 'SELECT count(id_producto) as num FROM produto';
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al obtener registros',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    public function consultProducts()
    {
        $connection = parent::connect();
        try {
            $query = 'SELECT id_producto, nombre_produc, precio_uni, descripcion FROM produto';
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al obtener registros',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    public function consultOneProducts($id)
    {
        $connection = parent::connect();
        try {
            $query = 'SELECT id_producto, nombre_produc, precio_uni, descripcion FROM produto WHERE id_producto ='.$id;
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al obtener registros',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    //Función para realizar la acción de crear un nuevo dato
    public function createProduct($name, $price, $description, $name_provider)
    {
        $conexion = parent::connect();
        try {
            $query = 'INSERT INTO produto(nombre_produc, precio_uni, descripcion, id_proveedor) VALUES (?,?,?,?)';
            $conexion->prepare($query)->execute(array($name, $price, $description, $name_provider));
            $array = [
                'message' => 'He insertado un registro',
                'type' => 'success',
                'specificMessage' => $conexion
            ];
            return json_encode($array);
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al ingresar un registro',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    //Función para actualizar los datos
    public function updateProduct($name, $price, $description, $name_provider, $id)
    {
        $conexion = parent::connect();
        try {
            $query = 'UPDATE produto SET nombre_produc=?, precio_uni=?, descripcion=?, id_proveedor=? WHERE id_producto=?';
            $conexion->prepare($query)->execute(array($name, $price, $description, $name_provider, $id));
            $array = [
                'message' => 'He actualizado un registro',
                'type' => 'success',
                'specificMessage' => $conexion
            ];
            return json_encode($array);
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al actualizar un registro',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }

    //Función para eliminar los datos
    public function deleteProduct($id)
    {
        $conexion = parent::connect();
        try {
            $query = 'DELETE FROM produto WHERE id_producto=?';
            $conexion->prepare($query)->execute(array($id));
            $array = [
                'message' => 'He borrado un registro',
                'type' => 'success',
                'specificMessage' => $conexion
            ];
            return json_encode($array);
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al borrar un registro',
                'type' => 'error',
                'specificMessage' => $e->getMessage()
            ];
            return json_encode($array);
        }
    }
}
