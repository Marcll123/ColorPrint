<?php
require_once '../models/DepartmentModel.php';

class DepartmentController
{
    public function show()
    {
        $department = new DepartamentModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $department->consult($page - 1);
        }
    }
    public function showNum()
    {
        $departmentNum = new DepartamentModel();
        return $departmentNum->consultNum();
    }
    public function save()
    {
        if (isset($_POST['departamento'])) {
            $department  = $_POST['departamento'];

            $departmentCreate = new DepartamentModel();
            return $departmentCreate->createDepartment($department);
        }
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $departmentUpdate = new DepartamentModel();
            return $departmentUpdate->updateDepartment($body->department, $id);
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $departmentDelete = new DepartamentModel();
            return $departmentDelete->deleteDepartment($id);
        }
    }
}
