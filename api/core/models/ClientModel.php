<?php

      require_once '../helpers/connection.php';
    
      class ClientModel extends Connection {
        public $id = null;
        public $name = null;
        public $turn = null;
        public $nit = null;
        public $numrestra = null;
        public $municipality = null;
        public $phone = null;
        public $numfax = null;
        public $email = null;
        public $contact = null;
        public $balanceac = null;
        public $creditlimit = null;
        public $way = null;
        public $creditdays = null;
        public $account = null;
        public $applyrent = null;
        public $sellercode = null;
        public $lastday = null;
        public $createdby = null;
        public $creationday = null;
        public $typeclient = null;

        public function consult($num)
        {
            $connection = parent::connect();
            try {      
                $rowpaper = 5;
                $page = 1+$num;
                $page = $page-1;
                $p = $page*$rowpaper;
                $query = 'SELECT * FROM cliente  limit '.$p.', '.$rowpaper;
                $data=  $connection->query($query,PDO::FETCH_ASSOC)->fetchAll();
              return $data;
            } catch (Exception $e) {
                $array = [
                    'message' => 'Error al ingresar una Accion',
                    'type' => 'error',
                    'specificMessage' => $e->getMessage()
                ];
                return json_encode($array);
            }
        }

        public function consultNum(){         
            $connection = parent::connect();
            try {                   
                $query = 'SELECT count(*) as num FROM cliente';
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

        public function createClient($role , $permits){
            $conexion = parent::connect();       
            try {
                $query = 'INSERT INTO cliente(cliente, giro, numero_nit, numero_registro, id_muni, telefono, numero_fax, correo, contantos, saldo_acumu, limite_credito, id_forma, dias_credito, id_cuenta, aplica_reten, codigo_vendedor, 	ultifechapago, creadopor, fechacreacion, id_tipocli) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
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

        public function updateClient($role , $permits, $id){
            $conexion = parent::connect();       
            try {
                $query = 'UPDATE cliente SET cliente=?, giro=?, numero_nit=?, id_muni=?, telefono=?, numero_fax=?, contantos=?, saldo_acumu=?, limite_credito=?, id_forma=?, dias_credito=?, id_cuenta=?, aplica_reten=?, codigo_vendedor=?, ultifechapago=?, creadopor=?, fechacreacion=?, id_tipocli WHERE id_cliente=?';
                $conexion->prepare($query)->execute(array($role , $permits, $id));
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

        public function deleteClients($id){
            $conexion = parent::connect();       
            try {
                $query = 'DELETE FROM cliente WHERE id_cliente=?';
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