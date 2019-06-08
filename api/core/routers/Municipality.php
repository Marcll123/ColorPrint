<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/MunicipalityController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newMunicipality = new MunicipalityController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newMunicipality->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newMunicipality->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newMunicipality->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newMunicipality->delete();
                        echo  $data;
                        break;
                      
                }
             
?>