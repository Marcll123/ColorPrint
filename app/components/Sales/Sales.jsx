import React, { Component } from "react";
import Menu from "../Menu/Menu.jsx";
import NavContent from "../Nav/NavContent.jsx";
import "./Sales.css";
import ModalButton from "../AnotherComponents/buttons/ModalButton.jsx";
import Search from "../AnotherComponents/Search.jsx";
import Table from "../AnotherComponents/Table.jsx";
import Modal from "../AnotherComponents/Modal.jsx";
import CancelButton from "../AnotherComponents/buttons/CancelButton.jsx";
import AcceptButton from "../AnotherComponents/buttons/AcceptButton.jsx";
import Pagination from "react-js-pagination";
import { SaleService } from "../../services/SaleService.js";
import { NumberS } from "../../services/SaleService.js";
import { SalesDetailService } from "../../services/SalesDetailService.js";
import { NumberD } from "../../services/SalesDetailService";
import FormSales from "./FormSales.jsx";

class Sales extends Component {
  //Constructor de el componente
  constructor(props) {
    super(props);
     //Estate de el componente TypeSales que contiene titles de la tabla y sus keys para obtener 
      //los datos y mostrarlos en la vista
    this.state = {
      titles: [
        "Sucursal",
        "Tipo compra",
        "Cliente",
        "Direccion",
        "Dias credito",
        "Tipo venta",
        "Tipo factura",
        "Numero pedido"
      ],
      keys: [
        "nombre_sucu",
        "tipo_compro",
        "cliente",
        "direccion",
        "dias_credito",
        "tipo_venta",
        "facturacion",
        "num_pedido"
      ],
      data: [],
      val: 1,
      titles2: [
        "Card producto",
        "UMD",
        "Cantidad",
        "Descuento",
        "V no sujeta",
        "V afecta",
        "Total gravado",
        "Total venta",
        "Venta"
      ],
      keys2: [
        "card_producto",
        "umd",
        "cantidad",
        "descuento",
        "v_nosujeta",
        "v_efecta",
        "total_gravado",
        "total",
        "id_venta"
      ],
      data2: [],
      val2: 1
    };
    this.SalesService = new SaleService();
    this.number = new NumberS();
    this.SalesDService = new SalesDetailService();
    this.numberD = new NumberD();

    this.handleAddTodo = this.handleAddTodo.bind(this);
    this.handleAddTodo2 = this.handleAddTodo2.bind(this);
    this.handleUpdateTodo = this.handleUpdateTodo.bind(this);
    this.handleSubmitiId = this.handleSubmitiId.bind(this);
    this.handlePagination = this.handlePagination.bind(this);
    this.handlePagination2 = this.handlePagination2.bind(this);
    this.handlePageChange = this.handlePageChange.bind(this);
    this.handlePageChange2 = this.handlePageChange2.bind(this);
    this.Add = this.Add.bind(this);
    this.getdata;
    this.id = "";
    this.idDelete = "";
    this.num = 1;
    this.totalItemsCount = 0;
    this.totalItemsCount2 = 0;
  }

  //Obtine el numero de datos desde la base de datos 
  handlePagination() {
    this.number.getNumber().then(res =>{
        this.totalItemsCount = res[0].num;
    })
  }
  handlePagination2() {
    this.numberD.getNumber().then(res => {
      this.totalItemsCount2 = res[0].num;
    });
  }
   //Obtiene el numero de la paginacion que se a seleccionado 
  handlePageChange(pageNumber) {
    this.setState(
      {
        val: pageNumber
      },
      () => {
        this.getdata(this.state.val);
      }
    );
  }
  //Metodo del cliclo de vida de un componente de React
  handlePageChange2(pageNumber) {
    this.setState(
      {
        val2: pageNumber
      },
      () => {
        this.getdata2(this.state.val2);
      }
    );
  }
  componentDidMount() {
    this.getdata(this.state.val);
    this.getdata2(this.state.val2);
  }
//Este es el metodo que se encarga de obtener la Data desde la base de datos por medio de sus servicio
  getdata(page) {
    this.SalesService.getSales(page).then(res => {
      this.setState(prev => {
        const { data } = prev;
        return { data: [...res] };
      });
    });
  }
  getdata2(page) {
    this.SalesDService.getSalesDetail(page).then(res => {
      this.setState(prev => {
        const { data2 } = prev;
        return { data2: [...res] };
      });
    });
  }

  handleInit() {
    this.getdata(this.state.val);
  }

  update(row) {
    return e => {
      this.id = row.id_venta;
    };
  }
  delete(row) {
    return e => {
      this.idDelete = row.id_venta;
    };
  }

  handleAddTodo(form) {
    if (this.id==="") {
        this.SalesService.saveSales(form).then(res =>{
            this.getdata(this.state.val)
        })
  }}
  handleAddTodo2(form) {
    this.SalesDService.saveSalesDetail(form).then(res => {
      this.getdata2(this.state.val2);
    });
  }

  handleUpdateTodo(form) {
    const a = Array.from(form.entries()).map(arr => {
      return {
        [arr[0]]: arr[1]
      };
    });

    this.SalesService.updateSales(Object.assign({}, ...a), this.id).then(
      res => {
        this.getdata(this.state.val);
      }
    );
  }

  handleSubmitiId(e) {
    e.preventDefault();
    this.SalesService.deleteSales(this.idDelete).then(res => {
      this.getdata(this.state.val);
    });
  }
  Add(e) {
    this.id = "";
    console.log(this.id);
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
                    VENTAS
                  </h5>
                </div>
              </div>
              <Modal
                id="modal1"
                size="modal-lg"
                form={
                  <FormSales
                    onAddTodo={this.handleAddTodo}
                    onUpdateTodo={this.handleUpdateTodo}
                    onAddTodo2={this.handleAddTodo2}
                  />
                }
                title="Compras"
              />
              <Modal
                id="modal2"
                size="modal-sm"
                center="modal-dialog-centered"
                form={
                  <h1 className="text-danger text">Desea eliminar venta</h1>
                }
                footer={
                  <form
                    onSubmit={this.handleSubmitiId}
                    className="mx-auto split"
                  >
                    <CancelButton text="Cancelar" />
                    <AcceptButton text="Aceptar" />
                  </form>
                }
              />
              <Modal
                id="modal3"
                size="modal-lg"
                form={
                  <React.Fragment>
                    <Table
                      id="dtHorizontalExample"
                      className="table table-responsive-sm table-responsive-md table-responsive-sm-xl
                        table-responsive-lg"
                      titles={state.titles2}
                      data={state.data2}
                      keys={state.keys2}
                      actions={{}}
                    />
                    <div className="d-flex justify-content-center">
                      <Pagination
                        activePage={this.state.val2}
                        itemsCountPerPage={5}
                        totalItemsCount={this.totalItemsCount2}
                        onChange={this.handlePageChange2}
                        itemClass="page-item"
                        linkClass="page-link"
                      />
                    </div>
                    {this.handlePagination2()}
                  </React.Fragment>
                }
                title="Detalle ventas"
              />
              <div className="row split">
                <div className="col-12">
                  <div className="card">
                    <div className="card-body">
                      <Search
                        textButton="Agregar ventas y detalle"
                        modal="modal"
                        target="#modal1"
                        click={this.Add}
                        botontable={
                          <ModalButton
                            text="Ver detalle"
                            modal="modal"
                            target="#modal3"
                          />
                        }
                      />
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
                          onChange={this.handlePageChange}
                          itemClass="page-item"
                          linkClass="page-link"
                        />
                      </div>
                      {this.handlePagination()}
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

export default Sales;
