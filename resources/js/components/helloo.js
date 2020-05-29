import React from "react";
import ReactDOM from "react-dom";

function Helloo() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">
                            <h1>Shopping List</h1>
                        </div>
                        <div className="card-body">
                            <ul>
                                <li>Instagram</li>
                                <li>WhatsApp</li>
                                <li>Oculus</li>
                            </ul>
                            <ul>
                                <li>WhatsApp</li>
                                <li>Oculus</li>
                                <li>Instagram</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Helloo;

if (document.getElementById("helloo")) {
    ReactDOM.render(<Helloo />, document.getElementById("helloo"));
}
