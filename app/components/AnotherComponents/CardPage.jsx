import React from 'react'
import {Link} from 'react-router-dom';

const CardPage = ({title, message, buttonName, link}) => {
    return (
        <div>
        <div className="row">
          <div className="col-2" />
          <div className="col-8">
            <div className="card car-c">
              <div className="card clase-card">
                <div className="card-body">
                  <h1 className="card-title text-center text-primary">
                    {title}
                  </h1>
                  <h2 className="text-secondary text-center">{message}</h2>
                  <div className="d-flex justify-content-center">
                    <Link
                      to={link}
                      className="button btn btn-flat btn-primary"
                    >{buttonName}</Link>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    )
}

export default CardPage
