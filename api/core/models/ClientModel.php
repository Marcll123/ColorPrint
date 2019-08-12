<?php
//Se incluye el archivo PHP de conexión con la base de datos
require_once '../helpers/Connection.php';

//Se crea la clase Client model que tiene las funciones para obtener los datos de la base de datos
class ClientModel extends Connection
{
    //Función para realizar la consulta de los datos 
    public function consult($num)
    {
        $connection = parent::connect();
        try {
            $rowpaper = 10;
            $page = 1 + $num;
            $page = $page - 1;
            $p = $page * $rowpaper;
            $query = 'SELECT id_cliente, cliente, giro, numero_nit, numero_registro, municipio.municipio, telefono, numero_fax, correo, 
            saldo_acumu, limite_credito, formapago.forma_pago, dias_credito, cuenta.cuenta, aplica_reten, codigo_vendedor,
            ultifechapago, creadopor, fechacreacion, tipocliente.tipo_cliete FROM cliente INNER JOIN municipio ON cliente.id_muni = municipio.id_muni 
            INNER JOIN formapago ON cliente.id_forma = formapago.id_forma INNER JOIN cuenta ON cliente.id_cuenta = cuenta.id_cuenta INNER JOIN tipocliente 
            ON cliente.id_tipocli = tipocliente.id_tipocli limit ' . $p . ', ' . $rowpaper;
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
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

   //Función para obtener el número de datos 
    public function consultNum()
    {
        $connection = parent::connect();
        try {
            $query = 'SELECT count(id_cliente) as num FROM cliente';
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
    public function createClient($client, $turn, $nitnumber, $registrationnumber, $id_municipality, $telephone, $fax, $email, $totalbalance, $creditlimit, $paymentmethod, $creditdays, $account, $rentapplies, $seller, $lastpaymentdate, $createdby, $creationdate, $customerid)
    {
        $conexion = parent::connect();
        try {
            $query = 'INSERT INTO cliente(cliente, giro, numero_nit, numero_registro, id_muni, telefono, numero_fax, correo, saldo_acumu, limite_credito, id_forma, dias_credito, id_cuenta, aplica_reten, codigo_vendedor, ultifechapago, creadopor, fechacreacion, id_tipocli) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $conexion->prepare($query)->execute(array($client, $turn, $nitnumber, $registrationnumber, $id_municipality, $telephone, $fax, $email, $totalbalance, $creditlimit, $paymentmethod, $creditdays, $account, $rentapplies, $seller, $lastpaymentdate, $createdby, $creationdate, $customerid));
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
    public function updateClient($client, $turn, $nitnumber, $registrationnumber, $id_municipality, $telephone, $fax, $email, $totalbalance, $creditlimit, $paymentmethod, $creditdays, $account, $rentapplies, $seller, $lastpaymentdate, $createdby, $creationdate, $customerid, $id)
    {
        $conexion = parent::connect();
        try {
            $query = 'UPDATE cliente SET cliente=?, giro=?, numero_nit=?, numero_registro=? ,id_muni=?, telefono=?, numero_fax=?, correo=?,saldo_acumu=?, limite_credito=?, id_forma=?, dias_credito=?, id_cuenta=?, aplica_reten=?, codigo_vendedor=?, ultifechapago=?, creadopor=?, fechacreacion=?, id_tipocli=? WHERE id_cliente=?';
            $conexion->prepare($query)->execute(array($client, $turn, $nitnumber, $registrationnumber, $id_municipality, $telephone, $fax, $email, $totalbalance, $creditlimit, $paymentmethod, $creditdays, $account, $rentapplies, $seller, $lastpaymentdate, $createdby, $creationdate, $customerid, $id));
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
    public function deleteClients($id)
    {
        $conexion = parent::connect();
        try {
            $query = 'DELETE FROM cliente WHERE id_cliente=?';
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
