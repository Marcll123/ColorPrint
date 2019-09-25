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
            $rowpaper = 5;
            $page = 1 + $num;
            $page = $page - 1;
            $p = $page * $rowpaper;
            $query = 'SELECT id_cliente, cliente, numero_registro, direccion, departamento.departamento, tipocliente.tipo_cliete FROM cliente INNER JOIN departamento ON departamento.id_dep = cliente.id_departamento INNER JOIN tipocliente ON tipocliente.id_tipocli = cliente.id_tipocli limit ' . $p . ', ' . $rowpaper;
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

    public function searchClient($cliente)
    {
        $connection = parent::connect();
        try {
            $query = "SELECT id_cliente, cliente, numero_registro, direccion, departamento.departamento, tipocliente.tipo_cliete FROM cliente INNER JOIN departamento ON departamento.id_dep = cliente.id_departamento INNER JOIN tipocliente ON tipocliente.id_tipocli = cliente.id_tipocli WHERE cliente.cliente LIKE '%$cliente%'";
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

    public function consultOneClientId($id)
    {
        $connection = parent::connect();
        try {
            $query = "SELECT id_cliente, cliente, giro ,direccion, numero_registro, numero_nit, telefono, correo, saldo_acumu, limite_credito, dias_credito FROM cliente  WHERE id_cliente =".$id;
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
    public function createClient($client, $turn, $nitnumber, $registrationnumber, $addres, $id_municipality, $id_departament , $telephone,  $email, $totalbalance, $creditlimit, $creditdays, $typeClient)
    {
        $conexion = parent::connect();
        try {
            date_default_timezone_set('America/El_Salvador');
            $date = date("Y-m-d");
            $query = 'INSERT INTO cliente(cliente, giro, numero_nit, numero_registro, direccion, id_muni, id_departamento, telefono,  correo, saldo_acumu, limite_credito, dias_credito, fechacreacion,id_tipocli) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $conexion->prepare($query)->execute(array($client, $turn, $nitnumber, $registrationnumber, $addres, $id_municipality, $id_departament , $telephone, $email, $totalbalance, $creditlimit, $creditdays, $date,$typeClient));
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
    public function updateClient($client, $turn, $nitnumber, $registrationnumber, $addres, $id_municipality, $id_departament , $telephone,  $email, $totalbalance, $creditlimit, $creditdays, $typeClient, $id)
    {
        $conexion = parent::connect();
        try {
            $query = 'UPDATE cliente SET cliente=?, giro=?, numero_nit=?, numero_registro=?, direccion=? ,id_muni=?, id_departamento=?, telefono=?,  correo=?,saldo_acumu=?, limite_credito=?, dias_credito=?, id_tipocli=? WHERE id_cliente=?';
            $conexion->prepare($query)->execute(array($client, $turn, $nitnumber, $registrationnumber, $addres, $id_municipality, $id_departament , $telephone,  $email, $totalbalance, $creditlimit, $creditdays, $typeClient, $id));
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
