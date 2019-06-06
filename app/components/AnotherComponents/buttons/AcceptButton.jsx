import React from "react";

function AcceptButton({ text }) {
    return (
        <button className="btn btn-outline-info my-2 my-sm-2 ml-1"  type="submit">
            {text}
        </button>
    )
}
export default AcceptButton;