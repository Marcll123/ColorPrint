import React, { Component } from "react";
import Input from "../AnotherComponents/InputText.jsx";
import Control from "../AnotherComponents/ControlForm.jsx";
class FormClient extends Component {
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
                <div className=" col-sm-12 col-md-12 col-lg-6 ">
                  <Input
                    for="Cliente"
                    text="Cliente:"
                    type="text"
                    validation="[A-Za-z]"
                    id="Cliente"
                    name="cliente"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="Giro"
                    text="Giro:"
                    type="text"
                    validation="[A-Za-z]"
                    id="Giro"
                    name="giro"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="NumNit"
                    text="Numero NIT:"
                    type="text"
                    validation="[0-9-]+"
                    id="NumNit"
                    name="numero_nit"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="NumRegistry"
                    text="Numero Registro:"
                    type="text"
                    validation="[0-9-]+"
                    id="NumRegistry"
                    name="numero_registro"
                    onChange={this.handleImput}
                  />
                  <Control
                    for="Municipio"
                    id="Municipio"
                    text="Municipio"
                    name="id_numi"
                    content={
                      <React.Fragment>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                      </React.Fragment>
                    }
                  />
                  <Input
                    for="Phone"
                    text="Telefono:"
                    type="text"
                    validation="[0-9-]+"
                    id="Phone"
                    name="telefono"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="Fax"
                    validation="[0-9-.]+"
                    text="Numero FAX:"
                    type="text"
                    id="Fax"
                    name="numero_fax"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="Email"
                    text="Correo:"
                    type="email"
                    id="Email"
                    name="correo"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="TotalBalance"
                    text="Saldo acumulado:"
                    validation="[0-9-.]+"
                    type="text"
                    id="TotalBalance"
                    name="saldo_acumu"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="CreditLimit"
                    text="Limite de credito:"
                    validation="[0-9-.]+"
                    type="text"
                    id="CreditLimit"
                    name="limite_credito"
                    onChange={this.handleImput}
                  />
                </div>
                <div className=" col-sm-12 col-md-12 col-lg-6 ">
                  <Control
                    for="Forma"
                    text="Forma de pago:"
                    id="Forma"
                    name="id_forma"
                    content={
                      <React.Fragment>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </React.Fragment>
                    }
                  />
                  <Input
                    for="CreditDays"
                    text="Dias de credito:"
                    type="text"
                    id="CreditDays"
                    name="dias_credito"
                    validation="[0-9]+"
                    onChange={this.handleImput}
                  />
                  <Control
                    for="Account"
                    text="Cuenta:"
                    id="Account"
                    name="id_cuenta"
                    content={
                      <React.Fragment>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                      </React.Fragment>
                    }
                  />
                   <Input
                    for="Rent"
                    text="Aplica Renta (si/no):"
                    type="text"
                    id="Rent"
                    name="aplica_rent"
                    validation="si|no"
                    onChange={this.handleImput}
                  />
                   <Control
                    for="SellerCode"
                    text="Codigo de vendedor:"
                    id="SellerCode"
                    validation="[0-9-.]+"
                    name="codigo_vendedor"
                    content={
                      <React.Fragment>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </React.Fragment>
                    }
                  />
                    <Input
                    for="LastPaymentDate"
                    text="Ultima fecha de pago:"
                    type="text"
                    id="LastPaymentDate"
                    name="ultifechapago"
                    onChange={this.handleImput}
                  />
                     <Input
                    for="CreatedBy"
                    text="Creado por:"
                    type="text"
                    id="CreatedBy"
                    name="creadopor"
                    onChange={this.handleImput}
                  />
                    <Input
                    for="CreatedDate"
                    text="Fecha de creacion:"
                    type="text"
                    id="CreatedDate"
                    name="fechacreacion"
                    onChange={this.handleImput}
                  />
                    <Control
                    for="ClientType"
                    text="Tipo de Cliente:"
                    id="ClientType"
                    name="id_tipocli"
                    content={
                      <React.Fragment>
                        <option>1</option>
                        <option>2</option>
                      </React.Fragment>
                    }
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

export default FormClient;
