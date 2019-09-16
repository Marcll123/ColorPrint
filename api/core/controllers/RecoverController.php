<?php
require_once '../models/recoverModel.php';

class RecoverController{
    public function emailRecover()
    {
        $recover = new RecoverModel();
        if (isset($_REQUEST['correo'])) {
            $mail = $_REQUEST['correo'];
            return $recover->Recover($mail);
        }
    }
}
?>