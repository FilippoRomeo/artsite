import React from "react";
import ReactDOM from "react-dom";
import ModalSignin from "./modalSignin";


class App extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            showPopup: false
        };

        this.handleClick = this.handleClick.bind(this);
    }

    handleClick() {
        this.setState({
            showPopup: true
        });
    }

    togglePopup() {
        this.setState({
            showPopup: !this.state.showPopup
        });
    }

    render() {
        return (
            <div>
                <button onClick={this.handleClick}>switch</button>
                {this.state.showPopup ? (
                    <ModalSignin
                        text="Log in"
                        closePopup={this.togglePopup.bind(this)}
                    />
                ) : null}
            </div>
        );
    }
}

ReactDOM.render(<App />, document.getElementById("root"));
