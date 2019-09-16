import React, { Component } from 'react';
import { UsersService } from '../../services/UsersService';

 
class ChangeNewPass extends Component {

    constructor(props) {
        super(props)

        this.state = {

        };
        this.UsersService = new UsersService();
    }


    render() {
        return (
            <div className="login">
                <div className="row">
                    <div className="col-2" />
                    <div className="col-8">
                        <div className="card car-c">
                            <div className="card clase-card">
                                <div className="card-body">
                                    <h4 className="card-title text-center text-primary mt-5">
                                        Nueva contraseña
                                    </h4>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

export default ChangeNewPass
