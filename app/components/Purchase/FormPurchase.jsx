import React, { Component } from "react";
import Input from "../AnotherComponents/InputText.jsx";
import Control from "../AnotherComponents/ControlForm.jsx";
import { CmbSerivices } from '../../services/CmbSerivices.js'

class FormPurchase extends Component {
  constructor(props) {
    super(props);
    this.state = {
      dataProvider: [],
      dataTypeDocument: [],
      dataTypePurchase: [],
      dataPaymentMethod: [],
      dataOriginPurchase: [],
      dataProduct: [],
    };
    this.handleImput = this.handleImput.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.handleSubmit2 = this.handleSubmit2.bind(this);
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

  handleSubmit2(e) {
    e.preventDefault();
    const data = new FormData(e.target);
    this.props.onAddTodo2(data);
  }

  handlecmb() {
    this.CmbService.getCmbProvider().then(res => {
      this.setState({ dataProvider: [...res] })
    })
    this.CmbService.getCmbTypeDocument().then(res => {
      this.setState({ dataTypeDocument: [...res] })
    })
    this.CmbService.getCmbTypePurchase().then(res => {
      this.setState({ dataTypePurchase: [...res] })
    })
    this.CmbService.getCmbPaymentMethod().then(res => {
      this.setState({ dataPaymentMethod: [...res] })
    })
    this.CmbService.getCmbOriginPurchase().then(res => {
      this.setState({ dataOriginPurchase: [...res] })
    })
    this.CmbService.getCmbProduct().then(res => {
      this.setState({ dataProduct: [...res] })
    })
  }

  render() {
    return (
      <div>
        <form onSubmit={this.handleSubmit}>
          <div className="card">
            <div className="card-body">
              <div className="row">
                <div className=" col-sm-12 col-md-12 col-lg-6">
                  <Input
                    for="NumDoc"
                    text="Numero documento:"
                    type="text"
                    validation=""
                    id="NumeroDoc"
                    name="numerodocumento"
                    onChange={this.handleImput}
                  />
                  <Control
                    for="Provider"
                    text="Proveedor:"
                    id="Provider"
                    name="id_proveedor"
                    content={
                      <React.Fragment>
                        {this.state.dataProvider.map(e => (<option key={e.id_proveedor} value={e.id_proveedor}>{e.nombre_prove}</option>))}
                      </React.Fragment>
                    }
                  />
                  <Input
                    for="Adress"
                    text="Direccion:"
                    type="text"
                    validation=""
                    id="Adress"
                    name="direccion"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="Celler"
                    text="Bodega:"
                    type="text"
                    validation=""
                    id="Celler"
                    name="bodega"
                    onChange={this.handleImput}
                  />
                  <Control
                    for="Typedoc"
                    text="Tipo documumento:"
                    id="Typedoc"
                    name="id_tipodoc"
                    content={
                      <React.Fragment>
                        {this.state.dataTypeDocument.map(e => (<option key={e.id_tipodoc} value={e.id_tipodoc}>{e.tipo_docmento}</option>))}
                      </React.Fragment>
                    }
                  />
                  <Input
                    for="SeriesCost"
                    text="Serie costo:"
                    type="text"
                    validation=""
                    id="SeriesCost"
                    name="serie_costo"
                    onChange={this.handleImput}
                  />
                  <Control
                    for="Typepurchase"
                    text="Tipo compra:"
                    id="Typepurchase"
                    name="id_tipocompra"
                    content={
                      <React.Fragment>
                        {this.state.dataTypePurchase.map(e => (<option onClick={this.props.clickoption} key={e.id_tipocompra} value={e.id_tipocompra}>{e.tipo_compra}</option>))}
                      </React.Fragment>
                    }
                  />
                </div>
                <div className=" col-sm-12 col-md-12 col-lg-6">
                  <Control
                    for="Forma"
                    text="Tipo Forma:"
                    id="TForma"
                    name="id_forma"
                    content={
                      <React.Fragment>
                        {this.state.dataPaymentMethod.map(e => (<option key={e.id_forma} value={e.id_forma}>{e.forma_pago}</option>))}
                      </React.Fragment>
                    }
                  />
                  <Control
                    for="Originp"
                    text="Origen compra:"
                    validation=""
                    id="Originp"
                    name="id_origencom"
                    content={
                      <React.Fragment>
                        {this.state.dataOriginPurchase.map(e => (<option key={e.id_origencom} value={e.id_origencom}>{e.origen_com}</option>))}
                      </React.Fragment>
                    }
                  />
                  <Input
                    for="NumR"
                    text="Numero de registro"
                    type="text"
                    validation=""
                    id="NumR"
                    name="num_registro"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="NumC"
                    text="Numero de compra"
                    type="text"
                    validation=""
                    id="NumC"
                    name="num_compra"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="DAI"
                    text="Dai"
                    type="text"
                    validation=""
                    id="DAI"
                    name="dai"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="DocE"
                    text="Documentos Excluidos"
                    type="text"
                    validation=""
                    id="DocE"
                    name="doc_excluidos"
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
        <form
          onSubmit={this.handleSubmit2}
          className=" col-sm-12 col-md-12 col-lg-12"
        >
          <div className="card">
            <div className="card-body">
              <div className="row">
                <div className=" col-sm-12 col-md-12 col-lg-12 mx-auto split d-flex justify-content-center">
                  <h6>Detalle compra</h6>
                </div>
                <div className=" col-sm-12 col-md-12 col-lg-6">
                  <Control
                    for="Product"
                    text="Codigo producto:"
                    validation=""
                    id="Product"
                    name="id_producto"
                    change={this.props.change}
                    content={
                      <React.Fragment>
                       {this.state.dataProduct.map(e => (<option key={e.id_producto} value={e.id_producto}>{e.nombre_produc}</option>))}
                      </React.Fragment>
                    }
                  />
                  <Input
                    for="Cantidad"
                    text="Cantidad:"
                    type="text"
                    validation=""
                    id="Cantidad"
                    name="cantidad"
                    onChange={this.props.changeCantida}
                  />
                  <Input
                    for="Description"
                    text="Descripcion:"
                    type="text"
                    validation=""
                    id="Description"
                    name="descripcion"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="PriceU"
                    text="Precio Unitario:"
                    type="text"
                    validation=""
                    id="PriceU"
                    name="precio_uni"
                    onChange={this.handleImput}
                    values={this.props.precio}
                  />
                </div>
                <div className=" col-sm-12 col-md-12 col-lg-6">
                  <Input
                    for="TEx"
                    text="Total exento:"
                    type="text"
                    validation=""
                    id="TEx"
                    name="total_exeno"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="TGD"
                    text="Total grabado:"
                    type="text"
                    id="TGD"
                    name="total_grabado"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="CD"
                    text="Codigo compra:"
                    type="text"
                    id="CD"
                    name="id_compra"
                    values={this.props.codigocompra}
                  />
                </div>
                <div className="mx-auto split">
                  <button type="button" onClick={this.props.click} className="btn btn-info mr-1">
                    Llenar campos
                  </button>
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

export default FormPurchase;
