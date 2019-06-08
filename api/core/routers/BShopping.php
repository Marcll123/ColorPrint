<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/BShoppingController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newUser = new BShoppingController();
                switch($_SERVER['REQUEST_METHOD']){
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