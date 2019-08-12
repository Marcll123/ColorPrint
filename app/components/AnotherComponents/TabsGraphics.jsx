import React from 'react'

const TabsGraphics = ({event, submit, firtsInput, secondInput}) => {
    return (
        <div className="card card-margen ml-3 mr-3">
            <div className="card-head d-flex justify-content-center">
                <form class="form-inline mt-2 ml-2" onSubmit={submit}>
                    <div class="form-group mb-2">
                        <input type="date" readonly class="form-control" onChange={firtsInput} id="staticEmail2" placeholder="Fecha inicial" />
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="Date" class="form-control" id="inputPassword2" onChange={secondInput}  placeholder="Fecha final" />
                    </div>
                    <button type="submit" onClick={event} class="btn btn-primary mb-2">Generar grafico</button>
                </form>
            </div>
        </div>
    )
}

export default TabsGraphics
