import React from "react";

function ModalButton({ text }) {
    return (
        <button className="btn btn-outline-primary my-2 my-sm-2" data-toggle="modal"
        data-target="#modal1" type="button">
            {text}
        </button>
    )
}
export default ModalButton;