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
import {NumberDetail} from "../../services/UsersService.js";


class Users extends Component {
  constructor(props) {
    super(props);
    this.state = {
      titles: ["Nombre", "Apellidos", "Telefono", "Correo", "Clave", "Rol"],
      keys: ["nombre", "apellido", "telefono", "correo", "clave", "id_rol"],
      data: [],
      val:1
    };
    this.userService = new UsersService();
    this.NumberDetail = new NumberDetail();
    this.handleAddTodo = this.handleAddTodo.bind(this);
    this.handleUpdateTodo = this.handleUpdateTodo.bind(this);
    this.handleSubmitiId = this.handleSubmitiId.bind(this);
    this.handlePagination = this.handlePagination.bind(this);
    this.handlePageChange = this.handlePageChange.bind(this);
    this.id = "";
    this.idDelete = "";
    this.num = 1;
    this.val = 1;
    this.totalItemsCount = 0;
  }

  handlePageChange(pageNumber) {
    console.log(pageNumber)
    this.setState({
      val:pageNumber
    })
    console.log(this.state.val)
  }

  componentDidMount() {
    this.userService.getUsers(this.state.val).then(res => {
      this.setState(prev => {
        console.log(this.val)
        const { data } = prev;
        return { data: [...res] };   
      });
    });
  }
  componentDidUpdate(){
    this.userService.getUsers(this.state.val).then(res => {
      this.setState(prev => {
        console.log(this.val)
        const { data } = prev;
        return { data: [...res] };   
      });
    });
  }

  handleInit(){
    this.userService.getUsers(this.state.val).then(res => {
      this.setState(prev => {
        console.log(this.val)
        const { data } = prev;
        return { data: [...res] };   
      });
    });
  }

  update(row) {
    return event => {
      this.id = row.id_usuario;
    };
  }
  delete(row) {
    return e => {
      this.idDelete = row.id_usuario;
    };
  }

  handleAddTodo(form) {
    this.userService.saveUsers(form).then(res => {
      this.userService.getUsers(this.state.val).then(res => {
        this.setState(prev => {
          const { data } = prev;
          return { data: [...res] };
        });
      });
    });
  }



  handleUpdateTodo(form) {
    const a = Array.from(form.entries()).map(arr => {
      return {
        [arr[0]]: arr[1]
      };
    });
    console.log(Object.assign({}, ...a), this.id);

    this.userService.updateUsers(Object.assign({}, ...a), this.id).then(res => {
      this.userService.getUsers(this.state.val).then(res => {
        this.setState(prev => {
          const { data } = prev;
          return { data: [...res] };
        });
      });
    });
  }

  handleSubmitiId(e) {
    e.preventDefault();
    console.log(this.idDelete)
    this.userService.deleteUsers(this.idDelete).then(res => {
      this.userService.getUsers(this.state.val).then(res => {
        this.setState(prev => {
          const { data } = prev;
          return { data: [...res] };
        });
      });
    })
  }

  handlePagination(){
    this.NumberDetail.getNumberDetail().then(res =>{
      this.totalItemsCount = res[0].num;
    })
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
                <div className="card-body">
                  <h5 className="text-primary text-center">USUARIOS</h5>
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
                  <form onSubmit={this.handleSubmitiId} className="mx-auto split">
                    <CancelButton text="Cancelar" />
                    <AcceptButton text="Aceptar" />
                  </form>
                }
              />

              <div className="row split">
                <div className="col-12">
                  <div className="card">
                    <div className="card-body">
                      <Search textButton="Agregar usuario" />
                      <Table
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
                        itemClass='page-item'
                        linkClass='page-link'
                      /></div>
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
