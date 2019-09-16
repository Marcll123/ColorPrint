import React, { Component } from "react";
import Menu from "../Menu/Menu.jsx";
import NavContent from "../Nav/NavContent.jsx";
import "./TypeSales.css";
import Search from "../AnotherComponents/Search.jsx";
import Table from "../AnotherComponents/Table.jsx";
import FormTypeSale from "./FormTypeSales.jsx";
import Modal from "../AnotherComponents/Modal.jsx";
import CancelButton from "../AnotherComponents/buttons/CancelButton.jsx";
import AcceptButton from "../AnotherComponents/buttons/AcceptButton.jsx";
import Pagination from "react-js-pagination";
import { TypeSaleService } from "../../services/TypeSaleService.js";
import { Number } from "../../services/TypeSaleService.js";

class TypeSales  extends Component {
    //Constructor de el componente Type sales
    constructor(props) {
      super(props);
      this.token = localStorage.getItem('token');
      if (!this.token) {
        location.pathname = '/'
      }
  
      //Estate de el componente TypeSales que contiene titles de la tabla y sus keys para obtener 
      //los datos y mostrarlos en la vista
      this.state = {
        titles: [
            "Tipo Ventas"
        ],
        keys: [
            "tipo_venta"
        ],
        data: [],
        val: 1
      };
  
      this.TypeSaleService = new TypeSaleService();
      this.number = new Number();
  
      //Bindeo de los metodos utilizados en el componente
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
      //Aca se llama el metodo getData para mostrar los datos una ves el componente se a creado 
      this.getdata(this.state.val);
    }
  
    //Este es el metodo que se encarga de obtener la Data desde la base de datos por medio de sus servicio
    getdata(page) {
      this.TypeSaleService.getTypeSale(page).then(res => {
        this.setState(prev => {
          const { data } = prev;
          return { data: [...res] };
        });
      });
    }
  
    //Metodo init
    handleInit() {
      this.getdata(this.state.val);
    }
  
    //Ontienen el valor de la fila seleccionada de los campos de la tabla para realizar
    //La acciones de Eliminar y actualizar 
    update(row) {
      return e => {
        this.id = row.id_tipoven;
        console.log(this.id);
        
      };
    }
    delete(row) {
      return e => {
        this.idDelete = row.id_tipoven;
        console.log(this.idDelete)
      };
    }
  
    //Este metodo realiza  la accion de agregar datos a la base de datos usando su servicio
    handleAddTodo(form) {
      if(this.id===""){
        this.TypeSaleService.saveTypeSale(form).then(res =>{
            this.getdata(this.state.val);
         })
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
  
      this.TypeSaleService.updateTypeSale(Object.assign({}, ...a), this.id).then(res => {
        this.getdata(this.state.val);
      });
    }
  
    //Este es el metodo que se encarga de eliminar un dato de la base de datos usando su servicio
    handleSubmitiId(e) {
      e.preventDefault();
      this.TypeSaleService.deleteTypeSale(this.idDelete).then(res =>{
        this.getdata(this.state.val);
      })
    }
    //Este es un metodo que hace que this.id  = "" para que no haya problemas a la hora de crear 
    //o actualizar un dato de la tabla
    Add(e){
        this.id = ""
        console.log(this.id)
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
                      TIPO DE VENTA
                    </h5>
                  </div>
                </div>
                {/*Modal 1 es el encargado de tener el form de crear y actualizar los datos en la tabla */}
                <Modal
                  id="modal1"
                  size="modal-lg"
                  form={<FormTypeSale
                    onAddTodo={this.handleAddTodo}
                    onUpdateTodo={this.handleUpdateTodo}
                  />}
                  title="Tipo de venta"
                 />
                 {/*Modal que se muestra cuando se apreta el boton de elinar un campo de la base de datos*/}
                <Modal
                  id="modal2"
                  size="modal-sm"
                  center="modal-dialog-centered"
                  form={
                    <h1 className="text-danger text">
                      Desea eliminar este Tipo de venta
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
                          {/*componente de search y tabla que se muestran segun los datos que se necesiten
                          a ca se utiiza los state que estan en el contructor de titles, data, keys*/}
                        <Search textButton="Agregar Tipo de venta" modal="modal" target="#modal1" click={this.Add}/>
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
                          {/*Paginacin de la tabla que obtiene los datos a travez de metodos y propiedades*/}
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
  
  export default TypeSales;