import { useState, useEffect } from "react";
import React from "react";
import Recherche from "./Recherche";

import '../styles/app.css';

const Toys = () => {

    const [data, setData] = useState([]);
    const [searchToy, setSearchToy] = useState("");
    let url = '/produit_bdd/' + searchToy;
    let urlPageProduit = '/details-';

    useEffect(() => {
        if (searchToy.length > 0) {
            fetch(url)
                .then(response => response.json())
                .then(json => setData(json));
        }
    }, [searchToy]);

    console.log(searchToy)

    let redirection = function redirection(e) {
        let produitID = e.currentTarget.dataset.key;
        document.location.href = urlPageProduit + produitID;
    }

    return (
        <>
            <div>
                <Recherche
                    searchToy={searchToy}
                    setSearchToy={setSearchToy} />
            </div>

            <div className="searchResult" >
                {data.map((item) => {
                    return (
                        <div data-key={item.id} onClick={redirection}>
                            {item.nom}
                        </div>
                    )
                })}
            </div>
        </>
    )
}

export default Toys