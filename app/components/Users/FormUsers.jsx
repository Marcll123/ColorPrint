import React, { Component } from "react";
import Input from "../AnotherComponents/InputText.jsx";
import ControlForm from "../AnotherComponents/ControlForm.jsx";
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
    const { value, name } = e.target;
    this.setState({
      [name]: value
    })
  }

  handleSubmit(e) {
    e.preventDefault();
    const data = new FormData(e.target);
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
                    auto="off"
                  />
                  <Input
                    for="UserLastname"
                    text="Apellido:"
                    type="text"
                    id="UserLastname"
                    name="apellido"
                    onChange={this.handleImput}
                    auto="off"
                  />
                  <ControlForm
                    id="gender"
                    name="genero"
                    content={
                      <React.Fragment>
                        <option value="Masculino">Marculino</option>
                        <option value="Femenino">Femenino</option>
                      </React.Fragment>
                    }
                  />
                  <Input
                    for="Usuario"
                    text="Usuario:"
                    type="text"
                    id="Usuario"
                    name="nombre_usu"
                    onChange={this.handleImput}
                    auto="off"
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
                    auto="off"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                    title="El correo debe de seguir la siguiente estructura [text]@[dominio].[extension]"
                  />
                  <Input
                    for="pass"
                    text="Contraseña:"
                    type="password"
                    id="pass"
                    name="clave"
                    onChange={this.handleImput}
                    auto="off"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="La contraseña debe de tener 8 o mas caracteres y por lo menos una letra mayuscula y otra minuscula y caracter especial"
                  />
                  <Input
                    for="passconfim"
                    text="Confirmar contraseña:"
                    type="password"
                    id="passconfirm"
                    name="cofimarclave"
                    onChange={this.handleImput}
                    auto="off"
                  />
                  <ControlForm
                    id="rol"
                    name="id_rol"
                    content={
                      <React.Fragment>
                        <option value="1">Administrador</option>
                        <option value="2">Gerente</option>
                      </React.Fragment>
                    }
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
                <div>
                    {this.props.message}
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
