<?php

      require_once '../helpers/connection.php';
    
      class ClientModel extends Connection {
        public $ids = null;
        public $numberdocu = null;
        public $supplier = null;
        public $address = null;
        public $winery = null;
        public $typec = null;
        public $seriescos = null;
        public $typepur = null;
        public $way = null;
        public $idorigin = null;
        public $numregi = null;
        public $purchasenum = null;
        public $dai = null;
        public $excludeddoc = null;

        public function consult($num)
        {
            $connection = parent::connect();
            try {      
                $rowpaper = 5;
                $page = 1+$num;
                $page = $page-1;
                $p = $page*$rowpaper;
                $query = 'SELECT * FROM compra  limit '.$p.', '.$rowpaper;
                $data=  $connection->query($query,PDO::FETCH_ASSOC)->fetchAll();
              return $data;
            } catch (Exception $e) {
                $array = [
                    'message' => 'Error al ingresar una compra',
                    'type' => 'error',
                    'specificMessage' => $e->getMessage()
                ];
                return json_encode($array);
            }
        }

        public function consultNum(){         
            $connection = parent::connect();
            try {                   
                $query = 'SELECT count(*) as num FROM compra';
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

        public function createShop($numberdocu , $supplier, $address , $supplier, $winery , $typec, $seriescos , $typepur, $way , $idorigin, $numregi , $purchasenum, $dai , $excludeddoc){
            $conexion = parent::connect();       
            try {
                $query = 'INSERT INTO compra(numerodocumento, id_proveedor, direccion, 	bodega, id_tipodoc, serie_costo, id_tipocompra, id_forma, id_origencom, num_registro, num_compra, dai, doc_excluidos) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)';
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

        public function updateShop($numberdocu , $supplier, $address , $supplier, $winery , $typec, $seriescos , $typepur, $way , $idorigin, $numregi , $purchasenum, $dai , $excludeddoc, $ids){
            $conexion = parent::connect();       
            try {
                $query = 'UPDATE compra SET numerodocumento=?, id_proveedor=?, direccion=?, bodega=?, id_tipodoc=?, serie_costo=?, id_tipocompra=?, saldo_acumu=?, id_forma=?, id_origencom=?, num_registro=?, num_compra=?, dai=?, doc_excluidos=? WHERE id_compra=?';
                $conexion->prepare($query)->execute(array($numberdocu , $supplier, $address , $supplier, $winery , $typec, $seriescos , $typepur, $way , $idorigin, $numregi , $purchasenum, $dai , $excludeddoc, $ids));
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

        public function deleteShop($id){
            $conexion = parent::connect();       
            try {
                $query = 'DELETE FROM compra WHERE id_compra=?';
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