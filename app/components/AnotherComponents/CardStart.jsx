import React, { Component } from 'react';

class CardStart extends Component {
    constructor(props) {
        super(props);
    }
    render() {
        return (

            <div className="col-sm-12 col-md-12 col-lg-4 ">
                <div className="card">
                    <div className="card-body">
                        <div className="row">
                            <div className="col-sm-7 col-md-7 col-lg-7 ">
                                <h5 className='text-center'>{this.props.name}</h5>
                                <h1 className='text-center'>{this.props.num}</h1>
                            </div>
                            <div className="col-sm-5 col-md-5 col-lg-5">
                                <img className="rounded mx-auto d-block" src={this.props.img} />
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