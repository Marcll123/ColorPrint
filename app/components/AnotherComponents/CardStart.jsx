import React, {Component} from 'react';

class CardStart extends Component{
    constructor(props){
        super(props);
    }
    render(){
        return(

                <div className="col-sm-4">
                           <div className="card">
                             <div className="card-body">
                             <div className="row">
                                <div className="col-sm-6">
                                    <h5>{this.props.name}</h5>
                                    <h1>{this.props.num}</h1>
                                </div>
                                <div className="col-sm-6">
                                   
                                </div>
                                <div className="col-sm-12">
                                    <p>{this.props.update}</p>
                                </div>
                                {this.props.onLoad}
                            </div>
                        </div>
                    </div>
                </div>

        )
    }
}

export default CardStart;