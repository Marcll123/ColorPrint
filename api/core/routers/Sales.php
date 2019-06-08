
<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/SalesController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newSale = new SalesController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newSale->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newSale->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newSale->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newSale->delete();
                        echo  $data;
                        break;
                      
                }
             
?>