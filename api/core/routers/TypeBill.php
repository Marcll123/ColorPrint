
<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/TypeBillController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newBill = new TypeBillController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newBill->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newBill->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newBill->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newBill->delete();
                        echo  $data;
                        break;
                      
                }
             
?>