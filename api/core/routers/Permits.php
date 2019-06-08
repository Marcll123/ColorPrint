
<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/PermitsController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newUser = new UsersController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newPermit->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newPermit->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newPermit->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newPermit->delete();
                        echo  $data;
                        break;
                      
                }
             
?>