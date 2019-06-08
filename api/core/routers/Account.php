<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/AccountController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newAccount = new AccountController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newAccount->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newAccount->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newAccount->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newAccount->delete();
                        echo  $data;
                        break;
                      
                }
             
?>