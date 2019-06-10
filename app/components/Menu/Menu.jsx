import React, { Component } from "react";
import "./Menu.css";
import logo from "../../resources/img/logo2.PNG";
import {Link} from "react-router-dom";

class Menu extends Component {
  render() {
    return (
        <div className="Menu">
               <div className="bg-white border-right" id="sidebar-wrapper">
                   <div className="sidebar-heading text-white bg-white">
                     <img src={logo} className="logo"/>
                   </div>
                   
                   <div className="list-group list-group-flush">
        
                      <Link to="/start" className="list-group-item list-group-item-action bg-white hover"
                      >Inicio</Link>
                      
                      {/*Modulo de Usuarios*/}
                      <a href="#userData" data-toggle="collapse" 
                      className="list-group-item list-group-item-action bg-white hover">Usuarios<i
                      className="fas fa-angle-down iconMove text-primary"></i></a>

                       <div id="userData" className="collapse">
                          <Link to="/adminuser" className="list-group-item list-group-item-action bg-white hover"
                          ><i className="fas fa-user iconli2 text-primary">
                          </i>Administrar usuarios</Link> 
                          
                          <Link to="/clientes" className="list-group-item list-group-item-action bg-white hover"><i
                          className="fas fa-users-cog iconli text-success"></i> Administrar clientes</Link>
                       </div>

                      {/*Modulo de Compras*/}
                      <a href="#shoppingData" data-toggle="collapse"
                      className="list-group-item list-group-item-action bg-white hover">Compras<i
                      className="fas fa-angle-down iconMove2 text-primary"></i></a>
                        <div id="shoppingData" className="collapse">
                          <Link to="/compras" className="list-group-item list-group-item-action bg-white hover"
                          ><i className="fas fa-user iconli2 text-primary">
                          </i>Gestion compras</Link> 
                       </div>
                      
                      {/*Moduolo de Ventas*/}
                      <a href="#salesData" data-toggle="collapse"
                      className="list-group-item list-group-item-action bg-white hover">Ventas<i
                      className="fas fa-angle-down iconMove3 text-primary"></i></a>
                      <div id="salesData" className="collapse">
                          <Link to="/ventas" className="list-group-item list-group-item-action bg-white hover"
                          ><i className="fas fa-user iconli2 text-primary">
                          </i>Gestion ventas</Link> 
                          <Link to="/cotizaciones" className="list-group-item list-group-item-action bg-white hover"
                          ><i className="fas fa-user iconli2 text-primary">
                          </i>Corizaciones</Link> 
                       </div>
                      {/*Modulo de graficos*/}
                      <a href="#graphics" data-toggle="collapse"
                      className="list-group-item list-group-item-action bg-white hover">Graficos<i
                      className="fas fa-angle-down iconMove4 text-primary"></i></a>

                      {/*Modulo de Ajustes*/}
                      <a href="#settings" data-toggle="collapse"
                      className="list-group-item list-group-item-action bg-white hover">Ajustes<i
                      className="fas fa-angle-down iconMove5 text-primary"></i></a>

                      {/*Modulo de Administracion*/}
                      <a href="#administration" data-toggle="collapse"
                      className="list-group-item list-group-item-action bg-white hover">Administracion<i
                      className="fas fa-angle-down iconMove6 text-primary"></i></a>
                      <div id="administration" className="collapse">
                          <Link to="/tipoventas" className="list-group-item list-group-item-action bg-white hover"
                          ><i className="fas fa-user iconli2 text-primary">
                          </i>Tipo Ventas</Link> 
                          
                          <Link to="/clientes" className="list-group-item list-group-item-action bg-white hover"><i
                          className="fas fa-users-cog iconli text-success"></i> Administrar clientes</Link>
                       </div>

                   </div>
               </div>
        </div>        
    );
  }
}

export default Menu;
