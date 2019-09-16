import React, { Component } from 'react';
import Menu from "../Menu/Menu.jsx";
import NavContent from "../Nav/NavContent.jsx";
import Search from "../AnotherComponents/Search.jsx";
import Table from "../AnotherComponents/Table.jsx";
import Modal from "../AnotherComponents/Modal.jsx";
import CancelButton from "../AnotherComponents/buttons/CancelButton.jsx";
import AcceptButton from "../AnotherComponents/buttons/AcceptButton.jsx";
import Pagination from "react-js-pagination";
import {QuotationServices} from '../../services/QuatationService.js'

class Quatation extends Component {
  constructor(props) {
      super(props)
  
      this.token = localStorage.getItem('token');
      if (!this.token) {
        location.pathname = '/'
      }
        
      this.state = {
        titles: [
            "Cantidad",
            "Descripcion",
            "Precio",
            "Cliente",
            "Total",
            "Numero"
        ],
        keys: [
            "cantidad",
            "descripcion",
            "precio_unitario",
            "cliente",
            "total",
            "numero_cotizacion"  
        ],
        data: [],
        val: 1
      }

    
      this.QuotationServices = new QuotationServices();

      this.id = "";
      this.idDelete = "";
      this.num = 1;
      this.totalItemsCount = 0;
  }
  
  componentDidMount() {
    this.getdata(this.state.val);
  }
  //Este es el metodo que se encarga de obtener la Data desde la base de datos por medio de sus servicio
  getdata(page) {
    this.QuotationServices.getQuatation(this.state.val).then(res => {
      this.setState(prev => {
        const { data } = prev;
        return { data: [...res] };
      });
    });
  }

  update(){

  }

  delete(){

  }

  render() {
    const { state } = this;
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
                    COTIZACIONES
                  </h5>
                </div>
              </div>

              <div className="row split">
                <div className="col-12">
                  <div className="card">
                    <div className="card-body">
                      <Search textButton="Agregar cotizacion" modal="modal" target="#modal1" click={this.Add}/>
                      <Table
                        id="dtHorizontalExample"
                        className="table table-responsive-sm table-responsive-md table-responsive-sm-xl
                        table-responsive-lg"
                        titles={state.titles}
                        data={state.data}
                        keys={state.keys}
                        actions={{
                          update: this.update.bind(this),
                          delete: this.delete.bind(this)
                        }}
                      />
                      <div className="d-flex justify-content-center">
                        <Pagination
                          activePage={this.state.val}
                          itemsCountPerPage={5}
                          totalItemsCount={this.totalItemsCount}
                        //   onChange={this.handlePageChange}
                          itemClass="page-item"
                          linkClass="page-link"
                        />
                      </div>
                      {/* {this.handlePagination()} */}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  }
}

export default Quatation;
