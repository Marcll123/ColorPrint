
<?php
require_once '../helpers/Auth.php';
require_once '../controllers/TypeBillController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$newBill = new TypeBillController();
switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
                $data = $newBill->show();
                echo json_encode($data);
                break;

        case 'POST':
                $data = $newBill->save();
                echo $data;
                break;

        case 'PUT':
                $data = $newBill->update();
                echo  $data;
                break;

        case 'DELETE':
                $data = $newBill->delete();
                echo  $data;
                break;
}

?>