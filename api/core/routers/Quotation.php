<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/QuotationController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newQuotation = new QuotationController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newQuotation->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newQuotation->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newQuotation->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newQuotation->delete();
                        echo  $data;
                        break;
                      
                }
             
?>