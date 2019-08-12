<?php
//Se incluye el archivo PHP de conexión con la base de datos
require_once '../helpers/connection.php';
//Se crea la clase Actions model que tiene las funciones para obtener los datos de la base de datos
      class WayToPayModel extends Connection {

        //Función para realizar la consulta de los datos 
        public function consult($num)
        {
            $connection = parent::connect();
            try {      
                $rowpaper = 5;
                $page = 1+$num;
                $page = $page-1;
                $p = $page*$rowpaper;
                $query = 'SELECT id_forma, forma_pago FROM formapago limit '.$p.', '.$rowpaper;
                $data=  $connection->query($query,PDO::FETCH_ASSOC)->fetchAll();
              return $data;
            } catch (Exception $e) {
                $array = [
                    'message' => 'Error al ingresar la forma de pago',
                    'type' => 'error',
                    'specificMessage' => $e->getMessage()
                ];
                return json_encode($array);
            }
        }

        //Función para obtener el número de datos 
        public function consultNum(){         
            $connection = parent::connect();
            try {                   
                $query = 'SELECT count(id_forma) as num FROM formapago';
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

        //Función para realizar la acción de crear un nuevo dato
        public function createWaytopay($waypay){
            $conexion = parent::connect();       
            try {
                $query = 'INSERT INTO formapago(forma_pago) VALUES (?)';
                $conexion->prepare($query)->execute(array($waypay));
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

        //Función para actualizar los datos
        public function updateWaytopay($account, $id){
            $conexion = parent::connect();       
            try {
                $query = 'UPDATE formapago SET forma_pago=? WHERE id_forma=?';
                $conexion->prepare($query)->execute(array($waypay, $id));
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

        //Función para eliminar los datos
        public function deleteWaytopay($id){
            $conexion = parent::connect();       
            try {
                $query = 'DELETE FROM formapago WHERE id_forma=?';
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