import React from "react";

function Modal({ form, id, title, footer,size, center, submit }) {
    return (
        <div onSubmit={submit} className="modal fade bd-example-modal-sm mt-3" id={id} tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div className={`modal-dialog modal-dialog modal-dialog-scrollable ${size} ${center}`} role="document">
          <div className="modal-content">
            <div className="modal-header">
              <h5 className="modal-title">{title}</h5>
              <button type="button" className="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div className="modal-body">
             {form}
            </div>
            <div className="modal-footer">
             {footer}
            </div>
          </div>
        </div>
      </div>
    )
}
export default Modal;