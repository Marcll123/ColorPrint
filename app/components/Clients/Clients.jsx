import React, { Component } from "react";
import Menu from "../Menu/Menu.jsx";
import NavContent from "../Nav/NavContent.jsx";
import "./Clients.css";
import Search from "../AnotherComponents/Search.jsx";
import Table from "../AnotherComponents/Table.jsx";
import FormClient from "./FormClient.jsx";
import Modal from "../AnotherComponents/Modal.jsx";
import CancelButton from "../AnotherComponents/buttons/CancelButton.jsx";
import AcceptButton from "../AnotherComponents/buttons/AcceptButton.jsx";
import Pagination from "react-js-pagination";
import { ClientService } from "../../services/ClientService.js";
import { NumberAll } from "../../services/ClientService.js";

class Clients extends Component {
  constructor(props) {
    super(props);
    this.state = {
      titles: [
        "ID",
        "Cliente",
        "Giro",
        "NIT",
        "Numero Registo",
        "Correo",
        "Saldo acumulado",
        "Codigo vendedor",
        "Tipo"
      ],
      keys: [
        "id_cliente",
        "cliente",
        "giro",
        "numero_nit",
        "numero_registro",
        "correo",
        "saldo_acumu",
        "codigo_vendedor",
        "id_tipocli"
      ],
      data: [],
      val: 1
    };

    this.clientService = new ClientService();
    this.number = new NumberAll();

    this.handleAddTodo = this.handleAddTodo.bind(this);
    this.handleUpdateTodo = this.handleUpdateTodo.bind(this);
    this.handleSubmitiId = this.handleSubmitiId.bind(this);
    this.handlePagination = this.handlePagination.bind(this);
    this.handlePageChange = this.handlePageChange.bind(this);
    this.Add = this.Add.bind(this);
    this.getdata;
    this.id = "";
    this.idDelete = "";
    this.num = 1;
    this.totalItemsCount = 0;
  }

  handlePagination() {
    this.number.getNumber().then(res => {
      this.totalItemsCount = res[0].num;
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

  componentDidMount() {
    this.getdata(this.state.val);
  }

  getdata(page) {
    this.clientService.getClient(this.state.val).then(res => {
      this.setState(prev => {
        const { data } = prev;
        return { data: [...res] };
      });
    });
  }

  handleInit() {
    this.getdata(this.state.val);
  }

  update(row) {
    return e => {
      this.id = row.id_cliente;
    };
  }
  delete(row) {
    return e => {
      this.idDelete = row.id_cliente;
    };
  }

  handleAddTodo(form) {
    this.clientService.saveClient(form).then(res =>{
       this.getdata(this.state.val);
    })
  }

  handleUpdateTodo(form) {
    const a = Array.from(form.entries()).map(arr => {
      return {
        [arr[0]]: arr[1]
      };
    });

    this.clientService.updateClient(Object.assign({}, ...a), this.id).then(res => {
      this.getdata(this.state.val);
    });
  }

  handleSubmitiId(e) {
    e.preventDefault();
    this.clientService.deleteClient(this.idDelete).then(res =>{
      this.getdata(this.state.val);
    })
  }
  Add(e){
      this.id = ""
      console.log(this.id)
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
                    CLIENTES
                  </h5>
                </div>
              </div>
              <Modal
                id="modal1"
                size="modal-lg"
                form={<FormClient
                  onAddTodo={this.handleAddTodo}
                  onUpdateTodo={this.handleUpdateTodo}
                />}
                title="Clientes"
               />
              <Modal
                id="modal2"
                size="modal-sm"
                center="modal-dialog-centered"
                form={
                  <h1 className="text-danger text">
                    Desea eliminar este usuario
                  </h1>
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
              <div className="row split">
                <div className="col-12">
                  <div className="card">
                    <div className="card-body">
                      <Search textButton="Agregar cliente" click={this.Add}/>
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

export default Clients;
