
<?php
require_once '../helpers/Auth.php';
require_once '../controllers/TypeVoucherController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$newVoucher = new TypeVoucherController();
switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
                $data = $newVoucher->show();
                echo json_encode($data);
                break;

        case 'POST':
                $data = $newVouchert->save();
                echo $data;
                break;

        case 'PUT':
                $data = $newVoucher->update();
                echo  $data;
                break;

        case 'DELETE':
                $data = $newVoucher->delete();
                echo  $data;
                break;
}

?>