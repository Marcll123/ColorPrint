import React from 'react'

const Navs = ({firsTitle, secondTitle, firstContent, secondContent}) => {
    return (
        <React.Fragment>
            <ul className="nav nav-tabs" id="myTab" role="tablist">
                <li className="nav-item">
                    <a className="nav-link active" id="first-tab" data-toggle="tab" href="#firstContent" role="tab" aria-controls="first" aria-selected="true">{firsTitle}</a>
                </li>
                <li className="nav-item">
                    <a className="nav-link" id="second-tab" data-toggle="tab" href="#secondContent" role="tab" aria-controls="second" aria-selected="false">{secondTitle}</a>
                </li>
            </ul>
            <div className="tab-content" id="myTabContent">
                <div className="tab-pane fade show active" id="firstContent" role="tabpanel" aria-labelledby="first-tab">{firstContent}</div>
                <div className="tab-pane fade" id="secondContent" role="tabpanel" aria-labelledby="second-tab">{secondContent}</div>
            </div>
        </React.Fragment>
    )
}

export default Navs