import React, { Component } from "react";
import ReactDOM from "react-dom";
import Popup from "./popup";

class Signup extends Component {
    constructor(props) {
        super(props);
        this.state = { showPopup: false };
    }

    togglePopup() {
        this.setState({
            showPopup: !this.state.showPopup
        });
    }

    render() {
        return (
            <div>
                <h1> Simple Popup Example In React Application </h1>
                <button onClick={this.togglePopup.bind(this)}>
                    {" "}
                    Click To Launch Popup
                </button>

                {this.state.showPopup ? (
                    <Popup
                        text='Sign up'
                        closePopup={this.togglePopup.bind(this)}
                    />
                ) : null}
            </div>
        );
    }
}

export default Signup;

if (document.getElementById("signup")) {
    ReactDOM.render(<Signup />, document.getElementById("signup"));
}
