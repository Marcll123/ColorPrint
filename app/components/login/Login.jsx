import React, { Component } from "react";
import Input from "../AnotherComponents/InputText.jsx";
import { LoginService } from "../../services/LoginService.js";
import { Redirect, Link } from "react-router-dom";
import "./Login.css";
import ReCAPTCHA from "react-google-recaptcha";

class Login extends Component {
  //Constructor del componente contiene bindeos y state del mismo y el objeto de el servicio
  constructor(props) {
    super(props);
    this.state = {
      nombre_usu: "",
      clave: "",
      redirect: false,
      isVerified: false
    };

    this.loginService = new LoginService();

    this.login = this.login.bind(this);
    this.onChange = this.onChange.bind(this);
    this.onChangeCapcha = this.onChangeCapcha.bind(this);
  }
  //Se encarga de verificar el estado de la clave y el ususario y cambiar el estado 
  //Para redireccionar a una nueva pantalla
  login(e) {
    e.preventDefault();
    const data = new FormData(e.target);

    if (this.state.isVerified) {
      if (this.state.nombre_usu && this.state.clave) {
        this.loginService.sendData2(data).then(res => {
          console.log(res);
           const { token, username, rol, specificMessage } = res;
           if(specificMessage === 'Usuario o contraseña incorrecta'){
            this.setState({ redirect: false });
           }else{
            localStorage.setItem('token', token);
            localStorage.setItem('username', username);
            localStorage.setItem('rol', rol);
            this.setState({ redirect: true });
           }
        });
      } else {
        console.log('campos vacios')
      }
    } else {
      alert('Por favor verifica si eres un humano')
    }
  }


  //Mtodo a la escucha de una accion de cambio para cambiar el estate
  onChange(e) {
    this.setState({ [e.target.name]: e.target.value });
  }


  onChangeCapcha(value) {
    console.log("Captcha value:", value);
  }

  //Reder de el componente login que contiene sus vista y algunos state
  render() {
 
    if (localStorage.getItem('token') && this.state.redirect === true) {
      return (<Redirect to={'/start'}></Redirect>)
    }
    let recapchaIntance

    return (
      <div className="login">
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
                      type="text"
                      id="UserInput"
                      name="nombre_usu"
                      placeholder="Usuario"
                      onChange={this.onChange}
                      auto="off"
                    />
                    <Input
                      type="password"
                      id="UserPassword"
                      name="clave"
                      placeholder="Contraseña"
                      onChange={this.onChange}
                      auto="off"
                      pattern=".{8,}"
                      title="La contraseña debe de tener 8 o mas caracteres"
                    />
                    <p className="text-center">
                      <Link
                        to="/restaurar_contraseña"
                        className="btn btn-flat text-primary"
                      >
                        ¿Olvidaste tu contraseña?
                      </Link>
                    </p>
                    <div className="d-flex justify-content-center">
                      <button
                        type="submit"
                        value="Login"
                        className="button btn btn-flat btn-primary"
                      >Iniciar sesion</button>
                    </div>
                    <div className="d-flex justify-content-center mt-2">
                      <ReCAPTCHA
                        ref={el => recapchaIntance = el}
                        sitekey="6LdIjrcUAAAAAJ1bwVHR3-v1eYpwRRf7WlnG5pi1"
                        onChange={() => this.setState({ isVerified: true })}
                      />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  }
}

export default Login;
