
<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/TypeVoucherController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newVoucher = new TypeVoucherController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newVoucher->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newVouchert->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newVoucher->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newVoucher->delete();
                        echo  $data;
                        break;
                      
                }
             
?>