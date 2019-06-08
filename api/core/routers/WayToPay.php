<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/WayToPayController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newWayToPay = new WayToPayController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newWayToPay->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newWayToPay->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newWayToPay->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newWayToPay->delete();
                        echo  $data;
                        break;
                      
                }
             
?>