import React, { Component } from 'react';
import { UsersService } from '../../services/UsersService';
import Input from '../AnotherComponents/InputText.jsx';
import {Link} from 'react-router-dom';
 
class RecoverPassword extends Component {

    constructor(props) {
        super(props)

        this.state = {
            email : 'marcosleonor99@hotmail.com'
        };
        this.UsersService = new UsersService();
        this.handleSubmit = this.handleSubmit.bind(this);

        this.mail = 'marcosleonor99@hotmail.com';
    }

    handleSubmit(e) {
        e.preventDefault();
        const data = new FormData(e.target);

        const a = Array.from(data.entries()).map(arr => {
            return {
              [arr[0]]: arr[1]
            };
          });

        this.UsersService.sendData(data).then(res => {
            console.log(res);
        })

        console.log(a);
    
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
                                    <h4 className="card-title text-center text-primary mt-5">
                                        Recuperar contraseña
                                    </h4>
                                    <form onSubmit={this.handleSubmit}>
                                        <Input
                                            type="text"
                                            id="emailUser"
                                            name="correo"
                                            placeholder="Correo electronico"
                                        />
                                         <div className="d-flex justify-content-center col-lg-12 mt-4">
                                            <button
                                                type="submit"
                                                value="recover"
                                                className="button btn btn-flat btn-primary">
                                                Enviar nueva contraseña
                                            </button>
                                            <Link
                                                to="/login"
                                                className="button btn btn-flat btn-primary ml-3">
                                                Regresar a iniciar sesion
                                            </Link>
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

export default RecoverPassword
