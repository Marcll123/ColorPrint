import React from 'react'

const CardChart = ({ chart, title, col, center }) => {
    return (
        <div className={`col-sm-12 col-md-12 ${col} ${center}`}>
            <div className="card mt-3">
                <div className="text-center text-secondary text-uppercase font-weight-bold  p-2 ">
                    {title}
                </div>
                <div className="mr-4 ml-4 mb-4">
                     {chart}
                </div>
            </div>
        </div>
    )
}

export default CardChart
