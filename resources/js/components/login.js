import React, { Component } from "react";
import ReactDOM from "react-dom";
import ModalLogin from "./modalLogin";

class Login extends Component {
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
                <h1> Sing in </h1>
                <button onClick={this.togglePopup.bind(this)}>
                    {" "}
                    Sign in
                </button>

                {this.state.showPopup ? (
                    <ModalLogin
                        text="Log in"
                        closePopup={this.togglePopup.bind(this)}>
                        
                    </ModalLogin>
                ) : null}
            </div>
        );
    }
}

export default Login;

if (document.getElementById("login")) {
    ReactDOM.render(<Login />, document.getElementById("login"));
}
