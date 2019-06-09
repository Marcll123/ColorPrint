import React from "react";

function ModalButton({ text, click }) {
    return (
        <button className="btn btn-outline-primary my-2 my-sm-2" data-toggle="modal"
        data-target="#modal1" type="button" onClick={click}>
            {text}
        </button>
    )
}
export default ModalButton;