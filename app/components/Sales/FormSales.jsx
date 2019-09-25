import React, { Component } from "react";
import Input from "../AnotherComponents/InputText.jsx";
import Control from "../AnotherComponents/ControlForm.jsx";

class FormSales extends Component {
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
    const a = Array.from(data.entries()).map(arr => {
      return {
        [arr[0]]: arr[1]
      };
    });
    console.log(a);
    
  }

  handleSubmit2(e) {
    e.preventDefault();
    const data = new FormData(e.target);
    this.props.onAddTodo2(data);
    const a = Array.from(data.entries()).map(arr => {
      return {
        [arr[0]]: arr[1]
      };
    });
    console.log(a);
  }

  render() {
    return (
      <div>
        <form onSubmit={this.handleSubmit}>
          <div className="card">
            <div className="card-body">
              <div className="row">
                <div className="col-sm-12 col-md-12 col-lg-6">
                  <Control
                    for="IdSucur"
                    text="Codigo Sucursal:"
                    validation=""
                    id="IdSucur"
                    name="id_sucursal"
                    content={
                      <React.Fragment>
                        <option>1</option>
                      </React.Fragment>
                    }
                  />
                  <Control
                    for="IdTypeC"
                    text="Tipo compra:"
                    validation=""
                    id="IdTypeC"
                    name="id_tipocom"
                    content={
                      <React.Fragment>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </React.Fragment>
                    }
                  />
                  <Control
                    for="IdTypeCli"
                    text="Tipo cliente:"
                    validation=""
                    id="IdTypeCli"
                    name="id_cliente"
                    content={
                      <React.Fragment>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                      </React.Fragment>
                    }
                  />
                  <Input
                    for="Direction"
                    text="Direccion:"
                    type="text"
                    validation=""
                    id="direccion"
                    name="direccion"
                    onChange={this.handleImput}
                  />
                  <Control
                    for="Forma"
                    text="Codigo forma :"
                    id="Forma"
                    name="id_forma"
                    content={
                      <React.Fragment>
                        <option>1</option>
                      </React.Fragment>
                    }
                  />
                  <Input
                    for="DayCredit"
                    text="Dias credito:"
                    type="text"
                    validation=""
                    id="DayCredit"
                    name="dias_credito"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="SalesPoint"
                    text="Punto de venta:"
                    type="text"
                    validation=""
                    id="SalesPoint"
                    name="punto_venta"
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
                  <Input
                    for="Contact"
                    text="Contacto:"
                    type="text"
                    validation=""
                    id="Contact"
                    name="contacto"
                    onChange={this.handleImput}
                  />
                  <Control
                    for="TVent"
                    text="Tipo venta:"
                    validation=""
                    id="TVent"
                    name="id_tipoven"
                    content={
                      <React.Fragment>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </React.Fragment>
                    }
                  />
                  <Control
                    for="TFact"
                    text="Tipo factura:"
                    validation=""
                    id="TFact"
                    name="id_tipofac"
                    content={
                      <React.Fragment>
                        <option>8</option>
                        <option>9</option>
                      </React.Fragment>
                    }
                  />
                  <Control
                    for="TUser"
                    text="Tipo usuario:"
                    validation=""
                    id="TUser"
                    name="id_usuario"
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
                      </React.Fragment>
                    }
                  />
                  <Input
                    for="NRemi"
                    text="Nota remision"
                    type="text"
                    validation=""
                    id="NRemi"
                    name="nota_remision"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="NPedi"
                    text="Numero pedido"
                    type="text"
                    validation=""
                    id="NPedi"
                    name="num_pedido"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="BDega"
                    text="Bodega:"
                    type="text"
                    validation=""
                    id="BDega"
                    name="bodega"
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
                  <h6>Detalle venta</h6>
                </div>
                <div className=" col-sm-12 col-md-12 col-lg-6">
                  <Input
                    for="CProduct"
                    text="Card producto:"
                    type="text"
                    validation=""
                    id="CProduct"
                    name="card_producto"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="Umd"
                    text="UMD:"
                    type="text"
                    validation=""
                    id="Umd"
                    name="umd"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="Cant"
                    text="Cantidad:"
                    type="text"
                    validation=""
                    id="Cant"
                    name="cantidad"
                    onChange={this.handleImput}
                  />
                    <Input
                    for="dest"
                    text="Descuento:"
                    type="text"
                    validation=""
                    id="dest"
                    name="descuento"
                    onChange={this.handleImput}
                  />
                       <Input
                    for="Vnosuje"
                    text="Venta no sujeta:"
                    type="text"
                    validation=""
                    id="Vnosuje"
                    name="v_nosujeta"
                    onChange={this.handleImput}
                  />
                 <Input
                    for="Vefecta"
                    text="Venta efecta:"
                    type="text"
                    validation=""
                    id="Vefecta"
                    name="v_efecta"
                    onChange={this.handleImput}
                  />
                     <Input
                    for="Tp"
                    text="TP:"
                    type="text"
                    validation=""
                    id="Tp"
                    name="t_p"
                    onChange={this.handleImput}
                  />
                </div>
                <div className=" col-sm-12 col-md-12 col-lg-6">
                  <Input
                    for="Descri"
                    text="Descripcion:"
                    type="text"
                    validation=""
                    id="Descri"
                    name="descripcion"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="TGDo"
                    text="Total gravado:"
                    type="text"
                    validation=""
                    id="TGDo"
                    name="total_gravado"
                    onChange={this.handleImput}
                  />
                  <Input
                    for="PRICE"
                    text="Precion:"
                    type="text"
                    validation=""
                    id="PRICE"
                    name="precio"
                    onChange={this.handleImput}
                  />
                     <Input
                    for="Vconver"
                    text="V de convercion:"
                    type="text"
                    validation=""
                    id="Vconver"
                    name="v_conversion"
                    onChange={this.handleImput}
                  />
                       <Input
                    for="Uconver"
                    text="U de convercion:"
                    type="text"
                    validation=""
                    id="Uconver"
                    name="u_conversion"
                    onChange={this.handleImput}
                  />
                      <Input
                    for="Tot"
                    text="Total:"
                    type="text"
                    validation=""
                    id="Tot"
                    name="total"
                    onChange={this.handleImput}
                  />
                  <Control
                    for="IdVente"
                    text="Codigo venta:"
                    validation=""
                    id="IdVente"
                    name="id_venta"
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

export default FormSales;
