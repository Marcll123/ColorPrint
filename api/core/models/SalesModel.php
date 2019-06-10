<?php
     require_once '../helpers/Connection.php';
     
     class SalesModel extends Connection {
        public function consult($num)
        {
            $connection = parent::connect();
            try {      
                $rowpaper = 5;
                $page = 1+$num;
                $page = $page-1;
                $p = $page*$rowpaper;
                $query = 'SELECT * FROM ventas  limit '.$p.', '.$rowpaper;
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
                $query = 'SELECT count(*) as num FROM ventas';
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

        public function createSale($id_sucursal , $tipo_com, $id_cliente, $direccion, $forma, $dias_credito,$punto_venta,$contacto,$tipo_venta,$tipo_fac,$id_usuario,$nota_remision,$num_pedido,$bodega){
            $conexion = parent::connect();       
            try {
                $query = 'INSERT INTO ventas(id_sucursal, id_tipocom,id_cliente, direccion, id_forma, dias_credito, punto_venta, contacto,id_tipoven,id_tipofac,id_usuario,nota_remision,num_pedido,bodega) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
                $conexion->prepare($query)->execute(array($id_sucursal , $tipo_com, $id_cliente, $direccion, $forma, $dias_credito,$punto_venta,$contacto,$tipo_venta,
                $tipo_fac,$id_usuario,$nota_remision,$num_pedido,$bodega));
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

        public function updateSale($id_sucursal , $tipo_com, $id_cliente, $direccion, $forma, $dias_credito,$punto_venta,$contacto,$tipo_venta,
        $tipo_fac,$id_usuario,$nota_remision,$num_pedido,$bodega, $id){
            $conexion = parent::connect();       
            try {
                $query = 'UPDATE ventas SET id_sucursal=? , id_tipocom=?,id_cliente=?, direccion=?, id_forma=?, dias_credito=?, punto_venta=?, contacto=?,id_tipoven=?,id_tipofac=?,id_usuario=?,nota_remision=?,num_pedido=?,bodega=? WHERE id_venta=?';
                $conexion->prepare($query)->execute(array($id_sucursal , $tipo_com, $id_cliente, $direccion, $forma, $dias_credito,$punto_venta,$contacto,$tipo_venta,
                $tipo_fac,$id_usuario,$nota_remision,$num_pedido,$bodega ,$id));
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

        public function deleteSale($id){
            $conexion = parent::connect();       
            try {
                $query = 'DELETE FROM ventas WHERE id_venta=?';
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
