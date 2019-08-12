<?php
require_once '../models/ChartsModel.php';

class ChartsController
{
    public function purchaseTypeChart()
    {
        $chart = new ChartsModel();
        return $chart->consultPurchaseType();
    }
    public function productPriceChart()
    {
        $chart = new ChartsModel();
        return $chart->consultProductPrice();
    }
    public function productNameChart()
    {
        $chart = new ChartsModel();
        return $chart->consultProductName();
    }

    public function SalesParameter()
    {
        $chart = new ChartsModel();
        if (isset($_REQUEST['start']) && isset($_REQUEST['final']))  {
            $one = $_REQUEST['start'];
            $two = $_REQUEST['final'];
            return $chart->consultTypeSalesDate($one, $two);
        }
    }

    public function SalesParameter2()
    {
        $chart = new ChartsModel();
        if (isset($_REQUEST['start']) && isset($_REQUEST['final']))  {
            $one = $_REQUEST['start'];
            $two = $_REQUEST['final'];
            return $chart->consultTypeSalesDate2($one, $two);
        }
    }

    public function SalesParameter3()
    {
        $chart = new ChartsModel();
        if (isset($_REQUEST['start']) && isset($_REQUEST['final']))  {
            $one = $_REQUEST['start'];
            $two = $_REQUEST['final'];
            return $chart->consultTypeSalesDate3($one, $two);
        }
    }

    public function SalesParameter4()
    {
        $chart = new ChartsModel();
        if (isset($_REQUEST['start']) && isset($_REQUEST['final']))  {
            $one = $_REQUEST['start'];
            $two = $_REQUEST['final'];
            return $chart->consultTypeSalesDate4($one, $two);
        }
    }

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

    public function PriceProductTotal()
    {
        $chart = new ChartsModel();
        if (isset($_REQUEST['start']) && isset($_REQUEST['final']))  {
            $one = $_REQUEST['start'];
            $two = $_REQUEST['final'];
            return $chart->consulttotal($one, $two);
        }
    }


    public function UserNum()
    {
        $chart = new ChartsModel();
        return $chart->consultnumUsers();
    }

    public function UsersName()
    {
        $chart = new ChartsModel();
        return $chart->consultTypeUsers();
    }

    public function ProviderNum()
    {
        $chart = new ChartsModel();
        return $chart->consultProviderNum();
    }

    public function ProviderName()
    {
        $chart = new ChartsModel();
        return $chart->consultProviderName();
    }

    
    public function ClientNum()
    {
        $chart = new ChartsModel();
        return $chart->consultClientNum();
    }

    public function ClientName()
    {
        $chart = new ChartsModel();
        return $chart->consultClientTypeName();
    }
}
