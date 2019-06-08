<?php

      require_once '../helpers/connection.php';
    
      class PurchasedModel extends Connection {
        public $id = null;
        public $product = null;
        public $quantity = null;
        public $description = null;
        public $priceu = null;
        public $totale = null;
        public $totalt = null;
        public $purchase = null;

        public function consult($num)
        {
            $connection = parent::connect();
            try {      
                $rowpaper = 5;
                $page = 1+$num;
                $page = $page-1;
                $p = $page*$rowpaper;
                $query = 'SELECT * FROM detallecompra  limit '.$p.', '.$rowpaper;
                $data=  $connection->query($query,PDO::FETCH_ASSOC)->fetchAll();
              return $data;
            } catch (Exception $e) {
                $array = [
                    'message' => 'Error al ingresar el detalle de lacompra',
                    'type' => 'error',
                    'specificMessage' => $e->getMessage()
                ];
                return json_encode($array);
            }
        }

        public function consultNum(){         
            $connection = parent::connect();
            try {                   
                $query = 'SELECT count(*) as num FROM detallecompra';
                $data=  $connection->query($query,PDO::FETCH_ASSOC)->fetchAll();
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

        public function createPurchased($product , $quantity, $description , $priceu, $totale , $totalt, $purchase){
            $conexion = parent::connect();       
            try {
                $query = 'INSERT INTO detallecompra(id_producto, cantidad, descripcion, precio_uni, total_exeno, total_grabado, id_compra) VALUES (?,?,?,?,?,?,?)';
                $conexion->prepare($query)->execute(array($role , $permits));
                $array = [
                    'message' => 'He insertado un registro',
                    'type' => 'success',
                    'specificMessage' =>$conexion
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

        public function updatePurchased($product , $quantity, $description , $priceu, $totale , $totalt, $purchase, $id){
            $conexion = parent::connect();       
            try {
                $query = 'UPDATE detallecompra SET id_producto=?, cantidad=?, descripcion=?, precio_uni=?, total_exeno=?, total_grabado=?, 	id_compra=? WHERE id_detallecom=?';
                $conexion->prepare($query)->execute(array($product , $quantity, $description , $priceu, $totale , $totalt, $purchase, $id));
                $array = [
                    'message' => 'He actualizado un registro',
                    'type' => 'success',
                    'specificMessage' =>$conexion
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

        public function deletePurchased($id){
            $conexion = parent::connect();       
            try {
                $query = 'DELETE FROM detallecompra WHERE id_detallecom=?';
                $conexion->prepare($query)->execute(array($id));
                $array = [
                    'message' => 'He borrado un registro',
                    'type' => 'success',
                    'specificMessage' =>$conexion
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
?>