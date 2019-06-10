import React, { Component } from "react";
import "./Menu.css";
import logo from "../../resources/img/logo2.PNG";
import { Link } from "react-router-dom";

class Menu extends Component {
  render() {
    //Metodo render de React en este caso me retorna lo que es el menu de la aplicacion
    return (
      <div className="Menu">
        <div className="bg-white border-right" id="sidebar-wrapper">
          <div className="sidebar-heading text-white bg-white">
            <img src={logo} className="logo" />
          </div>

          <div className="list-group list-group-flush">
            {/*lINK Y TO ES UNA PROP DE REACT ROUTER DOM QUE SIRVE PARA EL MANEJO DE RUTAS Y LA NEGAVE
                      CION EN LA SPA */}
            <Link
              to="/start"
              className="list-group-item list-group-item-action bg-white hover"
            >
              Inicio
            </Link>

            {/*Modulo de Usuarios*/}
            <a
              href="#userData"
              data-toggle="collapse"
              className="list-group-item list-group-item-action bg-white hover"
            >
              Usuarios<i className="fas fa-angle-down iconMove text-primary" />
            </a>

            <div id="userData" className="collapse">
              {/*lINK Y TO ES UNA PROP DE REACT ROUTER DOM QUE SIRVE PARA EL MANEJO DE RUTAS Y LA NEGAVE
                      CION EN LA SPA */}
              <Link
                to="/adminuser"
                className="list-group-item list-group-item-action bg-white hover"
              >
                <i className="fas fa-user iconli2 text-primary" />Administrar
                usuarios
              </Link>
              {/*lINK Y TO ES UNA PROP DE REACT ROUTER DOM QUE SIRVE PARA EL MANEJO DE RUTAS Y LA NEGAVE
                      CION EN LA SPA */}
              <Link
                to="/clientes"
                className="list-group-item list-group-item-action bg-white hover"
              >
                <i className="fas fa-users-cog iconli text-success" />{" "}
                Administrar clientes
              </Link>
            </div>

            {/*Modulo de Compras*/}
            <a
              href="#shoppingData"
              data-toggle="collapse"
              className="list-group-item list-group-item-action bg-white hover"
            >
              Compras<i className="fas fa-angle-down iconMove2 text-primary" />
            </a>
            <div id="shoppingData" className="collapse">
              {/*lINK Y TO ES UNA PROP DE REACT ROUTER DOM QUE SIRVE PARA EL MANEJO DE RUTAS Y LA NEGAVE
                      CION EN LA SPA */}
              <Link
                to="/compras"
                className="list-group-item list-group-item-action bg-white hover"
              >
                <i className="fas fa-shopping-bag iconli2 text-primary" />
                Gestion compras
              </Link>
            </div>

            {/*Moduolo de Ventas*/}
            <a
              href="#salesData"
              data-toggle="collapse"
              className="list-group-item list-group-item-action bg-white hover"
            >
              Ventas<i className="fas fa-angle-down iconMove3 text-primary" />
            </a>
            <div id="salesData" className="collapse">
              {/*lINK Y TO ES UNA PROP DE REACT ROUTER DOM QUE SIRVE PARA EL MANEJO DE RUTAS Y LA NEGAVE
                      CION EN LA SPA */}
              <Link
                to="/ventas"
                className="list-group-item list-group-item-action bg-white hover"
              >
                <i className="fas fa-cash-register iconli2 text-primary" />
                Gestion ventas
              </Link>
              {/*lINK Y TO ES UNA PROP DE REACT ROUTER DOM QUE SIRVE PARA EL MANEJO DE RUTAS Y LA NEGAVE
                      CION EN LA SPA */}
              <Link
                to="/cotizaciones"
                className="list-group-item list-group-item-action bg-white hover"
              >
                <i className="fas fa-user iconli2 text-primary" />Cotizaciones
              </Link>
            </div>
            {/*Modulo de graficos*/}
            <a
              href="#graphics"
              data-toggle="collapse"
              className="list-group-item list-group-item-action bg-white hover"
            >
              Graficos<i className="fas fa-angle-down iconMove4 text-primary" />
            </a>

            {/*Modulo de Administracion*/}
            <a
              href="#administration"
              data-toggle="collapse"
              className="list-group-item list-group-item-action bg-white hover"
            >
              Administracion
              <i className="fas fa-angle-down iconMove6 text-primary" />
            </a>
            <div id="administration" className="collapse">
              {/*lINK Y TO ES UNA PROP DE REACT ROUTER DOM QUE SIRVE PARA EL MANEJO DE RUTAS Y LA NEGAVE
                      CION EN LA SPA */}
              <Link
                to="/tipoventas"
                className="list-group-item list-group-item-action bg-white hover"
              >
                <i className="fas fa-money-check-alt iconli2 text-primary" />
                Tipo ventas
              </Link>
              {/*lINK Y TO ES UNA PROP DE REACT ROUTER DOM QUE SIRVE PARA EL MANEJO DE RUTAS Y LA NEGAVE
                      CION EN LA SPA */}
              <Link
                to="/tipocompras"
                className="list-group-item list-group-item-action bg-white hover"
              >
                <i className="fas fa-shopping-cart iconli2 text-primary" />Tipo
                compras
              </Link>
            </div>
          </div>
        </div>
      </div>
    );
  }
}

export default Menu;
