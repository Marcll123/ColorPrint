import React, { Component } from "react";
import ModalButton from '../AnotherComponents/buttons/ModalButton.jsx'

class Search extends Component {
  constructor(props) {
    super(props);
  }
  render() {
    return (
      <nav className="navbar navbar-white bg-white">
        <form className="form-inline">
          <input
            type="search"
            className="form-control mr-sm-2"
            placeholder="Buscar"
            pattern="[a-z]"
            onChange={this.props.changeSearch}
          />
          <button
            className="btn btn-outline-primary my-2 my-sm-2"
            type="button"
            onClick={this.props.searchClick}
          >
            Buscar
          </button>
          <ModalButton text={this.props.textButton} click={this.props.click} target={this.props.target} modal={this.props.modal}></ModalButton>
          {this.props.botontable}
          {this.props.botontable2}
        </form>
      </nav>
    );
  }
}

export default Search;
