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

    public function consultOneUser($user)
    {
        $connection = parent::connect();
        try {
            $query = "SELECT id_usuario, nombre, apellido, genero, nombre_usu , correo, clave, roles.roles FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol WHERE nombre_usu = '$user'";
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

    
    public function searchUser($user)
    {
        $connection = parent::connect();
        try {
            $query = "SELECT id_usuario, nombre, apellido, genero, nombre_usu , correo, clave, roles.roles FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol WHERE nombre_usu like '%$user%' ";
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

    public function consultOneUserId($id)
    {
        $connection = parent::connect();
        try {
            $query = "SELECT id_usuario, nombre, apellido, genero, nombre_usu , correo, clave, roles.roles FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_rol WHERE id_usuario =".$id;
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
            $query = 'INSERT INTO usuarios(nombre, apellido, genero, nombre_usu , correo, clave, id_rol) VALUES (:non, :ape, :gen ,:usu , :core,:con, :rol)';
            $cifrado = password_hash($password, PASSWORD_BCRYPT);
            $conexion->prepare($query)->execute(array(':non'=>$name, ':ape'=>$last_name, ':gen'=>$gender, ':usu'=>$user, ':core'=>$email, ":con"=>$cifrado, ':rol'=>$id_rol));
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

    public function updateUser($name, $last_name, $gender, $user, $email, $id_rol, $id)
    {
        $conexion = parent::connect();
        try {
            $query = 'UPDATE usuarios SET nombre=?, apellido=?, genero=?, nombre_usu=?, correo=?, id_rol=? WHERE id_usuario=?';
            $conexion->prepare($query)->execute(array($name, $last_name, $gender, $user, $email, $id_rol, $id));
            $array = [
                'message' => 'He actualizado un registro',
                'type' => 'success',
                'specificMessage' => $conexion,
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

    public function updateUserProfile($name, $last_name, $gender, $user, $email, $password, $id_rol, $name_usu)
    {
        $conexion = parent::connect();
        try {
            $query = 'UPDATE usuarios SET nombre=?, apellido=?, genero=?, nombre_usu=?, correo=?, clave=?, id_rol=? WHERE nombre_usu=?';
            $cifrado = password_hash($password, PASSWORD_BCRYPT);
            $conexion->prepare($query)->execute(array($name, $last_name, $gender, $user, $email, $cifrado, $id_rol, $name_usu));
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
