<?php
     require_once '../models/DepartmentModel.php';
     
     class DepartmentController{
        public function show(){    
            $department = new DepartmentModel();
            $page = $_REQUEST['page'];
            return $user->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new DepartmentModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $department  = $_POST['departamento'];
            $id= $_POST['id'];

            $departmentI = new DepartmentModel();
            return $departmentI->createUser($department, $id);
        }

        public function update(){
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $userU = new DepartmentModel();
            return $accountU->updateAccount($body->department, $id);
        }

        public function delete(){
            $id = $_REQUEST['id'];
            $departmentE = new DepartmentModel();
            return $departmentE->deleteaccount($id);
        }
     }

?>