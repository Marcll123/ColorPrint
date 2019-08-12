<?php
//Se incluye el archivo PHP que cuenta con las funciones para el manejo de los datos
require_once '../models/AccountModel.php';

class AccountController
{
    //Función para mostrar los datos en caso de que se haga una petición
    public function show()
    {
        $account = new AccountModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $account->consult($page - 1);
        }
    }

    //Función para mostrar el numero de datos que tiene la tabla cuenta
    public function showNum()
    {
        $accountNum = new AccountModel();
        return $accountNum->consultNum();
    }

    //Función para crear una nueva cuenta
    public function save()
    {
        $accountSave = new AccountModel();
        if (isset($_POST['cuenta'])) {
            $account  = $_POST['cuenta'];
            return $accountSave->createAccount($account);
        }
    }

    //funcion para actulizar un dato de cuenta
    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $accountUpdate = new AccountModel();
            return $accountUpdate->updateAccount($body->account, $id);
        }
    }

    //Función para eliminar campos de la tabla cuenta 
    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $accountDelete = new AccountModel();
            return $accountDelete->deleteAccount($id);
        }
    }
}
