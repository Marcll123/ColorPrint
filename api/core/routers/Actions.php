 <?php
        require_once '../controllers/ActionsController.php';
        header('Access-Control-Allow-Origin: http://localhost:8080');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        header('Content-Type: application/json');


        $newActions = new ActionsController();
        switch ($_SERVER['REQUEST_METHOD']) {
                case 'GET':
                        $data = $newActions->show();
                        echo json_encode($data);
                        break;

                case 'POST':
                        $data = $newActions->save();
                        echo $data;
                        break;

                case 'PUT':
                        $data = $newActions->update();
                        echo  $data;
                        break;

                case 'DELETE':
                        $data = $newActions->delete();
                        echo  $data;
                        break;
        }

        ?>