import React from "react";

function Table({ titles, data, keys, tableName, actions ,id, className}) {
    return (
        <table id={id} className={className} cellSpacing="0"
         width="100%">
            <thead className="bg-primary text-white">
                {titles.map(title => {
                    return <th key={title}>{title}</th>;
                })}
                {Object.keys(actions).length > 0 ? <th>Acciones</th>: null}
            </thead>
            <tbody>
                {data.map((row, i) => {
                    return (
                        <tr key={`${tableName}-${i}`}>
                            {keys.map((key, y) => {
                                    return <td key={`${tableName}-${i}-${y}`}>{row[key]}</td>;
                            })}
                            {
                                <td key={`${tableName}-${i}-actions`}>
                                    {actions.update ? (
                                        <button className="btn btn-flat" onClick={actions.update(row)} data-toggle="modal"
                                        data-target="#modal1"><i
                                        className="fas fa-pen text-info"/></button>
                                    ) : null}
                                    {actions.delete ? (
                                        <button className="btn btn-flat"  onClick={actions.delete(row)} data-toggle="modal"
                                        data-target="#modal2"><i
                                        className="fas fa-trash-alt icon2 text-danger"/></button>
                                    ) : null}
                                </td>
                            }
                        </tr>
                    );
                })}
            </tbody>
        </table>
    );
}

export default Table;
