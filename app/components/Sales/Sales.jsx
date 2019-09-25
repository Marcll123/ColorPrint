import React, { Component } from "react";
import Menu from "../Menu/Menu.jsx";
import NavContent from "../Nav/NavContent.jsx";
import "./Sales.css";
import Navs from "../AnotherComponents/Navs.jsx";
import Input from "../AnotherComponents/InputText.jsx";
import ControlForm from "../AnotherComponents/ControlForm.jsx";
import Table from "../AnotherComponents/Table.jsx";
import { SaleService } from "../../services/SaleService.js";
import Modal from "../AnotherComponents/Modal.jsx";
import { CmbSerivices } from "../../services/CmbSerivices.js";
import { SalesDetailService } from "../../services/SalesDetailService.js";
import ModalMsm from "../AnotherComponents/ModalMsm.jsx";

class Sales extends Component {
  //Constructor de el componente
  constructor(props) {
    super(props);
    this.token = localStorage.getItem("token");
    if (!this.token) {
      location.pathname = "/";
    }
    this.state = {
      titles: [
        "Producto",
        "Cantidad",
        "Descripcion",
        "Precio Unitario",
        "Venta no sujeta",
        "Venta exenta",
        "Venta gravada"
      ],
      keys: [
        "nombre",
        "catidad",
        "descripcion",
        "precio",
        "v_nosujeta",
        "v_extenta",
        "v_gravada"
      ],
      data: [
        {
          nombre: "producto",
          catidad: 10,
          descripcion: "Grande",
          precio: 12,
          v_nosujeta: 0,
          v_extenta: 0,
          v_gravada: 120
        }
      ],
      titlesClient: [
        "Nombre",
        "Numero de registro",
        "Dirreccion",
        "Municipio",
        "Departamento"
      ],
      keysClient: [
        "cliente",
        "numero_registro",
        "direccion",
        "municipio",
        "departamento"
      ],

      titlesProduct: ["Nombre", "Precio", "Descripcion"],
      keysProduct: ["nombre_produc", "precio_uni", "descripcion"],
      dataProduct: [],
      dataClient: [],
      dataDeail: [],
      valClient: 43,
      nameClient: "",
      numRegistry: "",
      municipaly: "",
      departament: "",
      address: "",
      dataPaymentMethod: [],
      dataVoucher: [],
      dataTypeSales: [],
      nombre: "",
      catidad: "",
      descripcion: "",
      precio: "",
      v_nosujeta: "",
      v_extenta: "",
      v_gravada: "",
      val: 1,

      titleSalesDetai: [
        "Pruducto",
        "Cantidad",
        "Descripcion",
        "Precio unitario",
        "Subtotal",
        "Venta no sujeta",
        "Venta exenta",
        "Venta gravada"
      ],
      keysSalesDetail: [
        "nombre_produc",
        "cantidad",
        "descripcion",
        "precio",
        "subtotal",
        "v_nosujeta",
        "v_exenta",
        "v_gravado"
      ],
      dataSalesDetail: [],
      lastid: "",
      secondPart: true,
      lastPart: true,
      subtotal: "",
      descuento: 0,
      iva: "",
      cesc: 0,
      retencion: 0,
      total: "",
      total2: "",

      titlesAllSales: [
        "Cliente",
        "Municipio",
        "Departamento",
        "Direccion",
        "Registro",
        "Total"
      ],
      keysAllSales: [
        "cliente",
        "municipio",
        "departamento",
        "direccion",
        "numero_registro",
        "total"
      ],
      dataAllSales: [],
      val2: 1
    };

    this.SaleService = new SaleService();
    this.SalesDetailService = new SalesDetailService();

    this.handleDataClient = this.handleDataClient.bind(this);
    this.handlecmb = this.handlecmb.bind(this);
    this.CmbService = new CmbSerivices();
    this.handleSubmitSales = this.handleSubmitSales.bind(this);
    this.handleSubmitSalesD = this.handleSubmitSalesD.bind(this);
    this.handleSubmitbill = this.handleSubmitbill.bind(this);
    this.handlegetSales = this.handlegetSales.bind(this)

    this.calculodescuento = "";
    this.totaldescuento = "";
    this.iva = "";
    this.descuento = "";

    //Var
    this.idClient = "";
    (this.idProduct = ""),
      (this.data = [
        {
          nombre: "producto",
          catidad: 10,
          descripcion: "Grande",
          precio: 12,
          v_nosujeta: 0,
          v_extenta: 0,
          v_gravada: 120
        }
      ]);
  }

