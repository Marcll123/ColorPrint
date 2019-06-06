import React, { Component } from "react";
import "./Login.css";

class Login extends Component {
  render() {
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
                  <form action="">
                    <div className="form-group">
                      <label for="UserEmail" className="text-primary" />
                      <input
                        type="email"
                        className="form-control"
                        id="UserEmail"
                        placeholder="Correo electronico"
                      />
                    </div>
                    <div className="form-group">
                      <label for="UserPassword" className="text-primary" />
                      <input
                        type="password"
                        className="form-control"
                        id="UserPassword"
                        placeholder="Contraseña"
                      />
                    </div>
                    <p className="text-center">
                      <a
                        href="../../views/dashboard/recuperar.php"
                        class="btn btn-flat text-primary"
                      >
                        ¿Olvidaste tu contraseña?
                      </a>
                    </p>
                    <button type="submit" className="btn btn-primary btn-login">
                      Iniciar sesion
                    </button>
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
