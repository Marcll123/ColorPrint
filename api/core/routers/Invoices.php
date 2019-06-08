<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/InvoicesController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newInvoices = new InvoicesController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newInvoices->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newInvoices->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newInvoices->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newInvoices->delete();
                        echo  $data;
                        break;
                      
                }
             
?>