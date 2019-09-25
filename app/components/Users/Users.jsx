import React, { Component } from "react";
import Menu from "../Menu/Menu.jsx";
import NavContent from "../Nav/NavContent.jsx";
import "./Users.css";
import Search from "../AnotherComponents/Search.jsx";
import Table from "../AnotherComponents/Table.jsx";
import FormUsers from "./FormUsers.jsx";
import Modal from "../AnotherComponents/Modal.jsx";
import CancelButton from "../AnotherComponents/buttons/CancelButton.jsx";
import AcceptButton from "../AnotherComponents/buttons/AcceptButton.jsx";
import Pagination from "react-js-pagination";
import { UsersService } from "../../services/UsersService.js";
import { NumberDetail } from "../../services/UsersService.js";
import ModalMessage from "../AnotherComponents/ModalMessage.jsx";
import ModalMsm from "../AnotherComponents/ModalMsm.jsx";

class Users extends Component {
  constructor(props) {
    super(props);
    this.token = localStorage.getItem("token");
    if (!this.token) {
      location.pathname = "/";
    }
    this.state = {
      titles: ["Nombre", "Apellidos", "Genero", "Usuario", "Correo", "Rol"],
      keys: ["nombre", "apellido", "genero", "nombre_usu", "correo", "roles"],
      data: [],
      val: 1,
      showadd: "",
      showup: "",
      showde: "",
      visible: true,
      modal: "",
      inputnombre: "",
      inputapellido: "",
      inputgenero: "",
      inputusuario: "",
      inputcorreo: "",
      inputrol: "",
      search: "",
      visiblePass: true
    };
    this.userService = new UsersService();
    this.NumberDetail = new NumberDetail();

    this.handleAddTodo = this.handleAddTodo.bind(this);
    this.handleUpdateTodo = this.handleUpdateTodo.bind(this);
    this.handleSubmitiId = this.handleSubmitiId.bind(this);
    this.handlePagination = this.handlePagination.bind(this);
    this.handlePageChange = this.handlePageChange.bind(this);
    this.Add = this.Add.bind(this);
    this.id = "";
    this.idDelete = "";
    this.num = 1;
    this.totalItemsCount = 0;

    this.rol = localStorage.getItem("rol");

    this.handleChange = this.handleChange.bind(this);
    this.handleChange2 = this.handleChange2.bind(this);
  }

  //Es un metodo para lapaginacion
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

  //El primer renderizado
  componentDidMount() {
    this.getdata(this.state.val);
    if (this.rol === "1") {
      this.setState({ visible: true, modal: "#modal1" });
    } else if (this.rol === "2") {
      this.setState({ visible: false, modal: "" });
    }
  }

  //Obtiene los datos de
  //usuario accediento por una peticion
  //fetch
  getdata(page) {
    if (this.token) {
      this.userService.getUsers(page).then(res => {
        this.setState(prev => {
          const { data } = prev;
          return { data: [...res] };
        });
      });
    }
  }

  handleInit() {
    this.getdata(this.state.val);
  }

  update(row) {
    return e => {
      this.id = row.id_usuario;
      console.log(this.id);
      this.userService.getUsersdataid(this.id).then(res => {
        this.setState({
          inputnombre: res[0].nombre,
          inputapellido: res[0].apellido,
          inputgenero: res[0].genero,
          inputusuario: res[0].nombre_usu,
          inputcorreo: res[0].correo,
          inputrol: res[0].roles,
          showup: "",
          showadd: "",
          visiblePass: false
        });
      });
    };
  }

  delete(row) {
    return e => {
      this.idDelete = row.id_usuario;
      this.setState({showde: ""})
    };
  }

  handleAddTodo(form) {
    if (this.id === "") {
      this.userService.saveUsers(form).then(res => {
        this.getdata(this.state.val);
        const { message } = res;
        if (message === "He insertado un registro") {
          $('#modalAdd').modal('show')
          $('#modal1').modal('hide')
        }
      });
    }
  }

