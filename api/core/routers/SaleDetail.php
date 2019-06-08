<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/SaleDetailController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newSaleDetail = new SaleDetailController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newSaleDetail->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newSaleDetail->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newSaleDetail->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newSaleDetail->delete();
                        echo  $data;
                        break;
                      
                }
             
?>