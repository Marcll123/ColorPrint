import React, { Component } from "react";
import Menu from "../Menu/Menu.jsx";
import NavContent from "../Nav/NavContent.jsx";
import Search from "../AnotherComponents/Search.jsx";
import Table from "../AnotherComponents/Table.jsx";
import Modal from "../AnotherComponents/Modal.jsx";
import CancelButton from "../AnotherComponents/buttons/CancelButton.jsx";
import AcceptButton from "../AnotherComponents/buttons/AcceptButton.jsx";
import Pagination from "react-js-pagination";
import { ProductService, Number } from "../../services/ProductService.js";
import FormProducts from "./FormProducts.jsx";
import ModalMsm from "../AnotherComponents/ModalMsm.jsx";

class Products extends Component {
  constructor(props) {
    super(props);
    this.token = localStorage.getItem("token");
    if (!this.token) {
      location.pathname = "/";
    }
    this.state = {
      titles: ["Productos", "Precio unitario", "Descripcion", "Proveedor"],
      keys: ["nombre_produc", "precio_uni", "descripcion", "nombre_prove"],
      data: [],
      val: 1,
      nombre_produc: "",
      precio_uni: "",
      descripcion: "",
      nombre_prove: ""
    };

    this.ProductService = new ProductService();
    this.number = new Number();

    this.handleAddTodo = this.handleAddTodo.bind(this);
    this.handleUpdateTodo = this.handleUpdateTodo.bind(this);
    this.handlePagination = this.handlePagination.bind(this);
    this.handlePageChange = this.handlePageChange.bind(this);
    this.handleSubmitiId = this.handleSubmitiId.bind(this);
    this.handleImput = this.handleImput.bind(this);

    this.id = "";
    this.idDelete = "";
    this.num = 1;
    this.totalItemsCount = 0;
  }

  componentDidMount() {
    this.getdata(this.state.val);
  }

  //Paginacion

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

  //Este es el metodo que se encarga de obtener la Data desde la base de datos por medio de sus servicio
  getdata(page) {
    this.ProductService.getProduct(this.state.val).then(res => {
      this.setState(prev => {
        const { data } = prev;
        return { data: [...res] };
      });
    });
  }

  update(row) {
    return e => {
      this.id = row.id_producto;
      console.log(this.id);
      this.ProductService.getOneProduct(this.id).then(res => {
        this.setState({
          nombre_produc: res[0].nombre_produc,
          precio_uni: res[0].precio_uni,
          descripcion: res[0].descripcion,
          nombre_prove: res[0].nombre_prove
        });
      });
      console.log(this.id);
    };
  }

  delete(row) {
    return e => {
      this.idDelete = row.id_producto;
      console.log(this.idDelete);
      
    };
  }

  handleAddTodo(form) {
    if (this.id === "") {
      this.ProductService.saveProduct(form).then(res => {
        this.getdata(this.state.val);
        const { message } = res;
        if (message === "He insertado un registro") {
          $("#modalAdd").modal("show");
          $("#modal1").modal("hide");
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
      this.ProductService.updateProduct(Object.assign({}, ...a), this.id).then(
        res => {
          this.getdata(this.state.val);
          const { message } = res;
          if (message === "He actualizado un registro") {
            $("#modalUpdate").modal("show");
            $("#modal1").modal("hide");
          }
        }
      );
    }
  }

   //Este es el metodo que se encarga de eliminar un dato de la base de datos usando su servicio
   handleSubmitiId(e) {
    e.preventDefault();
    this.ProductService.deleteProduct(this.idDelete).then(res => {
      this.getdata(this.state.val);
      const { message } = res;
      if (message === "He borrado un registro") {
        $('#modalDelete').modal('show')
        $('#modal2').modal('hide')
      }
    });
  }

  handleImput(e) {
    const { value, name } = e.target;
    this.setState({
      [name]: value
    });
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

              <Modal
                id="modal1"
                size="modal-lg"
                form={
                  <FormProducts
                    onAddTodo={this.handleAddTodo}
                    onUpdateTodo={this.handleUpdateTodo}
                    changeName={this.handleImput}
                    changePrice={this.handleImput}
                    changeDescription={this.handleImput}
                    name={this.state.nombre_produc}
                    price={this.state.precio_uni}
                    description={this.state.descripcion}
                  />
                }
                title="Productos"
              />

              <Modal
                id="modal2"
                size="modal-sm"
                center="modal-dialog-centered"
                form={
                  <React.Fragment>
                    <h1 className="text-danger text">
                      Desea eliminar este producto
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
                  message="Producto eliminado exitosamente"
                />

              <ModalMsm
                id="modalAdd"
                color="text-success"
                title="Mensaje de Exito"
                colorButton="bg-success"
                message="Producto creado Exitosamente"
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
                      <Search
                        textButton="Agregar producto"
                        modal="modal"
                        target="#modal1"
                        botontable={
                          <a
                            className="btn btn-outline-primary my-2 my-sm-2 my-2  ml-2 color-primary"
                            href="http://localhost/ColorPrint/app/reportes/reporteProductos.php"
                            target="_blanck"
                          >
                            PDF
                          </a>
                        }
                        click={this.Add}
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

export default Products;
