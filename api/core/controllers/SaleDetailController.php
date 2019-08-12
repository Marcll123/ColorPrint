<?php
require_once '../models/SaleDetailModel.php';

class SaleDetailController
{
    public function show()
    {
        $salesd = new SaleDetailModel();
        if (isset($_REQUEST['page']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['page'])) {
            $page = $_REQUEST['page'];
            return $salesd->consult($page - 1);
        }
    }
    public function showNum()
    {
        $salesdNum = new SaleDetailModel();
        return $salesdNum->consultNum();
    }
    public function save()
    {
        if (
            isset($_POST['card_producto']) && isset($_POST['umd']) && isset($_POST['cantidad']) && isset($_POST['descuento'])
            && isset($_POST['v_nosujeta']) && isset($_POST['v_afecta']) && isset($_POST['t_p']) && isset($_POST['descripcion'])
            && isset($_POST['total_gravado']) && isset($_POST['precio']) && isset($_POST['v_conversion']) && isset($_POST['u_conversion'])
            && isset($_POST['total']) && isset($_POST['id_venta'])
        ) {
            $cproduct  = $_POST['card_producto'];
            $umd = $_POST['umd'];
            $quantity = $_POST['cantidad'];
            $discount  = $_POST['descuento'];
            $vnosubject = $_POST['v_nosujeta'];
            $veffector = $_POST['v_efecta'];
            $tp  = $_POST['t_p'];
            $description = $_POST['descripcion'];
            $total_e = $_POST['total_gravado'];
            $price  = $_POST['precio'];
            $vconversion = $_POST['v_conversion'];
            $uconversion = $_POST['u_conversion'];
            $total  = $_POST['total'];
            $saleid  = $_POST['id_venta'];

            $saledCreate = new SaleDetailModel();
            return $saledCreate->createSaled($cproduct, $umd, $quantity, $discount, $vnosubject, $veffector, $tp, $description, $total_e, $price, $vconversion, $uconversion, $total, $saleid);
        }
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