  componentDidMount() {
    this.handleDataClient();
    this.handlecmb();

    this.handlegetSales()
  }

  handlegetSales(){
    this.SaleService.getAllSales(this.state.val2).then(res => {
      this.setState({dataAllSales: [...res]})
      console.log(res);
    })
  }

  handleDataClient() {
    this.SaleService.getAllClient().then(res => {
      this.setState({ dataClient: [...res] });
      console.log(res);
    });
    this.SaleService.getAllProducts().then(res => {
      this.setState({ dataProduct: [...res] });
      console.log(res);
    });
  }

  handlecmb() {
    this.CmbService.getCmbPaymentMethod().then(res => {
      this.setState({ dataPaymentMethod: [...res] });
    });
    this.CmbService.getCmbVoucher().then(res => {
      this.setState({ dataVoucher: [...res] });
    });
    this.CmbService.getCmbTypeSales().then(res => {
      this.setState({ dataTypeSales: [...res] });
    });
  }

  //Acciones
  select(row) {
    return e => {
      this.idClient = row.id_cliente;
      this.SaleService.getOneClient(this.idClient).then(res => {
        this.setState({
          nameClient: res[0].cliente,
          numRegistry: res[0].numero_registro,
          municipaly: res[0].municipio,
          departament: res[0].departamento,
          address: res[0].direccion
        });
        $("#modal1").modal("hide");
      });
    };
  }

  select2(row) {
    return e => {
      this.idProduct = row.id_producto;
      this.SaleService.getOneProduct(this.idProduct).then(res => {
        this.setState({
          nombre: res[0].id_producto,
          catidad: 1,
          descripcion: res[0].descripcion,
          precio: res[0].precio_uni,
          v_nosujeta: 0,
          v_extenta: 0,
          v_gravada: 0
        });
        $("#modal2").modal("hide");
      });

      this.SaleService.getLastId().then(res => {
        this.setState({ lastid: res[0].id_venta });
      });
    };
  }

  handleSubmitSales(e) {
    e.preventDefault();
    const data = new FormData(e.target);

    const a = Array.from(data.entries()).map(arr => {
      return {
        [arr[0]]: arr[1]
      };
    });
    console.log(a);

    this.SaleService.saveSales(data).then(res => {
      const { message } = res;
      if (message === "He insertado un registro") {
        console.log("Venta agregada");
        this.setState({ secondPart: false });
      }
    });
  }

  handleSubmitSalesD(e) {
    e.preventDefault();
    const data = new FormData(e.target);

    const a = Array.from(data.entries()).map(arr => {
      return {
        [arr[0]]: arr[1]
      };
    });
    console.log(a);

    this.SaleService.saveSalesDetail(data).then(res => {
      const { message } = res;
      if (message === "He insertado un registro") {
        console.log("Detalle Venta Agregada");
      }
    });

    this.SalesDetailService.getSalesDetail(this.state.lastid).then(res => {
      this.setState({ dataSalesDetail: [...res] });
    });

    this.SaleService.getSubtotal(this.state.lastid).then(res => {
      this.setState({ subtotal: res[0].sub });
      this.setState({
        descuento:parseFloat(this.state.descuento) * parseFloat(this.state.subtotal)
      });
      this.setState({
        iva: parseFloat(this.state.subtotal) * 0.13
      });
      this.setState({
        total:parseFloat(this.state.subtotal) + parseFloat(this.state.iva) - parseFloat(this.state.descuento)
      });
      this.setState({
        total2:parseFloat(this.state.subtotal) + parseFloat(this.state.iva) - parseFloat(this.state.descuento)
      });
    });
  }

  handleSubmitbill(e) {
    e.preventDefault();
    const data = new FormData(e.target);
    const a = Array.from(data.entries()).map(arr => {
      return {
        [arr[0]]: arr[1]
      };
    });
    console.log(data);
    this.SaleService.saveSalesDF(data).then(res => {
      $('#modalAdd').modal('show')
    });

    this.handlegetSales()
  }

  handleChangeClient(e) {
    e.preventDefault();
    this.setState({ nameClient: e.target.value });
  }

  handleChangeClient2(e) {
    e.preventDefault();
    this.setState({ numRegistry: e.target.value });
  }

  handleChangeClient3(e) {
    e.preventDefault();
    this.setState({ municipaly: e.target.value });
  }

  handleChangeClient4(e) {
    e.preventDefault();
    this.setState({ departament: e.target.value });
  }

  handleChangeClient5(e) {
    e.preventDefault();
    this.setState({ address: e.target.value });
  }

