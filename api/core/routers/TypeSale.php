
<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/TypeSaleController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newTsale = new TypeSaleController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newTsale->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newTsale->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newTsale->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newTsale->delete();
                        echo  $data;
                        break;
                      
                }
             
?>