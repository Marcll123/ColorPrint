import React, {Component} from 'react';

class CardStart extends Component{
    constructor(props){
        super(props);
    }
    render(){
        return(

                <div class="col-sm-4">
                           <div class="card">
                             <div class="card-body">
                             <div class="row">
                                <div class="col-sm-6">
                                    <h5>{this.props.name}</h5>
                                    <h1>{this.props.num}</h1>
                                </div>
                                <div class="col-sm-6">
                                   
                                </div>
                                <div class="col-sm-12">
                                    <p>{this.props.update}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        )
    }
}

export default CardStart;