<?php
//Se incluye el archivo PHP de conexión con la base de datos
require_once '../helpers/connection.php';

//Se crea la clase Actions model que tiene las funciones para obtener los datos de la base de datos
     class TypeVoucherModel extends Connection {

 //Función para realizar la consulta de los datos 
        public function consult($num)
        {
            $connection = parent::connect();
            try {      
                $rowpaper = 5;
                $page = 1+$num;
                $page = $page-1;
                $p = $page*$rowpaper;
                $query = 'SELECT id_tipocom, tipo_compro FROM tipo_comprobante limit '.$p.', '.$rowpaper;
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

        //Función para obtener el número de datos 
        public function consultNum(){         
            $connection = parent::connect();
            try {                   
                $query = 'SELECT count(id_tipocom) as num FROM tipo_comprobante';
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
        public function createTypeVoucher($typeVoucher){
            $conexion = parent::connect();       
            try {
                $query = 'INSERT INTO tipo_comprobante(tipo_compro) VALUES (?)';
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

        //Función para actualizar los datos
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

        //Función para eliminar los datos
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