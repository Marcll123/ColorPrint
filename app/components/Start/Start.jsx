import React, {Component} from 'react';
import Menu from '../Menu/Menu.jsx';
import NavContent from '../Nav/NavContent.jsx';
import './Start.css'
import CardStart from '../AnotherComponents/CardStart.jsx';

class Start extends Component{
    render(){
        return(
            <div className="d-flex principal" id="wrapper">
                <Menu></Menu>
                {/*Contenido de la pagina */}
               <div id="page-content-wrapper" className="bg xd">
                  {/*Navbar principal*/}
                  <NavContent></NavContent>

                  <div className="size-completo">
                    <div className="container-fluid bg-content">
                       <div className="row content-card">
                          <CardStart name="Clientes" num="400" uptade="Hace un dia"></CardStart>
                          <CardStart name="Usuarios" num="400" uptade="Hace un dia"></CardStart>
                          <CardStart name="Ventas" num="400" uptade="Hace un dia"></CardStart>                         
                       </div>
                       </div>
                    </div>
                  </div>
            </div>
        )
    }
}

export default Start;