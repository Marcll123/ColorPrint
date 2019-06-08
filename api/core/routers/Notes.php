
<?php
        require_once '../helpers/Auth.php';
        require_once '../controllers/NotesController.php';
        header('Content-Type: application/json');

        $headers = apache_request_headers();
        $jwt= $headers['token'];

        $auth=new Auth();
        $data=$auth->decodeToken($jwt);


                $newUser = new NotesController();
                switch($_SERVER['REQUEST_METHOD']){
                        case 'GET':
                        $data = $newNote->show();
                        echo json_encode($data);
                        break;
        
                        case 'POST':
                        $data = $newNote->save();
                        echo $data;
                        break;
        
                       case 'PUT':
                        $data = $newNote->update();
                        echo  $data;
                        break;
        
                        case 'DELETE':
                        $data = $newNote->delete();
                        echo  $data;
                        break;
                      
                }
             
?>