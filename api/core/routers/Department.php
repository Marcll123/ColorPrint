<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/DepartmentController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newDepartment = new DepartmentController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newDepartment->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newDepartment->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newDepartment->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newDepartment->delete();
                        echo  $data;
                        break;
                      
                }
             
?>