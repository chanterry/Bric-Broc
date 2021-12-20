const keyLocalStorage = 'TabPanier';
let tabAjoutPanier = [];

let btns = document.querySelectorAll('.btn-ajouter');


for (btn of btns) {
  if (btn) {
    btn.addEventListener('click', ajoutPanier);
  }
}


function ajoutPanier() {
  //this représente l'élément sur le quel tu as cliqué
  let nameValeur = this.dataset.name;
  let descValeur = this.dataset.content;
  let imgValeur = this.dataset.img;

  tabAjoutPanier.push({ "title": nameValeur, "description": descValeur, "img": imgValeur });

  //transformation json
  //envoi dnas le storage
  localStorage.setItem(keyLocalStorage, JSON.stringify(tabAjoutPanier));

  console.log(tabAjoutPanier);
}



