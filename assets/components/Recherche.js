import React from "react";

const Recherche = (props) => {

    const{searchToy, setSearchToy} = props;
    const handleSearchToy = (e) => {
        setSearchToy (e.target.value);
    }
    
    return (
        <input 
            type="text" 
            placeholder="Rechercher" 
            searchToy={searchToy} 
            onChange={handleSearchToy}
        />
    )
}

export default Recherche;