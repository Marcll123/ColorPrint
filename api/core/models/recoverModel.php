<?php
require_once '../helpers/Connection.php';

class RecoverModel extends Connection
{

    public function Recover($email)
    {
        $to_email = $email;
        $subject = 'Testing PHP Mail';
        $message = 'This mail is sent using the PHP mail ';
        $headers = 'From: noreply @ company. com';

        mail($to_email, $subject, $message, $headers);

        // try {
        //     $sql = $connection->prepare("SELECT nombre_usu, correo  FROM usuarios WHERE correo = ?");
        //     $sql->execute(array($email));
        //     $res = $sql->fetchAll();
        //     $row = $res[0];

        //     // if($email === $row['correo']){
        //     //     $token = uniqid();
        //     //     $queryact = "UPDATE usuarios SET token = ? WHERE correo = ?";
        //     //     $connection->prepare($queryact)->execute(array($token, $email));

        //     //     $email_to = $email;
        //     //     $email_subject = "Cambio de contraseña";
        //     //     $email_from = "reply.colorprint.com";

        //     //     $email_message = "Hola ".$row['nombre_usu'].", has solicitado cambiar de contraseña ingresa al siguiente link\n\n";
        //     //     $email_message .= "http://localhost:8080/login\n\n";

        //     //     $headers = 'From: '. $email_from."\r\n".
        //     //     'Reply-To: '. $email_from."\r\n".
        //     //     'X-Mailer: PHP/'. phpversion();
        //     //     @mail($email_to, $email_subject, $email_message, $headers);

        //     //     $array = [
        //     //         'username' => $row['nombre_usu'],
        //     //         'email' => $row['correo'],
        //     //     ];
        //     //     return json_encode($array);
        //     // }else {
        //     //     throw new Exception("correo incorrecto");
        //     // }
        // } catch (Exception $e) {
        //     $array = [
        //         'message' => 'Error al obtener los datos',
        //         'type' => 'error',
        //         'specificMessage' => $e->getMessage()
        //     ];
        //     return json_encode($array);
        // }
    }
}
