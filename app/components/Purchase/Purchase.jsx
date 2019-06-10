import React, { Component } from "react";
import Menu from "../Menu/Menu.jsx";
import NavContent from "../Nav/NavContent.jsx";
import "./Purchase.css";
import ModalButton from "../AnotherComponents/buttons/ModalButton.jsx";
import Search from "../AnotherComponents/Search.jsx";
import Table from "../AnotherComponents/Table.jsx";
import Modal from "../AnotherComponents/Modal.jsx";
import CancelButton from "../AnotherComponents/buttons/CancelButton.jsx";
import AcceptButton from "../AnotherComponents/buttons/AcceptButton.jsx";
import Pagination from "react-js-pagination";
import { PurchaseService } from "../../services/PurchaseService.js";
import { Number } from "../../services/PurchaseService.js";
import { PruchaseDService } from "../../services/PurcheseDetail.js";
import { NumberD } from "../../services/PurcheseDetail.js";
import FormPurchase from "./FormPurchase.jsx";

class Purchase extends Component {
  constructor(props) {
    super(props);
    this.state = {
      titles: [
        "Numero DOC",
        "Proveedor",
        "dirreccion",
        "Serie costo",
        "Tipo Compra",
        "Forma",
        "Numero de compra",
        "Dai"
      ],
      keys: [
        "numerodocumento",
        "id_proveedor",
        "direccion",
        "serie_costo",
        "id_tipocompra",
        "id_forma",
        "num_compra",
        "dai"
      ],
      data: [],
      val: 1,
      titles2: [
        "Codigo producto",
        "Cantidad",
        "Descripcion",
        "precio  unitario",
        "Total exento",
        "Total grabado",
        "Codigo compra"
      ],
      keys2: [
        "id_producto",
        "cantidad",
        "descripcion",
        "precio_uni",
        "total_exeno",
        "total_grabado",
        "id_compra"
      ],
      data2: [],
      val2: 1
    };

    this.PurchaseService = new PurchaseService();
    this.number = new Number();
    this.PurchaseDService = new PruchaseDService();
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
    this.id2 = "";
    this.idDelete2 = "";
    this.num = 1;
    this.totalItemsCount = 0;
    this.totalItemsCount2 = 0;
  }

  handlePagination() {
    this.number.getNumber().then(res => {
      this.totalItemsCount = res[0].num;
    });
  }
  handlePagination2() {
    this.numberD.getNumber().then(res => {
      this.totalItemsCount2 = res[0].num;
    });
  }

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

  getdata(page) {
    this.PurchaseService.getPurchase(page).then(res => {
      this.setState(prev => {
        const { data } = prev;
        return { data: [...res] };
      });
    });
  }
  getdata2(page) {
    this.PurchaseDService.getPurchaseD(page).then(res => {
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
      this.id = row.id_compra;
    };
  }
  delete(row) {
    return e => {
      this.idDelete = row.id_compra;
    };
  }

  handleAddTodo(form) {
    if (this.id==="") {
        this.PurchaseService.savePurchase(form).then(res =>{
            this.getdata(this.state.val)
        })
  }}
  handleAddTodo2(form) {
    this.PurchaseDService.savePurchaseD(form).then(res => {
      this.getdata2(this.state.val2);
    });
  }

  handleUpdateTodo(form) {
    const a = Array.from(form.entries()).map(arr => {
      return {
        [arr[0]]: arr[1]
      };
    });

    this.PurchaseService.updatePurchase(Object.assign({}, ...a), this.id).then(
      res => {
        this.getdata(this.state.val);
      }
    );
  }

  handleSubmitiId(e) {
    e.preventDefault();
    this.PurchaseService.deletePurchase(this.idDelete).then(res => {
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
                    COMPRAS
                  </h5>
                </div>
              </div>
              <Modal
                id="modal1"
                size="modal-lg"
                form={
                  <FormPurchase
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
                  <h1 className="text-danger text">Desea eliminahhr Compra</h1>
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
                title="Detalle compras"
              />
              <div className="row split">
                <div className="col-12">
                  <div className="card">
                    <div className="card-body">
                      <Search
                        textButton="Agregar compra y detalle"
                        modal="modal"
                        target="#modal1"
                        click={this.Add}
                        botontable={
                          <ModalButton
                            text="Ver detalle"
                            modal="modal"
                            target="#modal3"
                            click={this.Add}
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

export default Purchase;
