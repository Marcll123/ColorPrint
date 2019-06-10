import React, { Component } from "react";
import Input from "../AnotherComponents/InputText.jsx";
import Control from "../AnotherComponents/ControlForm.jsx";

class FormPurchase extends Component {
  constructor(props) {
    super(props);
    this.state = {};
    this.handleImput = this.handleImput.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
    this.handleSubmit2 = this.handleSubmit2.bind(this);
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
                        <option>1</option>
                        <option>2</option>
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
                        <option>1</option>
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
                        <option>1</option>
                      </React.Fragment>
                    }
                  />
                </div>
                <div className=" col-sm-12 col-md-12 col-lg-6">
                  <Control
                    for="Forma"
                    text="Tipo Forma:"
                    validation=""
                    id="TForma"
                    name="id_forma"
                    content={
                      <React.Fragment>
                        <option>1</option>
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
                        <option>1</option>
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
                    content={
                      <React.Fragment>
                        <option>1</option>
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
                    onChange={this.handleImput}
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
                    validation=""
                    id="TGD"
                    name="total_grabado"
                    onChange={this.handleImput}
                  />
                    <Control
                    for="CD"
                    text="Codigo compra:"
                    validation=""
                    id="CD"
                    name="id_compra"
                    content={
                      <React.Fragment>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
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

export default FormPurchase;