  handleChangeProduct2(e) {
    e.preventDefault();
    this.setState({ catidad: e.target.value });
  }
  handleChangeProduct3(e) {
    e.preventDefault();
    this.setState({ descripcion: e.target.value });
  }

  handleChangeProduct5(e) {
    e.preventDefault();
    this.setState({ v_nosujeta: e.target.value });
  }

  handleChangeProduct6(e) {
    e.preventDefault();
    this.setState({ v_extenta: e.target.value });
  }
  handleChangeProduct7(e) {
    e.preventDefault();
    this.setState({ v_gravada: e.target.value });
  }

  handleChangeV(e) {
    e.preventDefault();
    this.setState({ descuento: e.target.value });
    this.setState({
      total:parseFloat(this.state.subtotal) + parseFloat(this.state.iva) - parseFloat(this.state.descuento) * parseFloat(this.state.total2)
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
                  <h5 className="text-primary text-center mt-4 mb-4">VENTAS</h5>
                </div>
              </div>

              <Navs
                firsTitle="Realizar venta"
                secondTitle="Ventas realizadas"
                firstContent={
                  <React.Fragment>
                    <div className="card">
                      <div className="card-body">
                        <div className="row">
                          <div className="col-sm-12 col-md-12 col-lg-6">
                            <form onSubmit={this.handleSubmitSales}>
                              <div className="row">
                                <div className="col-sm-12 col-md-12 col-lg-12">
                                  <button
                                    type="button"
                                    className="btn btn-block btn-primary"
                                    data-toggle="modal"
                                    data-target="#modal1"
                                  >
                                    Seleccionar cliente
                                  </button>
                                </div>

                                <div className="col-sm-12 col-md-12 col-lg-6">
                                  <Input
                                    for="Direction"
                                    text="Direccion:"
                                    type="text"
                                    id="direccion"
                                    name="direccion"
                                    values={this.state.address}
                                    onChange={this.handleChangeClient5.bind(
                                      this
                                    )}
                                  />
                                  <Input
                                    for="Munycipaly"
                                    text="Municipio:"
                                    type="text"
                                    id="Munycipaly"
                                    name="municipio"
                                    values={this.state.municipaly}
                                    onChange={this.handleChangeClient3.bind(
                                      this
                                    )}
                                  />
                                  <Input
                                    for="RegistryNumber"
                                    text="Numero de registo:"
                                    type="text"
                                    id="RegistryNumber"
                                    name="numero_registro"
                                    values={this.state.numRegistry}
                                    onChange={this.handleChangeClient2.bind(
                                      this
                                    )}
                                  />
                                  <ControlForm
                                    for="PaymentMethod"
                                    text="Forma de pago:"
                                    id="PaymentMethod"
                                    name="id_forma"
                                    content={
                                      <React.Fragment>
                                        {this.state.dataPaymentMethod.map(e => (
                                          <option
                                            key={e.id_forma}
                                            value={e.id_forma}
                                          >
                                            {e.forma_pago}
                                          </option>
                                        ))}
                                      </React.Fragment>
                                    }
                                  />
                                </div>
                                <div className="col-sm-12 col-md-12 col-lg-6">
                                  <Input
                                    for="Name"
                                    text="Nombre:"
                                    type="text"
                                    id="Name"
                                    name="cliente"
                                    values={this.state.nameClient}
                                    onChange={this.handleChangeClient.bind(
                                      this
                                    )}
                                  />
                                  <Input
                                    for="Departament"
                                    text="Departamento:"
                                    type="text"
                                    id="Deparament"
                                    name="departamento"
                                    values={this.state.departament}
                                    onChange={this.handleChangeClient4.bind(
                                      this
                                    )}
                                  />
                                  <ControlForm
                                    for="TypeSales"
                                    text="Tipo de venta:"
                                    id="Typesales"
                                    name="id_tipoven"
                                    content={
                                      <React.Fragment>
                                        {this.state.dataTypeSales.map(e => (
                                          <option
                                            key={e.id_tipoven}
                                            value={e.id_tipoven}
                                          >
                                            {e.tipo_venta}
                                          </option>
                                        ))}
                                      </React.Fragment>
                                    }
                                  />
                                  <ControlForm
                                    for="PaymentMethod"
                                    text="Tipo de comprobante:"
                                    id="PaymentMethod"
                                    name="id_tipocom"
                                    content={
                                      <React.Fragment>
                                        {this.state.dataVoucher.map(e => (
                                          <option
                                            key={e.id_tipocom}
                                            value={e.id_tipocom}
                                          >
                                            {e.tipo_compro}
                                          </option>
                                        ))}
                                      </React.Fragment>
                                    }
                                  />
                                </div>
                                <div className="col-sm-12 col-md-12 col-lg-12 mt-3">
                                  <button
                                    className="btn btn-secondary  btn-block"
                                    type="submit"
                                  >
                                    Confirmar cliente
                                  </button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div className="col-sm-12 col-md-12 col-lg-6">
                            <form onSubmit={this.handleSubmitSalesD}>
                              <div className="row">
                                <div className="col-sm-12 col-md-12 col-lg-12">
                                  <button
                                    className="btn btn-primary btn-block"
                                    type="button"
                                    data-toggle="modal"
                                    data-target="#modal2"
                                    disabled={this.state.secondPart}
                                  >
                                    Seleccionar producto
                                  </button>
                                </div>
                                <div className="col-sm-12 col-md-12 col-lg-6">
                                  <Input
                                    for="Product"
                                    text="Producto:"
                                    type="text"
                                    id="Product"
                                    name="id_producto"
                                    values={this.state.nombre}
                                    bol={this.state.secondPart}
                                  />
                                  <Input
                                    for="Quantity"
                                    text="Cantidad:"
                                    type="text"
                                    id="  Quantity"
                                    name="cantidad"
                                    values={this.state.catidad}
                                    bol={this.state.secondPart}
                                    onChange={this.handleChangeProduct2.bind(
                                      this
                                    )}
                                  />
                                  <Input
                                    for="Description"
                                    text="Descripcion:"
                                    type="text"
                                    id="Description"
                                    name="descripcion"
                                    values={this.state.descripcion}
                                    bol={this.state.secondPart}
                                    onChange={this.handleChangeProduct3.bind(
                                      this
                                    )}
                                  />
                                  <Input
                                    for="ExemptSale"
                                    text="Venta exenta:"
                                    type="text"
                                    id="ExemptSale"
                                    name="v_exenta"
                                    values={this.state.v_extenta}
                                    bol={this.state.secondPart}
                                    onChange={this.handleChangeProduct6.bind(
                                      this
                                    )}
                                  />
                                </div>
                                <div className="col-sm-12 col-md-12 col-lg-6">
                                  <Input
                                    for="Price"
                                    text="Precio Unitario:"
                                    type="text"
                                    id="Price"
                                    name="precio"
                                    values={this.state.precio}
                                    bol={this.state.secondPart}
                                  />
                                  <Input
                                    for="SaleNotSubject"
                                    text="Venta no sujeta:"
                                    type="text"
                                    id="SaleNotSubject"
                                    name="v_nosujeta"
                                    values={this.state.v_nosujeta}
                                    bol={this.state.secondPart}
                                    onChange={this.handleChangeProduct5.bind(
                                      this
                                    )}
                                  />
                                  <Input
                                    for="SaleTaxed"
                                    text="Venta gravada:"
                                    type="text"
                                    id="SaleTaxed"
                                    name="v_gravado"
                                    values={this.state.v_gravada}
                                    bol={this.state.secondPart}
                                    onChange={this.handleChangeProduct7.bind(
                                      this
                                    )}
                                  />
                                  <Input
                                    for="CodeSales"
                                    type="hidden"
                                    id="CodeSales"
                                    name="id_venta"
                                    values={this.state.lastid}
                                    bol={this.state.secondPart}
                                  />
                                  <Input
                                    for="Subtotal"
                                    type="hidden"
                                    id="Aubtotal"
                                    name="subtotal"
                                    values={
                                      parseInt(this.state.catidad) *
                                      parseInt(this.state.precio)
                                    }
                                    bol={this.state.secondPart}
                                  />
                                </div>
                                <div className="col-sm-12 col-md-12 col-lg-12 mt-1">
                                  <button
                                    className="btn btn-secondary  btn-block"
                                    type="submit"
                                    disabled={this.state.secondPart}
                                  >
                                    Añadir producto
                                  </button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div className="col-sm-12 col-md-12 col-lg-12 mt-2">
                            <Table
                              id="dtHorizontalExample"
                              className="table table-responsive-sm table-responsive-md table-responsive-sm-xl
                                table-responsive-lg mt-2"
                              titles={state.titleSalesDetai}
                              data={state.dataSalesDetail}
                              keys={state.keysSalesDetail}
                              actions={{
                                delete: () => {}
                              }}
                            />
                          </div>
                          <div className="col-sm-12 col-md-12 col-lg-12">
                            <form onSubmit={this.handleSubmitbill.bind(this)}>
                              <div className="row">
                                <div className="col-sm-12 col-md-12 col-lg-2">
                                  <Input
                                    for="Subtotal"
                                    text="Sub total:"
                                    type="text"
                                    id="Subtotal"
                                    name="subtotal"
                                    values={this.state.subtotal}
                                  />
                                </div>

                                <div className="col-sm-12 col-md-12 col-lg-2">
                                  <Input
                                    for="Discount"
                                    text="Descuento:"
                                    type="text"
                                    id="Discount"
                                    name="descuento"
                                    onChange={this.handleChangeV.bind(this)}
                                    values={this.state.descuento}
                                  />
                                </div>

                                <div className="col-sm-12 col-md-12 col-lg-2">
                                  <Input
                                    for="Iva"
                                    text="IVA:"
                                    type="text"
                                    id="Iva"
                                    name="iva"
                                    values={this.state.iva}
                                  />
                                </div>
                                <div className="col-sm-12 col-md-12 col-lg-2">
                                  <Input
                                    for="Cesc"
                                    text="CESC:"
                                    type="text"
                                    id="Cesc"
                                    name="cesc"
                                    values={this.state.cesc}
                                  />
                                </div>
                                <div className="col-sm-12 col-md-12 col-lg-2">
                                  <Input
                                    for="Retention"
                                    text="Retencion:"
                                    type="text"
                                    id="Retention"
                                    name="retencion"
                                    values={this.state.retencion}
                                  />
                                </div>
                                <div className="col-sm-12 col-md-12 col-lg-2">
                                  <Input
                                    for="TOTAL"
                                    text="Total:"
                                    type="text"
                                    id="TOTAL"
                                    name="total"
                                    values={this.state.total}
                                  />
                                </div>
                                <div className="col-sm-12 col-md-12 col-lg-2">
                                  <Input
                                    type="hidden"
                                    id="Venta"
                                    name="id_venta"
                                    values={this.state.lastid}
                                  />
                                </div>
                                <div className="col-sm-12 col-md-12 col-lg-1 mt-2"></div>
                                <div className="col-sm-12 col-md-12 col-lg-6 mt-2">
                                  <button
                                    className="btn btn-primary  btn-block"
                                    type="submit"
                                  >
                                    Añadir producto
                                  </button>
                                </div>
                                <div className="col-sm-12 col-md-12 col-lg-3 mt-2"></div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <ModalMsm
                      id="modalAdd"
                      color="text-success"
                      title="Mensaje de Exito"
                      colorButton="bg-success"
                      message="Venta creada Exitosamente"
                    />
                  </React.Fragment>
                }
                secondContent={
                  <React.Fragment>
                    <div className="card">
                      <div className="card-body">
                        <div className="row">
                          <div className="col-sm-12 col-md-12 col-lg-12">
                            <Table
                              id="dtHorizontalExample"
                              className="table table-responsive-sm table-responsive-md table-responsive-sm-xl
                                table-responsive-lg mt-2"
                              titles={state.titlesAllSales}
                              data={state.dataAllSales}
                              keys={state.keysAllSales}
                              actions={
                                {
                                  // update: this.update.bind(this),
                                  // delete: this.delete.bind(this)
                                }
                              }
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </React.Fragment>
                }
              />

              {/* Modals de cliente y de producto */}

              <Modal
                id="modal1"
                size="modal-lg"
                title="Seleccione cliente"
                form={
                  <React.Fragment>
                    <Table
                      id="dtHorizontalExample"
                      className="table table-responsive-sm table-responsive-md table-responsive-sm-xl
                      table-responsive-lg mt-2"
                      titles={state.titlesClient}
                      data={state.dataClient}
                      keys={state.keysClient}
                      actions={{
                        select: this.select.bind(this)
                      }}
                    />
                  </React.Fragment>
                }
              />

              <Modal
                id="modal2"
                size="modal-lg"
                title="Seleccione producto"
                form={
                  <React.Fragment>
                    <Table
                      id="dtHorizontalExample"
                      className="table table-responsive-sm table-responsive-md table-responsive-sm-xl
                      table-responsive-lg mt-2"
                      titles={state.titlesProduct}
                      data={state.dataProduct}
                      keys={state.keysProduct}
                      actions={{
                        select: this.select2.bind(this)
                      }}
                    />
                  </React.Fragment>
                }
              />
            </div>
          </div>
        </div>
      </div>
    );
  }
}

export default Sales;
