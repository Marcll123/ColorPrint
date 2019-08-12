import React from 'react'


const CustomGraphics = ({ventas, compras, clientes, productos}) => {
    return (
        <React.Fragment>
            <ul className="nav nav-tabs" id="myTab" role="tablist">
                <li className="nav-item">
                    <a className="nav-link active" id="sale-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Ventas</a>
                </li>
                <li className="nav-item">
                    <a className="nav-link" id="purchase-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Compras</a>
                </li>
                <li className="nav-item">
                    <a className="nav-link" id="client-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Clientes</a>
                </li>
                <li className="nav-item">
                    <a className="nav-link" id="quatation-tab" data-toggle="tab" href="#co" role="tab" aria-controls="co" aria-selected="false">Productos</a>
                </li>
            </ul>
            <div className="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="sale-tab">
                   {ventas}
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="purchase-tab">
                   {compras}
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="client-tab">
                   {clientes}
                </div>
                <div class="tab-pane fade" id="co" role="tabpanel" aria-labelledby="quatation-tab">
                   {productos}
                </div>
            </div>
     </React.Fragment>
    )
}

export default CustomGraphics
