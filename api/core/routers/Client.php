<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/ClientController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newClient = new ClientController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newClient->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newClient->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newClient->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newClient->delete();
                        echo  $data;
                        break;
                      
                }
             
?>