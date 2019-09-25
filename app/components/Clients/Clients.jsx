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
import ModalMessage from "../AnotherComponents/ModalMessage.jsx";
import ModalMsm from "../AnotherComponents/ModalMsm.jsx";

class Clients extends Component {
  //Constructor de el componente Clients
  constructor(props) {
    super(props);
    this.token = localStorage.getItem("token");
    if (!this.token) {
      location.pathname = "/";
    }
    //Estate de el componente Clients que contiene titles de la tabla y sus keys para obtener
    //los datos y mostrarlos en la vista
    this.state = {
      titles: [
        "Cliente",
        "Numero Registo",
        "Direccion",
        "Departamento",
        "Tipo"
      ],
      keys: [
        "cliente",
        "numero_registro",
        "direccion",
        "departamento",
        "tipo_cliete"
      ],
      data: [],
      val: 1,
      cliente:"",
      giro: "",
      numero_nit: "",
      numero_registro: "",
      direccion: "",
      telefono:"",
      dias_credito: "",
      correo: "",
      saldo_acumu: "",
      limite_credito: "",
      search: ""
    };

    this.clientService = new ClientService();
    this.number = new NumberAll();
    //Bindeo de los metodos utilizados en el componente
    this.handleAddTodo = this.handleAddTodo.bind(this);
    this.handleUpdateTodo = this.handleUpdateTodo.bind(this);
    this.handleSubmitiId = this.handleSubmitiId.bind(this);
    this.handlePagination = this.handlePagination.bind(this);
    this.handlePageChange = this.handlePageChange.bind(this);
    this.Add = this.Add.bind(this);
    this.handleImput = this.handleImput.bind(this);
    this.getdata;
    this.id = "";
    this.idDelete = "";
    this.num = 1;
    this.totalItemsCount = 0;
  }
  //Obtine el numero de datos desde la base de datos
  handlePagination() {
    this.number.getNumber().then(res => {
      this.totalItemsCount = res[0].num;
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
  componentDidMount() {
    this.getdata(this.state.val);
  }
  //Este es el metodo que se encarga de obtener la Data desde la base de datos por medio de sus servicio
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
  //Ontienen el valor de la fila seleccionada de los campos de la tabla para realizar
  //La acciones de Eliminar y actualizar
  update(row) {
    return e => {
      this.id = row.id_cliente;
      this.setState({ messagevisibleU: false });
      this.setState({ messagevisible: false });
      this.clientService.getClientdataid(this.id).then(res => {
        this.setState({
          cliente: res[0].cliente,
          giro: res[0].giro,
          numero_nit: res[0].numero_nit,
          numero_registro: res[0].numero_registro,
          direccion: res[0].direccion,
          telefono: res[0].telefono,
          dias_credito: res[0].dias_credito,
          correo: res[0].correo,
          saldo_acumu: res[0].saldo_acumu,
          limite_credito: res[0].limite_credito
        });
      });
    };
  }
  delete(row) {
    return e => {
      this.idDelete = row.id_cliente;
      this.setState({ messagevisibleD: false });
    };
  }
  //Este metodo realiza  la accion de agregar datos a la base de datos usando su servicio
  handleAddTodo(form) {
    if (this.id === "") {
      this.clientService.saveClient(form).then(res => {
        this.getdata(this.state.val);
        const { message } = res;
        if (message === "He insertado un registro") {
          $('#modalAdd').modal('show')
          $('#modal1').modal('hide')
        }
      });
    }
  }
  //Este metodo se encarga de actualizar los datos de la base de datos y mostrar los cambios
  //En el componente una vez se realiza la accion
  handleUpdateTodo(form) {
    const a = Array.from(form.entries()).map(arr => {
      return {
        [arr[0]]: arr[1]
      };
    });

    if (this.id !== "") {
      this.clientService
        .updateClient(Object.assign({}, ...a), this.id)
        .then(res => {
          this.getdata(this.state.val);
          const { message } = res;
          if (message === "He actualizado un registro") {
            $('#modalUpdate').modal('show')
            $('#modal1').modal('hide')
          }
        });
    }
  }
  //Este es el metodo que se encarga de eliminar un dato de la base de datos usando su servicio
  handleSubmitiId(e) {
    e.preventDefault();
    this.clientService.deleteClient(this.idDelete).then(res => {
      this.getdata(this.state.val);
      const { message } = res;
      if (message === "He borrado un registro") {
        $('#modalDelete').modal('show')
        $('#modal2').modal('hide')
      }
    });
  }
  //Este es un metodo que hace que this.id  = "" para que no haya problemas a la hora de crear
  //o actualizar un dato de la tabla
  Add(e) {
    this.id = "";
    console.log(this.id);
  }


  handleImput(e) {
    const { value, name } = e.target;
    this.setState({
      [name]: value
    });
  }

  Search(e) {
    this.setState({ search: e.target.value });
  }

  onSearch() {
    if (this.state.search === "") {
      this.getdata(this.state.val);
    } else {
      this.clientService.getClientSearch(this.state.search.toLocaleLowerCase()).then(res => {
        this.setState(prev => {
          const { data } = prev;
          return { data: [...res] };
        });
      });
    }
  }

  //Metodo render de react donde se renderiza toda la vista del componente
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
              {/*Modal 1 es el encargado de tener el form de crear y actualizar los datos en la tabla */}
              <Modal
                id="modal1"
                size="modal-lg"
                form={
                  <FormClient
                    onAddTodo={this.handleAddTodo}
                    onUpdateTodo={this.handleUpdateTodo}
                    changeclient={this.handleImput}
                    changeturn={this.handleImput}
                    changenit={this.handleImput}
                    changenumregistry={this.handleImput}
                    changeaddress={this.handleImput}
                    changephone={this.handleImput}
                    changecreditdays={this.handleImput}
                    changemail={this.handleImput}
                    changetotalbalance={this.handleImput}
                    changecreditlimit={this.handleImput}
                    client={this.state.cliente}
                    turn={this.state.giro}
                    nit={this.state.numero_nit}
                    address={this.state.direccion}
                    phone={this.state.telefono}
                    creditdays={this.state.dias_credito}
                    mail={this.state.correo}
                    totalbalance={this.state.saldo_acumu}
                    creditlimit={this.state.limite_credito}
                  />
                }
                title="Clientes"
              />
              {/*Modal que se muestra cuando se apreta el boton de elinar un campo de la base de datos*/}
              <Modal
                id="modal2"
                size="modal-sm"
                center="modal-dialog-centered"
                form={
                  <React.Fragment>
                    <h1 className="text-danger text">
                      Desea eliminar este usuario
                    </h1>
                  </React.Fragment>
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
              {/* Modal de mensaje  */}

                <ModalMsm
                  id="modalDelete"
                  color="text-danger"
                  title="Mensaje de Exito"
                  colorButton="bg-danger"
                  message="Cliente Eliminado Exitosamente"
                />
                 <ModalMsm
                  id="modalAdd"
                  color="text-success"
                  title="Mensaje de Exito"
                  colorButton="bg-success"
                  message="Cliente creado Exitosamente"
                />
                 <ModalMsm
                  id="modalUpdate"
                  color="text-info"
                  title="Mensaje de Exito"
                  colorButton="bg-info"
                  message="Cliente actualizado Exitosamente"
                />

              <div className="row split">
                <div className="col-12">
                  <div className="card">
                    <div className="card-body">
                      {/*componente de search y tabla que se muestran segun los datos que se necesiten
                       a ca se utiiza los state que estan en el contructor de titles, data, keys*/}
                      <Search
                        textButton="Agregar cliente"
                        modal="modal"
                        botontable={
                          <a
                            className="btn btn-outline-primary my-2 my-sm-2 my-2  ml-2 color-primary"
                            href="http://localhost/ColorPrint/app/reportes/repoclin.php"
                            target="_blanck"
                          >
                            PDF
                          </a>
                        }
                        target="#modal1"
                        click={this.Add}
                        changeSearch={this.Search.bind(this)}
                        searchClick={this.onSearch.bind(this)}
                      />
                      <Table
                        id="dtHorizontalExample"
                        className="table table-responsive-sm table-responsive-md table-responsive-sm-xl
                        table-responsive-lg"
                        target="#modal1"
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
