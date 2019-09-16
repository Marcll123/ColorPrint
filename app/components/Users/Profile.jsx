import React, { Component } from 'react'
import Menu from "../Menu/Menu.jsx";
import NavContent from "../Nav/NavContent.jsx";
import Input from '../AnotherComponents/InputText.jsx';
import { UsersService } from '../../services/UsersService.js'
import ControlForm from '../AnotherComponents/ControlForm.jsx';
import InputEnable from '../AnotherComponents/InputEnable.jsx';

class Profile extends Component {
    constructor(props) {
        super(props)

        this.state = {
            id: 0,
            name: '',
            lastname: '',
            gender: '',
            user: '',
            email: '',
            password: '',
            rol: '',
            visible: false,
            visible2: true,
            enable: true
        };

        this.UsersService = new UsersService();
        this.name = localStorage.getItem('username');;
        this.handleProfile = this.handleProfile.bind(this);
        this.handleUpdateProfile = this.handleUpdateProfile.bind(this);
        this.user = '';
    };

    componentDidMount() {
        this.handleProfile();
    }

    handleProfile() {
        this.UsersService.getUsersProfile(this.name).then(res => {
            this.setState({
                name: res[0].nombre,
                lastname: res[0].apellido,
                gender: res[0].genero,
                user: res[0].nombre_usu,
                email: res[0].correo,
                password: res[0].clave,
                rol: res[0].roles
            })
        });
    }

    handleUpdateProfile(e) {
        e.preventDefault();
        const data = new FormData(e.target);
        const profiledata = Array.from(data.entries()).map(arr => {
            return {
                [arr[0]]: arr[1]
            };
        });
        this.UsersService.updateUsersProfile(Object.assign({}, ...profiledata), this.name).then(res => {
            console.log(res);
            console.log('Perfil actualizado');
        })
        console.log(profiledata);
        
    }

    render() {
        return (
            <div className="d-flex principal" id="wrapper">
                <Menu></Menu>
                {/*Contenido de la pagina */}
                <div id="page-content-wrapper" className="bg xd">
                    {/*Navbar principal*/}
                    <NavContent></NavContent>
                    <div className="size-completo">
                        <div className="container-fluid bg-content">
                            <div className="card card-margen">
                                <div className="card-head">
                                    <h5 className="text-primary text-center mt-4 mb-4">
                                        Perfil de: {this.name}
                                    </h5>
                                </div>
                            </div>

                            <div className="row split">
                                <div className="col-12">
                                    <div className="card">
                                        <div className="card-body">
                                            <form onSubmit={this.handleUpdateProfile}>
                                                <div className="row">
                                                    <div className=" col-sm-12 col-md-12 col-lg-6 ">
                                                        <InputEnable
                                                            for="UserName"
                                                            text="Nombre:"
                                                            type="text"
                                                            id="UserName"
                                                            name="nombre"
                                                            bol={this.state.enable}
                                                            values={this.state.name}
                                                        />
                                                        <InputEnable
                                                            for="UserLastname"
                                                            text="Apellido:"
                                                            type="text"
                                                            id="UserLastname"
                                                            name="apellido"
                                                            bol={this.state.enable}
                                                            values={this.state.lastname}
                                                        />
                                                        <ControlForm
                                                            for="Gender"
                                                            text="Genero:"
                                                            id="Gender"
                                                            name="genero"
                                                            bol={this.state.enable}
                                                            content={
                                                                <React.Fragment>
                                                                    <option value={this.state.gender} >{this.state.gender}</option>
                                                                    <option value="Femenino">Femenino</option>
                                                                    <option value="Masculino">Masculino</option>
                                                                </React.Fragment>
                                                            } />
                                                        <InputEnable
                                                            for="Usuario"
                                                            text="Usuario:"
                                                            type="text"
                                                            id="Usuario"
                                                            bol={this.state.enable}
                                                            name="nombre_usu"
                                                            values={this.state.user}
                                                        />
                                                    </div>
                                                    <div className=" col-sm-12 col-md-12 col-lg-6 ">
                                                        <InputEnable
                                                            for="Mail"
                                                            text="Correo electronico:"
                                                            type="email"
                                                            id="Mail"
                                                            name="correo"
                                                            bol={this.state.enable}
                                                            values={this.state.email}
                                                        />
                                                        {
                                                            this.state.visible ?
                                                                <InputEnable
                                                                    for="pass"
                                                                    text="Contraseña antigua:"
                                                                    type="password"
                                                                    id="pass"
                                                                    name="claveantigua"
                                                                    bol={this.state.enable}
                                                                />
                                                                : <div></div>
                                                        }
                                                        {
                                                            this.state.visible ?
                                                                <InputEnable
                                                                    for="pass"
                                                                    text="Contraseña nueva:"
                                                                    type="password"
                                                                    id="pass"
                                                                    name="clave"
                                                                    bol={this.state.enable}
                                                                />
                                                                : <div></div>
                                                        }
                                                        {
                                                            this.state.visible ?
                                                                <InputEnable
                                                                    for="passconfim"
                                                                    text="Confirmar contraseña:"
                                                                    type="password"
                                                                    id="passconfirm"
                                                                    name="cofimarclave"
                                                                />
                                                                : <div></div>
                                                        }
                                                        {
                                                            this.state.visible2 ?
                                                                <InputEnable
                                                                    for="UserRol"
                                                                    text="Rol:"
                                                                    type="text"
                                                                    id="UserRol"
                                                                    bol={this.state.enable}
                                                                    values={this.state.rol}
                                                                /> : <div></div>
                                                        }
                                                        {
                                                            this.state.visible ?
                                                                <ControlForm
                                                                    for="Roles"
                                                                    text="Rol:"
                                                                    id="Roles"
                                                                    name="id_rol"
                                                                    content={
                                                                        <React.Fragment>
                                                                            <option value="1">Administrador</option>
                                                                            <option value="2">gerente</option>
                                                                        </React.Fragment>
                                                                    } />
                                                                : <div></div>
                                                        }
                                                    </div>
                                                    <div className="d-flex justify-content-center col-lg-12 mt-4">
                                                        <button
                                                            type="button"
                                                            onClick={
                                                                () => {
                                                                    this.setState({
                                                                        enable: false,
                                                                        visible: true,
                                                                        visible2: false
                                                                    })
                                                                }
                                                            }
                                                            className="button btn btn-flat btn-primary">
                                                            Modificar perfil
                                                        </button>
                                                        {
                                                            this.state.visible ?
                                                                <button
                                                                    type="submit"
                                                                    className="button btn btn-flat btn-primary ml-2"
                                                                >Realizar cambios</button>
                                                                : <div></div>
                                                        }
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default Profile;
