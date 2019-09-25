import React, { Component } from 'react';

class Input extends Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <React.Fragment>
                <label htmlFor={this.props.for}>{this.props.text}</label>
                <input type={this.props.type} required={this.props.required} id={this.props.id} pattern={this.props.pattern} title={this.props.title} disabled={this.props.bol} name={this.props.name} value={this.props.values}  autoComplete={this.props.auto}
                    onChange={this.props.onChange} placeholder={this.props.placeholder} aria-describedby={this.props.messaid} className="form-control"></input>
                <small id={this.props.messaid} className="form-text text-muted">
                    {this.props.textMessage}
                </small>
            </React.Fragment>
        )
    }
}


export default Input;