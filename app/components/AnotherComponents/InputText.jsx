import React, {Component} from 'react';

class Input extends Component {
    constructor(props){
        super(props);
    }

    render(){
        return(
           <React.Fragment>
            <label htmlFor={this.props.for}>{this.props.text}</label>
            <input type={this.props.type} id={this.props.id} pattern={this.props.pattern} title={this.props.title}  name={this.props.name} value={this.props.values} autoComplete={this.props.auto}
             onChange={this.props.onChange} placeholder={this.props.placeholder} className="form-control"></input>
          </React.Fragment>
        )
    }
}

export default Input;