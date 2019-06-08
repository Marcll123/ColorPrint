<?php
     require_once '../helpers/connection.php';
     
     class VoucherModel extends Connection {
        public $id = null; 
        public $typeVoucher = null;
      
        
        public function consult($num)
        {
            $connection = parent::connect();
            try {      
                $rowpaper = 5;
                $page = 1+$num;
                $page = $page-1;
                $p = $page*$rowpaper;
                $query = 'SELECT * FROM tipo_comprobante  limit '.$p.', '.$rowpaper;
                $data=  $connection->query($query,PDO::FETCH_ASSOC)->fetchAll();
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

        public function consultNum(){         
            $connection = parent::connect();
            try {                   
                $query = 'SELECT count(*) as num FROM tipo_comprobante';
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

        public function createTypeVoucher($typeVoucher){
            $conexion = parent::connect();       
            try {
                $query = 'INSERT INTO Tipo_comprobante(tipo_compro) VALUES (?)';
                $conexion->prepare($query)->execute(array($typeVoucher));
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

        public function updateTypeVoucher($typeVoucher, $id){
            $conexion = parent::connect();       
            try {
                $query = 'UPDATE tipo_comprobante SET tipo_compro=? WHERE id_tipocom=?';
                $conexion->prepare($query)->execute(array($typeVoucher,$id));
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

        public function deleteTypeVoucher($id){
            $conexion = parent::connect();       
            try {
                $query = 'DELETE FROM tipo_comprobante WHERE id_tipocom=?';
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