<?php
    require_once '../models/SalesModel.php';
    class SalesController{

        public function show(){    
            $sales = new SalesModel();
            $page = $_REQUEST['page'];
            return $sales->consult($page-1);
        }
        public function showNum(){    
            $detail2 = new SalesModel();
            return $detail2->consultNum();
        }
        public function save(){      
            $id_sucursal  = $_POST['idSucursal'];
            $id_tipocom = $_POST['tipoCom'];
            $id_cliente = $_POST['cliente'];
            $direccion = $_POST['direccion'];
            $id_forma = $_POST['forma'];                                  
            $dias_credito = $_POST['diasCredito'];
            $punto_venta = $_POST['puntoVenta'];
            $contacto = $_POST['contacto'];
            $id_tipoven = $_POST['tipoVenta'];
            $id_tipofac = $_POST['tipoFac'];
            $id_usuario = $_POST['idUsuario'];
            $nota_remision = $_POST['notaRemision'];
            $num_pedido = $_POST['numPedido'];
            $bodega = $_POST['bodega'];

            $salesI = new SalesModel();
            return $salesI->createSale($id_sucursal , $id_tipocom, $id_cliente, $direccion, $id_forma, $dias_credito, $punto_venta, $contacto, $id_tipoven,
             $id_tipofac,$id_usuario,$nota_remision,$num_pedido,$bodega);
        }

        public function update(){
            $id = $_REQUEST['id'];
            $body = json_decode(file_get_contents("php://input"));    
         
            $salesU = new SalesModel();
            return $salesU->updateSale($body->id_sucursal, $body->id_tipocom, 
            $body->id_cliente, $body->direccion, $body->id_forma, $body->dias_credito,$body->punto_venta,$body->contacto,$body->id_tipoven,$body->id_tipofac,$body->id_usuario,
            $body->nota_remision,$body->num_pedido,$body->bodega, $id);
        }

        public function delete(){
            $id = $_REQUEST['id'];
            $salesE = new SalesModel();
            return $salesE->deleteSale($id);
        }

     
    }

    
?>