<?php
require_once '../models/SaleDetailModel.php';

class SaleDetailController
{
    public function show()
    {
        $salesd = new SaleDetailModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $salesd->consult($page);
        }
    }
    public function showNum()
    {
        $salesdNum = new SaleDetailModel();
        return $salesdNum->consultNum();
    }
    public function save()
    {
            $product  = $_POST['id_producto'];
            $quantity = $_POST['cantidad'];
            $vnosubject = $_POST['v_nosujeta'];
            $veffector = $_POST['v_exenta'];
            $description = $_POST['descripcion'];
            $vgravado = $_POST['v_gravado'];
            $price  = $_POST['precio'];
            $sub = $_POST['subtotal'];
            $saleid  = $_POST['id_venta'];

            $saledCreate = new SaleDetailModel();
            return $saledCreate->createSaled($product, $quantity, $vnosubject, $veffector, $description, $vgravado, $price, $sub, $saleid);
    }

    public function update()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));

            $saledUpdate = new SaleDetailModel();
            return $saledUpdate->updateSaled(
                $body->card_producto,
                $body->umd,
                $body->cantidad,
                $body->descuento,
                $body->v_nosujeta,
                $body->v_efecta,
                $body->t_p,
                $body->descripcion,
                $body->total_gravado,
                $body->precio,
                $body->v_conversion,
                $body->u_conversion,
                $body->total,
                $body->id_venta,
                $id
            );
        }
    }

    public function delete()
    {
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            $saledDelete = new SaleDetailModel();
            return $saledDelete->deleteSaled($id);
        }
    }
}
