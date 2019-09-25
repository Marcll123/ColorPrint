import React from 'react'

const ModalMsm = ({ message, title, color, id, colorButton }) => {
    return (
        <div className="modal fade bd-example-modal-sm" id={id} tabIndex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div className="modal-dialog modal-sm modal-dialog-centered">
                <div className="modal-content">
                    <div className="modal-header">
                        <h5 className={`modal-title text-uppercase ${color}`} id="exampleModalLongTitle">{title}</h5>
                        <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div className={`modal-body text-uppercase ${color}`}>
                        {message}
                    </div>
                    <div className="modal-footer">
                        <button type="button" className= {`btn btn-secondary ${colorButton}`} data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default ModalMsm
