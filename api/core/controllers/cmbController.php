<?php

require_once '../models/cmbModel.php';

class cmbController
{ 
    
    public function cmvProvider(){
        $data = new cmbModel();
        return $data->datacmbProvider();
    }

    public function cmvTypeDocument(){
        $data = new cmbModel();
        return $data->datacmbtypeDocument();
    }

    public function cmvTypePurhase(){
        $data = new cmbModel();
        return $data->datacmbtypePurchase();
    }

    public function cmvPaymentMethod(){
        $data = new cmbModel();
        return $data->datacmbPaymentMethod();
    }

    public function cmvOriginPurchase(){
        $data = new cmbModel();
        return $data->datacmbOriginPurchase();
    }

    public function cmvProduct(){
        $data = new cmbModel();
        return $data->datacmbProduct();
    }

    public function cmvVoucher(){
        $data = new cmbModel();
        return $data->datacmbTypeVoucher();
    }

    public function cmvTypeSales(){
        $data = new cmbModel();
        return $data->datacmbTypeSales();
    }

    public function cmvMunicipaly(){
        $data = new cmbModel();
        return $data->datacmbMunicipaly();
    }

    public function cmvAccount(){
        $data = new cmbModel();
        return $data->datacmbAccount();
    }

    public function cmvTypeClient(){
        $data = new cmbModel();
        return $data->datacmbTypeClient();
    }

    public function lastid(){
        $data = new cmbModel();
        return $data->datalastid();
    }

    public function productPrice()
    {
        $data = new cmbModel();
        if (isset($_REQUEST['id']) && preg_match('/^[a-z0-9]+$/', $_REQUEST['id'])) {
            $id = $_REQUEST['id'];
            return $data->dataProductPrice($id);
        }
    }

}
