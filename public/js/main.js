const keyLocalStorage = 'TabPanier';

let btn = document.querySelector('.btn-ajouter');
btn.addEventListener('click', ajoutPanier);


function ajoutPanier() {
  //this représente l'élément sur le quel tu as cliqué
  let nameValeur = this.dataset.name;
  let descValeur = this.dataset.content;
  let imgValeur = this.dataset.img;

  let ajoutPanier = [{ "title": nameValeur, "description": descValeur, "img": imgValeur }]
  console.log(ajoutPanier);

  //transformation json
  JSON.stringify(ajoutPanier);
 //envoi dnas le storage
 addToLocalStorage(keyLocalStorage, ajoutPanier);
}


