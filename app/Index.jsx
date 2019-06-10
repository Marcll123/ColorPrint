import React, {Component} from 'react';
import {render} from 'react-dom'
import './Index.css'
import Start from './components/Start/Start.jsx'
import Users from './components/Users/Users.jsx'
import Login from './components/login/Login.jsx'
import Clients from './components/Clients/Clients.jsx'
import Purchase from './components/Purchase/Purchase.jsx'
import TypeSales from './components/TypeSales/TypeSales.jsx'
import {BrowserRouter as Router, Route} from 'react-router-dom'

class App extends Component{
    render(){
        return(
            <Router>
                <div className="App">
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
                </div>
            </Router>
        )
    }
}

render(
    <App/>,document.getElementById('app')
)