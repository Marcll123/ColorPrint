<?php
//Se incluye el archivo PHP de conexión con la base de datos
require_once '../helpers/connection.php';
    
      class QuatationModel extends Connection {
        //Función para realizar la consulta de los datos   
        public function consult($num)
        {
            $connection = parent::connect();
            try {      
                $rowpaper = 5;
                $page = 1+$num;
                $page = $page-1;
                $p = $page*$rowpaper;
                $query = 'SELECT id_cotizacion, cantidad, descripcion, precio_unitario, cliente.cliente, total, numero_cotizacion FROM cotizaciones INNER JOIN cliente ON cotizaciones.id_cliente = cliente.id_cliente  limit '.$p.', '.$rowpaper;
                $data=  $connection->query($query,PDO::FETCH_ASSOC)->fetchAll();
              return $data;
            } catch (Exception $e) {
                $array = [
                    'message' => 'Error al ingresar la cotizaciones',
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
                $query = 'SELECT count(id_cotizacion) as num FROM cotizaciones';
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
        public function createQuotation($quantity , $description, $price, $client, $total, $num_quatation){
            $conexion = parent::connect();       
            try {
                $query = 'INSERT INTO cotizaciones(cantidad, descripcion, precio_unitario, id_cliente, total, numerp_cotizacion) VALUES (?,?,?,?,?,?)';
                $conexion->prepare($query)->execute(array($quantity , $description, $price, $client, $total, $num_quatation));
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
        public function updateQuotation($quantity , $description, $price, $client, $total, $num_quatation, $id){
            $conexion = parent::connect();       
            try {
                $query = 'UPDATE cotizaciones SET cantidad=?, descripcion=?, precio=?, id_cliente=?, total=?, numero_cotizacion WHERE id_cotizacion=?';
                $conexion->prepare($query)->execute(array($quantity , $description, $price, $client, $total, $num_quatation, $id));
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
        public function deleteQuatation($id){
            $conexion = parent::connect();       
            try {
                $query = 'DELETE FROM cotizaciones WHERE id_cotizacion=?';
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