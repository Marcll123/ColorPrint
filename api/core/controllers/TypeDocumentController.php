<?php
require_once '../models/TypeDocumentModel.php';
class TypeDocumentController
{

    public function show()
    {
        $typedocument = new TypeDocumentModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $typedocument->consult($page - 1);
        }
    }
    public function showNum()
    {
        $typedocumentNum = new TypeDocumentModel();
        return  $typedocumentNum->consultNum();
    }
    public function save()
    {
        if (isset($_POST['tipo_docmento'])) {
            $TypeDocument  = $_POST['Ttipo_docmento'];

            $typedocumentCreate = new TypeDocumentModel();
            return  $typedocumentCreate->createTypeDocument($TypeDocument);
        }
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $typedocumentUpdate = new TypeDocumentModel();
            return  $typedocumentUpdate->updateTypeDocument($body->TypeDocument,  $id);
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $typedocumentDelete = new TypeDocumentModel();
            return  $typedocumentDelete->deleteTypeDocument($id);
        }
    }
}
