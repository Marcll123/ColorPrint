import React, { Component } from 'react';
import { render } from 'react-dom'
import './Index.css'
import Start from './components/Start/Start.jsx'
import Users from './components/Users/Users.jsx'
import Login from './components/login/Login.jsx'
import Clients from './components/Clients/Clients.jsx'
import Purchase from './components/Purchase/Purchase.jsx'
import Sales from './components/Sales/Sales.jsx'
import TypeSales from './components/TypeSales/TypeSales.jsx'
import TypeBuy from './components/TypeBuy/TypeBuy.jsx'
import Chart from './components/Chart/Chart.jsx'
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom'
import Products from './components/Products/Products.jsx';
import Quatation from './components/Quatation/Quatation.jsx';
import FirstUser from './components/login/FirstUser';
import Profile from './components/Users/Profile.jsx';
import PageNotFound from './components/MessagePages/PageNotFound.jsx';
import PermissionsPage from './components/MessagePages/PermissionsPage.jsx';
import RecoverPassword from './components/login/RecoverPassword.jsx';
import {NumberDetail} from './services/UsersService.js'

class App extends Component {
    constructor(props) {
        super(props)

        this.state = {
            num: 0,
            visible: true
        };

        this.rol = localStorage.getItem('rol');
        this.NumberDetail = new NumberDetail();
    };
    componentDidMount() {
        //Condicional para verificar el tipo de usuario y en caso de ser de cada tipo mostrar 
        //lo referente y a los permisos que tiene cada tipo de usuario
        if (this.rol === '1') {
            this.setState({ visible: true })
        } else if (this.rol === '2') {
            this.setState({ visible: false })
        }

        //Con esto traemos el numero de usuarios que hay en la base 
        //en caso de ser sero se rendizara el conponente de crear el primer usuario
        this.NumberDetail.getNumberDetail().then(res => {
            this.setState({num: [...res]})
        })
    }

    //Renderiza el componente que contiene las rutas de todo el programa
    render() {
        return (
            <Router>
                <div className="App">
                    <Switch>
                        <Route path="/" exact render={() => {
                            if (this.state.num === 0) {
                                return (<FirstUser />)
                            } else {
                                return (<Login></Login>)
                            }
                        }}></Route>
                        <Route path="/login" exact render={() => {
                            return (<Login></Login>)
                        }}></Route>
                        <Route path="/start" exact render={() => {
                            return (<Start></Start>)
                        }}></Route>
                        <Route path="/adminuser" exact render={() => {
                            return (<Users></Users>)
                        }}></Route>
                        <Route path="/clientes" exact render={() => {
                            return (<Clients></Clients>)
                        }}></Route>
                        <Route path="/tipoventas" exact render={() => {
                            if (this.state.visible === true) {
                                return (<TypeSales></TypeSales>)
                            } else {
                                return (<PermissionsPage />)
                            }
                        }}></Route>
                        <Route path="/compras" exact render={() => {
                            return (<Purchase></Purchase>)
                        }}></Route>
                        <Route path="/ventas" exact render={() => {
                            return (<Sales></Sales>)
                        }}></Route>
                        <Route path="/tipocompras" exact render={() => {
                            if (this.state.visible === true) {
                                return (<TypeBuy></TypeBuy>)
                            } else {
                                return (<PermissionsPage />)
                            }
                        }}></Route>
                        <Route path="/graficos" exact render={() => {
                            return (<Chart></Chart>)
                        }}></Route>
                        <Route path="/productos" exact render={() => {
                            return (<Products></Products>)
                        }}></Route>
                        <Route path="/cotizaciones" exact render={() => {
                            return (<Quatation></Quatation>)
                        }}></Route>
                        <Route path="/perfil" exact render={() => {
                            return (<Profile></Profile>)
                        }}></Route>
                        <Route path="/restaurar_contraseña" exact render={() => {
                            return (<RecoverPassword></RecoverPassword>)
                        }}></Route>
                        <Route path="/nueva_contraseña" exact render={() => {
                            return (<ChangeNewPass></ChangeNewPass>)
                        }}></Route>

                        <Route component={() => (
                            //Componente que se muestra en caso se ingrese una ruta que no este definida 
                            //en nustro componente
                            <PageNotFound></PageNotFound>
                        )} />

                    </Switch>
                </div>
            </Router>
        )
    }
}

render(
    <App />, document.getElementById('app')
)