import React, { Component } from "react";
import Input from "../AnotherComponents/InputText.jsx";
import Control from "../AnotherComponents/ControlForm.jsx";
import { CmbSerivices } from '../../services/CmbSerivices.js'

class FormClient extends Component {
  constructor(props) {
    super(props);
    this.state = {
      cliente: "",
      giro: "",
      dataPaymentMethod: [],
      dataMunicipaly: [],
      dataAccount: [],
      dataTypeClient: [],
    };
    this.handleImput = this.handleImput.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);

    this.handlecmb = this.handlecmb.bind(this);
    this.CmbService = new CmbSerivices();
  }


  componentDidMount() {
    this.handlecmb();
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

  handlecmb() {
    this.CmbService.getCmbPaymentMethod().then(res => {
      this.setState({ dataPaymentMethod: [...res] })
    })
    this.CmbService.getCmbMunicipaly().then(res => {
      this.setState({ dataMunicipaly: [...res] })
    })
    this.CmbService.getCmbAccount().then(res => {
      this.setState({ dataAccount: [...res] })
    })
    this.CmbService.getCmbTypeClient().then(res => {
      this.setState({ dataTypeClient: [...res] })
    })
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
                    id="Cliente"
                    name="cliente"
                    required={true}
                    onChange={this.props.changeclient}
                    values={this.props.client}
                  />
                  <Input
                    for="Giro"
                    text="Giro:"
                    type="text"
                    id="Giro"
                    name="giro"
                    onChange={this.props.changeturn}
                    values={this.props.turn}
                  />
                  <Input
                    for="NumNit"
                    text="Numero NIT:"
                    type="text"
                    id="NumNit"
                    name="numero_nit"
                    onChange={this.props.changenit}
                    values={this.props.nit}
                  />
                  <Input
                    for="NumRegistry"
                    text="Numero Registro:"
                    type="text"
                    id="NumRegistry"
                    name="numero_registro"
                    onChange={this.props.changenumregistry}
                    values={this.props.numregistry}
                  />
                  <Input
                    for="Address"
                    text="Direccion:"
                    type="text"
                    id="Address"
                    name="direccion"
                    onChange={this.props.changeaddress}
                    values={this.props.address}
                  />
                  <Control
                    for="Municipio"
                    id="Municipio"
                    text="Municipio"
                    name="id_numi"
                    content={
                      <React.Fragment>
                        {this.state.dataMunicipaly.map(e => (<option key={e.id_muni} value={e.id_muni}>{e.municipio}</option>))}
                      </React.Fragment>
                    }
                  />
                  <Control
                    for="Departament"
                    id="Departament"
                    text="Departamentos"
                    name="id_departamento"
                    content={
                      <React.Fragment>
                        {this.state.dataMunicipaly.map(e => (<option key={e.id_muni} value={e.id_muni}>{e.municipio}</option>))}
                      </React.Fragment>
                    }
                  />
                </div>
                <div className="col-sm-12 col-md-12 col-lg-6">
                  <Input
                    for="Phone"
                    text="Telefono:"
                    type="text"
                    id="Phone"
                    name="telefono"
                    onChange={this.props.changephone}
                    values={this.props.phone}
                  />
                  <Input
                    for="CreditDays"
                    text="Dias de credito:"
                    type="text"
                    id="CreditDays"
                    name="dias_credito"
                    onChange={this.props.changecreditdays}
                    values={this.props.creditdays}
                  />
                  <Control
                    for="ClientType"
                    text="Tipo de Cliente:"
                    id="ClientType"
                    name="id_tipocli"
                    content={
                      <React.Fragment>
                        {this.state.dataTypeClient.map(e => (<option key={e.id_tipocli} value={e.id_tipocli}>{e.tipo_cliete}</option>))}
                      </React.Fragment>
                    }
                  />

                  <Input
                    for="Email"
                    text="Correo:"
                    type="email"
                    id="Email"
                    name="correo"
                    onChange={this.props.changemail}
                    values={this.props.mail}
                  />
                  <Input
                    for="TotalBalance"
                    text="Saldo acumulado:"
                    type="text"
                    id="TotalBalance"
                    name="saldo_acumu"
                    onChange={this.props.changetotalbalance}
                    values={this.props.totalbalance}
                  />
                  <Input
                    for="CreditLimit"
                    text="Limite de credito:"
                    type="text"
                    id="CreditLimit"
                    name="limite_credito"
                    onChange={this.props.changecreditlimit}
                    values={this.props.creditlimit}
                  />
                </div>
                <div className="d-flex justify-content-center col-sm-12 col-md-12 col-lg-12">
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
