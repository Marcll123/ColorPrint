import React, { Component } from 'react';
import CardPage from '../AnotherComponents/CardPage.jsx';


class PageNotFound extends Component {
  render() {
    return (
        <CardPage
          link='/start'
          title='ERROR 404'
          message='Pagina no encontrada'
          buttonName='Regresar al inicio'
        />
    );
  }
}

export default PageNotFound;
