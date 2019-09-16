import React, { Component } from 'react';
import Menu from "../Menu/Menu.jsx";
import NavContent from "../Nav/NavContent.jsx";
import Search from "../AnotherComponents/Search.jsx";
import Table from "../AnotherComponents/Table.jsx";
import Modal from "../AnotherComponents/Modal.jsx";
import CancelButton from "../AnotherComponents/buttons/CancelButton.jsx";
import AcceptButton from "../AnotherComponents/buttons/AcceptButton.jsx";
import Pagination from "react-js-pagination";
import {ProductService} from '../../services/ProductService.js'

class Products extends Component {
  constructor(props) {
      super(props)
      this.token = localStorage.getItem('token');
      if (!this.token) {
        location.pathname = '/'
      }  
      this.state = {
        titles: [
            "Productos",
            "Precio unitario",
            "Descripcion",
            "Proveedor"
        ],
        keys: [
            "nombre_produc",
            "precio_uni",
            "descripcion",
            "nombre_prove"  
        ],
        data: [],
        val: 1
      }

      this.ProductService = new ProductService();

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
    this.ProductService.getProduct(this.state.val).then(res => {
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
                    PRODUCTOS
                  </h5>
                </div>
              </div>

              <div className="row split">
                <div className="col-12">
                  <div className="card">
                    <div className="card-body">
                      <Search textButton="Agregar producto" 
                      modal="modal" target="#modal1" 
                      botontable={<a className="btn btn-outline-primary my-2 my-sm-2 my-2  ml-2 color-primary" href="http://localhost/ColorPrint/app/reportes/reporteProductos.php" target="_blanck">PDF</a>}
                      click={this.Add}/>
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

export default Products;
