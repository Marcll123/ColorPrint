import React from 'react'

const ModalMessage = ({title, body, show }) => {
    return (
        <div class={`alert alert-primary alert-dismissible fade ${show}`} role="alert">
        <strong>{title}</strong> {body}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    )
}

export default ModalMessage
