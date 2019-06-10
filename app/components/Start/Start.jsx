import React, {Component} from 'react';
import Menu from '../Menu/Menu.jsx';
import NavContent from '../Nav/NavContent.jsx';
import './Start.css'
import CardStart from '../AnotherComponents/CardStart.jsx';
import { NumberDetail } from "../../services/UsersService.js";
import { Number } from "../../services/PurchaseService.js";
import { NumberS } from "../../services/SaleService.js";

class Start extends Component{
    constructor(props){
        super(props);
        this.state={
            val:1,
            val2:1,
            val3:1
        }
        this.NumberDetail = new NumberDetail();
        this.NumberP = new Number();
        this.NumberS = new NumberS();
        this.handlechage = this.handlechage.bind(this);
        this.handlechage2 = this.handlechage2.bind(this);
        this.handlechage3 = this.handlechage3.bind(this);
        this.totalItemsCount = 0;
    }

    handlechage() {
        this.NumberDetail.getNumberDetail().then(res => {
          this.setState({val:res[0].num})
        });
    }
    handlechage2() {
        this.NumberP.getNumber().then(res => {
            this.setState({val2:res[0].num})
        });
    }
    handlechage3() {
        this.NumberS.getNumber().then(res =>{
            this.setState({val3:res[0].num})
        })
      }
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
                          <CardStart name="Compras" num={this.state.val2} uptade="Hace un dia"></CardStart>
                          <CardStart name="Usuarios" num={this.state.val} uptade="Hace un dia"></CardStart>
                          <CardStart name="Ventas" num={this.state.val3} uptade="Hace un dia"></CardStart>                    
                       </div>
                       </div>
                    </div>
                  </div>
                  {this.handlechage()}
                  {this.handlechage2()}
                  {this.handlechage3()}
            </div>
        )
    }
}

export default Start;