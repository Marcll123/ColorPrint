import React, {Component} from 'react';
import {render} from 'react-dom'
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
import {BrowserRouter as Router, Route, Switch} from 'react-router-dom'

class App extends Component{
    render(){
        return(
            <Router>
                <div className="App">
                   <Switch>
                   <Route path="/" exact render={()=>{
                           return(<Login></Login>)
                    }}></Route>
                    <Route path="/login" exact render={()=>{
                        return(<Login></Login>)
                    }}></Route>
                    <Route path="/start" exact render={()=>{
                        return(<Start></Start>)
                    }}></Route>
                     <Route path="/adminuser" exact render={()=>{
                        return(<Users></Users>)
                    }}></Route>
                      <Route path="/clientes" exact render={()=>{
                        return(<Clients></Clients>)
                    }}></Route>
                     <Route path="/tipoventas" exact render={()=>{
                         return(<TypeSales></TypeSales>)
                    }}></Route>
                      <Route path="/compras" exact render={()=>{
                         return(<Purchase></Purchase>)
                    }}></Route>
                     <Route path="/ventas" exact render={()=>{
                         return(<Sales></Sales>)
                    }}></Route>
                     <Route path="/tipocompras" exact render={()=>{
                        return(<TypeBuy></TypeBuy>)
                    }}></Route>
                     <Route path="/graficos" exact render={()=>{
                        return(<Chart></Chart>)
                    }}></Route>

                    <Route component={() =>(
                       <div>
                           <h1>Error 404</h1>
                       <span>Pagina no encontrada</span>
                       </div>
                    )} />

                   </Switch>
                </div>
            </Router>
        )
    }
}

render(
    <App/>,document.getElementById('app')
)