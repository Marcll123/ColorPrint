
<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/TypeDocumentController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newTclient = new TypeClientController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newTclient->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newTclient->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newTclient->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newTclient->delete();
                        echo  $data;
                        break;
                      
                }
             
?>