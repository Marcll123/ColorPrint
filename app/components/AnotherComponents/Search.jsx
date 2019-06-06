import React, { Component } from "react";
import ModalButton from '../AnotherComponents/buttons/ModalButton.jsx'

class Search extends Component {
  constructor(props) {
    super(props);
  }
  render() {
    return (
      <nav class="navbar navbar-white bg-white">
        <form className="form-inline">
          <input
            type="search"
            className="form-control mr-sm-2"
            placeholder="Buscar"
          />
          <button
            className="btn btn-outline-primary my-2 my-sm-2 mr-1"
            type="submit"
          >
            Buscar
          </button>
          <ModalButton text={this.props.textButton}></ModalButton>
        </form>
      </nav>
    );
  }
}

export default Search;
