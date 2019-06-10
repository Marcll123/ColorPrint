import React, { Component } from "react";
import Input from "../AnotherComponents/InputText.jsx";
import Control from "../AnotherComponents/ControlForm.jsx";
class FormTypeBuy extends Component {
  constructor(props) {
    super(props);
    this.state = {
      cliente: "",
      giro: ""
    };
    this.handleImput = this.handleImput.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
  }

  handleImput(e) {
    const { value, name } = e.target;
    this.setState({
      [name]: value
    });
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
                <div className=" col-sm-12 col-md-12 col-lg-12 ">
                  <Input
                    for="Tipo_compra"
                    text="Tipo compra:"
                    type="text"
                    validation=""
                    id="Tipo_compra"
                    name="tipo_compra"
                    onChange={this.handleImput}
                  />          
                </div>
                <div className="mx-auto split">
                  <button type="submit" className="btn btn-info mr-1">
                    Realizar
                  </button>
                  <button
                    type="button"
                    className="btn btn-danger"
                    data-dismiss="modal"
                  >
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

export default FormTypeBuy;
