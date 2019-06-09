import React, {Component} from 'react';

class Input extends Component {
    constructor(props){
        super(props);
    }

    render(){
        return(
           <React.Fragment>
            <label for={this.props.for}>{this.props.text}</label>
            <input type={this.props.type} id={this.props.id}  name={this.props.name}
             onChange={this.props.onChange} placeholder={this.props.placeholder} className="form-control"></input>
          </React.Fragment>
        )
    }
}

export default Input;