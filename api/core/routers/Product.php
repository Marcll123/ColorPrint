
<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/ProductController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newProduct = new ProductController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newProduct->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newProduct->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newProduct->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newProduct->delete();
                        echo  $data;
                        break;
                      
                }
             
?>