<?php
//Se incluye el archivo PHP de conexión con la base de datos
require_once '../helpers/connection.php';

//Se crea la clase Municipaly model que tiene las funciones para obtener los datos de la base de datos
class MunicipalityModel extends Connection
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
            $query = 'SELECT id_muni, municipio, departamento.departamento FROM municipio INNER JOIN departamento ON municipio.id_dep = departamento.id_dep limit ' . $p . ', ' . $rowpaper;
            $data =  $connection->query($query, PDO::FETCH_ASSOC)->fetchAll();
            return $data;
        } catch (Exception $e) {
            $array = [
                'message' => 'Error al ingresar el municipio',
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
            $query = 'SELECT count(id_muni) as num FROM municipio';
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
    public function createMunicipality($municipality, $department)
    {
        $conexion = parent::connect();
        try {
            $query = 'INSERT INTO municipio(municipio, id_dep) VALUES (?,?)';
            $conexion->prepare($query)->execute(array($municipality, $department));
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
    public function updateMunicipality($municipality, $department, $id)
    {
        $conexion = parent::connect();
        try {
            $query = 'UPDATE municipio SET municipio=?, id_dep=? WHERE id_muni=?';
            $conexion->prepare($query)->execute(array($municipality, $department, $id));
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
    public function deleteMunicipality($id)
    {
        $conexion = parent::connect();
        try {
            $query = 'DELETE FROM municipio WHERE id_muni=?';
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
