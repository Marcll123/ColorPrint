import React from "react";

function CancelButton({ text }) {
    return (
        <button className="btn btn-outline-danger my-2 my-sm-2" data-dismiss="modal" type="button">
            {text}
        </button>
    )
}
export default CancelButton;