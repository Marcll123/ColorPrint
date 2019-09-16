import React, { Component } from 'react';
import Menu from '../Menu/Menu.jsx';
import NavContent from '../Nav/NavContent.jsx';
import './Start.css'
import CardStart from '../AnotherComponents/CardStart.jsx';
import { NumberDetail } from "../../services/UsersService.js";
import { Number } from "../../services/PurchaseService.js";
import { NumberS } from "../../services/SaleService.js";
import { Bar, Pie, Scatter, Radar, Polar, HorizontalBar, Line, Doughnut } from 'react-chartjs-2'
import user from '../../resources/img/user.PNG'
import sell from '../../resources/img/people-trading.PNG'
import purchase from '../../resources/img/shopping-cart.PNG'
import CardChart from '../AnotherComponents/CardChart.jsx';
import { ChartPurchaseType } from '../../services/Charts.js'
import { ChartProductName } from '../../services/Charts.js'
import { ChartProductPrice } from '../../services/Charts.js'
import { ChartUser } from '../../services/Charts.js'
import { ChartProviderUser } from '../../services/Charts.js'
import { ChartClients } from '../../services/Charts.js'
import { Link } from "react-router-dom";
import { Redirect } from "react-router-dom";


class Start extends Component {
    constructor(props) {
        super(props);
        //se almacenan los datos que se obtendran
        this.state = {
            val: 1,
            val2: 1,
            val3: 1,
            Exenta: 1,
            Gravada: 1,
            Internacional: 1,
            nombresP: [],
            preciosP: [],
            nameTypeU: [],
            numU: [],
            nameProvider: [],
            numProvider: [],
            nameTClient: [],
            numClient: [],
            redirect: false,
        }
        this.NumberDetail = new NumberDetail();
        this.NumberP = new Number();
        this.NumberS = new NumberS();

        //graficos
        this.ChartPurchaseType = new ChartPurchaseType();
        this.ChartProductName = new ChartProductName();
        this.ChartProductPrice = new ChartProductPrice();
        this.ChartUser = new ChartUser();
        this.ChartProviderUser = new ChartProviderUser();
        this.ChartClients = new ChartClients();

        this.handle = this.handle.bind(this);
        this.totalItemsCount = 0;
    }


    componentDidMount() {
        this.handle()
        if (localStorage.getItem("token")) {
            console.log('hola');
        } else {
            this.setState({ redirect: true })
        }
    }



    // obtendo los datos y se los asigno al estado
    handle() {
        this.NumberDetail.getNumberDetail().then(res => {
            this.setState({ val: res[0].num })
        });
        this.NumberP.getNumber().then(res => {
            this.setState({ val2: res[0].num })
        });

        this.NumberS.getNumber().then(res => {
            this.setState({ val3: res[0].num })
        });

        this.ChartPurchaseType.getData().then(res => {
            this.setState({ Exenta: res[0].data, Gravada: res[1].data, Internacional: res[2].data })
        })

        this.ChartProductName.getData().then(res => {
            this.setState({ nombresP: [...res] })
        })

        this.ChartProductPrice.getData().then(res => {
            this.setState({ preciosP: [...res] })
        })

        this.ChartUser.getData().then(res => {
            this.setState({ nameTypeU: [...res] })
        })

        this.ChartUser.getData2().then(res => {
            this.setState({ numU: [...res] })
        })

        this.ChartProviderUser.getData().then(res => {
            this.setState({ nameProvider: [...res] })
        })

        this.ChartProviderUser.getData2().then(res => {
            this.setState({ numProvider: [...res] })
        })

        this.ChartClients.getData().then(res => {
            this.setState({ nameTClient: [...res] })
        })

        this.ChartClients.getData2().then(res => {
            this.setState({ numClient: [...res] })
        })

    }



