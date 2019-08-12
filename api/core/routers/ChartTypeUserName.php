<?php
//Ruta de la API
//Se incluye Account Cotroller para utilizar los funciones para el manejo de los datos
require_once '../controllers/ChartsController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

//Se crea la instancia de la clase Account Controller
$data = new ChartsController();

//Se crea un condicional para saber qué tipo me todo HTTP es requerido en las peticiones del clientete
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $data = $data->UsersName();
        echo json_encode($data);
        break;
}
