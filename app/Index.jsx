import React, {Component} from 'react';
import {render} from 'react-dom'
import './Index.css'
import Start from './components/Start/Start.jsx'
import Menu from './components/Menu/Menu.jsx'
import Users from './components/Users/Users.jsx'
import {BrowserRouter as Router, Route} from 'react-router-dom'

class App extends Component{
    render(){
        return(
            <Router>
                <div className="App">
                    <Route path="/" exact render={()=>{
                        return(<Users></Users>)
                    }}></Route>
                    <Route path="/start" exact render={()=>{
                        return(<Start></Start>)
                    }}></Route>
                     <Route path="/adminuser" exact render={()=>{
                        return(<Users></Users>)
                    }}></Route>
                </div>
            </Router>
        )
    }
}

render(
    <App/>,document.getElementById('app')
)