<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/TypeBuyController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newTypeBuy = new TypeBuyController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newTypeBuy->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newTypeBuy->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newTypeBuy->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newTypeBuy->delete();
                        echo  $data;
                        break;
                      
                }
             
?>