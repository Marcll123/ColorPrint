import React, { Component } from "react";
import Input from "../AnotherComponents/InputText.jsx";
class FormUsers extends Component {
    constructor(props) {
        super(props);
        this.state = {
          nombre: "",
          apellido: "",
          telefono: "",
          correo: "",
          clave: "",
          id_rol: ""
        };
    
        this.handleImput = this.handleImput.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
      }
    
      handleImput(e) {
        const {value, name} = e.target;
        this.setState({
            [name] : value
        })
      }
    
      handleSubmit(e){
        e.preventDefault();
        const data  = new FormData(e.target);
        this.props.onAddTodo(data);
        this.props.onUpdateTodo(data);
      }
    
  render() {
    return (
      <div>
        <form onSubmit={this.handleSubmit}>
          <div className="card">
            <div className="card-body">
              <div className="row">
                <div className=" col-sm-12 col-md-12 col-lg-6 ">
                  <Input
                    for="UserName"
                    text="Nombre:"
                    type="text"
                    id="UserName"
                    name="nombre"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="UserLastname"
                    text="Apellido:"
                    type="text"
                    id="UserLastname"
                    name="apellido"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="Genero"
                    text="Genero:"
                    type="text"
                    id="Genero"
                    name="genero"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="Usuario"
                    text="Usuario:"
                    type="text"
                    id="Usuario"
                    name="nombre_usu"
                    onChange={this.handleImput}
                  />
                </div>
                <div className=" col-sm-12 col-md-12 col-lg-6 ">
                  <Input
                    for="mail"
                    text="Correo electronico:"
                    type="email"
                    id="mail"
                    name="correo"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="pass"
                    text="Contraseña:"
                    type="password"
                    id="pass"
                    name="clave"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="rol"
                    text="Rol:"
                    type="text"
                    id="rol"
                    name="id_rol"
                    onChange={this.handleImput}
                  />
                </div>
                <div className="mx-auto split">
                  <button type="submit" className="btn btn-info mr-1">
                    Realizar
                  </button>
                  <button type="button" className="btn btn-danger" data-dismiss="modal">
                    Cancelar
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    );
  }
}

export default FormUsers;
