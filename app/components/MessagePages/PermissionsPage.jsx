import React, { Component } from 'react';
import CardPage from '../AnotherComponents/CardPage.jsx';


class PermissionsPage extends Component {
  render() {
    return (
        <CardPage
          link='/start'
          title='ERROR 403'
          message='No tiene los permisos para acceder a este directorio'
          buttonName='Regresar al inicio'
        />
    );
  }
}

export default PermissionsPage;