  handleUpdateTodo(form) {
    const a = Array.from(form.entries()).map(arr => {
      return {
        [arr[0]]: arr[1]
      };
    });

    if (this.id !== "") {
      this.userService
        .updateUsers(Object.assign({}, ...a), this.id)
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

  handleSubmitiId(e) {
    e.preventDefault();
    console.log(this.idDelete);
    this.userService.deleteUsers(this.idDelete).then(res => {
      this.getdata(this.state.val);
      const {message} = res;
      if(message === "He borrado un registro"){
        $('#modalDelete').modal('show')
        $('#modal2').modal('hide')
      }
    });
  }

  handlePagination() {
    this.NumberDetail.getNumberDetail().then(res => {
      this.totalItemsCount = res[0].num;
    });
  }
  Add(e) {
    this.id = "";
    console.log(this.id);
    this.setState({ showup: "", showadd: "", visiblePass: true });
  }

  handleChange(e) {
    e.preventDefault();
    this.setState({ inputnombre: e.target.value });
  }
  handleChange2(e) {
    e.preventDefault();
    this.setState({ inputapellido: e.target.value });
  }
  handleChange3(e) {
    e.preventDefault();
    this.setState({ inputusuario: e.target.value });
  }
  handleChange4(e) {
    e.preventDefault();
    this.setState({ inputcorreo: e.target.value });
  }

  Search(e) {
    this.setState({ search: e.target.value });
  }

  onSearch() {
    if (this.state.search === "") {
      this.getdata(this.state.val);
    } else {
      this.userService.getUserSearch(this.state.search.toLocaleLowerCase()).then(res => {
        this.setState(prev => {
          const { data } = prev;
          return { data: [...res] };
        });
      });
    }
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
                    USUARIOS
                  </h5>
                </div>
              </div>
              {/*Modal de acciones*/}
              <Modal
                id="modal1"
                size="modal-lg"
                form={
                  <FormUsers
                    onAddTodo={this.handleAddTodo}
                    onUpdateTodo={this.handleUpdateTodo}
                    default={this.state.inputnombre}
                    valuelastname={this.state.inputapellido}
                    valueuser={this.state.inputusuario}
                    valuemail={this.state.inputcorreo}
                    changename={this.handleChange}
                    changelastname={this.handleChange2}
                    changeuser={this.handleChange3.bind(this)}
                    changemail={this.handleChange4.bind(this)}
                    visible={this.state.visiblePass}
                  />
                }
                title="Usuarios"
              />
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

              <ModalMsm
                  id="modalDelete"
                  color="text-danger"
                  title="Mensaje de Exito"
                  colorButton="bg-danger"
                  message="UsuarioEliminado Exitosamente"
                />
                 <ModalMsm
                  id="modalAdd"
                  color="text-success"
                  title="Mensaje de Exito"
                  colorButton="bg-success"
                  message="Usuario creado Exitosamente"
                />
                 <ModalMsm
                  id="modalUpdate"
                  color="text-info"
                  title="Mensaje de Exito"
                  colorButton="bg-info"
                  message="Usuario actualizado Exitosamente"
                />


              <div className="row split">
                <div className="col-12">
                  <div className="card">
                    <div className="card-body">
                      <Search
                        textButton="Agregar usuario"
                        botontable={
                          <a
                            className="btn btn-outline-primary my-2 my-sm-2 my-2  ml-2 color-primary"
                            href="http://localhost/ColorPrint/app/reportes/reporteUsuarios.php"
                            target="_blanck"
                          >
                            PDF
                          </a>
                        }
                        modal="modal"
                        target={this.state.modal}
                        click={this.Add}
                        changeSearch={this.Search.bind(this)}
                        searchClick={this.onSearch.bind(this)}
                      />
                      <Table
                        className="table table-responsive-sm table-responsive-md table-responsive-sm-xl
                        table-responsive-lg"
                        titles={state.titles}
                        data={state.data}
                        keys={state.keys}
                        actions={{
                          update: this.update.bind(this),
                          delete: this.delete.bind(this)
                        }}
                        target={this.state.modal}
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

export default Users;
