<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/ShopController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newShop = new ShopController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newShop->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newShop->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newShop->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newShop->delete();
                        echo  $data;
                        break;
                      
                }
             
?>