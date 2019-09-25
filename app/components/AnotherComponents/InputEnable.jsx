import React from 'react'

const InputEnable = ({fort, text, type, id, name, values, onChange, placeholder, bol, auto, pattern}) => {
    return (
        <React.Fragment>
        <label htmlFor={fort}>{text}</label>
        <input type={type} id={id}  name={name} defaultValue={values}  disabled={bol} autoComplete={auto} pattern={pattern}
         onChange={onChange} placeholder={placeholder} className="form-control"></input>
      </React.Fragment>
    )
}

export default InputEnable