    //Diseño de los graficos
    render() {
        if (this.state.redirect) {
            return (<Redirect to="/login" />)
        }

        const data = {
            labels: ["Exenta", "Gravada", "Internacional"],
            datasets: [{
                label: "Tipos de compras",
                backgroundColor: [
                    'rgb(27, 99, 132)',
                    'rgb(27, 215, 132)',
                    'rgb(227, 315, 132)'
                ],
                data: [this.state.Exenta, this.state.Gravada, this.state.Internacional],
            }]
        }

        let name = this.state.nombresP.map(e => {
            return e.nombre
        })

        let price = this.state.preciosP.map(e => {
            return e.precio
        })

        const dataProduct = {
            labels: name,
            datasets: [{
                label: "Tipos de compras",
                backgroundColor: [
                    'rgb(27, 99, 132)',
                    'rgb(27, 215, 132)',
                    'rgb(227, 315, 132)'
                ],
                data: price,
            }]
        }


        let nameU = this.state.nameTypeU.map(e => {
            return e.roles
        })

        let numTU = this.state.numU.map(e => {
            return e.num
        })

        const dataUser = {
            labels: nameU,
            datasets: [{
                label: "Tipos de compras",
                backgroundColor: [
                    'rgb(27, 99, 132)',
                    'rgb(27, 215, 132)',
                    'rgb(227, 315, 132)'
                ],
                data: numTU,
            }]
        }


        let nameProv = this.state.nameProvider.map(e => {
            return e.nombre
        })

        let numProv = this.state.numProvider.map(e => {
            return e.num
        })

        const dataProvider = {
            labels: nameProv,
            datasets: [{
                label: "Tipos de compras",
                backgroundColor: [
                    'rgb(27, 99, 132)',
                    'rgb(27, 215, 132)',
                    'rgb(227, 315, 132)'
                ],
                data: numProv,
            }]
        }


        let nameClient = this.state.nameTClient.map(e => {
            return e.nombre
        })

        let numClient = this.state.numClient.map(e => {
            return e.num
        })

        const dataClient = {
            labels: nameClient,
            datasets: [{
                label: "Tipos de compras",
                backgroundColor: [
                    'rgb(27, 99, 132)',
                    'rgb(27, 215, 132)',
                    'rgb(227, 315, 132)'
                ],
                data: numClient,
            }]
        }


        //Se miestra los graficos con sus datos
        return (
            <div className="d-flex principal" id="wrapper">
                <Menu></Menu>
                {/*Contenido de la pagina */}
                <div id="page-content-wrapper" className="bg xd">
                    {/*Navbar principal*/}
                    <NavContent></NavContent>
                    <div className="size-completo">
                        <div className="container-fluid bg-content">
                            <div className="row content-card">
                                <CardStart name="Compras" img={purchase} num={this.state.val2} ></CardStart>
                                <CardStart name="Usuarios" img={user} num={this.state.val} ></CardStart>
                                <CardStart name="Ventas" img={sell} num={this.state.val3} ></CardStart>
                            </div>

                            <div className="row">
                                <CardChart chart={
                                    <Bar data={data}
                                        width={100}
                                        height={50}
                                    />
                                } title="Numero de compras segun su tipo" col="col-lg-6" />
                                <CardChart chart={
                                    <Pie data={dataProduct}
                                        width={100}
                                        height={50}
                                    />
                                } title="Precio por producto" col="col-lg-6" />
                                <CardChart chart={
                                    <HorizontalBar data={dataUser}
                                        width={100}
                                        height={50}
                                    />
                                } title="Numero de usuarios por su rol" col="col-lg-6" />
                                <CardChart chart={
                                    <Line data={dataProvider}
                                        width={100}
                                        height={50}
                                    />
                                } title="Compras a proveedores" col="col-lg-6" />
                                <CardChart chart={
                                    <Doughnut data={dataClient}
                                        width={100}
                                        height={50}
                                    />
                                } title="Tipo de cliente que mas compra" col="col-lg-6" />
                                <CardChart chart={
                                    <div className="d-flex justify-content-center">
                                        <Link to="/graficos" type="button" className="btn btn-primary btn-lg">Ver mas</Link></div>
                                } title="MAS GRAFICOS" col="col-lg-6" />
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        )
    }
}

export default Start;