import React, { Component } from 'react'
import Menu from "../Menu/Menu.jsx";
import NavContent from "../Nav/NavContent.jsx";
import CardChart from '../AnotherComponents/CardChart.jsx';
import { Bar, Pie, Scatter, Radar, Polar, Doughnut, ChartData, Line, Bubble, HorizontalBar} from 'react-chartjs-2'
import CustomGraphics from '../AnotherComponents/CustomGraphics.jsx';
import TabsGraphics from '../AnotherComponents/TabsGraphics.jsx';
import { ChartSales } from '../../services/Charts.js'
import { CharProductSales } from '../../services/Charts.js'
import { CharProductPurchase } from '../../services/Charts.js'
import { ChartClient } from '../../services/Charts.js'
import { ChartTotal } from '../../services/Charts.js'


export default class Chart extends Component {
    constructor(props) {
        super(props)
        this.token = localStorage.getItem('token');
        if (!this.token) {
          location.pathname = '/'
        }    
        //Estado para las graficas 
        this.state = {
            exenta: 0,
            gravada: 0,
            internacional: 0,
            tasacero: 0,
            productName: [],
            productNum: [],
            purchaseNum:[],
            clientName:[],
            clientPnum:[],
            total:[],
            fechaI: 1,
            fechaf: 1
        }

        //bindeo de los eventos
        this.onEvent = this.onEvent.bind(this);
        this.handle = this.handle.bind(this);


        //Intanciacion de las clases de los servicos
        this.ChartSales = new ChartSales();
        this.CharProductSales = new CharProductSales();
        this.CharProductPurchase = new CharProductPurchase();
        this.ChartClient = new ChartClient();
        this.ChartTotal = new ChartTotal();
    }


    //Construccion del componente
    componentDidMount() {
        this.handle();
    }

    onEvent(e) {
        e.preventDefault()
        //Datos de ventas tipo tasacero
        this.ChartSales.getData(this.state.fechaI, this.state.fechaf).then(res => {
            this.setState({ tasacero: res[0].num })
        })

        //Datos de ventas tipo gravada
        this.ChartSales.getData2(this.state.fechaI, this.state.fechaf).then(res => {
            this.setState({ gravada: res[0].num })
        })

        //Datos de ventas tipo exenta
        this.ChartSales.getData3(this.state.fechaI, this.state.fechaf).then(res => {
            this.setState({ exenta: res[0].num })
        })

        //Datos de ventas tipo internacional
        this.ChartSales.getData4(this.state.fechaI, this.state.fechaf).then(res => {
            this.setState({ internacional: res[0].num })
        })

        //Datos de ventas por productos
        this.CharProductSales.getData(this.state.fechaI, this.state.fechaf).then(res => {
            this.setState({ productNum: [...res] })
        })

        //Datos de compras por productos
        this.CharProductPurchase.getData(this.state.fechaI, this.state.fechaf).then(res => {
            this.setState({ purchaseNum: [...res] })
        })

        //Datos de compras por clientes
        this.ChartClient.getData2(this.state.fechaI, this.state.fechaf).then(res=> {     
            this.setState({ clientPnum: [...res] })
        })

        //Datos de total ventas por productos
        this.ChartTotal.getData(this.state.fechaI, this.state.fechaf).then(res=> {     
            this.setState({ total: [...res] })
        })
    }


    //Metodo para obtener nombres de los datos
    handle() {
        this.CharProductSales.getData2().then(res => {
            this.setState({ productName: [...res] })
        })

        this.ChartClient.getData().then(res=> {     
            this.setState({ clientName: [...res] })
        })
    }


    //Optencion de las fechas de los datos
    initDate(e) {
        this.setState({
            fechaI: e.target.value
        })
    }

    finalDate(e) {
        this.setState({
            fechaf: e.target.value
        })
    }


