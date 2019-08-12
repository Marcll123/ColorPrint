<?php
require_once '../helpers/Connection.php';

class UserModel extends Connection
{
    public function consult($num)
    {
        $rowpaper = 5;
        $page = 1 + $num;
        $page = $page - 1;
        $p = $page * $rowpaper;
        $connection = parent::connect();
        try {
            $query = 'SELECT id_usuario, nombre, apellido, genero, nombre_usu , correo, clave, roles.roles FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol limit ' . $p . ', ' . $rowpaper;
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

    public function consultNum()
    {
        $connection = parent::connect();
        try {
            $query = 'SELECT count(*) as num FROM usuarios';
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

    public function createUser($name, $last_name, $gender, $user, $email, $password, $id_rol)
    {
        $conexion = parent::connect();
        try {
            $query = 'INSERT INTO usuarios(nombre, apellido, genero, nombre_usu , correo, clave, id_rol) VALUES (?,?,?,?,?,?,?)';
            $conexion->prepare($query)->execute(array($name, $last_name, $gender, $user, $email, $password, $id_rol));
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

    public function updateUser($name, $last_name, $gender, $user, $email, $password, $id_rol, $id)
    {
        $conexion = parent::connect();
        try {
            $query = 'UPDATE usuarios SET nombre=?, apellido=?, genero=?, nombre_usu=?, correo=?, clave=?, id_rol=? WHERE id_usuario=?';
            $conexion->prepare($query)->execute(array($name, $last_name, $gender, $user, $email, $password, $id_rol, $id));
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

    public function deleteUser($id)
    {
        $conexion = parent::connect();
        try {
            $query = 'DELETE FROM usuarios WHERE id_usuario=?';
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
