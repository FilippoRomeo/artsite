import React from "react";
import axios from "axios";

import styled, { css } from "styled-components";

const Popup = styled.div`
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    background-color: rgba(0, 0, 0, 0);
`;
const Popup_Inner = styled.div`
    position: absolute;
    left: 25%;
    right: 25%;
    top: 25%;
    bottom: 25%;
    margin: auto;
    border-radius: 0px;
    background-color: #f0f0f0;
    border-color: black;
    border-style: solid;
    border-width: 3px;

    overflow: hidden;
`;
const X = styled.button`
    position: absolute;
    color: grey;
    top: 0px;
    left: 0px;
    display: block;
    border: none;
    &:hover ${X} {
        color: red;
    }
`;
const Title = styled.h1`
    color: black;
    top: 10%;
    margin: 5%;
    text-align: center;
`;
const Input = styled.input`
    background-color: transparent;
    color: black;
    outline: none;
    outline-style: none;
    outline-offset: 0;
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: solid black 3px;
    padding: 3px 10px;
    margin: 2% 13% 2% 14%;
    width: 70%;
`;
const Message = styled.div`
    color: black;
    top: 10%;
    margin: 5%;
    text-align: center;
`;
const TextLink = styled.a`
    margin: 40%;
    text-align: center;
`;
const Button = styled.button`
    display: inline-block;
    padding: 0.4em 1.45em;
    margin: 2% 10% 2% 14%;
    border: 3px solid #f0f0f0;
    box-sizing: border-box;
    color: black;
    background-color: white;
    text-align: center;
    width: 25%;
    &:hover ${Button} {
         border: 3px solid black;
    }
`;

class PopupCard extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            email: "",
            password: ""
        };
    }

    onSubmit(e) {
        e.preventDefault();
        const { email, password } = this.state;
        axios
            .post("api/login", {
                email,
                password
            })
            .then(response => {
                this.setState({ err: false });
                this.props.history.push("home");
            })
            .catch(error => {
                this.refs.email.value = "";
                this.refs.password.value = "";
                this.setState({ err: true });
            });
    }

    onChange(e) {
        const { name, value } = e.target;
        this.setState({ [name]: value });
    }

    render() {
        let error = this.state.err;
        let msg = !error ? "Login Successful" : "Wrong Credentials";
        let name = !error ? "alert alert-success" : "alert alert-danger";

        return (
            <Popup>
                <Popup_Inner>
                    <X onClick={this.props.closePopup} title="Close">
                        <b>ⓧ</b>
                    </X>
                    <Title>{this.props.text}</Title>

                    <div className="row">
                        <div className="panel-body">
                            <div className="col-md-offset-2 col-md-8 col-md-offset-2">
                                {error != undefined && (
                                    <Message className={name} role="alert">
                                        {msg}
                                    </Message>
                                )}
                            </div>
                            <form
                                className="form-horizontal"
                                role="form"
                                method="POST"
                                onSubmit={this.onSubmit.bind(this)}
                            >
                                <div className="form-group">
                                    <div className="col-md-6">
                                        <Input
                                            placeholder="Name"
                                            id="name"
                                            type="name"
                                            ref="name"
                                            className="form-control"
                                            name="name"
                                            onChange={this.onChange.bind(this)}
                                            required
                                        />
                                    </div>
                                </div>

                                <div className="form-group">
                                    <div className="col-md-6">
                                        <Input
                                            placeholder="E-Mail Address"
                                            id="email"
                                            type="email"
                                            ref="email"
                                            className="form-control"
                                            name="email"
                                            onChange={this.onChange.bind(this)}
                                            required
                                        />
                                    </div>
                                </div>

                                <div className="form-group">
                                    <div className="col-md-6">
                                        <Input
                                            placeholder="Password"
                                            id="password"
                                            type="password"
                                            ref="password"
                                            className="form-control"
                                            name="password"
                                            onChange={this.onChange.bind(this)}
                                            required
                                        />
                                    </div>
                                </div>


                                <div className="form-group">
                                    <Button
                                        type="submit"
                                        className="btn btn-primary"
                                    >
                                        <b>Sign in</b>
                                    </Button>

                                    <Button
                                        type="submit"
                                        className="btn btn-primary"
                                    >
                                        <b>Log in</b>
                                    </Button>
                                </div>
                            </form>
                        </div>
                    </div>
                </Popup_Inner>
            </Popup>
        );
    }
}

export default PopupCard;
