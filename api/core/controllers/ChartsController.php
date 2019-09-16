<?php
require_once '../models/ChartsModel.php';
//clase del controlador para los graficos
class ChartsController
{
    //obtencion de los datos de tipo de compra
    public function purchaseTypeChart()
    {
        $chart = new ChartsModel();
        return $chart->consultPurchaseType();
    }
    //obtencion de los datos para precion del producto
    public function productPriceChart()
    {
        $chart = new ChartsModel();
        return $chart->consultProductPrice();
    }
    //obtencion de los datos para nombre del producto
    public function productNameChart()
    {
        $chart = new ChartsModel();
        return $chart->consultProductName();
    }

    // metodo para obtencion de datos y validacion de parametros
    public function SalesParameter()
    {
        $chart = new ChartsModel();
        if (isset($_REQUEST['start']) && isset($_REQUEST['final']))  {
            $one = $_REQUEST['start'];
            $two = $_REQUEST['final'];
            return $chart->consultTypeSalesDate($one, $two);
        }
    }

    // metodo para obtencion de datos y validacion de parametros
    public function SalesParameter2()
    {
        $chart = new ChartsModel();
        if (isset($_REQUEST['start']) && isset($_REQUEST['final']))  {
            $one = $_REQUEST['start'];
            $two = $_REQUEST['final'];
            return $chart->consultTypeSalesDate2($one, $two);
        }
    }

    // metodo para obtencion de datos y validacion de parametros
    public function SalesParameter3()
    {
        $chart = new ChartsModel();
        if (isset($_REQUEST['start']) && isset($_REQUEST['final']))  {
            $one = $_REQUEST['start'];
            $two = $_REQUEST['final'];
            return $chart->consultTypeSalesDate3($one, $two);
        }
    }

    // metodo para obtencion de datos y validacion de parametros
    public function SalesParameter4()
    {
        $chart = new ChartsModel();
        if (isset($_REQUEST['start']) && isset($_REQUEST['final']))  {
            $one = $_REQUEST['start'];
            $two = $_REQUEST['final'];
            return $chart->consultTypeSalesDate4($one, $two);
        }
    }

    // metodo para obtencion de datos y validacion de parametros
    public function SalesProducto()
    {
        $chart = new ChartsModel();
        if (isset($_REQUEST['start']) && isset($_REQUEST['final']))  {
            $one = $_REQUEST['start'];
            $two = $_REQUEST['final'];
            return $chart->consultproductSale($one, $two);
        }
    }

    public function SalesProductname()
    {
        $chart = new ChartsModel();
        return $chart->consultproductnameSale();
    }

    // metodo para obtencion de datos y validacion de parametros
    public function PurchaseProduct()
    {
        $chart = new ChartsModel();
        if (isset($_REQUEST['start']) && isset($_REQUEST['final']))  {
            $one = $_REQUEST['start'];
            $two = $_REQUEST['final'];
            return $chart->consultproductPurchase($one, $two);
        }
    }

    public function ClientProduct()
    {
        $chart = new ChartsModel();
        if (isset($_REQUEST['start']) && isset($_REQUEST['final']))  {
            $one = $_REQUEST['start'];
            $two = $_REQUEST['final'];
            return $chart->consultSaleClient($one, $two);
        }
    }

    public function NameClient()
    {
        $chart = new ChartsModel();
        return $chart->consultClientName();
    }

    // metodo para obtencion de datos y validacion de parametros
    public function PriceProductTotal()
    {
        $chart = new ChartsModel();
        if (isset($_REQUEST['start']) && isset($_REQUEST['final']))  {
            $one = $_REQUEST['start'];
            $two = $_REQUEST['final'];
            return $chart->consulttotal($one, $two);
        }
    }


    //obtencion de los datos para Numero de usuario
    public function UserNum()
    {
        $chart = new ChartsModel();
        return $chart->consultnumUsers();
    }

    //obtencion de los datos para tipo de usuario
    public function UsersName()
    {
        $chart = new ChartsModel();
        return $chart->consultTypeUsers();
    }

    //obtencion de los datos para proveedor
    public function ProviderNum()
    {
        $chart = new ChartsModel();
        return $chart->consultProviderNum();
    }

    //obtencion de los datos para nombre del proveedor
    public function ProviderName()
    {
        $chart = new ChartsModel();
        return $chart->consultProviderName();
    }

    //obtencion de los datos para cliente
    public function ClientNum()
    {
        $chart = new ChartsModel();
        return $chart->consultClientNum();
    }

    //obtencion de los datos para tipo de cliente
    public function ClientName()
    {
        $chart = new ChartsModel();
        return $chart->consultClientTypeName();
    }
}
