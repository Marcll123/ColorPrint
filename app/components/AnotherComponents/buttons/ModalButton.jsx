import React from "react";

function ModalButton({ text, click,modal ,target}) {
    return (
        <button className="btn btn-outline-primary my-2 my-sm-2 my-2  ml-2" data-toggle={modal}
        data-target={target} type="button" onClick={click}>
            {text}
        </button>
    )
}
export default ModalButton;