    render() {

        //Datos para la primera grafica ventas
        const data = {
            labels: ["Exenta", "Gravada", "Internacional", "tasa"],
            datasets: [{
                label: "Tipos de compras",
                backgroundColor: [
                    'rgb(27, 99, 132)',
                    'rgb(27, 215, 132)',
                    'rgb(227, 315, 132)',
                    'rgb(27, 229, 32)'
                ],
                data: [this.state.exenta, this.state.gravada, this.state.internacional, this.state.tasacero],
            }]
        }

        //mapeo del estado que contiene los nombres de los productos
        let name = this.state.productName.map(e => {
            return e.nombre
        })
        //mapeo del estado que contiene los valores de los productos
        let num = this.state.productNum.map(e => {
            return e.num
        })

         //Datos para la primera grafica ventas
        const data2 = {
            labels: name,
            datasets: [{
                label: "Producto",
                backgroundColor: [
                    'rgb(27, 99, 132)',
                    'rgb(27, 215, 132)',
                    'rgb(227, 315, 132)',
                    'rgb(27, 229, 32)'
                ],
                data: num,
            }]
        }

        //Datos para la primera grafica compras
        let num2 = this.state.purchaseNum.map(e => {
            return e.num
        })

        const data3 = {
            labels: name,
            datasets: [{
                label: "Tipos de compras",
                backgroundColor: [
                    'rgb(27, 99, 132)',
                    'rgb(27, 215, 132)',
                    'rgb(227, 315, 132)',
                    'rgb(27, 229, 32)'
                ],
                data: num2,
            }]
        }


        let nameclient = this.state.clientName.map(e => {
            return e.cliente
        })

        let numClient = this.state.clientPnum.map(e => {
            return e.num
        })

         //Datos para la primera grafica clientes
        const data4 = {
            labels: nameclient,
            datasets: [{
                label: "Tipos de compras",
                backgroundColor: [
                    'rgb(27, 99, 132)',
                    'rgb(27, 215, 132)',
                    'rgb(227, 315, 132)',
                    'rgb(27, 229, 32)'
                ],
                data: numClient,
            }]
        }

        let total = this.state.total.map(e => {
            return e.total
        })

         //Datos para la primera grafica productos
        const data5 = {
            labels: name,
            datasets: [{
                label: "",
                backgroundColor: [
                    'rgb(27, 99, 132)',
                    'rgb(27, 215, 132)',
                    'rgb(227, 315, 132)',
                    'rgb(27, 229, 32)'
                ],
                data: total,
            }]
        }

        
        return (
            <div className="d-flex principal" id="wrapper">
                <Menu />
                {/*Contenido de la pagina */}

                <div id="page-content-wrapper" className="bg xd">
                    {/*Navbar principal*/}
                    <NavContent />
                    <div className="size-completo">
                        <div className="container-fluid bg-content">
                            {/*Titulo del contenido */}
                            <div className="card card-margen">
                                <div className="card-head">
                                    <h5 className="text-primary text-center mt-4 mb-4">
                                        GRAFICOS PERSONALIZADOS
                                    </h5>
                                </div>
                            </div>

                            <div className="card card-margen">
                                <div className="card-content m-2">
                                    <CustomGraphics
                                        ventas={
                                            <React.Fragment>
                                                <TabsGraphics submit={this.onEvent} firtsInput={this.initDate.bind(this)} secondInput={this.finalDate.bind(this)} />
                                                <CardChart chart={
                                                    <Pie data={data}
                                                        width={100}
                                                        height={50}
                                                    />
                                                } title={`Ventas de la fecha: ${this.state.fechaI} a ${this.state.fechaf} por tipo de venta`} col="col-lg-12" />
                                                <CardChart chart={
                                                    <Bar data={data2}
                                                        width={100}
                                                        height={50}
                                                    />
                                                } title={`Numeros de productos vendidos de la fecha: ${this.state.fechaI} a ${this.state.fechaf}`} col="col-lg-12" />
                                            </React.Fragment>
                                        }

                                        compras={
                                            <React.Fragment>
                                                <TabsGraphics submit={this.onEvent} firtsInput={this.initDate.bind(this)} secondInput={this.finalDate.bind(this)} />
                                                <CardChart chart={
                                                    <Doughnut data={data3}
                                                        width={100}
                                                        height={50}
                                                    />
                                                } title={`Productos mas comprados de la fecha: ${this.state.fechaI} a ${this.state.fechaf}`} col="col-lg-12" />
                                            </React.Fragment>
                                        }

                                        clientes={
                                            <React.Fragment>
                                                <TabsGraphics submit={this.onEvent} firtsInput={this.initDate.bind(this)} secondInput={this.finalDate.bind(this)} />
                                                <CardChart chart={
                                                    <Bar data={data4}
                                                        width={100}
                                                        height={50}
                                                    />
                                                } title={`Productos mas comprados por los clientes de la fecha: ${this.state.fechaI} a ${this.state.fechaf}`} col="col-lg-12" />
                                            </React.Fragment>
                                        }

                                        productos={
                                            <React.Fragment>
                                                <TabsGraphics submit={this.onEvent} firtsInput={this.initDate.bind(this)} secondInput={this.finalDate.bind(this)} />
                                                <CardChart chart={
                                                    <HorizontalBar data={data5}
                                                        width={100}
                                                        height={50}
                                                    />
                                                } title={`Total de dinero generado de la fecha: ${this.state.fechaI} a ${this.state.fechaf}`} col="col-lg-12" />
                                            </React.Fragment>
                                        }
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
