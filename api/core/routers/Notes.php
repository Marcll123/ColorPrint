
<?php
require_once '../controllers/NotesController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$headers = apache_request_headers();



$newNote = new NotesController();
switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
                $data = $newNote->show();
                echo json_encode($data);
                break;

        case 'POST':
                $data = $newNote->save();
                echo $data;
                break;

        case 'PUT':
                $data = $newNote->update();
                echo  $data;
                break;

        case 'DELETE':
                $data = $newNote->delete();
                echo  $data;
                break;
}

?>