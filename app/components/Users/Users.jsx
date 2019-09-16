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

class Users extends Component {
  constructor(props) {
    super(props);
    this.token = localStorage.getItem('token');
    if (!this.token) {
      location.pathname = '/'
    }
    console.log(this.token);    
    this.state = {
      titles: ["Nombre", "Apellidos", "Genero", "Usuario", "Correo", "Rol"],
      keys: ["nombre", "apellido", "genero", "nombre_usu", "correo", "roles"],
      data: [],
      val: 1,
      show: ''
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
    if(this.token){
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
    return event => {
      this.id = row.id_usuario;
      console.log(row.id);
    };
  }
  delete(row) {
    return e => {
      this.idDelete = row.id_usuario;
      console.log(this.idDelete);
    };
  }

  handleAddTodo(form) {
    this.userService.saveUsers(form).then(res => {
      this.getdata(this.state.val);
      const {message} = res;
      if(message === "He insertado un registro"){
          this.setState({show:'show'})
      }
    });
  }

  handleUpdateTodo(form) {
    const a = Array.from(form.entries()).map(arr => {
      return {
        [arr[0]]: arr[1]
      };
    });

    this.userService.updateUsers(Object.assign({}, ...a), this.id).then(res => {
      this.getdata(this.state.val);
    });
  }

  handleSubmitiId(e) {
    e.preventDefault();
    console.log(this.idDelete);
    this.userService.deleteUsers(this.idDelete).then(res => {
      this.getdata(this.state.val);
    });
  }

  handlePagination() {
    this.NumberDetail.getNumberDetail().then(res => {
      this.totalItemsCount = res[0].num;
    });
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
                    message={ <ModalMessage title="Mensaje de usuario" body="Accion realizada con exito se a insertado un nuevo usuario" show={this.state.show}/>}
                  />
                  
                }
                title="Usuarios"
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
                      <Search textButton="Agregar usuario"
                       botontable={<a className="btn btn-outline-primary my-2 my-sm-2 my-2  ml-2 color-primary" href="http://localhost/ColorPrint/app/reportes/reporteUsuarios.php" target="_blanck">PDF</a>} 
                       modal="modal" target="#modal1" click={this.Add}/>
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
