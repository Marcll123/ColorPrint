<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/OrigenCompraController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newOrigen = new OrigenCompraController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newOrigen->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newOrigen->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newOrigen->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newOrigen->delete();
                        echo  $data;
                        break;
                      
                }
             
?>