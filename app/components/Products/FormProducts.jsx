import React, { Component } from 'react'
import Input from "../AnotherComponents/InputText.jsx";
import Control from "../AnotherComponents/ControlForm.jsx";
import { CmbSerivices } from '../../services/CmbSerivices.js'

export default class FormProducts extends Component {
    constructor(props) {
        super(props)

        this.state = {
            dataProvider: []
        }

        this.handleSubmit = this.handleSubmit.bind(this);
        this.handlecmb = this.handlecmb.bind(this);
        this.CmbService = new CmbSerivices();
    }

    componentDidMount() {
        this.handlecmb();
    }

    handlecmb() {
        this.CmbService.getCmbProvider().then(res => {
            this.setState({ dataProvider: [...res] })
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
                                        for="ProductName"
                                        text="Nombre del producto:"
                                        type="text"
                                        pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}"
                                        required={true}
                                        id="Giro"
                                        name="nombre_produc"
                                        onChange={this.props.changeName}
                                        values={this.props.name}
                                    />
                                    <Input
                                        for="PriceProduct"
                                        text="Precio Unitario:"
                                        type="text"
                                        required={true}
                                        id="PriceProduct"
                                        required={true}
                                        name="precio_uni"
                                        onChange={this.props.changePrice}
                                        values={this.props.price}
                                    />
                                </div>
                                <div className=" col-sm-12 col-md-12 col-lg-6 ">
                                    <Input
                                        for="Description"
                                        text="Descripcion:"
                                        type="text"
                                        required={true}
                                        id="Description"
                                        required={true}
                                        name="descripcion"
                                        onChange={this.props.changeDescription}
                                        values={this.props.description}
                                    />
                                    <Control
                                        for="Provider"
                                        id="Provider"
                                        text="Proveedor:"
                                        name="id_proveedor"
                                        content={
                                            <React.Fragment>
                                                {this.state.dataProvider.map(e => (<option key={e.id_proveedor} value={e.id_proveedor}>{e.nombre_prove}</option>))}
                                            </React.Fragment>
                                        }
                                    />
                                </div>
                                <div className="d-flex justify-content-center col-sm-12 col-md-12 col-lg-12 mt-2">
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
        )
    }
}
