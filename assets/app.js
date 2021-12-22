import './styles/app.css';
import React from "react";
import ReactDOM from "react-dom";
import Toys from "./components/Toys";

function App() {

    return (
        <Toys />
    )
}

ReactDOM.render(<App />, document.getElementById("root"));