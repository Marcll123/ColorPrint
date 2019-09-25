import React from 'react'

const ModalMessage = ({title, body, show, type }) => {
    return (
        <div className={`alert ${type} alert-dismissible fade ${show}`} role="alert">
        <strong>{title}</strong> {body}
      </div>
    )
}

export default ModalMessage
