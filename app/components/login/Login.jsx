import React, { Component } from "react";
import Input from "../AnotherComponents/InputText.jsx";
import { LoginService } from "../../services/LoginService.js";
import {Redirect} from "react-router-dom";
import "./Login.css";

class Login extends Component {
  //Constructor del componente contiene bindeos y state del mismo y el objeto de el servicio
  constructor(props) {
    super(props);
    this.state = {
      username: "",
      password: "",
      redirect: false
    };

    this.loginService = new LoginService();

    this.login = this.login.bind(this);
    this.onChange = this.onChange.bind(this);
  }
 //Se encarga de verificar el estado de la clave y el ususario y cambiar el estado 
 //Para redireccionar a una nueva pantalla
  login(e) {
    e.preventDefault();
   if(this.state.username && this.state.password){
    this.loginService.sendData(this.state).then(res => { 
        const {token} = res;
        localStorage.setItem('token', token);
        this.setState({redirect:true});
    });
   }else{
     console.log('Login error')
   }
  }
//Mtodo a la escucha de una accion de cambio para cambiar el estate
  onChange(e) {
    this.setState({[e.target.name]: e.target.value});
    console.log(this.state)
  }

  //Reder de el componente login que contiene sus vista y algunos state
  render() {
    if(this.state.redirect){
      return (<Redirect to={'/start'}></Redirect>)
    }else{
      console.log('Error')
    }
    return (
      <div className="Login">
        <div className="row">
          <div className="col-2" />
          <div className="col-8">
            <div className="card car-c">
              <div className="card clase-card">
                <div className="card-body">
                  <h4 className="card-title text-center text-primary">
                    Iniciar sesion
                  </h4>
                  <form onSubmit={this.login}>
                    <Input
                      type="email"
                      id="UserInput"
                      name="username"
                      placeholder="Usuario"
                      onChange={this.onChange}
                    />
                    <Input
                      type="password"
                      id="UserPassword"
                      name="password"
                      placeholder="Contraseña"
                      onChange={this.onChange}
                    />
                    <p className="text-center">
                      <a
                        href="../../views/dashboard/recuperar.php"
                        className="btn btn-flat text-primary"
                      >
                        ¿Olvidaste tu contraseña?
                      </a>
                    </p>
                    <button 
                      type="submit"
                      value="Login"
                      className="button btn btn-flat btn-primary"
                    >Iniciar sesion</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div className="col-2" />
        </div>
      </div>
    );
  }
}

export default Login;
