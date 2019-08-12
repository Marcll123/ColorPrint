import React, {Component} from 'react';
import menu from "../../resources/img/boton.PNG";
import {Redirect} from "react-router-dom";
class NavContent extends Component{
    //Contructor de nav que tiene un estate para el redirect de salir de la session
    constructor(props){
        super(props);
        this.state={
            redirect: false
        }

        this.click = this.click.bind(this);
        this.clickt = this.clickt.bind(this);
    }

    //Evento a la escucha del click en cerrar sesison de el nav
    click(e){
        e.preventDefault();
        this.setState({redirect:true})
    }
    //Evento que sirve para que se desplique de 
    clickt(e){
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    }

    render(){
        if(this.state.redirect){
            return(<Redirect to='/login'></Redirect>)
        }
        return(
            <div className="NavContent">
                  <nav className="navbar navbar-expand-lg navbar-light  border-bottom
                  nav-size">
                     <img src={menu}  onClick={this.clickt} id="menu-toggle"/>
                    
                     <ul className="navbar-nav ml-auto mt-2 mt-lg-0 ">
                       <li className="nav-item active">
                        <button onClick={this.click} type="submit" className="nav-link text-primary btn btn-flat" href=""><i className="fas fa-sign-out-alt"></i> Cerrar
                        sesion<span className="sr-only">(current)</span></button>
                      </li>
                     </ul>
                  </nav>
            </div>
        )
    }
}

export default NavContent;