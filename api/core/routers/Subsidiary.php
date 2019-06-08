
<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/SubsidiaryController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newSub = new SubsidiaryController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newSub->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newSub->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newSub->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newSub->delete();
                        echo  $data;
                        break;
                      
                }
             
?>