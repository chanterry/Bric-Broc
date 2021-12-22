import {useState, useEffect} from "react";

import React from "react";
import Recherche from "./Recherche";

const Toys = () => {

    const [data, setData] = useState([]);
    const [searchToy, setSearchToy] = useState("");
    let url = '/produit_bdd/' + searchToy;

    useEffect(() => {
        fetch(url)
        .then(response => response.json())
        .then(json => setData(json));
    }, [searchToy]);

    return (
        <>
            <div className="searchBar">
                <Recherche 
                    searchToy={searchToy} 
                    setSearchToy={setSearchToy} />
            </div>

            <div className="searchResult" >
                {data.map((item) => {
                     return(
                        <div key={item.id}>   
                        {item.name}
                        </div>
                    )
                })}
            </div>
        </>
    )

}

export default Toys