import React from "react";
import styled from "styled-components";

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

const ModalContainer = styled.div`
    position: absolute;
    width: 60%;
    left: 25%;
    right: 25%;
    top: 25%;
    bottom: 25%;

    padding: 20px;
    margin: auto;
    
    border-radius: 0px;
    border-color: black;
    border-style: solid;
    border-width: 3px;
    background-color: #f0f0f0;
`;

const Inner_modal = styled.div`
   
`;

const Modal = ({ handleClose, show, children }) => {
    const showHideClassName = show ? "modal d-block" : "modal d-none";

    return (
        <div className={showHideClassName}>
            <ModalContainer>
                <Inner_modal>
                    {children}
                    <X onClick={handleClose} title="Close">
                        <b>ⓧ</b>
                    </X>
                </Inner_modal>
            </ModalContainer>
        </div>
    );
};

export default Modal;
