<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/PurchaseDController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newPurchaseD = new PurchaseDController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newPurchaseD->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newPurchaseD->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newPurchaseD->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newPurchaseD->delete();
                        echo  $data;
                        break;
                      
                }
             
?>