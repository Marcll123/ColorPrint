import React, { Component } from 'react'
import FormUsers from '../Users/FormUsers.jsx'
import Modal from '../AnotherComponents/Modal.jsx';
import ModalButton from '../AnotherComponents/buttons/ModalButton.jsx';
import CardChart from '../AnotherComponents/CardChart.jsx';
import { from } from 'rxjs';
import Input from '../AnotherComponents/InputText.jsx';
import ControlForm from '../AnotherComponents/ControlForm.jsx';
import InputEnable from '../AnotherComponents/InputEnable.jsx';
import { UsersService } from '../../services/UsersService'
import ModalMessage from '../AnotherComponents/ModalMessage.jsx'

class FirstUser extends Component {

    constructor(props) {
        super(props)

        this.state = {
            show:''
        }
        this.handleSubmitUser = this.handleSubmitUser.bind(this);
        this.UsersService = new UsersService();
    }

    handleSubmitUser(e) {
        e.preventDefault();
        const data = new FormData(e.target);

        this.UsersService.saveUsers(data).then(res => {
            const {message} = res;
            if(message === "He insertado un registro"){
                this.setState({show:'show'})
            }
        })

    }

    render() {
        return (
            <div className="login">
                <div className="row">
                    <div className="col-2" />
                    <div className="col-8">
                        <div className="card car-c">
                            <div className="card clase-card">
                                <div className="card-body">
                                    <h4 className="card-title text-center text-primary">
                                        Primer usuario
                                     </h4>
                                    <form onSubmit={this.handleSubmitUser} className="row" >
                                        <div className="col-lg-6">
                                            <Input
                                                type="text"
                                                id="name"
                                                name="nombre"
                                                placeholder="Nombre"
                                                auto="off"
                                            />
                                            <ControlForm
                                                id="gender"
                                                name="genero"
                                                content={
                                                    <React.Fragment>
                                                        <option selected>Genero</option>
                                                        <option>Marculino</option>
                                                        <option>Femenino</option>
                                                    </React.Fragment>
                                                }
                                            />
                                            <Input
                                                type="text"
                                                id="emailUser"
                                                name="correo"
                                                placeholder="Correo"
                                                auto="off"
                                            />
                                            <ControlForm
                                                id="rol"
                                                name="id_rol"
                                                content={
                                                    <React.Fragment>
                                                        <option selected>Rol</option>
                                                        <option value="1">Administrador</option>
                                                    </React.Fragment>
                                                }
                                            />
                                        </div>
                                        <div className="col-lg-6">
                                            <Input
                                                type="text"
                                                id="lastname"
                                                name="apellido"
                                                placeholder="Apellido"
                                                auto="off"
                                            />
                                            <Input
                                                type="text"
                                                id="User"
                                                name="nombre_usu"
                                                placeholder="Usuario"
                                                auto="off"
                                            />
                                            <Input
                                                type="password"
                                                id="PassUser"
                                                name="clave"
                                                placeholder="Contraseña"
                                                auto="off"
                                            />
                                            <Input
                                                type="password"
                                                id="PassUserConfirm"
                                                name="cofimarclave"
                                                placeholder="Confirmar contraseña"
                                                auto="off"
                                            />
                                        </div>
                                        <div className="d-flex justify-content-center col-lg-12 mt-4">
                                            <button
                                                type="submit"
                                                value="Login"
                                                className="button btn btn-flat btn-primary">
                                                Ingresar usuario
                                            </button>
                                        </div>
                                        <div>
                                        <ModalMessage title="Mensaje de usuario" body="Accion realizada con exito se a insertado un nuevo usuario" show={this.state.show}
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default FirstUser
