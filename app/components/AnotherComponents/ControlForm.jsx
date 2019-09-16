import React, {Component} from 'react';

class ControlForm extends Component {
    constructor(props){
        super(props);
    }

    render(){
        return(
          <React.Fragment>
           <label htmlFor={this.props.for}>{this.props.text}</label>
            <select id={this.props.id} name={this.props.name} disabled={this.props.bol} className="form-control form-control-sm">
            {this.props.content}
           </select>
          </React.Fragment>
        )
    }
}

export default ControlForm;