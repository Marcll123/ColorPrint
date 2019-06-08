
<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/ProviderController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newProvider = new ProviderController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newProvider->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newProvider->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newProvider->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newProvider->delete();
                        echo  $data;
                        break;
                      
                }
             
?>