const keyLocalStorage = 'TabPanier';

let btns = document.querySelectorAll('.btn-ajouter');

for (btn of btns) {
  if (btn) {
    btn.addEventListener('click', ajoutPanier);
  }
}

function ajoutPanier() {
  let tabAjoutPanier;
  if (localStorage.getItem(keyLocalStorage) !== null) {
    tabAjoutPanier = window.localStorage.getItem(keyLocalStorage);
    tabAjoutPanier = JSON.parse(tabAjoutPanier);
  } else {
    tabAjoutPanier = [];
  }

  //this représente l'élément sur le quel tu as cliqué
  let nameValeur = this.dataset.name;
  let descValeur = this.dataset.content;
  let imgValeur = this.dataset.img;
  tabAjoutPanier.push({ "title": nameValeur, "description": descValeur, "img": imgValeur });

  //transformation json
  //envoi dnas le storage
  localStorage.setItem(keyLocalStorage, JSON.stringify(tabAjoutPanier));

}

let contenuPanier = "";

function recupererPanier() {
  let contenu = document.getElementById('contenu');

  if (localStorage.getItem(keyLocalStorage) !== null) {
    let panier = window.localStorage.getItem(keyLocalStorage);

    panier = JSON.parse(panier);
    for (let i = 0; i < panier.length; i++) {
      let article = panier[i];

      contenuPanier += '<h5>' + article.title + '</h5>';
      contenuPanier += '<p>' + article.description + '</p>';
    }

    contenu.innerHTML = contenuPanier;
  }
}
