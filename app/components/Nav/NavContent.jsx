import React, {Component} from 'react';
import menu from "../../resources/img/boton.PNG";
class NavContent extends Component{
    render(){
        return(
            <div className="NavContent">
                  <nav className="navbar navbar-expand-lg navbar-light  border-bottom
                  nav-size">
                     <img src={menu} id="menu-toggle"/>
                     <ul className="navbar-nav ml-auto mt-2 mt-lg-0 ">
                       <li className="nav-item active">
                        <a className="nav-link text-primary" href=""><i className="fas fa-sign-out-alt"></i> Cerrar
                        sesion<span className="sr-only">(current)</span></a>
                      </li>
                     </ul>
                  </nav>
            </div>
        )
    }
}

export default NavContent;