<?php
    require_once '../models/NotesModel.php';
    class NotesController{

        public function show(){    
            $note = new NotesModel();
            $page = $_REQUEST['page'];
            return $note->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new NotesModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $name_note  = $_POST['nameNotes'];
            $description = $_POST['description'];
            $id_user = $_POST['idUser'];
          
            $noteI = new NotesModel();
            return $noteI->createNote($name_note , $description, $id_user);
        }

        public function update(){
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $noteU = new NotesModel();
            return $noteU->updateNote($body->name_note, $body->$description, 
            $body->id_user, $id);
        }

        public function delete(){
            $id = $_REQUEST['id'];
            $noteE = new NotesModel();
            return $NotesE->deleteNote($id);
        }

     
    }

    
?>