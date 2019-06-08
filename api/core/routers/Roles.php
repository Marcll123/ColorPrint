
<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/RolesController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newRole = new RolesController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newRole->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newRole->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newRole->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newRole->delete();
                        echo  $data;
                        break;
                      
                }
             
?>